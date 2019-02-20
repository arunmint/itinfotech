<?php
require_once("../db_connect.php");

if(isset($_GET['nid']))
{
  $nid = $_GET['nid'];
}

$del = "delete from news_list where news_id = '".$nid."'";
$del2 = mysql_query($del) or die(mysql_error());

header("location:news.php?msg=ds");

?>