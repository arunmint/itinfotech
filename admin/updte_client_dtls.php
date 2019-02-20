<?php
require_once("../db_connect.php");

if(isset($_GET['clntid']))
{
  $clntid = $_GET['clntid'];
}

if(isset($_GET['page']))
{
  $page = $_GET['page'];
}

$join_dte = $_POST['yy']."-".$_POST['mm']."-".$_POST['dd'];

$nxt_dte = strtotime(date("Y-m-d", strtotime($join_dte)) . " +37 days");
$nxt_pymnt_dte = date("Y-m-d", $nxt_dte);

//package dtls
$pck = explode("-",$_POST['pack_id']);

     $insclnt = "update client_list set pin_no = '".$_POST['pin_no']."',	
										upline_id = '".trim($_POST['up_id'])."', 
										ref_id = '".trim($_POST['ref_id'])."',
										client_tag = '".$_POST['tag']."',
										user_id = '".$_POST['usr_id']."',
										usr_name = '".$_POST['clent_nme']."', 
										usr_father = '".$_POST['fname']."',
										usr_nominee = '".$_POST['nominee']."', 
										nominee_relation = '".$_POST['rela_nomine']."', 
										nominee_age = '".$_POST['nomie_age']."',
										nominee_mble = '".$_POST['nomie_mble']."',
										address = '".$_POST['address']."',
										email_id = '".$_POST['email_id']."',
										package_id = '".$pck[0]."',
										package_amut = '".$pck[1]."',
										mobile = '".$_POST['mble_no']."',
										occupation = '".$_POST['occupation']."',
										pan_no = '".$_POST['pan_card_no']."',
										education = '".$_POST['education']."',
										city = '".$_POST['city']."',
										state = '".$_POST['state']."',
										country = '".$_POST['country']."',
										payment_mode = '".$_POST['pay_method']."',
										bnk_name = '".$_POST['bank_nme']."',
										bnk_acct_no = '".$_POST['bnk_acct']."',
										bnk_branch = '".$_POST['branch']."',
										bnk_phone = '".$_POST['bnk_ph']."',
										bnk_IFSC = '".$_POST['ifsc_code']."',
										join_dte = '".$join_dte."',
										nxt_pymnt_dte = '".$nxt_pymnt_dte."' where client_id ='".$clntid."'";
										
     $insclnt2 = mysql_query($insclnt) or die(mysql_error());
     header("location:client_list.php?msg=ups&page=".$page."");
?>