<?php
require_once("../db_connect.php");

$date = date("Y-m-d");

$time=time();
if($_FILES['itm_img']['name']!='')
{
$rewardimg=$time."_".$_FILES['itm_img']['name'];
$destinationpath=trim("reward_imgs/");
$targetpath=$destinationpath.basename($time."_".$_FILES['itm_img']['name']);
move_uploaded_file($_FILES['itm_img']['tmp_name'],$targetpath);
}

$insrewads = "insert into rewards_list set item_name = '".$_POST['itm_nme']."',
										   item_img = '".$rewardimg."',
										   pari_business = '".$_POST['pair_busins']."',
										   created_dte = '".date("Y-m-d")."'";
$insrewards2 = mysql_query($insrewads) or die(mysql_error());										   
header("location:rewards.php?msg=suc");

?>