<?php
require "../inc/config.php";
require "../inc/function.class.php";
require "../inc/pagenav.class.php";


//新闻动态
if(!isset($_GET[ndir2]) || $_GET[ndir2]==''){
$intRows = 10;
$strSQLNum = "SELECT COUNT(*) as num from newsinfo as a left join newsdir as b on a.id_newsdir=b.id_newsdir where a.dele=1 and b.lang=1 ";   
$rs = $objDB->Execute($strSQLNum);
$arrNum = $objDB->fields();
$intTotalNum=$arrNum["num"];

$objPage = new PageNav($intCurPage,$intTotalNum,$intRows);

$objPage->setvar($arrParam);
$objPage->init_page($intRows ,$intTotalNum);
$strNavigate = $objPage->output(1);
$intStartNum=$objPage->StartNum(); 

$strSQL = "select a.*,b.fatherid from newsinfo as a left join newsdir as b on a.id_newsdir=b.id_newsdir where a.dele=1 and b.lang=1 order by a.id_newsinfo desc" ;
$objDB->SelectLimit($strSQL,$intRows,$intStartNum);
$arrnews=$objDB->GetRows();

}elseif(isset($_GET[ndir2])){

$intRows = 10;
$strSQLNum = "SELECT COUNT(*) as num from newsinfo  where id_newsdir='".$_GET[ndir2]."'  and dele=1";   
$rs = $objDB->Execute($strSQLNum);
$arrNum = $objDB->fields();
$intTotalNum=$arrNum["num"];

$objPage = new PageNav($intCurPage,$intTotalNum,$intRows);

$objPage->setvar($arrParam);
$objPage->init_page($intRows ,$intTotalNum);
$strNavigate = $objPage->output(1);
$intStartNum=$objPage->StartNum(); 

$strSQL = "select * from newsinfo  where id_newsdir='".$_GET[ndir2]."' and dele=1  order by id_newsinfo desc" ;
$objDB->SelectLimit($strSQL,$intRows,$intStartNum);
$arrnews=$objDB->GetRows();
}

//新闻内容目录
$strSQL = "select name from newsdir where id_newsdir='".$_GET[ndir2]."'  " ;
$objDB->Execute($strSQL);
$newsdirnavi=$objDB->fields();

//新闻二级目录
$strSQL = "select name,id_newsdir from newsdir where lang=1 and level=2 order by id_newsdir asc " ;
$objDB->Execute($strSQL);
$ndir2=$objDB->getrows();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="<?php echo $setinfo[keywords];?>" />
<meta name="description" content="<?php echo $setinfo[description];?>" />
<title><?php echo $setinfo[title];?></title>
<link href="../inc/css/css1.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../inc/js/stmenu.js"></script>
<script src="../inc/js/jquery.js" type="text/javascript"></script>

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

<div id="about_advbg" style="background-image:url(../inc/pics/bannerpic02.jpg); background-repeat:no-repeat">

<div id="about_contentbox">
<div id="about_cleft">
<ul class="sub_nav">
		    
            <? for($i=0;$i<sizeof($ndir2);$i++){?>
				<li><a href="/news/news.php?ndir2=<?=$ndir2[$i][id_newsdir]?>" ><?=$ndir2[$i][name]?></a> </li>
			<? }?>	 
		  </ul>
</div> <!--end about_cleft!-->
<div id="about_cright">
<div id="about_crightbanner"><img src="../inc/pics/aboutbanner.gif" /></div> 
<div id="about_crightnavi">
您现在的位置：<a href="/" class="link_aboutnavi">首页</a> > <a href="/news/news.php" class="link_aboutnavi">新闻中心</a> > <a href="#" class="link_aboutnavi"><?=$pdirnavi[name];?></a> 
</div> 
<div id="about_crighttitle">&nbsp;&nbsp;&nbsp;&nbsp;新闻中心</div> 
<div class="txt" id="newscontentright_content">

<div id="allnews">
  <ul>
  <?php for($i=0;$i<sizeof($arrnews);$i++){?>
    <li><span><?=$arrnews[$i][newsdate];?></span><a href="newsinfo.php?newsid=<?=$arrnews[$i][id_newsinfo];?>" class="link_navi"><?=cutstr($arrnews[$i][title],70,1);?></a></li>
  <?php }?>
  </ul>
</div><!--end allnews!-->
<div id="allnewsnavi"><?php echo $strNavigate;?></div>

</div> <!--end newscontentright_content!-->

</div> <!--end about_cright!-->
<div id="about_crightmenu"><? require "../right.php"; ?></div> 

<div style="clear:both;"></div> 
</div> <!--end about_contentbox!-->

</div> <!--end header_adv!-->


</div><!--end header_box!-->





<? require "../footer.php"; ?>

</body>
</html>

