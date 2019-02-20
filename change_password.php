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
                    <form name="frm" id="frm" method="post" action="chnge_pswd.php?usrid=<?php echo $_SESSION['userid']; ?>" onSubmit="return Check_form();">					
                    <table width="68%" border="0" style="border:1px solid #000033;">
                          <tr>
                            <td height="34" colspan="3" valign="middle" style="padding:20px; color:#003366; font-size:14px; font-weight:bold;"><strong>Change Password</strong></td>
                          </tr>
                          
                          <tr>
                            <td width="7%" valign="middle">&nbsp;</td>
                            <td width="35%" height="34" valign="middle" style="color:#003366;">Old Password : </td>
                            <td width="58%" height="34" valign="middle"><input name="old_pswd" type="password" id="old_pswd" size="30"></td>
                          </tr>
                          <tr>
                            <td valign="middle">&nbsp;</td>
                            <td height="34" valign="middle" style="color:#003366;">New Password : </td>
                            <td height="34" valign="middle"><input name="new_pswd" type="password" id="new_pswd" size="30"></td>
                          </tr>
                          <tr>
                            <td valign="middle">&nbsp;</td>
                            <td height="34" valign="middle" style="color:#003366;">Confirm Password : </td>
                            <td height="34" valign="middle"><input name="cnfrm_pswd" type="password" id="cnfrm_pswd" size="30"></td>
                          </tr>
                          <tr>
                            <td valign="middle">&nbsp;</td>
                            <td height="34" valign="middle" style="color:#003366;">
							<input type="hidden" name="alrdy_pswd" id="alrdy_pswd" value="<?php echo $result['usr_pswd']; ?>">
							</td>
                            <td height="34" valign="middle"><input type="submit" name="Submit" value="Submit">
                            <input type="reset" name="Submit2" value="Reset"></td>
                          </tr>
                      </table>
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
