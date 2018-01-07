<?php
require "../../inc/config.php";
require "../../inc/function.class.php";
require "../../inc/pagenaven.class.php";


//公司产品

if($_POST[searchcontent]!=''){
	
$intRows = 9;
$strSQLNum = "SELECT COUNT(*) as num from productinfo as a 
          left join productpic as b on a.id_prodinfo=b.id_prodinfo 
		  left join productdir as c on a.id_proddir=c.id_proddir
		  where a.dele='1'  and a.title like '%".$_POST[searchcontent]."%' ";   
$rs = $objDB->Execute($strSQLNum);
$arrNum = $objDB->fields();
$intTotalNum=$arrNum["num"];

$objPage = new PageNav($intCurPage,$intTotalNum,$intRows);

$objPage->setvar($arrParam);
$objPage->init_page($intRows ,$intTotalNum);
$strNavigate = $objPage->output(1);
$intStartNum=$objPage->StartNum(); 

$strSQL = "select a.title,a.content,a.id_prodinfo,a.id_proddir,b.opicname,c.fatherid from productinfo as a 
          left join productpic as b on a.id_prodinfo=b.id_prodinfo 
		  left join productdir as c on a.id_proddir=c.id_proddir
		  where a.dele='1'  and a.title like '%".$_POST[searchcontent]."%' order by a.id_prodinfo desc" ;
$objDB->SelectLimit($strSQL,$intRows,$intStartNum);
$arrprods=$objDB->GetRows();

}


//产品一级目录
$strSQL = "select name,id_proddir from productdir where lang=0 and level=1 order by id_proddir asc " ;
$objDB->Execute($strSQL);
$pdir1=$objDB->getrows();


//产品目录导航
$strSQL = "select name,id_proddir from productdir where id_proddir='".$_GET[pdir1]."'  " ;
$objDB->Execute($strSQL);
$pdirnavi=$objDB->fields();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="<?php echo $setinfo[keywords];?>" />
<meta name="description" content="<?php echo $setinfo[description];?>" />
<title><?php echo $setinfo[title];?></title>
<link href="/inc/css/css2.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/inc/js/stmenu.js"></script>
<script src="/inc/js/jquery.js" type="text/javascript"></script>

<?php if($setinfo[iscopy]=='1'){?>
<script language="JavaScript">
document.oncontextmenu=new Function("event.returnValue=false;");
document.onselectstart=new Function("event.returnValue=false;");
</script>
<?php }?>
<?php if($setinfo[otherheader]!=''){echo $setinfo[otherheader];}?>
</head>
<body>

<div id="about_box">
<div id="about_top">
<? require "../header.php"; ?>
</div><!--end header_top!-->

<div id="about_advbg" style="background-image:url(/inc/pics/bannerpic02.jpg); background-repeat:no-repeat">

<div id="about_contentbox">
<div id="about_cleft">
<ul class="sub_nav">
		    
            <? for($i=0;$i<sizeof($pdir1);$i++){?>
				<li><a href="/en/product/product.php?pdir1=<?=$pdir1[$i][id_proddir]?>" ><?=$pdir1[$i][name]?></a> </li>
			<? }?>	 
		  </ul>
</div> <!--end about_cleft!-->
<div id="about_cright">
<div id="about_crightbanner"><img src="/inc/pics/aboutbanner.gif" /></div> 
<div id="about_crightnavi">Now：<a href="/en/" class="link_aboutnavi">Home</a> > <a href="/en/product/product.php" class="link_aboutnavi">Products</a> > <?=$pdirnavi[name];?></div> 
<div id="about_crighttitle">&nbsp;&nbsp;&nbsp;&nbsp;Products</div> 
<div id="prod_crightc">

<?php for($i=0;$i<sizeof($arrprods);$i++){?>
  <div id="productlist">
  <a href="productsinfo.php?pid=<?=$arrprods[$i][id_prodinfo];?>&pdir1=<?=$arrprods[$i][fatherid];?>&pdir2=<?=$arrprods[$i][id_proddir];?>">
  <div id="productlist_img"><img src="/upload/product/<?=$arrprods[$i][opicname];?>" width="150" border="0" /></div>
  </a>
  <h1><a href="productsinfo.php?pid=<?=$arrprods[$i][id_prodinfo];?>&pdir1=<?=$arrprods[$i][fatherid];?>&pdir2=<?=$arrprods[$i][id_proddir];?>"><?=$arrprods[$i][title];?></a></h1>
  </div><!--end productlist!-->
<?php }?>

<div id="product_navi"><?php echo $strNavigate;?></div> 
</div> 

</div> <!--end about_cright!-->
<div id="about_crightmenu"><? require "../right.php"; ?></div> 

<div style="clear:both;"></div> 
</div> <!--end about_contentbox!-->

</div> <!--end header_adv!-->


</div><!--end header_box!-->





<? require "../footer.php"; ?>

</body>
</html>

