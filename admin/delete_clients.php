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

$del = "delete from client_list where client_id = '".$clntid."'";
$del2 = mysql_query($del) or die(mysql_error());

header("location:client_list.php?msg=ds&page=".$page."");

?>