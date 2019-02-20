<?php 
require_once("db_connect.php"); 
$msg = "";
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
.bdr_botm
{
  border-bottom:1px solid #330000; 
}
.bdr_right
{
  border-right:1px solid #330000; 
}
.style3 {font-size:14px; color:#990000; font-family: Arial;}
-->
</style>
<script type="text/javascript" src="js/general.js"></script>
<script type="text/javascript">
function chck_val()
{
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

function chkpinno(id)
{
	//alert('');
	//alert(divid);
	var ajaxRequest;  
	try{
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				alert("Your browser broke!");
				return false;
			}
		}
	}
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
		//alert(ajaxRequest.responseText);
				var ajaxDisplay = document.getElementById('pindiv');
				//alert("disp pro"+ ajaxRequest.responseText);
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
			}
	}
	
	var QueryString;
	QueryString = "?pinno="+id;
	//alert(QueryString);
	ajaxRequest.open("GET", "chck_pinno.php"+QueryString, true);
	ajaxRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	ajaxRequest.send(null); 
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
		<form name="frm" id="frm" method="post" action="member_register.php">
		<table width="59%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="sub">&nbsp;</td>
            <td class="sub">&nbsp;</td>
            <td class="sub">&nbsp;</td>
          </tr>
		  <?php
		  if(isset($_REQUEST['msg'])) { $msg = $_GET['msg']; }
		  if($msg=='suc')
		  { ?>
          <tr><td colspan="3" align="center" class="menu">Successfully Created..</td>
          </tr>
		  <?php } if($msg=='usrerr') { ?>
		   <tr><td colspan="3" align="center" class="menu">User ID already Exists..</td>
		   </tr>
		  <?php } if($msg=='pinerr') { ?>
		  <tr><td colspan="3" align="center" class="menu">Invalid Pin</td>
		  </tr>
		  <?php } ?>
          <tr>
            <td colspan="3" align="center" class="sub">
		  <div id="refdiv"></div><div id="pindiv"></div>
		  </td>
          </tr>
          <tr>
            <td class="sub">&nbsp;</td>
            <td class="sub">Registeration</td>
            <td class="sub">&nbsp;</td>
          </tr>
          <tr>
            <td width="14%">&nbsp;</td>
            <td width="40%">&nbsp;</td>
            <td width="46%">&nbsp;</td>
          </tr>
          
          <tr>
            <td>&nbsp;</td>
            <td class="contant"><strong>Pin No.<span class="style3">*</span>: </strong></td>
            <td><input name="pin_no" type="text" id="pin_no" onblur="return chkpinno(this.value);"/></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td class="contant">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td class="contant"><strong>Refers ID<span class="style3">*</span> : </strong></td>
            <td><input name="refr_id" type="text" id="refr_id" onblur="return chk_refid(this.value);"/></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td class="contant">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td class="contant"><strong>Upline ID<span class="style3">*</span> : </strong></td>
            <td><input name="uplne_id" type="text" id="uplne_id" onblur="return lst_tag(this.value);"/></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td class="contant">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td class="contant"><strong>Select Tag<span class="style3">*</span> : </strong></td>
            <td>
			<div id="tagdiv">
			<select name="usr_tag" id="usr_tag">
			<option>-Select-</option>
			<option value="Left">Left</option>
			<option value="Right">Right</option>
			</select>
			</div>			</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input type="submit" name="Submit" value="Submit" onclick="return chck_val();"/>
            <input type="reset" name="Submit2" value="Reset" /></td>
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
