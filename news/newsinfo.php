<?php
require "../inc/config.php";
require "../inc/function.class.php";
require "../inc/pagenav.class.php";

$newsid=$_GET[newsid];

// 新闻信息
$strSQL = "select title,content,id_newsinfo from newsinfo where id_newsinfo=$newsid and dele='1'" ;
$objDB->Execute($strSQL);
$news_info=$objDB->fields();


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
您现在的位置：<a href="/" class="link_aboutnavi">首页</a> > <a href="/product/product.php" class="link_aboutnavi">产品中心</a> > <a href="#" class="link_aboutnavi"><?=$pdirnavi[name];?></a> 
</div> 
<div id="about_crighttitle">&nbsp;&nbsp;&nbsp;&nbsp;产品中心</div> 
<div id="prod_crightc">

<table width="98%" border="0" align="center" cellpadding="2" cellspacing="2">
<tr>
                    <td height="50" align="center" class="txt_title"><?=$news_info[title];?></td>
                  </tr>
                  <tr>
                    <td height="50" align="left"><?=$news_info[content];?></td>
            </tr>
                  <tr>
                    <td height="50" align="center">&nbsp;</td>
                  </tr>
                </table>

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

