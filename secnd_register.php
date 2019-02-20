<?php 
ob_start();
require_once("db_connect.php"); 

if(isset($_GET['pin']))
{
  $pin = $_GET['pin'];
}

//get user details
$sqlstr = "select client_id,pin_no,upline_id,ref_id,client_tag,user_id from client_list where pin_no = '".$pin."'";
$res = mysql_query($sqlstr) or die(mysql_error());
$num = mysql_num_rows($res);
$result = mysql_fetch_array($res);

if($num==0)
{
  header("location:index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: GREAT IT INFOTECH INDIA (P) LTD ::</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function chck_enqy()
{
  //alert('');
  if(document.getElementById("memname").value=='')
  {
     alert('Enter Your Name');
	 document.getElementById("memname").focus();
	 return false;
  }
  if(document.getElementById("email").value=='')
  {
     alert('Enter Your Email Id');
	 document.getElementById("email").focus();
	 return false;
  }
  if(document.getElementById("subject").value=='')
  {
     alert('Enter Subject');
	 document.getElementById("subject").focus();
	 return false;
  }
  if(document.getElementById("message").value=='')
  {
     alert('Enter Message');
	 document.getElementById("message").focus();
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
.bdr_botm
{
  border-bottom:1px solid #330000; 
}
.bdr_right
{
  border-right:1px solid #330000; 
}
-->
</style>
<script type="text/javascript" src="js/general.js"></script>
<script type="text/javascript">
function chck_val()
{
  if(document.getElementById("usr_nme").value=='')
  {
    alert('Enter User Name');
	document.getElementById("usr_nme").focus();
	return false;
  }
  if(document.getElementById("pin_no").value=='')
  {
    alert('Enter Pin No.');
	document.getElementById("pin_no").focus();
	return false;
  }
  if(document.getElementById("usr_tag").value=='')
  {
    alert('Select Tag');
	document.getElementById("usr_tag").focus();
	return false;
  }
}
</script>
</head>

<body>
<!--header start -->
<?php require_once("inner_header.php"); ?>
	<!--header end -->
<!--Special In 2007 start -->
	
<!--Special In 2007 end -->
<!--not body part start -->
<div id="botBody">
		<!--member start --><!--member end -->
		<!--latest start -->
		<!--latest end -->
		<!--more service start -->
		<!--more service end -->
		<!--testimonial start -->
		<!--testimonial end -->
  <table width="100%" height="311" border="0" cellpadding="0" cellspacing="0">
		<tr>
		<td align="center">
		<form name="frm" id="frm" action="member_register2.php?clntid=<?php echo $result['client_id']; ?>">
		  <table width="777" border="0" cellpadding="0" cellspacing="0">
            
            <tr>
              <th width="48" height="34" class="contant">&nbsp;</th>
              <th width="177" height="34" class="contant">Pin Number :</th>
              <th width="191" height="34" align="left" class="contant"><?php echo $result['pin_no']; ?></th>
              <th width="183" height="34" class="contant">User ID :</th>
              <th width="178" height="34" align="left" class="contant"><?php echo $result['user_id']; ?></th>
            </tr>
            <tr>
              <th height="34" valign="top" class="contant">&nbsp;</th>
              <th height="34" valign="top" class="contant">Upline ID :</th>
              <th height="34" align="left" class="contant"><?php echo $result['upline_id']; ?></th>
              <th height="34" class="contant">Tag : </th>
              <th height="34" align="left" class="contant"><?php echo $result['client_tag']; ?></th>
            </tr>
            <tr>
              <th height="34" valign="top" class="contant">&nbsp;</th>
              <th height="34" valign="top" class="contant">Referrence ID : </th>
              <th height="34" align="left" class="contant"><?php echo $result['ref_id']; ?></th>
              <th height="34" class="contant">&nbsp;</th>
              <th height="34" align="left" class="contant">&nbsp;</th>
            </tr>
            <tr>
              <th height="34" valign="top" class="contant">&nbsp;</th>
              <th height="34" valign="top" class="contant">Name  : <span class="footer">*</span></th>
              <th height="34" align="left"><input name="clent_nme" type="text" class="inp-form" id="clent_nme"/></th>
              <th height="34" class="contant">&nbsp;</th>
              <th height="34" align="left">&nbsp;</th>
            </tr>
            <tr>
              <th height="34" valign="top" class="contant">&nbsp;</th>
              <th height="34" valign="top" class="contant">Password : <span class="footer">*</span></th>
              <th height="34" align="left"><input name="pswd" type="password" class="inp-form" id="pswd"/></th>
              <th height="34" class="contant">Confirm Password : <span class="footer">*</span> </th>
              <th height="34" align="left"><input name="cnfm_pswd" type="password" class="inp-form" id="cnfm_pswd"/></th>
            </tr>
            <tr>
              <th height="34" valign="top" class="contant">&nbsp;</th>
              <th height="34" valign="top" class="contant">Address : <span class="footer">*</span></th>
              <th height="34" align="left"><input name="address" type="text" class="inp-form" id="address"/></th>
              <th height="34" class="contant">Mobile No. : <span class="footer">*</span> </th>
              <th height="34" align="left"><input name="mble_no" type="text" class="inp-form" id="mble_no"/></th>
            </tr>
            <tr>
              <th height="34" valign="top" class="contant">&nbsp;</th>
              <th height="34" valign="top" class="contant">Email ID : <span class="footer">*</span> </th>
              <th height="34" align="left"><input name="email_id" type="text" class="inp-form" id="email_id"/></th>
              <th height="34" class="contant">Occupation : </th>
              <th height="34" align="left"><input name="occupation" type="text" class="inp-form" id="occupation"/></th>
            </tr>
            <tr>
              <th height="34" valign="top" class="contant">&nbsp;</th>
              <th height="34" valign="top" class="contant">City : <span class="footer">*</span></th>
              <th height="34" align="left"><input name="city" type="text" class="inp-form" id="city"/></th>
              <th height="34" class="contant">State : <span class="footer">*</span></th>
              <th height="34" align="left"><input name="state" type="text" class="inp-form" id="state"/></th>
            </tr>
            <tr>
              <th height="34" valign="top" class="contant">&nbsp;</th>
              <th height="34" valign="top" class="contant">Country : <span class="footer">*</span></th>
              <th height="34" align="left"><input name="country" type="text" class="inp-form" id="country"/></th>
              <th height="34" class="contant">Pan Card No. : </th>
              <th height="34" align="left"><input name="pan_card_no" type="text" class="inp-form" id="pan_card_no"/></th>
            </tr>
            <tr>
              <th height="34" valign="top" class="contant">&nbsp;</th>
              <th height="34" valign="top" class="contant">Father Name : </th>
              <th height="34" align="left"><input name="fname" type="text" class="inp-form" id="fname"/></th>
              <th height="34" class="contant">Nominee : </th>
              <th height="34" align="left"><input name="nominee" type="text" class="inp-form" id="nominee"/></th>
            </tr>
            <tr>
              <th height="34" valign="top" class="contant">&nbsp;</th>
              <th height="34" valign="top" class="contant">Relation of Nominee : </th>
              <th height="34" align="left"><input name="rela_nomine" type="text" class="inp-form" id="rela_nomine"/></th>
              <th height="34" class="contant">Nominee Age : </th>
              <th height="34" align="left"><input name="nomie_age" type="text" class="inp-form" id="nomie_age"/></th>
            </tr>
            <tr>
              <th height="34" valign="top" class="contant">&nbsp;</th>
              <th height="34" valign="top" class="contant">Nominee Mobile No. : </th>
              <th height="34" align="left"><input name="nomie_mble" type="text" class="inp-form" id="nomie_mble"/></th>
              <th height="34" class="contant">Education : </th>
              <th height="34" align="left"><input name="education" type="text" class="inp-form" id="education"/></th>
            </tr>
            <tr>
              <th height="34" valign="top" class="contant">&nbsp;</th>
              <th height="34" valign="top" class="contant">Payment Method : </th>
              <th height="34" align="left"><input name="pay_method" type="text" class="inp-form" id="pay_method"/></th>
              <th height="34" class="contant">Bank Name : </th>
              <th height="34" align="left"><input name="bank_nme" type="text" class="inp-form" id="bank_nme"/></th>
            </tr>
            <tr>
              <th height="34" valign="top" class="contant">&nbsp;</th>
              <th height="34" valign="top" class="contant">Bank Acct. No. </th>
              <th height="34" align="left"><input name="bnk_acct" type="text" class="inp-form" id="bnk_acct"/></th>
              <th height="34" class="contant">Branch : </th>
              <th height="34" align="left"><input name="branch" type="text" class="inp-form" id="branch"/></th>
            </tr>
            <tr>
              <th height="34" valign="top" class="contant">&nbsp;</th>
              <th height="34" valign="top" class="contant">Bank Phone No. : </th>
              <th height="34" align="left"><input name="bnk_ph" type="text" class="inp-form" id="bnk_ph"/></th>
              <th height="34" class="contant">IFSC Code : </th>
              <th height="34" align="left"><input name="ifsc_code" type="text" class="inp-form" id="ifsc_code"/></th>
            </tr>
            <tr>
              <th height="34" class="contant">&nbsp;</th>
              <th height="34" class="contant">&nbsp;</th>
              <th height="34" align="left" valign="top"> </th>
              <th height="34"></th>
              <th height="34" align="left">
			  <input name="button" type="submit" value="Register" onclick="return chckfrm();"/>
              <input name="reset" type="reset"  value="Reset"></th>
            </tr>
          </table>
		</form>
		</td>
		</tr>
  </table>

            </div>
    <!--bot bgody part end -->
    <!-- hightlight part start -->
<div id="highlight"></div>
		
		<br class="spacer" />
    <!--hightlight part end -->
    <!--100% div -->
<?php require_once("footer.php");  ?>
    <!--100% footer end -->
</body>
</html>
