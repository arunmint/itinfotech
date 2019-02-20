<?php
//random display of alphanumeric
function randomPrefix($length)
{
$random= "";

srand((double)microtime()*1000000);

$data = "AbcDE123IJ50MN67QRSTUVWXYZ";
$data .= "aBC8473ijklmn123opq45rs67tuv89wxyz";
$data .= "0FGH45OP89";

for($i = 0; $i < $length; $i++)
{
$random .= substr($data, (rand()%(strlen($data))), 1);
}

return $random;
}

//get member name
function get_membername($memid)
{
  $usrid_len = strlen($memid);

  if($usrid_len < 6) { $memid = "0".$memid; }

  $sqlstr = "select * from client_list where user_id = '".$memid."'";
  $res = mysql_query($sqlstr) or die(mysql_error());
  $result = mysql_fetch_array($res);
  
  return $result['usr_name'];
}

//get member name
function get_memberid($memid)
{
  $usrid_len = strlen($memid);

  if($usrid_len < 6) { $memid = "0".$memid; }

  $sqlstr = "select client_id from client_list where user_id = '".$memid."'";
  $res = mysql_query($sqlstr) or die(mysql_error());
  $result = mysql_fetch_array($res);
  
  return $result['client_id'];
}

?>