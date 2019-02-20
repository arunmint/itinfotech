<?php
require_once("../db_connect.php");


$clnt_id = $_POST['clnt_id'];
$usr_id = $_POST['usr_id'];
$mnth_amount = $_POST['mnth_amount'];
$pay_mode = $_POST['pay_mode'];
$payment_dte = $_POST['yy']."-".$_POST['mm']."-".$_POST['dd'];

$inst_pymnt = "insert into mntly_pymnt_lst set cilnt_id = '".$clnt_id."',
											   user_id = '".$usr_id."',
											   paymnt_dte = '".$payment_dte."',
											   pymnt_stle_dte = '".$payment_dte."',
											   pay_amt = '".$mnth_amount."',
											   pay_mod = '".$pay_mode."',
											   created_dte = '".date("Y-m-d")."'";
		
$inst_pymnt2 = mysql_query($inst_pymnt) or die(mysql_error());
	
$nxt_dte = strtotime(date("Y-m-d", strtotime($payment_dte)) . " +30 days");
$nxt_pymnt_dte = date("Y-m-d",$nxt_dte);	
		
$up = "update client_list set nxt_pymnt_dte ='".$nxt_pymnt_dte."' where client_id = '".$clnt_id."'";
$up2 = mysql_query($up) or die(mysql_error());
		
header("location:mnthly_pay_memlist.php?msg=suc");
?>