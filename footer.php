<?php
//页脚
$strSQL = "select content from layout  where id_layout='5'" ;
$objDB->Execute($strSQL);
$footer_BQ=$objDB->fields();
?>
<div id="footer">
<div id="footer1"> 
<ul>
<li><?=$footer_BQ[content];?></li>
</ul>
</div>
</div>