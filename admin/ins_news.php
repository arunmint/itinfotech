<?php
require_once("../db_connect.php");

$ins = "insert into news_list set news_title = '".$_POST['news_title']."',
								  news_details = '".$_POST['news_content']."',
								  created_dte = '".date("Y-m-d")."'";
$ins_row = mysql_query($ins) or die(mysql_error());								  

header("location:news.php?msg=suc");

?>