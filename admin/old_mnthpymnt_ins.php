<?php
ob_start();
require_once("../db_connect.php");
require_once("../functions.php");

$pymnt_dte = $_POST['pay_yr']."-".$_POST['pay_mnth']."-".$_POST['pay_dte'];
$rlse_dte = $_POST['rlse_yr']."-".$_POST['rlse_mnth']."-".$_POST['rlse_dte'];

$paymnt_id_cunt = count($_POST['client_id']);
$pay_amunt = $_POST['mnth_amount'];

for($i=0; $i<$paymnt_id_cunt; $i++)
{
	$pymnt_id = $_POST['client_id'][$i];
	
	$usr_dtls = "select client_id,user_id from client_list where client_id = '".$pymnt_id."'";
	$usr_dtls1 = mysql_query($usr_dtls) or die(mysql_error());
	$usr_dtls2 = mysql_fetch_array($usr_dtls1);
	
	//chck_already_exist
	$chck_alr = "select count(*) from mntly_pymnt_lst where cilnt_id = '".$pymnt_id."' and paymnt_dte = '".$pymnt_dte."'";
	$chck_alr1= mysql_query($chck_alr) or die(mysql_error());
	$chck_alr2 = mysql_fetch_array($chck_alr1);
	
	if($chck_alr2[0]==0)
	{
		$inst_pymnt = "insert into mntly_pymnt_lst set cilnt_id = '".$pymnt_id."',
													user_id = '".$usr_dtls2['user_id']."',
													paymnt_dte = '".$pymnt_dte."',
													pymnt_stle_dte = '".$rlse_dte."',
													pay_amt = '".$pay_amunt."',
													othr_amt = '".$_POST['other_chrgs']."',
													pay_mod = '".$_POST['pay_mode']."',
													bnk_nme = '".$_POST['bnk_nme']."',
													chalen_no = '".$_POST['challen_no']."',
													created_dte = '".date("Y-m-d")."'";
		
		$inst_pymnt2 = mysql_query($inst_pymnt) or die(mysql_error());
		
		$dte2 = strtotime(date("Y-m-d", strtotime($pymnt_dte)) . " +30 days");
	    $nxt_pymnt_dte2 = date("Y-m-d", $dte2)."<br>";
		
		$up = "update client_list set nxt_pymnt_dte ='".$nxt_pymnt_dte2."' where client_id = '".$pymnt_id."'";
		$up2 = mysql_query($up) or die(mysql_error());
		
		header("location:mnthly_pay_memlist.php?msg=suc");
	}
	else
	{
	  header("location:mnthly_pay_memlist.php?msg=err");
	}
	

}


?>