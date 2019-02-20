<?php
require_once("db_connect.php");

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
	//echo 'SELECT * FROM client_list WHERE upline_id="'.$parent.'" and join_dte >= "2012-06-20"';
	$result = mysql_query('SELECT * FROM client_list WHERE upline_id="'.$parent.'"');
    while ($row = mysql_fetch_array($result))
    {
		//echo $row['user_id']."---".$row['usr_name']."---".$row['join_dte']."<br>";
		if($row['package_id']==$pckid && $row['join_dte'] <= '2012-06-20') 
		{ 
		   //$var = str_repeat(' ',$level).$row['user_id']."\n";
		   //echo $row['user_id']."---".$row['join_dte']."<br>";
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

//echo get_LeftCount("748667");
?>
<table width="755" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="52" height="23" align="center">User ID </td>
    <td width="90" align="center">User Name </td>
    <td width="78" align="center">Left Point </td>
    <td width="118" align="center">Right Point </td>
    <td width="104" align="center"> Pair</td>
  </tr>
<?php
//member details  
$mem = "select client_id,user_id,usr_name from client_list where client_id = '118'";
$mem1 = mysql_query($mem) or die(mysql_error());
while($mem2 = mysql_fetch_array($mem1))
{
	//package details
	$pck = "select pack_id,pack_point from package_list";
	$pck1 = mysql_query($pck) or die(mysql_error());
	$totlftmem = 0;
	$totrghtmem = 0;
	$totlftpnt = 0;
	$totrghtpnt = 0;
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


	   
	  
?>
  <tr>
    <td height="23" align="center"><?php echo $mem2['user_id']; ?></td>
    <td align="center"><?php echo $mem2['usr_name']; ?></td>
    <td align="center"><?php echo $totlftpnt; ?></td>
    <td align="center"><?php echo $totrghtpnt; ?></td>
    <td align="center"><?php //echo $cmn_pair; ?></td>
  </tr>
  <?php
  //datas insert into last_pp_detls table
  
  /*$ins = "insert into last_pp_detls set clsng_dt_id = '2', 
                                     	membr_id = '".$mem2['client_id']."',
										lft_pt = '".$totlftpnt."',
										rght_pt = '".$totrghtpnt."',
										cmn_pair = '".$cmn_pair."',
										created_dt = '2012-07-10'";
  $ins2 = mysql_query($ins) or die(mysql_error());	*/

  
}   ?>
</table>
