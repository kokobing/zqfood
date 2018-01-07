<?php
require "../inc/config.php";
require "../inc/function.class.php";

if(!isset($_GET[pageid])){$pageid='1';}else{$pageid=$_GET[pageid];}
//公司简介
$strSQL = "select * from pageset where id_pageset='$pageid' " ;
$objDB->Execute($strSQL);
$companyinfo=$objDB->fields();

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
		    
				<li><a href="/about/about.php?pageid=1" class="cur_link">公司简介</a> </li>
				 
				<li><a href="/about/about.php?pageid=2">公司荣誉</a> </li>
				 
				<li><a href="/news/news.php">新闻中心</a> </li>
				 
				<li><a href="/about/about.php?pageid=4">销售网络</a> </li>
				 
				<li><a href="/about/about.php?pageid=5">联系我们</a> </li>
                
                <li><a href="/about/about.php?pageid=15">人才招聘</a> </li>
				 
			 
		  </ul>
</div> <!--end about_cleft!-->
<div id="about_cright">
<div id="about_crightbanner"><img src="../inc/pics/aboutbanner.gif" /></div> 
<div id="about_crightnavi">您现在的位置：<a href="#" class="link_aboutnavi">首页</a> > <a href="#" class="link_aboutnavi">关于我们</a> > <a href="#" class="link_aboutnavi">关于我们</a>&nbsp;&nbsp;&nbsp;&nbsp;</div> 
<div id="about_crighttitle">&nbsp;&nbsp;&nbsp;&nbsp;<?=$companyinfo[title];?></div>
<div id="about_crightc"><?php echo $companyinfo[content];?></div>

</div> <!--end about_cright!-->
<div id="about_crightmenu">
<? require "../right.php"; ?>
</div> 

<div style="clear:both;"></div> 
</div> <!--end about_contentbox!-->

</div> <!--end header_adv!-->


</div><!--end header_box!-->





<? require "../footer.php"; ?>

</body>
</html>

