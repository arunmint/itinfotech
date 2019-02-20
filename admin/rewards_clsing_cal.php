<?php
ob_start();
require_once("../db_connect.php");

function get_Pckge_LeftCount($parentid,$pckid,$tag)
{
	//get first left id
	$sel = "select * from client_list where upline_id = '".$parentid."' and client_tag = '".$tag."'";
	$sel1 = mysql_query($sel) or die(mysql_error());
	$num = mysql_num_rows($sel1);
	$cmonval = 0;
	$leftcount = 0;
	if($num!=0)
	{
	  $sel2 = mysql_fetch_array($sel1);
	  $leftid = $sel2['user_id'];
	  
	  if($sel2['package_id']==$pckid) { $cmonval = 1; } else { $cmonval = 0; }
	
	   $leftcount = (get_pckge_count($leftid, 0,$pckid)+$cmonval);
	 }  
	
	return $leftcount;
}

function get_pckge_count($parent, $level,$pckid) {
    $count = 0;
	$n = 0; 
	$result = mysql_query('SELECT * FROM client_list WHERE upline_id="'.$parent.'"');
    while ($row = mysql_fetch_array($result))
    {
		//echo $row['user_id']."---".$row['usr_name']."---".$row['join_dte']."<br>";
		if($row['package_id']==$pckid) 
		{ 
           // i call function in while loop until count all user_id 
	       $count += 1 +get_pckge_count($row['user_id'], $level+1,$pckid);
	    }
		else
		{
		  $count += get_pckge_count($row['user_id'], $level+1,$pckid);
		}    
    }
    return $count; // it will return all user_id count under parent_id
} 

$curnt_dte = date('Y-m-d');
$closing_dte = $_POST['closing_dte'];

$clsng_id_cunt = count($_POST['clsing_id']);
 
for($c=0; $c<$clsng_id_cunt; $c++)
{
     $clsing_id = $_POST['clsing_id'][$c];
	
	//member details  
	$mem = "select client_id,user_id,usr_name,join_dte from client_list where client_id = '".$clsing_id."'";
	$mem1 = mysql_query($mem) or die(mysql_error());
	$mem2 = mysql_fetch_array($mem1);
	
		//package details
		$pck = "select pack_id,pack_point from package_list";
		$pck1 = mysql_query($pck) or die(mysql_error());
		$totlftmem = 0;
		$totrghtmem = 0;
		$totlftpnt = 0;
		$totrghtpnt = 0;
		$get_lst_used_pairs = 0;
		$final_lst_pair_point = 0;
		
		while($pck2 = mysql_fetch_array($pck1))
		{ 
			//get left & right member count
			$lftmem = get_Pckge_LeftCount($mem2['user_id'],$pck2['pack_id'],'Left');
			
			$rgt = get_Pckge_LeftCount($mem2['user_id'],$pck2['pack_id'],'Right');
			//get left & right member point
			$lftpnt = ($lftmem * $pck2['pack_point']);
			$rgtpnt = ($rgt * $pck2['pack_point']);

			//get total point count
			$totlftpnt+=$lftpnt;
			$totrghtpnt+=$rgtpnt;
			
		}
	
	$d = "SELECT DATEDIFF( '".$curnt_dte."', '".$mem2['join_dte']."' )";
	$d1 = mysql_query($d) or die(mysql_error());	
	$d2 = mysql_fetch_array($d1);
	
    $rwrds = "insert into rewrds_clsing set clsng_dt_id = '".$closing_dte."',
						   				    user_id = '".$mem2['user_id']."',
											member_id = '".$mem2['client_id']."',
											lft_pt = '".$totlftpnt."',
											rght_pt = '".$totrghtpnt."',
											rewrds_cunt = '".$d2[0]."',
											created_dte = '".date("Y-m-d")."'";
    $rwrds2 = mysql_query($rwrds) or die(mysql_error());											 
   
    
} //for($c=0; $c<=$clsng_id_cunt; $c++)

header("location:rewards_closing.php?msg=suc");


?>
