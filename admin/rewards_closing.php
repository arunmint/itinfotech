<?php 
require_once("../db_connect.php"); 
require_once("../functions.php");
require_once("session_chk.php");

$clsing_dmy = date('Y-m-d');
$d = date('d');
$mm = date('m');
$y = date('Y');
if(isset($_GET['msg']))
{
  $msg = $_GET['msg'];
}

if(isset($_GET['d']) && isset($_GET['m']) && isset($_GET['y'])) 
{ 
  $clsing_dmy = $_GET['y']."-".$_GET['m']."-".$_GET['d']; 
  $d = $_GET['d'];
  $mm = $_GET['m'];
  $yy = $_GET['y'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>ITINFOTECH - Administration Panel</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!--  checkbox styling script -->
<script src="js/jquery/ui.core.js" type="text/javascript"></script>
<script src="js/jquery/ui.checkbox.js" type="text/javascript"></script>
<script src="js/jquery/jquery.bind.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});
</script>  

<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>
 

<![endif]>

<!--  styled select box script version 2 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>

<!--  styled select box script version 3 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>

<!--  styled file upload script --> 
<script src="js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
  $(function() {
      $("input.file_1").filestyle({ 
          image: "images/forms/choose-file.gif",
          imageheight : 21,
          imagewidth : 78,
          width : 310
      });
  });
</script>

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>
 
<!-- Tooltips -->
<script src="js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="js/jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script> 


<!--  date picker script -->
<link rel="stylesheet" href="css/datePicker.css" type="text/css" />
<script src="js/jquery/date.js" type="text/javascript"></script>
<script src="js/jquery/jquery.datePicker.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
        $(function()
{

// initialise the "Select date" link
$('#date-pick')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2005',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);
	
var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	<!--$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');-->
	$('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
}
// listen for when the selects are changed and update the picker
$('#d, #m, #y')
	.bind(
		'change',
		function()
		{
			var d = new Date(
						$('#y').val(),
						$('#m').val()-1,
						$('#d').val()
					);
			$('#date-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#d').trigger('change');
});
</script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
<style type="text/css">
.pagination { height:20px; padding:0px 0px; line-height:19px; color:#949494; }
.pagination a{ background:url(images/pagging.gif) repeat-x 0 0; height:20px; float:left; padding:0 8px; border:solid 1px #d5d5d5; text-decoration: none; color:#fff; margin-left:5px;  }
.pagination a:hover { border-color:#373737; background:#373737; color:#fff; }
.pagination span{ float:left; margin-left:5px; padding-top:2px; }
.current_x { background:url(images/pagging.gif) repeat-x 0 0; height:20px; float:left; padding:0 8px; border:solid 1px #373737; text-decoration: none; color:#fff; margin-left:5px; background:#373737; }

</style>
</head>
<body> 
<?php require_once("header.php"); ?>
 <div class="clear"></div>
 
<!-- Start Content - Outer START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Rewards Closing</h1>
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
                <!--  start product-table ..................................................................................... -->
  <form id="frm" name="frm" action="" method="get">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="37%" height="29" align="right">Closing Date :&nbsp;&nbsp;&nbsp; </td>
      <td width="32%">
	  <table border="0" cellpadding="0" cellspacing="0">
                          <tr  valign="top">
						<td>
						<select name="d" class="styledselect-day" id="d">
						<option value="">dd</option>
						<?php for($j=1; $j<=31; $j++) { ?>
						<option value="<?php echo $j; ?>" <?php if($j==$d) { echo "selected=selected"; } ?>><?php echo $j; ?></option>
						<?php } ?>
						</select></td>
                            <td><select name="m" class="styledselect-month" id="m">
                                <option value="">mmm</option>
                                <option value="01" <?php if($mm=='01') { echo "selected"; } ?>>Jan</option>
                                <option value="02" <?php if($mm=='02') { echo "selected"; } ?>>Feb</option>
                                <option value="03" <?php if($mm=='03') { echo "selected"; } ?>>Mar</option>
                                <option value="04" <?php if($mm=='04') { echo "selected"; } ?>>Apr</option>
                                <option value="05" <?php if($mm=='05') { echo "selected"; } ?>>May</option>
                                <option value="06" <?php if($mm=='06') { echo "selected"; } ?>>Jun</option>
                                <option value="07" <?php if($mm=='07') { echo "selected"; } ?>>Jul</option>
                                <option value="08" <?php if($mm=='08') { echo "selected"; } ?>>Aug</option>
                                <option value="09" <?php if($mm=='09') { echo "selected"; } ?>>Sep</option>
                                <option value="10" <?php if($mm=='10') { echo "selected"; } ?>>Oct</option>
                                <option value="11" <?php if($mm=='11') { echo "selected"; } ?>>Nov</option>
                                <option value="12" <?php if($mm=='12') { echo "selected"; } ?>>Dec</option>
                              </select>                            </td>
                            <td><select name="y"  class="styledselect-year"  id="y">
                                <option value="">yyyy</option>
								<?php
								for($z=2012; $z<=2018; $z++)
								{ ?>
								<option value="<?php echo $z; ?>"><?php echo $z; ?></option>
								<?php } ?>
                              </select>                            </td>
                            <td><a href=""  id="date-pick"><img src="images/forms/icon_calendar.jpg"   alt="" /></a></td>
                          </tr>
                    </table>	  </td>
      <td width="31%"><input type="submit" name="Submit" value="Go" /></td>
    </tr>
  </table>
  </form>
  <br />
                <form name="mainform" id="mainform" method="post" action="rewards_clsing_cal.php">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">User ID</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Upline ID </a></th>
					<th class="table-header-repeat line-left"><a href="">Ref. ID </a></th>
					<th class="table-header-repeat line-left"><a href="">Joining Date </a></th>
					<th class="table-header-options line-left"><a href="">User Name </a></th>
				</tr>
				<?php
				$sqlstr = "SELECT * FROM client_list WHERE `user_id` NOT IN(SELECT DISTINCT user_id FROM rewrds_clsing where  	clsng_dt_id = '".$clsing_dmy."') limit 0,5";
				
				$res = mysql_query($sqlstr) or die(mysql_error());
				$numresult = mysql_num_rows($res);
				if($numresult!=0)
				{
				 $clr = 1;
				 while($result = mysql_fetch_array($res))
				 { 
				   $rwclr = "class='alternate-row'";
				   if($clr>2) { $clr = 1; }

				?>
				<tr>
					<td><input type="checkbox" name="clsing_id[]" id="clsing_id" value="<?php echo $result['client_id']; ?>"/></td>
					<td><?php echo $result['user_id']; ?></td>
					<td><?php echo $result['upline_id']; ?></td>
					<td><?php echo $result['ref_id']; ?></td>
					<td><?php echo date("d-M-Y",strtotime($result['join_dte'])); ?></td>
					<td class="options-width"><?php echo $result['usr_name']; ?></td>
				</tr>
		  <?php //} //end of if($chck_num!=0)

		         }
			   } 
				else { ?>
				<!--<tr><td colspan="6">No Clients..</td></tr>-->
				<?php }
				//if($rw == 0) { ?>
				<!--<tr><td colspan="6" align="center">No Clients for this date..</td></tr>-->
				<?php //} ?>
				<tr>
				  <td colspan="6" align="center">
				  <input type="hidden" name="closing_dte" id="closing_dte" value="<?php echo $clsing_dmy; ?>" />
				  <input name="button" type="submit" class="form-submit2" value=""/></td>
				  </tr>
				</table>
				</form>
				<!--  end product-table................................... --> 
			  
			</div>
<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
    
<!-- start footer -->         
<?php require_once("footer.php"); ?>
<!-- end footer -->
 
</body>
</html>