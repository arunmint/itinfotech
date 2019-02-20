<?php
require_once("db_connect.php");

  $s = "select lpp_id,membr_id from last_pp_detls";
  $s1 = mysql_query($s) or die(mysql_error());
  while($s2 = mysql_fetch_array($s1))
  {
     $c = mysql_query("select user_id from client_list where client_id  = '".$s2['membr_id']."'");
     $cusr_id = mysql_fetch_array($c);
	 
     $up = "update last_pp_detls set user_id = '".$cusr_id['user_id']."' where lpp_id = '".$s2['lpp_id']."'";
	 $up2 = mysql_query($up) or die(mysql_error());
	 
  }

  
  

?>