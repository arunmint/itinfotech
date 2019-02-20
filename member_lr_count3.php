<?php 
require_once("db_connect.php");
?>
<form id="frm" name="frm" method="post" action="">
<table width="35%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30">User ID : </td>
    <td height="30">
      <input name="nid" type="text" id="nid" value="<?php echo $_POST['nid']; ?>" />    </td>
  </tr>
  <tr>
    <td height="30">frm Date : </td>
    <td height="30"><input name="frm_dte" type="text" id="frm_dte" value="<?php echo $_POST['frm_dte']; ?>"/></td>
  </tr>
  <tr>
    <td height="30">to date : </td>
    <td height="30"><input name="to_dte" type="text" id="to_dte" value="<?php echo $_POST['to_dte']; ?>"/></td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td height="30"><input type="submit" name="Submit" value="Submit" /></td>
  </tr>
</table>
</form>

<?php
function get_Pckge_LeftCount($parentid,$pckid,$tag,$frmdte,$todte)
{
	//get first left id
	$sel = "select * from client_list where upline_id = '".$parentid."' and client_tag = '".$tag."' and join_dte >= '".$frmdte."' and join_dte <= '".$todte."' ";
	$sel1 = mysql_query($sel) or die(mysql_error());
	$num = mysql_num_rows($sel1);
	$cmonval = 0;
	$leftcount = 0;
	if($num!=0)
	{
	  $sel2 = mysql_fetch_array($sel1);
	  $leftid = $sel2['user_id'];
	  
	  if($sel2['package_id']==$pckid) { $cmonval = 1; } else { $cmonval = 0; }
	
	   $leftcount = (get_pckge_count($leftid, 0,$pckid,$frmdte,$todte)+$cmonval);
	 }  
	
	return $leftcount;
}

function get_pckge_count($parent, $level,$pckid,$frmdte,$todte) {
    $count = 0;
	$n = 0; 
	$result = mysql_query('SELECT * FROM client_list WHERE upline_id="'.$parent.'" and join_dte >= "'.$frmdte.'" and join_dte <= "'.$todte.'"');
    while ($row = mysql_fetch_array($result))
    {
	    
		//echo $row['user_id']."---".$row['package_id']."<br>";
		
		if($row['package_id']==$pckid) 
		{ 
		
        //$var = str_repeat(' ',$level).$row['user_id']."\n";

        // i call function in while loop until count all user_id 
	    $count += 1 +get_pckge_count($row['user_id'], $level+1,$pckid,$frmdte,$todte);
	    }
		else
		{
		  $count += get_pckge_count($row['user_id'], $level+1,$pckid,$frmdte,$todte);
		}    
           
    }
    return $count; // it will return all user_id count under parent_id
} 

//echo get_LeftCount("748667");

if(isset($_REQUEST['Submit']))
{
    $frmdte = date("Y-m-d",strtotime($_POST['frm_dte']));
	$todte = date("Y-m-d",strtotime($_POST['to_dte']));
  
	$pck = "select * from package_list";
	$pck1 = mysql_query($pck) or die(mysql_error());
	$totlftmem = 0;
	$totrghtmem = 0;
	$totlftpnt = 0;
	$totrghtpnt = 0;
	while($pck2 = mysql_fetch_array($pck1))
	{ 
	//get left & right member count
	$lftmem = get_Pckge_LeftCount($_POST['nid'],$pck2['pack_id'],'Left',$frmdte,$todte);
	
	$rgt = get_Pckge_LeftCount($_POST['nid'],$pck2['pack_id'],'Right',$frmdte,$todte);
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
	
	echo "Left Count - ".$totlftpnt."<br>";
	echo "Right Count - ".$totrghtpnt;
}	
?>