<?php 
require_once("db_connect.php");
require_once("session_chk.php");
require_once("functions.php");
$mm = "";
$yy = "";
if(isset($_GET['mm'])) { $mm = $_GET['mm']; }
if(isset($_GET['yy'])) { $yy = $_GET['yy']; }

//get Client Details
 $sqlstr = "select client_id,user_id,usr_name,package_id from client_list where client_id = '".$_SESSION['userid']."'";
 $res = mysql_query($sqlstr) or die(mysql_error());
 $result = mysql_fetch_array($res);
 
 //get package name
 $pckgenme = "select pack_nme from package_list where pack_id = '".$result['package_id']."'";
 $pckgenme1 = mysql_query($pckgenme) or die(mysql_error());
 $pckgenme2 = mysql_fetch_array($pckgenme1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: GREAT IT INFOTECH INDIA (P) LTD ::</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function Check_form()
{
	if(document.getElementById("old_pswd").value=='')
	{
		alert("Enter Your Old Password");
		document.getElementById("old_pswd").focus();
		return false;
	}
	if(document.getElementById("new_pswd").value=='')
	{
		alert("Enter New Password");
		document.getElementById("new_pswd").focus();
		return false;
	}
	if(document.getElementById("cnfrm_pswd").value=='')
	{
		alert("Enter Confirm Password");
		document.getElementById("cnfrm_pswd").focus();
		return false;
	}
	if(document.getElementById("new_pswd").value!=document.getElementById("cnfrm_pswd").value)
	{
		alert("New & Confirm Password Mismatch");
		document.getElementById("cnfrm_pswd").focus();
		return false;
	}
	if(document.getElementById("alrdy_pswd").value!=document.getElementById("old_pswd").value)
	{
		alert("Old Password Incorrect");
		document.getElementById("old_pswd").focus();
		return false;
	}
	
}
</script>
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
.style2 {color: #FFFFFF}
-->
</style>
</head>

<body>
	<!--header start -->
<?php require_once("inner_header.php"); ?>
    	<!--header end -->
    <!--Special In 2007 start -->
    	
    <!--Special In 2007 end -->
    <!--not body part start -->
    	<div id="botBody">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              
              <tr>
                <td width="10%">&nbsp;</td>
                <td colspan="2"><table width="100%" height="30" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="154" align="right">&nbsp;</td>
                    <td width="654" align="center" style="color:#FF0000; font-size:12px;">
					<?php if(isset($_GET['msg']) && $_GET['msg']=='ups') { echo "Updated Successfully.."; } ?>
					</td>
                  </tr>
                </table></td>
              </tr>
              
              
              <tr>
                <td colspan="2" align="center" valign="top">
				<?php require_once("leftmenu.php"); ?>
				</td>
                <td width="81%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center">
					<!--  Client Details Table -->
                    <form name="frm" id="frm" method="get" action="#">					
                    <table width="68%" border="0" style="border:1px solid #000033;">
                          <tr>
                            <td height="34" colspan="6" valign="middle" style="padding-left:10px; color:#003366; font-size:14px; font-weight:bold;"><strong>My Payment </strong></td>
                          </tr>
                          
                          <tr>
                            <td width="4%" valign="middle">&nbsp;</td>
                            <td width="21%" height="34" valign="middle" style="color:#003366;">Select Month : </td>
                            <td width="17%" height="34" valign="middle"><select name="mm" class="styledselect-month" id="mm">
                              <option value="">mm</option>
                              <option value="01" <?php if($mm=='01') { echo "selected"; } ?>>Jan</option>
                              <option value="02" <?php if($mm=='02') { echo "selected"; } ?>>Feb</option>
                              <option value="03" <?php if($mm=='03') { echo "selected"; } ?>>Mar</option>
                              <option value="04" <?php if($mm=='04') { echo "selected"; } ?>>Apr</option>
                              <option value="05" <?php if($mm=='05') { echo "selected"; } ?>>May</option>
                              <option value="06" <?php if($mm=='06') { echo "selected"; } ?>>Jun</option>
                              <option value="07" <?php if($mm=='07') { echo "selected"; } ?>>Jul</option>
                              <option value="08" <?php if($mm=='08') { echo "selected"; } ?>>Aug</option>
                              <option value="09" <?php if($mm=='09') { echo "selected"; } ?>>Sep</option>
                              <option value="10" <?php if($mm=='10') { echo "selected"; } ?>>Oct</option>
                              <option value="11" <?php if($mm=='11') { echo "selected"; } ?>>Nov</option>
                              <option value="12" <?php if($mm=='12') { echo "selected"; } ?>>Dec</option>
                            </select></td>
                            <td width="20%" valign="middle"><span style="color:#003366;">Select Year : </span></td>
                            <td width="16%" valign="middle">
							<select name="yy"  class="styledselect-year"  id="yy">
							<option value="">yyyy</option>
							<?php for($y=2012; $y<2020; $y++) { ?>
							<option value="<?php echo $y; ?>" <?php if($yy==$y) { echo "selected"; } ?>><?php echo $y; ?></option>
							<?php } ?>
							</select>							</td>
                            <td width="22%" valign="middle">
							<input type="submit" name="submit" id="submit" value="GO"/>							</td>
                          </tr>
                      </table>
					<br />
					<?php
					if(isset($_GET['mm']) && isset($_GET['yy']))
					{ 
					  $py_dte1 = ($_GET['yy']."-".$_GET['mm']."-01");
					  $py_dte2 = ($_GET['yy']."-".$_GET['mm']."-31");
					  $get_pydtls = "select * from mntly_pymnt_lst where paymnt_dte <= '".$py_dte2."' and paymnt_dte >= '".$py_dte1."' and cilnt_id = '".$_SESSION['userid']."'";
					  $get_pydtls1 = mysql_query($get_pydtls) or die(mysql_error());
					  $num = mysql_num_rows($get_pydtls1);
					  $get_pydtls2 = mysql_fetch_array($get_pydtls1);
					  
					  if($num!=0) 
					  {	?>
					 
                      <table width="59%" border="0" cellspacing="0" cellpadding="1" style="border:1px solid #330000;">
                      <tr>
                        <td width="30%" height="31" align="center" bgcolor="#330000" class="style1"><span class="style1">User ID </span></td>
                        <td width="37%" align="center" bgcolor="#330000" class="style1">User Name </td>
                        <td width="33%" align="center" bgcolor="#330000" class="style1">Package</td>
                      </tr>
                      <tr>
                        <td height="26" align="center" style="border-right:1px solid #330000;"><?php echo $result['user_id']; ?></td>
                        <td align="center" style="border-right:1px solid #330000;"><?php echo $result['usr_name']; ?></td>
                        <td align="center"><?php echo $pckgenme2['pack_nme']; ?></td>
                      </tr>
                    </table>
                    <br />
                    <table width="62%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #330000;">
                      <tr>
                        <td height="31" colspan="4" bgcolor="#330000" style="padding-left:10px;"><span class="style2">Payment Details </span></td>
                      </tr>
                      
                      <tr>
                        <td width="6%" height="30" style="border-bottom:1px solid #330000;">&nbsp;</td>
                        <td width="38%" height="30" style="border-right:1px solid #330000; border-bottom:1px solid #330000;">Date : </td>
                        <td height="30" colspan="2" style="border-bottom:1px solid #330000; padding-left:5px;">
						<?php echo date("d M Y",strtotime($get_pydtls2['paymnt_dte'])); ?></td>
                      </tr>
                      <tr>
                        <td height="30">&nbsp;</td>
                        <td height="30" style="border-right:1px solid #330000;">Payment</td>
                        <td width="28%" height="30" style="padding-left:3px; border-right:1px solid #330000; border-bottom:1px solid #330000;">Month Amount : </td>
                        <td width="28%" height="30" style="border-bottom:1px solid #330000;">
						<?php echo $get_pydtls2['pay_amt']; ?>						</td>
                      </tr>
                      <tr>
                        <td height="30">&nbsp;</td>
                        <td height="30" style="border-right:1px solid #330000;">&nbsp;</td>
                        <td height="30" style="padding-left:3px; border-bottom:1px solid #330000; border-right:1px solid #330000;">Other Charges : </td>
                        <td height="30" style="border-bottom:1px solid #330000; padding-left:3px;">
						<?php echo $get_pydtls2['othr_amt']; ?></td>
                      </tr>
                      <tr>
                        <td height="30">&nbsp;</td>
                        <td height="30" style="border-right:1px solid #330000;">&nbsp;</td>
                        <td height="30" style="padding-left:3px; border-right:1px solid #330000;">Net Amount  : </td>
                        <td height="30"><span style="padding-left:5px;">
						<?php echo ($get_pydtls2['pay_amt']-$get_pydtls2['othr_amt']); ?></span></td>
                      </tr>
                      <tr><td height="12" style="border-top:1px solid #330000;"></td>
                        <td height="12" style="border-top:1px solid #330000;"></td>
                        <td height="12" style="border-top:1px solid #330000;"></td>
                        <td height="12" style="border-top:1px solid #330000;"></td>
                      </tr>
                      <tr>
                        <td height="30">&nbsp;</td>
                        <td height="30">Payment Release  Date : </td>
                        <td height="30"><span style="padding-left:5px;">
						<?php echo date("d M Y",strtotime($get_pydtls2['pymnt_stle_dte'])); ?></span></td>
                        <td height="30">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="30">&nbsp;</td>
                        <td height="30">Payment Mode : </td>
                        <td height="30"><span style="padding-left:5px;"><?php echo $get_pydtls2['pay_mod']; ?></span></td>
                        <td height="30">&nbsp;</td>
                      </tr>
                      <tr>
                        <td></td>
                        <td colspan="3">
						<?php if($get_pydtls2['pay_mod']=='BANK') { ?>
						<table width="100%" height="59" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="41%" height="25">Bank Name : </td>
                            <td width="59%" height="25"><?php echo $get_pydtls2['bnk_nme']; ?></td>
                          </tr>
                          <tr>
                            <td height="25">Challen No.:</td>
                            <td height="25"><?php echo $get_pydtls2['chalen_no']; ?></td>
                          </tr>
                        </table>
						<?php } ?>
						</td>
                      </tr>
                    </table>
				    <?php } else { ?>
                    <br />
                    <br />
                    <table width="43%" border="0" cellspacing="1" cellpadding="1" style="border:1px solid #330000;">
					<tr>
					<td height="43" align="center" class="menu"> No Payments in this date... </td>
					</tr>
					</table>
				 <?php } } ?>
                    <br />
                    <br />
                    </form>
                   </td>
                  </tr>
                </table></td>
              </tr>
              
              <tr>
                <td colspan="2">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table>
            <br class="spacer" />
</div>
    <!--bot bgody part end -->
    <!-- hightlight part start -->
<div id="highlight"></div>
		
		<br class="spacer" />
    <!--hightlight part end -->
    <!--100% div -->
<?php require_once("footer.php"); ?>
    <!--100% footer end -->
</body>
</html>
