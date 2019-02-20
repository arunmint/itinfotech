<?php
function clnt_dtls_tre($clntid)
{
  if($clntid!='')
  {
    $sqlstr = "select * from client_list where client_id = '".$clntid."'";
    $res = mysql_query($sqlstr) or die(mysql_error());
    $result = mysql_fetch_array($res);
    
	$val="<a href='TreeView.php?clnt_id=".$result['upline_id']."&tag=".$result['client_tag']."' class='tooltip'><img src='tree_img/".packge_dtls($result['package_id'])."' border=0/>";
	$val.="<br>";   
    $val.=$result['user_id'];
    $val.="<br>";
	$val.="".$result['usr_name']."";
	$val.="<span>";
	
	$val.="<table width='400' border='0' cellpadding='0' cellspacing='0'>
	<tr>
	<td width='12' height='30'>&nbsp;</td>
	<td width='119' height='30'>Name : </td>
	<td width='295' height='30'>".$result['usr_name']."</td>
	</tr>
	<tr>
	<td height='30'>&nbsp;</td>
	<td height='30'><strong>Joining Date : </strong></td>
	<td height='30'>".date("d-M-Y",strtotime($result['join_dte']))."</td>
	</tr>
	<tr>
	<td height='30'>&nbsp;</td>
	<td height='30'><strong>Package :</strong></td>
	<td height='30'>".$result['package_amut']."</td>
	</tr>
	<tr>
	<td height='30'>&nbsp;</td>
	<td height='30'><strong>Member Left : </strong></td>
	<td height='30'>".get_LeftCount($result['user_id'])."</td>
	</tr>
	<tr>
	<td height='30'>&nbsp;</td>
	<td height='30'><strong>Member Right : </strong></td>
	<td height='30'>".get_RightCount($result['user_id'])."</td>
	</tr>
	<tr>
	<td height='23' valign='top'>&nbsp;</td>
	<td height='23' colspan='2' valign='top'>
	<table width='100%' border='0'>
	<tr>
	<td align='center'>Packages</td>
	<td align='center'>Left</td>
	<td align='center'>Points</td>
	<td align='center'>Right</td>
	<td align='center'>Points</td>
	</tr>";
	
	$pck = "select * from package_list";
	$pck1 = mysql_query($pck) or die(mysql_error());
	$totlftmem = 0;
	$totrghtmem = 0;
	$totlftpnt = 0;
	$totrghtpnt = 0;
	while($pck2 = mysql_fetch_array($pck1))
	{ 
		//get left & right member count
		$lftmem = get_Pckge_LeftCount($result['user_id'],$pck2['pack_id'],'Left');
		$rgt = get_Pckge_LeftCount($result['user_id'],$pck2['pack_id'],'Right');
		//get left & right member point
		$lftpnt = ($lftmem * $pck2['pack_point']);
		$rgtpnt = ($rgt * $pck2['pack_point']);
		
		//get total member ccount
		$totlftmem+=$lftmem; 
		$totrghtmem+=$rgt;
		//get total point count
		$totlftpnt+=$lftpnt;
		$totrghtpnt+=$rgtpnt;
	
	$val.="<tr>
	<td height='25' align='center'>".$pck2['pack_price']."</td>
	<td height='25' align='center'>".$lftmem."</td>
	<td height='25' align='center'>".$lftpnt."</td>
	<td height='25' align='center'>".$rgt."</td>
	<td height='25' align='center'>".$rgtpnt."</td>
	</tr>";
	} 
	
	$val.="<tr>
    <td height='25' align='center'><strong>Total</strong></td>
    <td height='25' align='center'>".$totlftmem."</td>
    <td height='25' align='center'>".$totlftpnt."</td>
    <td height='25' align='center'>".$totrghtmem."</td>
    <td height='25' align='center'>".$totrghtpnt."</td>
    </tr>";
	$val.="</table>
	</td>
	</tr>
	</table>";
	$val.="</span>";
	$val.="</a>";
  }
  else
  {
     $val = "<img src='tree_img/noimage.png' border=0/>";
  }
  
  return $val;  
}

function packge_dtls($pckid)
{
   $sqlstr = "select * from package_list where pack_id = '".$pckid."'";
   $res = mysql_query($sqlstr) or die(mysql_error());
   $result = mysql_fetch_array($res);
   
   return $result['pack_imag'];
}

//get count of children tree
/*function display_children($parent, $level, $tag) 
{
    $count = 0;
    $result = mysql_query('SELECT client_id FROM client_list '.'WHERE upline_id="'.$parent.'"');
	//$result = mysql_query("SELECT client_id FROM client_list WHERE upline_id='".$parent."' and client_tag = '".$tag."'");
    while ($row = mysql_fetch_array($result))
    {
           $var = str_repeat(' ',$level).$row['client_id']."\n";

                   //echo $var  after remove comment check tree

                   // i call function in while loop until count all user_id 

           $count += 1 +display_children($row['client_id'], $level+1,$tag);

    }
    return $count; // it will return all user_id count under parent_id
}*/

