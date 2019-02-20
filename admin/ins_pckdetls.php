<?php
require_once("../db_connect.php");

$packins = "insert into package_list set pack_nme = '".$_POST['pack_nme']."',
										 pack_price = '".$_POST['pack_price']."',
										 pack_pin = '".$_POST['pack_pin']."',
										 pack_descriptn = '".$_POST['pack_descrptn']."',
										 created_dte = '".date("Y-m-d")."'";
						
$packins2 = mysql_query($packins) or die(mysql_error());						
header("location:package.php?msg=suc");
?>