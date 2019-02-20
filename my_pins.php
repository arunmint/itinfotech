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
                    <form name="frm" id="frm" method="post" action="#">					
                    <table width="68%" border="0" style="border:1px solid #000033;">
                          <tr>
                            <td height="34" colspan="2" valign="middle" style="padding:20px; color:#003366; font-size:14px; font-weight:bold;"><strong>My Pins </strong></td>
                          </tr>
                          <?php
						  $sqlstr = "select * from  my_pin_list where client_id = '".$_SESSION['userid']."'";
						  $res = mysql_query($sqlstr) or die(mysql_error());
						  $num = mysql_num_rows($res);
						  if($num!=0)
						  {
						  $i=1;
						  while($result = mysql_fetch_array($res))
						  { ?>
                          <tr>
                            <td width="8%" height="34" align="center" valign="middle" style="color:#003366;"><?php echo $i; ?></td>
                            <td width="85%" height="34" valign="middle"><?php echo $result['pins']; ?></td>
                          </tr>
						 <?php $i++; } } else { ?> 
						 <tr><td align="center">No Pins..</td></tr>
						 <?php } ?>
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
