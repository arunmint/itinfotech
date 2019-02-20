<?php
require_once("db_connect.php");

if(isset($_GET['usrid']))
{
  $usrid = $_GET['usrid'];
}

     $insclnt = "update client_list set usr_name = '".$_POST['clent_nme']."', 
										usr_father = '".$_POST['fname']."',
										usr_nominee = '".$_POST['nominee']."', 
										nominee_relation = '".$_POST['rela_nomine']."', 
										nominee_age = '".$_POST['nomie_age']."',
										nominee_mble = '".$_POST['nomie_mble']."',
										address = '".$_POST['address']."',
										email_id = '".$_POST['email_id']."',
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
										bnk_IFSC = '".$_POST['ifsc_code']."' where client_id ='".$usrid."'";
										
     $insclnt2 = mysql_query($insclnt) or die(mysql_error());
     header("location:edit_profile.php?msg=ups");
?>