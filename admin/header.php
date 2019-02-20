<!-- Start: page-top-outer -->
<div id="page-top-outer">    

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
	<div id="logo">
	<a href=""><img src="../images/logo_weltr.png" alt="GREATITINFOTECH" width="520" height="65" border="0"/></a>	</div>
	<!-- end logo -->
	
	<!--  start top-search -->
	<div id="top-search">
		<!-- Time Display Settings -->
	</div>
 	<!--  end top-search -->
 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->
	
<div class="clear">&nbsp;</div>
 
<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 

		<!-- start nav-right -->
		<div id="nav-right">
		
			<div class="nav-divider">&nbsp;</div>
			<!--<div class="showhide-account">
			<a href="old_month_payment.php"><img src="images/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /></a>
			</div>-->
			<div class="nav-divider">&nbsp;</div>
			<a href="index.php" id="logout"><img src="images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
			<div class="clear">&nbsp;</div>
		
		</div>
		<!-- end nav-right -->
		

		<!--  start nav -->
		<div class="nav">
		<div class="table">
		<?php $filename = basename($_SERVER['PHP_SELF']); ?>
		<ul <?php if($filename=='welcome.php') { ?>class="current"<?php } else { ?>class="select"<?php } ?>><li><a href="welcome.php"><b>Dashboard </b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		                    
		<ul <?php if($filename=='client_list.php' || $filename=='add_clients.php' || $filename=='edit_clients.php' || $filename=='view_clients.php') { ?>class="current"<?php } else { ?>class="select"<?php } ?>><li><a href="client_list.php"><b>Clients</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
</li>
		</ul>
		<div class="nav-divider">&nbsp;</div>
		
		<ul <?php if($filename=='pair_payments.php') { ?>class="current"<?php } else { ?>class="select"<?php } ?>>
		<li><a href="#"><b>Pair</b></a>
		<div class="select_sub">
			<ul class="sub">
				<li><a href="pair_closing.php">Pair Closing</a></li>
				<li><a href="pair_payments.php">Pair Payments</a></li>
			</ul>
		</div>
</li>
		</ul>
		<div class="nav-divider">&nbsp;</div>
		
		
		<ul <?php if($filename=='referral_count.php') { ?>class="current"<?php } else { ?>class="select"<?php } ?>><li><a href="referral_count.php"><b>Referral</b></a>
		</li>
		</ul>
		<div class="nav-divider">&nbsp;</div>
		
		<ul <?php if($filename=='package.php') { ?>class="current"<?php } else { ?>class="select"<?php } ?>><li><a href="package.php"><b>Packages</b></a>
</li>
		</ul>
		
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul <?php if($filename=='rewards.php') { ?>class="current"<?php } else { ?>class="select"<?php } ?>><li><a href="rewards.php"><b>Rewards</b></a></li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul <?php if($filename=='news.php'|| $filename=='edit_news.php') { ?>class="current"<?php } else { ?>class="select"<?php } ?>><li><a href="news.php"><b>News</b></a></li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		<ul <?php if($filename=='news.php'|| $filename=='edit_news.php') { ?>class="current"<?php } else { ?>class="select"<?php } ?>><li><a href="old_month_payment.php"><b>Payment</b></a></li>
		</ul>
		<div class="nav-divider">&nbsp;</div>
<ul <?php if($filename=='packge_wse_lst.php') { ?>class="current"<?php } else { ?>class="select"<?php } ?>><li><a href="packge_wse_lst.php"><b>Package Wise List</b></a></li>
		</ul>	
		
		<ul <?php if($filename=='rewards_closing.php') { ?>class="current"<?php } else { ?>class="select"<?php } ?>><li><a href="rewards_closing.php"><b>Rewards Closing</b></a></li>
		</ul>
		
		<ul <?php if($filename=='rewards_archiver.php') { ?>class="current"<?php } else { ?>class="select"<?php } ?>><li><a href="rewards_archiver.php"><b>Rewards Archiever</b></a></li>
		</ul>
		
		<ul <?php if($filename=='pin_generate.php') { ?>class="current"<?php } else { ?>class="select"<?php } ?>>
		<li><a href="pin_generate.php"><b>My Pins</b></a></li>
		</ul>		
		
		
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->

  <div class="clear"></div>
 