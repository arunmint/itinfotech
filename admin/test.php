<?php
require_once("../db_connect.php");
require_once("../functions.php");

$curnt_dte = date("Y-m-d");
$sqlstr = "select client_id,user_id,usr_name,package_amut,join_dte,nxt_pymnt_dte from client_list";
$res = mysql_query($sqlstr) or die(mysql_error());
$i = 0;
while($result = mysql_fetch_array($res))
{
	$d = "SELECT DATEDIFF( '".$curnt_dte."', '".$result['join_dte']."' )";
	$d1 = mysql_query($d) or die(mysql_error());	
	$d2 = mysql_fetch_array($d1);
	
	if($d2[0]<=31) 
	{
	   $chck_rwd = "select client_id,user_id,usr_name,package_amut,join_dte,nxt_pymnt_dte from client_list where user_id = '".$result['user_id']."'";
	   $chck_rwd1 = mysql_query($chck_rwd) or die(mysql_error());
	   $num = mysql_num_rows($chck_rwd1);
       $chck_rwd2 = mysql_fetch_array($chck_rwd1);
	   
	   $i++;
	
	   //echo $result['user_id']."<br>";   
	  
	    //package details
		$pck = "select pack_id,pack_point from package_list";
		$pck1 = mysql_query($pck) or die(mysql_error());
		$totlftpnt = 0;
		$totrghtpnt = 0;
		$get_lst_used_pairs = 0;
		$final_lst_pair_point = 0;
		
		while($pck2 = mysql_fetch_array($pck1))
		{ 
			//get left & right member count
			$lftmem = get_Pckge_LeftCount($result['user_id'],$pck2['pack_id'],'Left');
			$rgt = get_Pckge_LeftCount($result['user_id'],$pck2['pack_id'],'Right');
			//get left & right member point
			$lftpnt = ($lftmem * $pck2['pack_point']);
			$rgtpnt = ($rgt * $pck2['pack_point']);

			//get total point count
			$totlftpnt+=$lftpnt;
			$totrghtpnt+=$rgtpnt;
			
		}
		if($totlftpnt == '2500' && $totrghtpnt == '2500')
		{
		  echo $result['user_id']."-".$totlftpnt."-".$totrghtpnt."<br>"; 
		} 
		if($totlftpnt == '5000' && $totrghtpnt == '5000')
		{
		  echo $result['user_id']."-".$totlftpnt."-".$totrghtpnt."<br>"; 
		} 
		 
	}
	
}



?>