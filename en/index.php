<?php
require "../inc/config.php";
require "../inc/function.class.php";

// 新闻信息
$strSQL ="select a.*,b.fatherid,c.opicname from newsinfo as a 
left join newsdir as b on a.id_newsdir=b.id_newsdir 
left join newspic as c on a.id_newsinfo=c.id_newsinfo 
where a.dele=1 and b.lang=0 order by a.id_newsinfo desc limit 6";
$objDB->Execute($strSQL);
$news_sy=$objDB->GetRows();

//新闻图片
$strSQL ="select a.dele,a.id_newsinfo,c.opicname as pic from newsinfo as a 
left join newsdir as b on a.id_newsdir=b.id_newsdir 
left join newspic as c on a.id_newsinfo=c.id_newsinfo 
where a.dele=1 and b.lang=0 and c.opicname!='' order by a.id_newsinfo desc limit 5";
$objDB->Execute($strSQL);
$newspic=$objDB->GetRows();

// LOGO
$strSQL ="select opicname from layoutpic  where id_layout='1'";
$objDB->Execute($strSQL);
$logo_qj=$objDB->fields();

// 产品四大类en
$strSQL ="select opicname,url,title from layoutpic  where id_layout='4' limit 4";
$objDB->Execute($strSQL);
$productlist_sy=$objDB->GetRows();

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
<script src="/inc/js/changepic.js"></script>
<script src="/inc/js/jcarousellite_1.0.1.pack.js" type="text/javascript"></script>

<script type="text/javascript">
   $(document).ready(function(){
    $("#headerproductlist").jCarouselLite({
   auto: 5000,scroll: 1,speed: 600,visible: 4, vertical: true
    }); 
   });
</script>



<?php if($setinfo[iscopy]=='1'){?>
<script language="JavaScript">
document.oncontextmenu=new Function("event.returnValue=false;");
document.onselectstart=new Function("event.returnValue=false;");
</script>
<?php }?>
<?php if($setinfo[otherheader]!=''){echo $setinfo[otherheader];}?>
</head>
<body>

