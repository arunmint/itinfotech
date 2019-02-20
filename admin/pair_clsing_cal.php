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


$closing_dte = $_POST['closing_dte'];

$clsng_id_cunt = count($_POST['clsing_id']);
 
for($c=0; $c<$clsng_id_cunt; $c++)
{
     $clsing_id = $_POST['clsing_id'][$c];
	
	//member details  
	$mem = "select client_id,user_id,usr_name from client_list where client_id = '".$clsing_id."'";
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
			//get total member ccount
			$totlftmem+=$lftmem; 
			$totrghtmem+=$rgt;
			//get total point count
			$totlftpnt+=$lftpnt;
			$totrghtpnt+=$rgtpnt;
			
		}
	
		  //get last used pair
		  $get_lst_pair = "select lft_pt,rght_pt,cmn_pair,lst_used_par from last_pp_detls where membr_id = '".$clsing_id."'";
		  $get_lst_pair1 = mysql_query($get_lst_pair) or die(mysql_error());
		  $get_lst_pair2 = mysql_fetch_array($get_lst_pair1);
		  $get_lst_used_pairs = $get_lst_pair2['lst_used_par'];
		  
		  
		   //echo $get_lst_used_pairs;
		  
		  //get current pair
		  $curnt_lft_pnt = $totlftpnt - $get_lst_used_pairs;
		  $curnt_rght_pnt = $totrghtpnt - $get_lst_used_pairs;
		  
		  $cmn_pair = $curnt_lft_pnt;
		  if($curnt_lft_pnt > $curnt_rght_pnt) { $cmn_pair = $curnt_rght_pnt; }
	   
	      //get pair point
		  $pair_pnt = ($cmn_pair/100);
		  $pair_amt = (($cmn_pair/100)*200);
		  
		  $final_lst_pair_point = ($get_lst_used_pairs + $cmn_pair);  
		  
          //delete old member_ids
	      $del = mysql_query("delete from last_pp_detls where membr_id = '".$mem2['client_id']."'") or die(mysql_error());     
  
	      //datas insert into last_pp_detls table
	      $ins = "insert into last_pp_detls set clsng_dt_id = '".$closing_dte."', 
											membr_id = '".$mem2['client_id']."',
											user_id = '".$mem2['user_id']."',
											lft_pt = '".$totlftpnt."',
											rght_pt = '".$totrghtpnt."',
											cmn_pair = '".$cmn_pair."',
											lst_used_par = '".$final_lst_pair_point."',
											par_pnt = '".$pair_pnt."',
											par_amt  = '".$pair_amt."',
											created_dt = '".date("Y-m-d")."'";
	  $ins2 = mysql_query($ins) or die(mysql_error());	

    
} //for($c=0; $c<=$clsng_id_cunt; $c++)

header("location:pair_closing.php?msg=suc");


?>
