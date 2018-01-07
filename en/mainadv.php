<?php
//BANNER图
$strSQL = "select opicname from layoutpic  where id_layout='2' order by id_layoutpic asc" ;
$objDB->Execute($strSQL);
$Banner_QJ=$objDB->GetRows();
?>

<div name="pic" style="overflow:hidden; z-index:0;" > 
<?php for($i=0;$i<sizeof($Banner_QJ);$i++){?>
<div><img  src="/upload/layout/<?=$Banner_QJ[$i][opicname];?>" /></div> 
<?php }?>
</div> 