<div id="header_box">
<div id="header_top">
<div id="header">
<div id="headerlogo">
<div id="headerlogo_left"><img src="/upload/layout/<?=$logo_qj[opicname];?>" /></div>
<div id="headerlogo_right">
<div id="search">
<div id="searchtxt" style="width:155px; height:19px; float:left">
<form action="/en/product/productsearch.php" method="post" name="searchform" onsubmit="">
<label>
<input name="searchcontent" type="text"  class="txt" id="searchcontent" value="search"   onfocus="if(this.value=='search'){this.value='';this.style.color='black';};" />
</label>
</form>
</div>
<div id="btn">
<a href="javascript:document.searchform.submit();"><span><img src="/inc/pics/searchbutton.gif" style="border:0" alt="search"/></span></a>
</div>
</div><!--end search-->
</div>
</div>
<div id="headermenu">
<script type="text/javascript">
<!--
stm_bm(["menu5a8c",900,"","/inc/pics/blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.60)",5,"",-2,50,0,0,"#999999","#E6EFF9","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"\r\nHome","","",-1,-1,0,"/en/","_self","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFFF",0,"#FFFFFF",0,"/inc/pics/menubg02.gif","/inc/pics/menubg02.gif",3,3,0,0,"#C8C8C8","#C8C8C8","#FFFFFF","#FFFFFF","bold 14px 'Arial','Verdana'","bold 14px 'Arial','Verdana'",0,0,"","","","",0,0,0],126,46);
stm_aix("p0i1","p0i0",[0,"\r\nAbout","","",-1,-1,0,"/en/about/about.php","_self","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFFF",0,"#FFFFFF",0,"/inc/pics/menubg01.gif","/inc/pics/menubg02.gif",3,3,0,0,"#C8C8C8","#C8C8C8","#59931A"],126,46);
stm_aix("p0i2","p0i1",[0,"\r\nEntities","","",-1,-1,0,"/en/about/entity.php?pageid=6"],126,46);
stm_aix("p0i3","p0i1",[0,"\r\nProducts","","",-1,-1,0,"/en/product/product.php"],126,46);
stm_aix("p0i4","p0i1",[0,"\r\nNews","","",-1,-1,0,"/en/news/news.php"],126,46);
stm_aix("p0i5","p0i1",[0,"\r\nContact","","",-1,-1,0,"/en/about/about.php?pageid=12"],120,46);
stm_ep();
stm_em();
//-->
</script>


</div>
</div><!--end header!-->
<div id="headerlang"><a href="/">中文</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/en/">English</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><!--end headerlang!-->
<div id="headerproduct">
<div id="headerproductlist">
<ul>
<?php for($i=0;$i<sizeof($productlist_sy);$i++){?>
<li>
<div id="headerproductbox">
<p><a href="<?=$productlist_sy[$i][url];?>"><img src="/upload/layout/<?=$productlist_sy[$i][opicname];?>" border="0" /></a><span> <a href="<?=$productlist_sy[$i][url];?>" class="link_green"><?=$productlist_sy[$i][title];?></a></span></p>
</div>
</li>
<?php }?>

</ul>
</div><!--end headerproductlist!-->
</div><!--end headerproduct!-->



</div><!--end header_top!-->
<div id="header_adv">
<? require "mainadv.php"; ?>
</div><!--end header_adv!-->

</div><!--end header_box!-->


<div id="maincontent">
<div id="maincontent1">
<div id="maincontent1title"><img src="/inc/pics/newsen.gif" /></div>
<div id="maincontent1pic">
 <!--JS脚本1--开始-->
            <script type="text/javascript">
			var imag=new Array();
			var link=new Array();
			var text=new Array();
			
						imag[1]	= "/upload/news/<?=$newspic[0][pic]?>";
						link[1]	= escape("/news/newsinfo.php?newsid=<?=$newspic[0][id_newsinfo]?>");
						text[1]	= "";
			
						imag[2]	= "/upload/news/<?=$newspic[1][pic]?>";
						link[2]	= escape("/news/newsinfo.php?newsid=<?=$newspic[1][id_newsinfo]?>");
						text[2]	= "";
			
						imag[3]	= "/upload/news/<?=$newspic[2][pic]?>";
						link[3]	= escape("/news/newsinfo.php?newsid=<?=$newspic[2][id_newsinfo]?>");
						text[3]	= "";
			
						imag[4]	= "/upload/news/<?=$newspic[3][pic]?>";
						link[4]	= escape("/news/newsinfo.php?newsid=<?=$newspic[3][id_newsinfo]?>");
						text[4]	= "";
			
						imag[5]	= "/upload/news/<?=$newspic[4][pic]?>";
						link[5]	= escape("/news/newsinfo.php?newsid=<?=$newspic[4][id_newsinfo]?>");
						text[5]	= "";
			

			 var focus_width=150
			 var focus_height=129
			 
			 var text_height=0
			 var swf_height = focus_height+text_height
			 
			 var pics="", links="", texts="";
			 for(var i=1; i<imag.length; i++){
				if (pics != "")
				{
					pics=pics+("|"+imag[i]);
					links=links+("|"+link[i]);
					texts=texts+("|"+text[i]);
				}
				else
				{
					pics=imag[i];
					links=link[i];
					texts=text[i];
				}
			 }
			 
			 document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="'+ focus_width +'" height="'+ swf_height +'">');
			 document.write('<param name="allowScriptAccess" value="sameDomain"><param name="movie" value="focus.swf"><param name="quality" value="high"><param name="bgcolor" value="ffffff">');
			 document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
			 document.write('<param name="FlashVars" value="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'">');
			 document.write('</object>');
			 </script>
            <!--JS脚本1--结束-->
</div>
<div id="maincontent1title"><a href="/en/about/about.php?pageid=12"><img src="/inc/pics/newsen2.gif" border="0" /></a></div>
</div><!--end maincontent1!-->
<div id="maincontent2">
<div id="maincontent2title">
<h1><a href="/en/news/newsinfo.php?newsid=<?=$news_sy[0][id_newsinfo];?>"><?=cutstr($news_sy[0][title],45,1);?></a></h1> 
<p><?=cutstr($news_sy[0][intro],90,1);?></p> 

</div>
<div id="maincontent2news">
<div id="homenews1">
<ul>
  <?php for($i=1;$i<sizeof($news_sy);$i++){?>
     <li><span>[<?=$news_sy[$i][newsdate];?>]</span><a href="/en/news/newsinfo.php?newsid=<?=$news_sy[$i][id_newsinfo];?>" class="link_navi"><?=cutstr($news_sy[$i][title],32,1);?></a></li>
  <?php }?>
</ul>
</div>
</div><!--end maincontent2news!-->
</div><!--end maincontent2!-->
<div id="maincontent3"><a href="/en/about/entity.php?pageid=13"><img src="/inc/pics/hren.jpg" border="0" /></a></div>
<div id="maincontent4"><img src="/inc/pics/hottelen.jpg" border="0" usemap="#Map" />
<map name="Map" id="Map">
  <area shape="rect" coords="6,114,161,172" href="javascript:void(0)" onclick="needsendmail2();" />
  <area shape="rect" coords="6,183,161,240" href="/en/product/product.php" />
</map></div>

</div>


<? require "footer.php"; ?>

</body>
</html>

