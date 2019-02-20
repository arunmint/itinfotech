<?php 
require_once("db_connect.php"); 

if(isset($_GET['nid']))
{
  $nid = $_GET['nid'];
}

//get latest news details
$nws = "select * from news_list where news_id = '".$nid."'";
$nws1 = mysql_query($nws) or die(mysql_error());
$nws2 = mysql_fetch_array($nws1);

?>
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
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              
              <tr>
                <td width="2%">&nbsp;</td>
                <td width="98%"><table width="252" height="30" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="51"><img src="images/news.png" /></td>
                    <td width="186" class="sub">Latest News </td>
                    <td width="15">&nbsp;</td>
                  </tr>
                </table></td>
              </tr>
              
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td class="menu"><?php echo $nws2['news_title']; ?></td>
              </tr>
              
              <tr>
                <td colspan="2" height="10"></td>
              </tr>
              
              <tr>
                <td>&nbsp;</td>
                <td><span class="contant"><?php echo $nws2['news_details']; ?></span></td>
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
