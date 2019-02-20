<?php
if(!isset($_SESSION['adminid']) || $_SESSION['adminid']=='')
{
header("location:index.php");
}
?>