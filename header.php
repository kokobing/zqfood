<?
$c_filename = end(explode('/',$_SERVER["PHP_SELF"])); 
if($c_filename=='about.php'){$menubg="menubg02.gif";$menucolor="#ffffff";}else{$menubg="menubg01.gif";$menucolor="#59931A";}
if($c_filename=='product.php'){$menubg_prod="menubg02.gif";$menucolor_prod="#ffffff";}else{$menubg_prod="menubg01.gif";$menucolor_prod="#59931A";}
// LOGO
$strSQL ="select opicname from layoutpic  where id_layout='1'";
$objDB->Execute($strSQL);
$logo_qj=$objDB->fields();

?>
<div id="aboutheader">
<div id="headerlogo">
<div id="headerlogo_left"><img src="/upload/layout/<?=$logo_qj[opicname];?>" /></div>
<div id="headerlogo_right">
<div id="search">
<div id="searchtxt" style="width:155px; height:19px; float:left">
<form action="/product/productsearch.php" method="post" name="searchform" onsubmit="">
<label>
<input name="searchcontent" type="text"  class="txt" id="searchcontent" value="搜索" onfocus="if(this.value=='搜索'){this.value='';this.style.color='black';};"  />
</label>
</form>
</div>
<div id="btn">
<a href="javascript:document.searchform.submit();"><span><img src="/inc/pics/searchbutton.gif" style="border:0" alt="搜索一下"/></span></a>
</div>
</div><!--end search-->
</div>
</div>
<div id="aboutheadermenu">
<script type="text/javascript">
<!--
stm_bm(["menu5a8c",900,"","/inc/pics/blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.60)",5,"",-2,50,0,0,"#999999","#E6EFF9","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"\r\n首 页","","",-1,-1,0,"/","_self","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFFF",0,"#FFFFFF",0,"/inc/pics/menubg01.gif","/inc/pics/menubg02.gif",3,3,0,0,"#C8C8C8","#C8C8C8","#59931A","#FFFFFF","bold 14px 'Arial','Verdana'","bold 14px 'Arial','Verdana'",0,0,"","","","",0,0,0],126,46);
stm_ai("p0i1",[0,"\r\n公司简介","","",-1,-1,0,"/about/about.php","_self","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFFF",0,"#FFFFFF",0,"/inc/pics/<?=$menubg;?>","/inc/pics/menubg02.gif",3,3,0,0,"#C8C8C8","#C8C8C8","<?=$menucolor;?>","#FFFFFF","bold 14px 'Arial','Verdana'","bold 14px 'Arial','Verdana'",0,0,"","","","",0,0,0],126,46);
stm_ai("p0i2",[0,"\r\n两大实体","","",-1,-1,0,"/about/entity.php?pageid=6","_self","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFFF",0,"#FFFFFF",0,"/inc/pics/menubg01.gif","/inc/pics/menubg02.gif",3,3,0,0,"#C8C8C8","#C8C8C8","#59931A","#FFFFFF","bold 14px 'Arial','Verdana'","bold 14px 'Arial','Verdana'",0,0,"","","","",0,0,0],126,46);
stm_ai("p0i3",[0,"\r\n产品中心","","",-1,-1,0,"/product/product.php","_self","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFFF",0,"#FFFFFF",0,"/inc/pics/<?=$menubg_prod;?>","/inc/pics/menubg02.gif",3,3,0,0,"#C8C8C8","#C8C8C8","<?=$menucolor_prod;?>","#FFFFFF","bold 14px 'Arial','Verdana'","bold 14px 'Arial','Verdana'",0,0,"","","","",0,0,0],126,46);
stm_ai("p0i4",[0,"\r\n新闻中心","","",-1,-1,0,"/news/news.php","_self","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFFF",0,"#FFFFFF",0,"/inc/pics/menubg01.gif","/inc/pics/menubg02.gif",3,3,0,0,"#C8C8C8","#C8C8C8","#59931A","#FFFFFF","bold 14px 'Arial','Verdana'","bold 14px 'Arial','Verdana'",0,0,"","","","",0,0,0],126,46);
stm_ai("p0i5",[0,"\r\n联系我们","","",-1,-1,0,"/about/about.php?pageid=5","_self","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFFF",0,"#FFFFFF",0,"/inc/pics/menubg01.gif","/inc/pics/menubg02.gif",3,3,0,0,"#C8C8C8","#C8C8C8","#59931A","#FFFFFF","bold 14px 'Arial','Verdana'","bold 14px 'Arial','Verdana'",0,0,"","","","",0,0,0],120,46);

stm_ep();
stm_em();
//-->
</script>


</div>
</div><!--end header!-->
<div id="headerlang"><a href="/">中文</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/en/">English</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><!--end headerlang!-->