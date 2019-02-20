<?php
require_once("../db_connect.php");

if(isset($_GET['rid']))
{
  $rid = $_GET['rid'];
}

$s = "select item_img from rewards_list where rid = '".$rid."'";
$s1 = mysql_query($s) or die(mysql_error());
$s2 = mysql_fetch_array($s1);

if($s2['item_img']!='') { @unlink("reward_imgs/".$s2['item_img']); }

$del = "delete from rewards_list where rid = '".$rid."'";
$del2 = mysql_query($del) or die(mysql_error());

header("location:rewards.php?msg=ds");

?>