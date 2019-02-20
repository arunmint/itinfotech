<?php 
require_once("db_connect.php");
require_once("session_chk.php");
require_once("functions.php");

 //get Client Details
 $sqlstr = "select * from client_list where client_id = '".$_SESSION['userid']."'";
 $res = mysql_query($sqlstr) or die(mysql_error());
 $result = mysql_fetch_array($res);
 
 //get package details
 $p = "select * from package_list where pack_id = '".$result['package_id']."'";
 $p1 = mysql_query($p) or die(msql_error());
 $p2 = mysql_fetch_array($p1);
 
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Welcome to ITInfotech (P) Ltd.</title>
<!-- Printing Options -->
<script type="text/javascript">
function go()
{
	var a = window.open('','','width=700,height=300');
	a.document.open("text/html");
	a.document.write(document.getElementById('foo').innerHTML);
	a.document.close();
	a.print();
}
</script>
</head>
<body>
                    <div id="foo">
					<style type="text/css">
body { font-family:arial; font-size:12px; font-weight:normal; }

.title
{
 color:#025E6A;
 font-family:arial;
 font-size:16px;
}

.subtlte
{
 color:#003366;
 font-size:13px;
 font-weight:bold;
}
.tlte3
{
 color:#000;
 font-size:11px;
 font-weight:bold;
}
.ans { color:#000; font-size:12px; font-weight:normal; }
.ftr
{
 font-size:11px; font-weight:normal;
}

.btm_bdr
{
  border-bottom:1px solid #E5E5E5;
}
.rght_bdr
{
  border-right:1px solid #E5E5E5;
}
</style>
<!-- Print Tables -->
	<table width="677" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
	<td align="left"><img src="images/logo_weltr.png" width="520" height="65" border="0"></td>
	</tr>
	</table>
	<table width="677" border="0" align="center" cellpadding="0" cellspacing="0" style="border:1px solid #E5E5E5;">
	<tr>
	<th height="7" colspan="6" align="left">&nbsp;</th>
	</tr>
	<tr>
	<th width="31" height="7" align="left">&nbsp;</th>
	<th height="7" colspan="5" align="left" class="title">MEMBERSHIP CONFIRMATION CERTIFICATE</th>
	</tr>
	<tr>
	  <th height="7" colspan="6" align="left" style="border-bottom:1px solid #E5E5E5;">&nbsp;</th>
	  </tr>
	<tr>
	<th height="7" colspan="6" align="left">&nbsp;</th>
	</tr>
	<tr>
	<th height="25" colspan="2" align="left" class="btm_bdr">&nbsp;</th>
	<th height="25" align="left" valign="top" class="btm_bdr">ID No. : </th>
	<th height="25" align="left" valign="top" class="btm_bdr"><?php echo $result['user_id']; ?></th>
	<th height="25" align="left" valign="top" class="btm_bdr">&nbsp;</th>
	<th height="25" align="left" valign="top" class="btm_bdr">&nbsp;</th>
	</tr>
	<tr>
	<th height="34" align="left" valign="middle" class="btm_bdr">&nbsp;</th>
	<th width="39" height="34" align="left" valign="middle" class="btm_bdr">&nbsp;</th>
	<th height="34" colspan="2" align="left" valign="middle" class="subtlte btm_bdr">Personal Details </th>
	<th height="34" colspan="2" align="left" valign="middle" class="subtlte btm_bdr">Sponsor Details </th>
	</tr>
	<tr>
	<th height="30" colspan="2" align="left" class="btm_bdr">&nbsp;</th>
	<th height="30" align="left" valign="middle" class="tlte3 btm_bdr rght_bdr">Name : </th>
	<th height="30" align="left" valign="middle" class="ans btm_bdr rght_bdr">&nbsp;<?php echo $result['usr_name']; ?></th>
	<th height="30" align="left" valign="middle" class="tlte3 btm_bdr rght_bdr">&nbsp;Upline ID : </th>
	<th height="30" align="left" valign="middle" class="ans btm_bdr">&nbsp;<?php echo $result['upline_id']; ?></th>
	</tr>
	<tr>
	<th height="30" colspan="2" align="left" class="btm_bdr">&nbsp;</th>
	<th width="146" height="30" align="left" valign="middle" class="tlte3 btm_bdr rght_bdr">Date of Joining : </th>
	<th width="175" height="30" align="left" valign="middle" class="ans btm_bdr rght_bdr">&nbsp;<?php echo date("d-M-Y",strtotime($result['join_dte'])); ?></th>
	<th width="151" height="30" align="left" valign="middle" class="tlte3 btm_bdr rght_bdr">&nbsp;Upline Name : </th>
	<th width="133" height="30" align="left" valign="middle" class="ans btm_bdr">&nbsp;<?php echo getClntName($result['upline_id']); ?></th>
	</tr>
	<tr>
	<th height="30" colspan="2" align="left" valign="top" class="btm_bdr">&nbsp;</th>
	<th height="30" align="left" valign="middle" class="tlte3 btm_bdr rght_bdr">Address : </th>
	<th height="30" align="left" valign="middle" class="ans btm_bdr rght_bdr">&nbsp;<?php echo $result['address']; ?><br></th>
	<th height="30" align="left" valign="middle" class="tlte3 btm_bdr rght_bdr">&nbsp;Referral ID : </th>
	<th height="30" align="left" valign="middle" class="ans btm_bdr">&nbsp;<?php echo $result['ref_id']; ?></th>
	</tr>
	<tr>
	<th height="30" colspan="2" align="left" valign="top" class="btm_bdr">&nbsp;</th>
	<th height="30" align="left" valign="middle" class="tlte3 btm_bdr rght_bdr">City : </th>
	<th height="30" align="left" valign="middle" class="ans btm_bdr rght_bdr">&nbsp;<?php echo $result['city']; ?></th>
	<th height="30" align="left" valign="middle" class="tlte3 btm_bdr rght_bdr">&nbsp;Referrence Name :</th>
	<th height="30" align="left" valign="middle" class="ans btm_bdr rght_bdr">&nbsp;<?php echo getClntName($result['ref_id']); ?></th>
	</tr>
	<tr>
	<th height="30" colspan="2" align="left" valign="top" class="btm_bdr">&nbsp;</th>
	<th height="30" align="left" valign="middle" class="tlte3 btm_bdr rght_bdr" >State : </th>
	<th height="30" align="left" valign="middle" class="ans btm_bdr rght_bdr">&nbsp;<?php echo $result['state']; ?></th>
	<th height="30" align="left" valign="middle" class="btm_bdr">&nbsp;</th>
	<th height="30" align="left" valign="middle" class="ans btm_bdr">&nbsp;</th>
	</tr>
	<tr>
	<th height="30" colspan="2" align="left" valign="top" class="btm_bdr">&nbsp;</th>
	<th height="30" align="left" valign="middle" class="tlte3 btm_bdr rght_bdr">Country : </th>
	<th height="30" align="left" valign="middle" class="ans btm_bdr rght_bdr">&nbsp;<?php echo $result['country']; ?></th>
	<th height="30" align="left" valign="middle" class="subtlte btm_bdr">&nbsp;Package Details </th>
	<th height="30" align="left" valign="middle" class="ans btm_bdr">&nbsp;</th>
	</tr>
	<tr>
	<th height="30" colspan="2" align="left" valign="top" class="btm_bdr">&nbsp;</th>
	<th height="30" align="left" valign="middle" class="tlte3 btm_bdr rght_bdr">Mobile No. : </th>
	<th height="30" align="left" valign="middle" class="ans btm_bdr">&nbsp;<?php echo $result['mobile']; ?></th>
	<th height="30" align="left" valign="middle" class="btm_bdr">&nbsp;</th>
	<th height="30" align="left" valign="middle" class="ans btm_bdr">&nbsp;</th>
	</tr>
	<tr>
	<th height="30" colspan="2" align="left" valign="top" class="btm_bdr">&nbsp;</th>
	<th height="30" align="left" valign="middle" class="tlte3 btm_bdr rght_bdr">Email ID : </th>
	<th height="30" align="left" valign="middle" class="ans btm_bdr rght_bdr">&nbsp;<?php echo $result['email_id']; ?></th>
	<th height="30" align="left" valign="middle" class="tlte3 btm_bdr rght_bdr">&nbsp;Package Name : </th>
	<th height="30" align="left" valign="middle" class="ans btm_bdr">&nbsp;<?php echo $p2['pack_nme']; ?></th>
	</tr>
	<tr>
	<th height="30" colspan="2" align="left" valign="top" class="btm_bdr">&nbsp;</th>
	<th height="30" align="left" valign="middle" class="tlte3 btm_bdr">Pan Number : </th>
	<th height="30" align="left" valign="middle" class="ans btm_bdr"><?php echo $result['pan_no']; ?></th>
	<th height="30" align="left" valign="middle" class="tlte3 btm_bdr">Package Amount : </th>
	<th height="30" align="left" valign="middle" class="ans btm_bdr"><?php echo $p2['pack_price']; ?></th>
	</tr>
	
	<tr>
	<th height="30" align="left" valign="middle" class="btm_bdr">&nbsp;</th>
	<th height="30" colspan="5" align="left" valign="middle" class="ftr btm_bdr">Computer generated document,no requirement of signature and seal.</th>
	</tr>
	<tr>
	  <th height="30" align="left" valign="middle">&nbsp;</th>
	  <th height="30" colspan="5" align="left" valign="middle" class="ftr">This Valid Upto 12 Months Only</th>
	  </tr>
	</table>
	
	</div>
	<table width="677" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
	<td width="42" height="41">&nbsp;</td>
	<td width="635"><input name="prnt" id="prnt" type="submit" class="button" value="Print" onClick="return go()"/></td>
	</tr>
	</table>
</body>
</html>