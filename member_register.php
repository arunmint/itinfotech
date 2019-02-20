<?php
require_once("db_connect.php");

$join_dte = date('Y-m-d');

$nxt_dte = strtotime(date("Y-m-d", strtotime($join_dte)) . " +37 days");
$nxt_pymnt_dte = date("Y-m-d", $nxt_dte);

$usrid = substr(number_format(time() * rand(),0,'',''),0,7); 

//check user id already exists..
$usr = "select count(*) from client_list where user_id = '".$usrid."'";
$usr1 = mysql_query($usr) or die(mysql_error());
$usr2 = mysql_fetch_array($usr1);

//check pin already exists..
$pin = "select count(*) from client_list where pin_no = '".$_POST['pin_no']."'";
$pin1 = mysql_query($pin) or die(mysql_error());
$pin2 = mysql_fetch_array($pin1);

if($pin2[0]==0)
{
	if($usr2[0]==0)
	{
		$ins = "insert into client_list set pin_no = '".$_POST['pin_no']."',
											upline_id = '".$_POST['uplne_id']."',
											ref_id = '".$_POST['refr_id']."',
											client_tag = '".$_POST['usr_tag']."',
											user_id = '".$usrid."',
											join_dte = '".$join_dte."',
											nxt_pymnt_dte = '".$nxt_pymnt_dte."',
											created_dte = '".date('Y-m-d')."'";
		$ins2 = mysql_query($ins) or die(mysql_error());	
		
		//deleted register pin
		$del_pin = "delete from my_pin_list where pins = '".$_POST['pin_no']."'";
		$del_pin2 = mysql_query($del_pin) or die(mysql_error());
										
		header("location:secnd_register.php?pin=".$_POST['pin_no']."&msg=suc");
	}
	else
	{
		header("location:registration.php?msg=usrerr");
	}	
}
else
{
        header("location:registration.php?msg=pinerr");
}	
?>