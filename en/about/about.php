<?php
require "../../inc/config.php";
require "../../inc/function.class.php";

if(!isset($_GET[pageid])){$pageid='9';}else{$pageid=$_GET[pageid];}
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
		    
				<li><a href="/en/about/about.php?pageid=9" class="cur_link">About Us</a> </li>
				 
				<li><a href="/en/about/about.php?pageid=10">Honors</a> </li>
				 
				<li><a href="/en/news/news.php">News</a> </li>
				 
				<li><a href="/en/about/about.php?pageid=11">Sales Network</a> </li>
				 
				<li><a href="/en/about/about.php?pageid=12">Contact Us</a> </li>
                
                <li><a href="/en/about/about.php?pageid=16">Join us</a> </li>
				 
		  </ul>
</div> <!--end about_cleft!-->
<div id="about_cright">
<div id="about_crightbanner"><img src="/inc/pics/aboutbanner.gif" /></div> 
<div id="about_crightnavi">Now：<a href="/en/" class="link_aboutnavi">Home</a> > <a href="/en/about/about.php?pageid=1" class="link_aboutnavi">About Us</a> > <?=$companyinfo[title];?>&nbsp;&nbsp;&nbsp;&nbsp;</div> 
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

