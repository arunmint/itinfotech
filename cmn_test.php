<?php
require_once("db_connect.php");

 /*$sqlstr = "select client_id,user_id,join_dte from client_list";
 $res = mysql_query($sqlstr) or die(mysql_error());
 //$result = mysql_fetch_array($res);
 while($result = mysql_fetch_array($res))
 {
   $nxt_dte = strtotime(date("Y-m-d", strtotime($result['join_dte'])) . " +37 days");
   $nxt_pymnt_dte = date("Y-m-d",$nxt_dte);
   
   $up = "update client_list set nxt_pymnt_dte = '".$nxt_pymnt_dte."' where client_id = '".$result['client_id']."'";
   $up2 = mysql_query($up) or die(mysql_error());
 }*/

//$date = strtotime(date("Y-m-d", strtotime($date)) . " +1 day");
//$date = strtotime(date("Y-m-d", strtotime($date)) . " +1 week");
//$date = strtotime(date("Y-m-d", strtotime($date)) . " +2 week");
//$date = strtotime(date("Y-m-d", strtotime($date)) . " +1 month");
//$date = strtotime(date("Y-m-d", strtotime($date)) . " +37 days");
//echo date("Y-m-d", $date);


$sqlstr = "select client_id,user_id,join_dte,nxt_pymnt_dte from client_list";
$res = mysql_query($sqlstr) or die(mysql_error());
while($result = mysql_fetch_array($res))
{
	/*$lstpyt = "select count(*) from mntly_pymnt_lst where cilnt_id = '".$result['client_id']."'";
	$lstpyt1 = mysql_query($lstpyt) or die(mysql_error());
	$lstpyt2 = mysql_fetch_array($lstpyt1);
  
    if($lstpyt2[0]!=0) 
	{
	  echo $result['client_id']."--".$result['user_id']."<br>";
	}*/


    $curnt_dte = date("Y-m-d");
	
    //get difference
	$d = "SELECT DATEDIFF( '".$curnt_dte."', '".$result['nxt_pymnt_dte']."' )";
	$d1 = mysql_query($d) or die(mysql_error());	
	$d2 = mysql_fetch_array($d1);
	echo "<b>".$result['client_id']."--".$d2[0]."</b><br>";
	/*if($d2[0]>30)
	{
	  
	  
	  $lstpyt = "select * from mntly_pymnt_lst where cilnt_id = '".$result['client_id']."'";
	  $lstpyt1 = mysql_query($lstpyt) or die(mysql_error());
	  $lstpyt2 = mysql_num_rows($lstpyt1);
	  
	  if($lstpyt2!=0)
	  {
	     echo "<b>".$result['client_id']."--".$d2[0]."</b><br>";
	    
		/*$ins = "insert into mntly_pymnt_lst set cilnt_id = '".$result['client_id']."', 
											  user_id = '".$result['user_id']."',
											  paymnt_dte = '".$result['nxt_pymnt_dte']."',
											  pymnt_stle_dte = '".$result['nxt_pymnt_dte']."',
											  pay_amt = '1500',
											  pay_mod = 'CASH',
											  created_dte = '".date('Y-m-d')."'";
	    $ins2 = mysql_query($ins) or die(mysql_error());
	  
	    $dte2 = strtotime(date("Y-m-d", strtotime($result['nxt_pymnt_dte'])) . " +30 days");
	    $nxt_pymnt_dte2 = date("Y-m-d", $dte2)."<br>";
	  
	    $up = "update client_list set nxt_pymnt_dte = '".$nxt_pymnt_dte2."' where client_id = '".$result['client_id']."'";
	    $up2 = mysql_query($up) or die(mysql_error());*/
		
	 /* }
	  else
	  {
	     echo $result['client_id']."--".$d2[0]."<br>";
	  }
	  

	} */
	
	/*if($result['nxt_pymnt_dte'] < $curnt_dte)
    {
	  $dte = strtotime(date("Y-m-d", strtotime($result['nxt_pymnt_dte'])) . " +30 days");
	  echo $result['client_id']."--".$nxt_pymnt_dte = date("Y-m-d", $dte)."<br>";
	}*/
	
	
	//if($nxt_pymnt_dte < $curnt_dte)
	//{
	   //echo $result['client_id']."<br>";
	   //$dte2 = strtotime(date("Y-m-d", strtotime($nxt_pymnt_dte)) . " +30 days");
	   //echo $nxt_pymnt_dte2 = date("Y-m-d", $dte2)."<br>";
	   
	//}
   
}


?>