function display_children($parent, $level) {
    $count = 0;
    $result = mysql_query('SELECT * FROM client_list '.'WHERE upline_id="'.$parent.'"');
    while ($row = mysql_fetch_array($result))
    {
	    //echo $row['user_id']."<br>";
            $var = str_repeat(' ',$level).$row['user_id']."\n";

                   //echo $var  after remove comment check tree

                   // i call function in while loop until count all user_id 

           $count += 1 +display_children($row['user_id'], $level+1);

    }
    return $count; // it will return all user_id count under parent_id
} 

function get_LeftCount($parentid)
{
	//get first left id
	$sel = "select * from client_list where upline_id = '".$parentid."' and client_tag = 'Left'";
	$sel1 = mysql_query($sel) or die(mysql_error());
	$num = mysql_num_rows($sel1);
	$cmonval = 0;
	$leftcount = 0;
	if($num!=0)
	{
	  $sel2 = mysql_fetch_array($sel1);
	  $leftid = $sel2['user_id'];
	  
	   $cmonval = 1;
	
	   $leftcount = (display_children($leftid, 0)+$cmonval);
	 }  
	
	return $leftcount;
}

function get_RightCount($parentid)
{
	//get first left id
	$sel = "select * from client_list where upline_id = '".$parentid."' and client_tag = 'Right'";
	$sel1 = mysql_query($sel) or die(mysql_error());
	$num = mysql_num_rows($sel1);
	$cmonval = 0;
	$rightcount = 0;
	if($num!=0)
	{
	  $sel2 = mysql_fetch_array($sel1);
	  $rightid = $sel2['user_id'];
	  $cmonval = 1;  
	
	  $rightcount = (display_children($rightid, 0)+$cmonval);
	}
	return $rightcount;
}

function getClntName($clntid)
{
  $sqlstr = "select usr_name from client_list where user_id = '".$clntid."'";
  $res = mysql_query($sqlstr) or die(mysql_error());
  $result = mysql_fetch_array($res);
  
  return $result['usr_name'];
}


function sub_pckge_count($parent, $level, $tag) {
    $count = 0;
	//echo 'SELECT * FROM client_list '.'WHERE upline_id="'.$parent.'" and client_tag = "'.$tag.'"';
    $result = mysql_query('SELECT * FROM client_list '.'WHERE upline_id="'.$parent.'" and client_tag = "'.$tag.'"');
    while ($row = mysql_fetch_array($result))
    {
	    //echo $row['user_id']."<br>";
            $var = str_repeat(' ',$level).$row['user_id']."\n";

                   //echo $var  after remove comment check tree

                   // i call function in while loop until count all user_id 

           $count += 1 +sub_pckge_count($row['user_id'], $level+1, $tag);

    }
    return $count; // it will return all user_id count under parent_id
} 


//function for package wise 
/*function get_cunt_pckgwse($parentid,$postn,$pckid)
{
    //get first left id
	//$sel = "select * from client_list where upline_id = '".$parentid."' and client_tag = '".$postn."' and package_id = '".$pckid."'";
	//$sel1 = mysql_query($sel) or die(mysql_error());
	//$num = mysql_num_rows($sel1);
	//$cmonval = 0;
	//$leftcount = 0;
	//if($num!=0)
	//{
	  //$sel2 = mysql_fetch_array($sel1);
	  //$leftid = $sel2['user_id'];
	  //$cmonval = 1; 
	
	  $leftcount = (sub_pckge_count($parentid, 0)+$cmonval);
	//}
	
	return $leftcount;
}*/



function get_Clntdtls($clntid)
{
	$clntid = "select * from client_list where user_id = '".$clntid."'";
	$clntid1 = mysql_query($clntid) or die(mysql_error());
	$clntid2 = mysql_fetch_array($clntid1);
	
	return $clntid2;
}


/* Start Package Count details */
function get_pckge_count($parent, $level,$pckid) {
    $count = 0;
	$n = 0; 
	$result = mysql_query('SELECT * FROM client_list '.'WHERE upline_id="'.$parent.'"');
    while ($row = mysql_fetch_array($result))
    {
   	    //echo $row['user_id']."---".$row['package_id']."<br>";
		if($row['package_id']==$pckid) 
		{ 
		
        //$var = str_repeat(' ',$level).$row['user_id']."\n";

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
/* End Package Count details */

/* get Referral Count Function */
function  get_Referal_cunt($usrid)
{
	$sel = "select count(*) from client_list where ref_id = '".$usrid."'";
	$sel1 = mysql_query($sel) or die(mysql_error());
	$num = mysql_fetch_array($sel1);
	return $num[0];
}
/* End of Referral Count Function */

?>