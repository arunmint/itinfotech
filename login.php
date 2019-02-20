<?php require_once("db_connect.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: GREAT IT INFOTECH INDIA (P) LTD ::</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
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
            <table width="100%" height="315" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="53%" align="center" style="border-right:1px solid #522324;">
				<form name="frm" id="frm" method="post" action="loginck.php">
				<table width="76%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="35" colspan="5" align="center" style="color:#FF0000;">
					<?php 
					if(isset($_GET['err'])) { echo "Check Your ID & Password"; }
					?>
					</td>
                  </tr>
                  <tr>
                    <td width="4%" height="35">&nbsp;</td>
                    <td height="35" colspan="4">User Login </td>
                  </tr>
                  <tr>
                    <td height="35" colspan="2">&nbsp;</td>
                    <td width="35%" height="35">User ID : </td>
                    <td width="46%" height="35"><input name="username" type="text" id="username" /></td>
                    <td width="10%" height="35">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="35" colspan="2">&nbsp;</td>
                    <td height="35">Password : </td>
                    <td height="35"><input name="password" type="password" id="password" /></td>
                    <td height="35">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="35" colspan="2">&nbsp;</td>
                    <td height="35">&nbsp;</td>
                    <td height="35"><input type="submit" name="Submit" value="Login" /></td>
                    <td height="35">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="35" colspan="2">&nbsp;</td>
                    <td height="35">Forgot Password</td>
                    <td height="35">&nbsp;</td>
                    <td height="35">&nbsp;</td>
                  </tr>
                </table>
				</form>
				</td>
                <td width="47%" align="center">&nbsp;</td>
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
