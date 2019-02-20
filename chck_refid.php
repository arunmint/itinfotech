<?php
require_once("db_connect.php");
require_once("functions.php");

if(isset($_REQUEST['refid']))
{
  $refid = $_REQUEST['refid'];
}

$val = "";

    //check upline id is in or not
	$sql = "select client_id from client_list where user_id = '".$refid."'";
	$r = mysql_query($sql) or die(mysql_error());
	$rw = mysql_num_rows($r);
    if($rw==0)
	{
	  $val = "<span style='color:#FF0000; font-weight:bold;'>Invalid Reference ID.</span>";
	}


echo $val;
?>

