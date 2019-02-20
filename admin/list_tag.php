<?php
require_once("../db_connect.php");
require_once("functions.php");

if(isset($_REQUEST['uplneid']))
{
  $uplneid = $_REQUEST['uplneid'];
}

//$val = "<input name='tag' type='text' class='inp-form' id='tag' value='".$pin_no."'/>";

if($uplneid=='') { $val = "<input name='tag' type='text' class='inp-form' id='tag'/>"; }
else
{
    //check upline id is in or not
	$sql = "select client_id from client_list where user_id = '".$uplneid."'";
	$r = mysql_query($sql) or die(mysql_error());
	$rw = mysql_num_rows($r);
    if($rw==1)
	{
		$sqlstr = "select client_id,client_tag from client_list where upline_id = '".$uplneid."'";
		$res = mysql_query($sqlstr) or die(mysql_error());
		$numresult = mysql_num_rows($res);
		$result = mysql_fetch_array($res);
		
		if($numresult==0)
		{
			$val="<select name='tag' id='tag' class='styledselect_form_1'>";
			$val.="<option value=''>-Select-</option>";
			$val.="<option value='Left'>Left</option>";
			$val.="<option value='Right'>Right</option>";
			$val.="</select>";
		}
		if($numresult==1 && $result['client_tag']=='Left')
		{
			$val="<select name='tag' id='tag' class='styledselect_form_1'>";
			$val.="<option value=''>-Select-</option>";
			$val.="<option value='Right'>Right</option>";
			$val.="</select>";
		}
		if($numresult==1 && $result['client_tag']=='Right')
		{
			$val="<select name='tag' id='tag' class='styledselect_form_1'>";
			$val.="<option value=''>-Select-</option>";
			$val.="<option value='Left'>Left</option>";
			$val.="</select>";
		}
		if($numresult==2) { $val = "<span style='color:#FF0000;'>Already Set Pair for this Upline ID.</span>"; }
	}
	else
	{
	   $val = "<span style='color:#FF0000;'>Invalid Upline ID.</span>";
	}	

}
echo $val;
?>

