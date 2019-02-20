<?php
require_once("../db_connect.php");
require_once("functions.php");

if(isset($_REQUEST['pckid']))
{
  $pckid = $_REQUEST['pckid'];
}


$pck = explode("-",$pckid);

$sqlstr = "select pack_pin from package_list where pack_id = '".$pck[0]."'";
$res = mysql_query($sqlstr) or die(mysql_error());
$result = mysql_fetch_array($res);

$pin_no = $result['pack_pin'].randomPrefix(8);

$val = "<input name='pin_no' type='text' class='inp-form' id='pin_no' value='".$pin_no."'/>";
echo $val;
?>

