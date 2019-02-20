<?php
require_once("../db_connect.php");
require_once("functions.php");

$usr_id = trim($_POST['usr_id']);
$pin_cunt = trim($_POST['pin']);

$sql = "select max(pin_id) from my_pins";
$r = mysql_query($sql) or die(mysql_error());
$rest = mysql_fetch_array($r);
$nxt_id = $rest[0]+1;

//insert my_pins table
$p = "insert into my_pins set pin_id = '".$nxt_id."',
                              user_id = '".$usr_id."',
							  client_id = '".get_memberid($usr_id)."',
							  pin_count = '".$pin_cunt."',
							  created_dte = '".date('Y-m-d')."'";
$p2 = mysql_query($p) or die(mysql_error());							  

for($i=0; $i<$pin_cunt; $i++)
{
	$pin_no = randomPrefix(12);
	
	$ins = "insert into my_pin_list set pin_cunt_id = '".$nxt_id."',
	                                    user_id = '".$usr_id."',
									    client_id = '".get_memberid($usr_id)."',
									    pins = '".$pin_no."',
									    created_dte = '".date('Y-m-d')."'";
	$ins_row = mysql_query($ins) or die(mysql_error());									
}
header("location:pin_generate.php?msg=suc");
?>