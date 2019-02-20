<?php
require_once("db_connect.php");

if(isset($_SESSION['userid']))
{
  $mem = "select usr_name from client_list where client_id = '".$_SESSION['userid']."'";
  $mem1 = mysql_query($mem) or die(mysql_error());
  $mem2 = mysql_fetch_array($mem1);
}  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: GREAT IT INFOTECH INDIA (P) LTD ::</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.hedmenu
{
  color:#400000;
  font-family:arial;
  font-size:12px;
  font-weight:bold;
  text-decoration:none;
}
.hedmenu:hover
{
  color:#B05800;
  font-family:arial;
  font-size:12px;
  font-weight:bold;
  text-decoration:none;
}
.hedmenu2
{
  color:#B05800;
  font-family:arial;
  font-size:12px;
  font-weight:bold;
  text-decoration:none;
}
</style>
</head>
<body>
<!--header start -->
<div id="header">
<?php if(isset($_SESSION['userid'])) { ?>
   <div style="float:right; padding-top:16px; font-family:arial; font-size:12px; color:#400000; font-weight:bold;">
    Welcome <span class="hedmenu2"><?php echo $mem2['usr_name']; ?>,</span> | <a href="logout.php" class="hedmenu">Log Out</a>
	</div>
<?php } ?>	
            <ul class="navi">
            	<li><a href="index.php" class="hover" title="Home">Home</a></li>
                <li><a href="about.php" title="About us">About us</a></li>
                <li><a href="plan.php" title="Plan">Plan</a></li>
                <li><a href="rewards.php" title="Reawards">Rewards</a></li>
                <li><a href="registration.php" title="Registration">Registration</a></li>
                <li><a href="login.php" title="Login">Login</a></li>
				<li><a href="business.php" title="Business">Business</a></li>
                <li class="noborder"><a href="contact_us.php" title="Contact Us">Contact Us</a></li>
            </ul>
</div>
    	<!--header end -->
    <!--Special In 2007 start -->
    	<div id="special">
         <img src="images/slider-2.png" width="954" border="0" />
        </div>
    <!--Special In 2007 end -->
    <!--not body part start -->
    	<div id="botBody">
        	<!--member start -->
            	<div class="subdiv">
                	<p class="top">&nbsp;</p>
                    <h2 >Members Login</h2>
                    <form name="frm" id="frm" method="post" action="loginck.php">
                    	<label>Enter Your Name</label>
                        <input type="text" name="username" id="username" value="" class="textbox" />
                        <label>Enter Your Password</label>
                        <input type="password" name="password" id="password" value="" class="textbox" />
                        <input type="checkbox" name="che" value="" class="check" />
                        <a href="#" class="reme" title="Remember Me">Remember Me</a>
                        <input type="submit" name="submit" value="" class="loginbut" title="Login" />
                        <br class="spacer" /><a href="#" style="color:#5A6C04;" class="reme" title="Registration"><div align="center">Registration</div></a>					
                    </form>					
                    <p class="bot">
					</p>
									
                </div>
            <!--member end -->
            <!--latest start -->
            	<div class="subdiv">
                	<p class="top">&nbsp;</p>
                  <h2 class="event">Latest News</h2>
                    <!--sub div 1 start --><br />
<p><marquee direction="up" height="132" scrollamount="2" scrolldelay="20" class="news" onmouseover="this.stop();" onmouseout="this.start();">

			<?php
			$ltnws = "select news_id,news_title  from news_list order by news_id  desc";
			$ltnws1 = mysql_query($ltnws) or die(mysql_error());
			while($ltnws2 = mysql_fetch_array($ltnws1))
			{ ?>
			<a href="news_dtls.php?nid=<?php echo $ltnws2['news_id']; ?>" style="text-decoration:none;"><h4><?php echo $ltnws2['news_title']; ?></h4></a>
			<br />
			<?php } ?>
			</marquee>
                    <!--sub div end -->
                    <p class="more marTop"><a href="#" title="more">more</a></p>
                    <p class="bot">&nbsp;</p>
                </div>
            <!--latest end -->
            <!--more service start -->
            	<div class="subdiv">
                	<p class="top">&nbsp;</p>
                    <h2 class="moreServices">Rewards</h2>
                    <table width="222" height="60" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="24">&nbsp;</td>
                        <td width="187">
						<script language="JavaScript1.2" type="text/javascript">

