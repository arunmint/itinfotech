<?php require_once("db_connect.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: GREAT IT INFOTECH INDIA (P) LTD ::</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
    <!-- Arquivos utilizados pelo jQuery lightBox plugin -->
    <script type="text/javascript" src="lightbox/js/jquery.js"></script>
    <script type="text/javascript" src="lightbox/js/jquery.lightbox-0.5.js"></script>
    <link rel="stylesheet" type="text/css" href="lightbox/css/jquery.lightbox-0.5.css" media="screen" />
    <!-- / fim dos arquivos utilizados pelo jQuery lightBox plugin -->
    
    <!-- Ativando o jQuery lightBox plugin -->
    <script type="text/javascript">
    $(function() {
        $('#gallery a').lightBox();
    });
    </script>
	<style type="text/css">
.sidemenu ul{
padding:0;
margin:0;
}
.sidemenu li{
position: relative;
float: left;
list-style: none;
margin: 0;
padding:0;
} 

.sidemenu li a{
width:120px;
height: 30px;
display: block;
text-decoration:none;
text-align: center;
line-height: 30px;
color: white;
} 

.sidemenu li a:hover{
background-color: #A4F700;
}

.sidemenu ul ul{
position: absolute;
top: 30px; 
visibility: hidden;
} 

.sidemenu ul li:hover ul{
visibility:visible;
} 

	/* jQuery lightBox plugin - Gallery style */

	#gallery ul { list-style: none; }
	#gallery ul li { display: inline; }
	#gallery ul img {
		border: 5px solid #3e3e3e;
		border-width: 5px 5px 20px;
	}
	#gallery ul a:hover img {
		border: 5px solid #fff;
		border-width: 5px 5px 20px;
		color: #fff;
	}
	#gallery ul a:hover { color: #fff; }
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
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              
              <tr>
                <td width="10%">&nbsp;</td>
                <td colspan="2"><table width="808" height="30" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="154" align="right">&nbsp;</td>
                    <td width="654"><h4>&nbsp;</h4></td>
                  </tr>
                </table></td>
              </tr>
              
              
              <tr>
                <td height="25" colspan="3" align="left" valign="middle"><span class="sub">Click On Image to Full View </span></td>
              </tr>
              <tr>
                <td colspan="3" align="center" valign="top">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" id="gallery">
                  <tr>
                    <td height="191" align="center">
		 <a href="images/mlm_legal.jpg" title="Certificate Of Incorporation"><img src="images/mlm_legal2.jpg" width="113" height="160" border="0" /></a>					</td>
                    <td align="center">
					<a href="images/mlm_pancard.jpg" title="Great IT Info Tech India (P) LTD Pancard">
					<img src="images/mlm_pancard2.png" width="247" height="160" border="0"/>					</a>					</td>
                    <td align="center">
					<a href="images/mlm_certificate.jpg" title="ISO Certifications">
					<img src="images/mlm_certificate2.jpg" width="115" height="160" border="0"/>					</a>					</td>
                  </tr>
                  <tr>
                    <td height="26" align="center" class="menu">Certificate Of Incorporation </td>
                    <td align="center" class="menu">Great IT Info Tech India (P) LTD Pancard </td>
                    <td height="26" align="center" class="menu">ISO Certifications </td>
                  </tr>
                  
                  <tr>
                    <td height="26" colspan="3" align="center" class="menu">&nbsp;</td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td colspan="2" align="left" valign="top" class="sub"></td>
                <td width="81%" valign="top">&nbsp;</td>
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
