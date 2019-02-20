<?php
$fname = basename($_SERVER['PHP_SELF']);
if(isset($_SESSION['userid'])) 
{
 $mem = "select usr_name from client_list where client_id = '".$_SESSION['userid']."'";
 $mem1 = mysql_query($mem) or die(mysql_error());
 $mem2 = mysql_fetch_array($mem1);
} 
?>
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
<div id="header_in">
<?php if(isset($_SESSION['userid'])) { ?>
   <div style="float:right; padding-top:16px; padding-right:15px; font-family:arial; font-size:12px; color:#400000; font-weight:bold;">
    Welcome <span class="hedmenu2"><?php echo $mem2['usr_name']; ?>,</span> | <a href="logout.php" class="hedmenu">Log Out</a>
	</div>
<?php } ?>
            <ul class="navi">
            	<li><a href="index.php" <?php if($fname=='index.php') { ?> class="hover" <?php } ?> title="Home">Home</a></li>
                <li><a href="about.php" <?php if($fname=='about.php') { ?> class="hover" <?php } ?> title="About us">About us</a></li>
                <li><a href="plan.php" <?php if($fname=='plan.php') { ?> class="hover" <?php } ?> title="Plan">Plan</a></li>
                <li><a href="rewards.php" <?php if($fname=='rewards.php') { ?> class="hover" <?php } ?> title="Reawards">Rewards</a></li>
                <li>
	<a href="registration.php" <?php if($fname=='registration.php') { ?> class="hover" <?php } ?> title="Registration">Registration</a></li>
                <?php
				if(isset($_SESSION['userid']))
				{ ?>
				<li><a href="welcome.php" <?php if($fname=='welcome.php' || $fname=='TreeView.php' || $fname=='view_profile.php' || $fname=='edit_profile.php' || $fname == 'change_password.php') { ?> class="hover" <?php } ?> title="Login">My Panel</a></li>
				<?php } else { ?>
				<li><a href="login.php" title="Login" <?php if($fname=='login.php') { ?> class="hover" <?php } ?>>Login</a></li>
				<?php } ?>
				<li><a href="business.php" <?php if($fname=='business.php') { ?> class="hover" <?php } ?>  title="Business">Business</a></li>
                <li class="noborder"><a href="contact_us.php" title="Contact Us" <?php if($fname=='contact_us.php') { ?> class="hover" <?php } ?>>Contact Us</a></li>
            </ul>
            
            
</div>