/***********************************************
* Fade-in image slideshow script- &Atilde;&fnof;&AElig;&rsquo;&Atilde;&dagger;&acirc;&euro;&trade;&Atilde;&fnof;&Acirc;&cent;&Atilde;&cent;&acirc;&euro;&scaron;&Acirc;&not;&Atilde;&hellip;&Acirc;&iexcl;&Atilde;&fnof;&AElig;&rsquo;&Atilde;&cent;&acirc;&sbquo;&not;&Aring;&iexcl;&Atilde;&fnof;&acirc;&euro;&scaron;&Atilde;&sbquo;&Acirc;&copy; Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

var slideshow_width='234px' //SET IMAGE WIDTH
var slideshow_height='150px' //SET IMAGE HEIGHT
var pause=5000 //SET PAUSE BETWEEN SLIDE (3000=3 seconds)

var fadeimages=new Array()
//SET 1) IMAGE PATHS, 2) optional link, 3), optional link target:
fadeimages[0]=["car.png", "", ""] //plain image syntax
fadeimages[1]=["fridge.png", "", ""] //plain image syntax
fadeimages[2]=["money.png", "", ""] //image with link syntax
////NO need to edit beyond here/////////////

var preloadedimages=new Array()
for (p=0;p<fadeimages.length;p++){
preloadedimages[p]=new Image()
preloadedimages[p].src=fadeimages[p][0]
}

var ie4=document.all
var dom=document.getElementById

if (ie4||dom)
document.write('<div style="position:relative;width:'+slideshow_width+';height:'
+slideshow_height+';overflow:hidden"><div id="canvas0" style="position:absolute;width:'+slideshow_width+';height:'+slideshow_height
+';top:0;left:0;filter:alpha(opacity=10);-moz-opacity:10"></div><div id="canvas1" style="position:absolute;width:'+slideshow_width+';height:'+slideshow_height
+';top:0;left:0;filter:alpha(opacity=10);-moz-opacity:10;visibility: hidden"></div></div>')
else
document.write('<img name="defaultslide" src="'+fadeimages[0][0]+'">')

var curpos=10
var degree=10
var curcanvas="canvas0"
var curimageindex=0
var nextimageindex=1

function fadepic(){
if (curpos<100){
curpos+=10
if (tempobj.filters)
tempobj.filters.alpha.opacity=curpos
else if (tempobj.style.MozOpacity)
tempobj.style.MozOpacity=curpos/101
}
else{
clearInterval(dropslide)
nextcanvas=(curcanvas=="canvas0")? "canvas0" : "canvas1"
tempobj=ie4? eval("document.all."+nextcanvas) : document.getElementById(nextcanvas)
tempobj.innerHTML=insertimage(nextimageindex)
nextimageindex=(nextimageindex<fadeimages.length-1)? nextimageindex+1 : 0
var tempobj2=ie4? eval("document.all."+nextcanvas) : document.getElementById(nextcanvas)
tempobj2.style.visibility="hidden"
setTimeout("rotateimage()",pause)
}
}

function insertimage(i){
var tempcontainer=fadeimages[i][1]!=""? '<a href="'+fadeimages[i][1]+'" target="'+fadeimages[i][2]+'">' : ""
tempcontainer+='<img src="'+fadeimages[i][0]+'" border="0">'
tempcontainer=fadeimages[i][1]!=""? tempcontainer+'</a>' : tempcontainer
return tempcontainer
}

function rotateimage(){
if (ie4||dom){
resetit(curcanvas)
var crossobj=tempobj=ie4? eval("document.all."+curcanvas) : document.getElementById(curcanvas)
crossobj.style.zIndex++
tempobj.style.visibility="visible"
var temp='setInterval("fadepic()",50)'
dropslide=eval(temp)
curcanvas=(curcanvas=="canvas0")? "canvas1" : "canvas0"
}
else
document.images.defaultslide.src=fadeimages[curimageindex][0]
curimageindex=(curimageindex<fadeimages.length-1)? curimageindex+1 : 0
}

function resetit(what){
curpos=10
var crossobj=ie4? eval("document.all."+what) : document.getElementById(what)
if (crossobj.filters)
crossobj.filters.alpha.opacity=curpos
else if (crossobj.style.MozOpacity)
crossobj.style.MozOpacity=curpos/101
}

function startit(){
var crossobj=ie4? eval("document.all."+curcanvas) : document.getElementById(curcanvas)
crossobj.innerHTML=insertimage(curimageindex)
rotateimage()
}

if (ie4||dom)
window.onload=startit
else
setInterval("rotateimage()",pause)

            </script></td>
                        <td width="11">&nbsp;</td>
                      </tr>
                    </table>
                    <p></p>

                    <p class="more"><a href="rewards.php" title="more">more</a></p>
                    <p class="bot"></p>
                </div>
            <!--more service end -->
            <!--testimonial start -->
       	  <div class="subdiv2">
                	<p class="top">&nbsp;</p>
                    <h2 class="testi">Latest Rewards</h2><marquee direction="up" height="148" scrollamount="2" scrolldelay="20" class="news" onmouseover="this.stop();" onmouseout="this.start();">
              <h4><strong>Matt </strong></h4>
              <h4 class="green">The Bright Agency</h4>
              <p class="text"><i>I have been working with web design and with Wordpress! for a few years and it wasn't until the other day I came across your site... </i></p>
              <h4><strong>Thomas</strong></h4>
              <h4 class="green">RightBanners</h4>
              <p class="text"><i>Top service. It's nice to come back. Thank you for the support, efficient and fast. You are true professionals.</i></p>  </marquee> 
               <p class="more"><a href="#" title="more">more</a></p>
                    <p class="bot">&nbsp;</p>
          </div>
            <!--testimonial end -->
        	<br class="spacer" />
        </div>
    <!--bot bgody part end -->
    <!-- hightlight part start -->
<div id="highlight">
        	<form action="#" method="post" name="newlette" id="newlette">
                  <p class="top"></p>
                  <div align="center">
				   <h2>Our Member's</h2><br />
                     <span class="bot">
                         <span class="con">
						 <!-- Member list Marquee -->
						 <marquee direction="up" height="118" scrollamount="2" scrolldelay="20" class="news" onmouseover="this.stop();" onmouseout="this.start();">
                  <span style="padding:15px;">
				  <?php
				  $sqlstr = "select user_id,usr_name,city from client_list order by client_id desc limit 0,10";
				  $res = mysql_query($sqlstr) or die(mysql_error());
				  $clr = 1;
				  while($result = mysql_fetch_array($res))
				  { 
				    $rwclr = "#993300";
					if($clr==2) { $rwclr = "#000033"; }
					if($clr==3) { $rwclr = "#003300"; }
					if($clr==4) { $rwclr = "#660001"; }
				    if($clr>4) { $clr = 1; }
				  ?>	
				  <span style="padding:15px; font-family:Arial; font-size:12px; color:<?php echo $rwclr; ?>; font-weight:600;">
				  <table width="95%" border="0" cellspacing="0" cellpadding="0" style="">
					<tr>
					  <td width="6%" height="25">&nbsp;</td>
					  <td width="22%" height="25">Name : </td>
					  <td width="72%" height="25"><?php echo $result['usr_name']; ?></td>
					</tr>
					<tr>
					  <td height="25">&nbsp;</td>
					  <td height="25">ID : </td>
					  <td height="25"><?php echo $result['user_id']; ?></td>
					</tr>
					<tr>
					<td height="25">&nbsp;</td>
					<td height="25">City : </td>
					<td height="25"><?php echo $result['city']; ?></td>
					</tr>
				  </table>
				  </span>
 				  <span style="padding:15px; font-family:Arial; font-size:12px; color:#000; font-weight:600;">                  -----------------------------
				  </span>
				  <?php $clr++; } ?> 
						 </span>
						 
						 </marquee>
						 </span>
						 </span>
						 
			  </div>
                     
					 <label></label>
                  <p class="bot">&nbsp;</p>
  </form>
       	  <h2 class="hight">Welcome to Great ITInfotech...</h2>
            <p class="text">
            Our company was established in 2010 operating with sole proprietorship. Over a short period of two years, our wise vision guided us into rapid growth in manpower and sales turnover, which in turn elevates the company to private limited status in the year 2012.</p>
            <p class="text">
  Working with Great ITInfotech India (P) Ltd., is perfectly legal. Our online research panels for market research are legally accepted worldwide. And so is our referral program that rewards Compensation.</p>
        	
            <table width="100%" height="0%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="32" colspan="3"><h4><img src="images/Business_icon.png" width="40" height="40" />Our Business</h4></td>
                <td width="24%">&nbsp;</td>
                <td width="2%">&nbsp;</td>
              </tr>
              
              <tr>
                <td width="26%" height="70%"><form action="#" method="post" name="newlette" id="newlette">
                  <p class="top"></p>
                  <div align="center"><span class="menu">Software</span><p>&nbsp;</p>
                    <img src="images/soft.png" width="200" height="120" /><br />
                     <span class="bot"><br />
                         <span class="con"><br />
                         <span style="padding:15px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, </span></span></div>
                  <label></label>
                  <p class="bot">&nbsp;</p>
                </form></td>
                <td width="24%"><form action="#" method="post" name="newlette" id="newlette">
                  <p class="top"></p>
                  <div align="center"><span class="menu">Powder Coating </span><p>&nbsp;</p>
					<img src="images/powder.png" width="200" height="120" /><br />
                     <span class="bot"><br />
                         <span class="con"><br />
                         <span style="padding:15px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, </span></span></div>
                  <label></label>
                  <p class="bot">&nbsp;</p>
                </form></td>
                <td width="24%"><form action="#" method="post" name="newlette" id="newlette">
                  <p class="top"></p>
                  <div align="center"><span class="menu">Real Estate </span><p>&nbsp;</p>
                    <img src="images/real.png" width="200" height="120" /><br />
                    <span class="bot"><br />
                    <span class="con"><br />
                    <span style="padding:15px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, </span></span></div>
                  <label></label>
                  <p class="bot">&nbsp;</p>
                </form></td>
                <td><form action="#" method="post" name="newlette" id="newlette">
                  <p class="top"></p>
                  <div align="center"><span class="menu">Minaral water </span><p>&nbsp;</p>
                    <img src="images/water.png" width="200" height="120" /> <br />
                    <span class="bot"><br />
                        <span class="con"><br />
                        <span style="padding:15px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, </span></span></div>
                  <label></label>
                  <p class="bot">&nbsp;</p>
                </form></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="12%">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
  </table>
</div>
		
		<br class="spacer" />
    <!--hightlight part end -->
    <!--100% div -->
<?php require_once("footer.php"); ?>
    <!--100% footer end -->
</body>
</html>
