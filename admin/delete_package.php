<?php
require_once("../db_connect.php");

if(isset($_GET['packid']))
{
  $packid = $_GET['packid'];
}
  $del = "delete from package_list where pack_id = '".$packid."'";
  $del2 = mysql_query($del) or die(mysql_error());
  
  header("location:package.php?msg=ds");
  
?>