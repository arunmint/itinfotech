<?php
require_once("db_connect.php");


$sel = "select lpp_id,lft_pt,rght_pt from last_pp_detls";
$sel1 = mysql_query($sel) or die(mysql_error());
while($sel2 = mysql_fetch_array($sel1))
{
   $cmn_pair = $sel2['lft_pt'];
   if($sel2['lft_pt'] > $sel2['rght_pt']) { $cmn_pair = $sel2['rght_pt']; }
   
   $up = "update last_pp_detls set cmn_pair = '".$cmn_pair."' where lpp_id = '".$sel2['lpp_id']."'";
   $up2 = mysql_query($up) or die(mysql_error());
}

?>