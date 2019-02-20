<?php 
require_once("db_connect.php"); 
$msg = "";
if(isset($_REQUEST['Submit']))
{
	$nme = $_POST['memname'];
	$email_id = $_POST['email'];
	$mobile_no = $_POST['mobile_no'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$msg = $_POST['message'];
	
	//$to = "nkrish24@gmail.com";
	$to = "info@greatitinfotech.com";
	
	$subject="Enquiry from Greatitinfotech India (P) Ltd";
	
	$message = "\nName:".$nme."\n\nEMail ID :".$email_id."\n\nMobile No : ".$mobile_no."\n\n Address : ".$address."\n\n City : ".$city."\n\nMessage:".$msg."\n\n";
	$headers = "From:" .$email_id. "\r\n";
	mail($to, $subject, $message, $headers);
	$msg = "suc";
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
  
  if (echeck(document.getElementById("email").value)==false)
  {
		document.getElementById("email").focus()
		return false
  }
  
  if(document.getElementById("mobile_no").value=='')
  {
     alert('Enter Your Mobile No.');
	 document.getElementById("mobile_no").focus();
	 return false;
  }
  if(document.getElementById("message").value=='')
  {
     alert('Enter Message');
	 document.getElementById("message").focus();
	 return false;
  }
}

function echeck(str) {

		var at="@"
		var dot="."
		var lat=str.indexOf(at)
		var lstr=str.length
		var ldot=str.indexOf(dot)
		if (str.indexOf(at)==-1){
		   alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
		   alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		    alert("Invalid E-mail ID")
		    return false
		}

		 if (str.indexOf(at,(lat+1))!=-1){
		    alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		    alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.indexOf(dot,(lat+2))==-1){
		    alert("Invalid E-mail ID")
		    return false
		 }
		
		 if (str.indexOf(" ")!=-1){
		    alert("Invalid E-mail ID")
		    return false
		 }

 		 return true					
	}

function ValidateForm(){
	var emailID=document.frmSample.txtEmail
	
	if ((emailID.value==null)||(emailID.value=="")){
		alert("Please Enter your Email ID")
		emailID.focus()
		return false
	}
	if (echeck(emailID.value)==false){
		emailID.value=""
		emailID.focus()
		return false
	}
	return true
 }
</script>

<style type="text/css">
<!--
.style1 {color: #FF0000}
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
    <table width="100%" height="315" border="0" cellpadding="0" cellspacing="0">
    <tr>
    <td width="53%" align="center" style="border-right:1px solid #522324;">
    <form name="form_id" id="form_id" method="post" action="">
                  <br />
                  <table width="76%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><strong>CONTACT US </strong></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>Great ITInfotech India (P) Ltd, </td>
                    </tr>
                    <tr>
                      <td>SKP Complex, Second Floor,</td>
                    </tr>
                    <tr>
                      <td>Gobi Main Road,</td>
                    </tr>
                    <tr>
                      <td>Sathyamangalam-638402,</td>
                    </tr>
                    <tr>
                      <td>Tamil Nadu, India</td>
                    </tr>
                    <tr>
                      <td>Website: <a href="http://www.greatitinfotech.com">http://www.greatitinfotech.com</a></td>
                    </tr>
                    <tr>
                      <td>Phone: 04295-220851</td>
                    </tr>
                  </table>
                  <br />
                  <br />
                  <table width="87%" height="368" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="3%" height="55">&nbsp;</td>
                    <td height="55" colspan="4"><strong>SEND US A MESSAGE </strong></td>
                  </tr>
                  <tr>
                    <td height="27" colspan="5" align="center" style="color:#FF0000;">
					<?php if($msg!='') { echo "Mail has been Sent"; } ?>
					</td>
                    </tr>
                  <tr>
                    <td height="35" colspan="2">&nbsp;</td>
                    <td width="30%" height="35" valign="top">Name<span class="style1">*</span> : </td>
                    <td width="62%" height="35" valign="top"><input name="memname" type="text" id="memname" size="34" /></td>
                    <td width="4%" height="35">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="35" colspan="2">&nbsp;</td>
                    <td height="35" valign="top"> Email<span class="style1">*</span> : </td>
                    <td height="35" valign="top"><input name="email" type="text" id="email" size="34" /></td>
                    <td height="35">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="35" colspan="2">&nbsp;</td>
                    <td height="35" valign="top">Mobile No.<span class="style1">*</span> : </td>
                    <td height="35" valign="top"><input name="mobile_no" type="text" id="mobile_no" size="34" /></td>
                    <td height="35">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="35" colspan="2">&nbsp;</td>
                    <td height="35" valign="top">Address : </td>
                    <td height="35" valign="top"><input name="address" type="text" id="address" size="34" /></td>
                    <td height="35">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="35" colspan="2">&nbsp;</td>
                    <td height="35" valign="top">City : </td>
                    <td height="35" valign="top"><input name="city" type="text" id="city" size="34" /></td>
                    <td height="35">&nbsp;</td>
                  </tr>
                  
                  <tr>
                    <td height="35" colspan="2">&nbsp;</td>
                    <td height="35" valign="top">Message<span class="style1">*</span> : </td>
                    <td height="35" valign="top"><textarea name="message" cols="31" rows="5" id="message"></textarea></td>
                    <td height="35">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="28" colspan="2">&nbsp;</td>
                    <td height="28" valign="top">&nbsp;</td>
                    <td height="28" valign="top"><input type="submit" name="Submit" value="SEND" onclick="return chck_enqy();"/>
                    <input type="reset" name="Submit2" value="Reset" /></td>
                    <td height="28">&nbsp;</td>
                  </tr>
                </table>
		</form>
				</td>
                <td width="47%" align="center" valign="top"><br />
                  <table width="96%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td colspan="3"><strong>Our Bankers, </strong></td>
                    </tr>
                    <tr>
                      <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="5%" align="center" class="subdiv3">&nbsp;</td>
                      <td colspan="2" align="left" class="sub"><strong>AXIS BANK</strong></td>
                    </tr>
                    <tr>
                      <td align="center" class="subdiv3">&nbsp;</td>
                      <td width="21%" align="left" class="subdiv3"><strong>NAME :</strong></td>
                      <td width="74%" align="left" class="subdiv3"><span class="menu">GREAT ITINFOTECH INDIA PRIVATE LIMITED</span></td>
                    </tr>
                    <tr>
                      <td align="center" class="subdiv3">&nbsp;</td>
                      <td align="left" class="subdiv3"><strong>A/C NO :</strong></td>
                      <td align="left" class="subdiv3"><span class="menu">912020038125425</span></td>
                    </tr>
                    <tr>
                      <td align="center" class="subdiv3">&nbsp;</td>
                      <td align="left" class="subdiv3"><strong>BRANCH :</strong></td>
                      <td align="left" class="subdiv3"><span class="menu">SATHYAMANGALAM</span></td>
                    </tr>
                    <tr>
                      <td align="center" class="subdiv3">&nbsp;</td>
                      <td align="left" class="subdiv3"><strong>IFSC CODE:</strong></td>
                      <td align="left" class="subdiv3"><span class="menu">UTIB0000368</span></td>
                    </tr>
                    
                    <tr>
                      <td colspan="3">&nbsp;</td>
                    </tr>
                  </table></td>
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
<?php require_once("footer.php");  ?>
    <!--100% footer end -->
</body>
</html>
