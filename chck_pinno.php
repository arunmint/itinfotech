<?php
require_once("db_connect.php");
require_once("functions.php");

if(isset($_REQUEST['pinno']))
{
  $pinno = $_REQUEST['pinno'];
}

$val = "";

    //check upline id is in or not
	$sql = "select pins from my_pin_list where pins = '".$pinno."'";
	$r = mysql_query($sql) or die(mysql_error());
	$rw = mysql_num_rows($r);
    if($rw==0)
	{
	  $val = "<span style='color:#FF0000; font-weight:bold;'>Invalid Pin No.</span>";
	}


echo $val;
?>

