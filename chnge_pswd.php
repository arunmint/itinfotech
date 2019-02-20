<?php
require_once("db_connect.php");

if(isset($_GET['usrid']))
{
   $usrid = $_GET['usrid'];
}

$up = "update client_list set usr_pswd = '".$_POST['new_pswd']."' where client_id = '".$usrid."'";
$up1 = mysql_query($up) or die(mysql_error());

header("location:change_password.php?msg=suc");
?>