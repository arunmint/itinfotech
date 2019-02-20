<?php 
require_once("db_connect.php"); 
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
            <table width="100%" height="673" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #330000;">
              <tr>
                <td height="45" align="center" bgcolor="#330000"><span class="style1">ITEMS<br />
                </span></td>
                <td align="center" bgcolor="#330000"><span class="style1">PAIR POINTS </span></td>
                <td align="center" bgcolor="#330000"><span class="style1">TIME LIMITS </span></td>
                <td align="center" bgcolor="#330000"><span class="style1">REWARDS</span></td>
              </tr>
              <tr>
                <td align="center" class="bdr_botm bdr_right"><img src="images/cell.png" width="182" height="182" border="0" /></td>
                <td align="center" class="menu bdr_botm bdr_right">2500 : 2500 </td>
                <td align="center" class="menu bdr_botm bdr_right">1 MONTH </td>
                <td align="center" class="menu bdr_botm">MOBILE PHONE </td>
              </tr>
              <tr>
                <td height="210" align="center" class="bdr_botm bdr_right"><img src="images/fridge.png" width="180" height="180" border="0" /></td>
                <td align="center" class="menu bdr_botm bdr_right">5000 : 5000 </td>
                <td align="center" class="menu bdr_botm bdr_right">1 MONTH </td>
                <td align="center" class="menu bdr_botm">REFRIGERATOR</td>
              </tr>
              <tr>
                <td height="146" align="center" class="bdr_botm bdr_right"><img src="images/car.png" width="185" height="88" border="0" /></td>
                <td align="center" class="menu bdr_botm bdr_right">50000 : 50000 </td>
                <td align="center" class="menu bdr_botm bdr_right">NO LIMIT </td>
                <td align="center" class="menu bdr_botm">CAR</td>
              </tr>
              <tr>
                <td height="87" align="center" class="sub bdr_right">ROYALTY</td>
                <td align="center" class="menu bdr_right">250000 : 250000 </td>
                <td align="center" class="menu bdr_right">NO LIMIT</td>
                <td align="center" class="sub">2% SHARING </td>
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
