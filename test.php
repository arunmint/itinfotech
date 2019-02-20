<?php
require_once("db_connect.php");

/*$sqlstr = "select client_id,user_id from client_list";
$res = mysql_query($sqlstr) or die(mysql_error());
while($result = mysql_fetch_array($res))
{
  
  $sqlstr1 = "select count(*) from client_list where user_id = '".$result['user_id']."'";
  $res1 = mysql_query($sqlstr1) or die(mysql_error());
  $result1 = mysql_fetch_array($res1);
  
  if($result1[0]!=1)
  {
     
	 echo $result['client_id']."-".$result['user_id']."<br>";
	 
  }
  
}*/
//substr(number_format(time() * rand(),0,'',''),0,7);

echo date('is');

?>
