<?php
require_once("../db_connect.php");
require_once("session_chk.php");

$msg = "";
$packid = "";

$pgtitle = "Add New Packages";


if(isset($_GET['msg']))
{
  $msg = $_GET['msg'];
}

if(isset($_GET['packid']))
{
  $packid = $_GET['packid'];
  $pgtitle = "Edit Packages";
}

//get package details for edit
$sqlstr = "select * from package_list where pack_id = '".$packid."'";
$res = mysql_query($sqlstr) or die(mysql_error());
$result = mysql_fetch_array($res);

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
	image: "images/forms/upload_file.gif",
	imageheight : 29,
	imagewidth : 78,
	width : 300
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
	$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
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
</head>
<body> 
<?php require_once("header.php"); ?>
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>PACKAGES</h1>
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
    <td><!--  start content-table-inner -->
        <div id="content-table-inner">
<form name="frm" id="frm" method="post" <?php if(!isset($_GET['packid'])) { ?>action="ins_pckdetls.php"<?php } else { ?>action="updte_pckdetls.php"<?php } ?>>
		  <table border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr valign="top">
              <td><!--  start step-holder -->
                  <div id="step-holder">
                    <div class="step-dark-left"><a href=""><?php echo $pgtitle; ?></a></div>
                    <div class="step-dark-right">&nbsp;</div>
					<?php if($msg=='suc') { ?>
                    <div class="errmsg"><strong>Add Successfully..</strong></div>
					<?php } ?>
                    <div class="clear"></div>
                  </div>
                <!--  end step-holder -->
                  <!-- start id-form -->
                  <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                    <tr>
                      <th valign="top">Package Name : </th>
                      <td><input name="pack_nme" type="text" class="inp-form" id="pack_nme" value="<?php echo $result['pack_nme']; ?>"/></td>
                      <td></td>
                    </tr>
                    
                    <tr>
                      <th valign="top">Price:</th>
                      <td><input name="pack_price" type="text" class="inp-form" id="pack_price" value="<?php echo $result['pack_price']; ?>"/></td>
                      <td></td>
                    </tr>
                    
                    <tr>
                      <th valign="top">Pin Starting :</th>
                      <td><input name="pack_pin" type="text" class="inp-form" id="pack_pin" value="<?php echo $result['pack_pin']; ?>" maxlength="4"/></td>
                      <td></td>
                    </tr>
                    <tr>
                      <th valign="top">Description:</th>
                      <td><textarea name="pack_descrptn" cols="" rows="" class="form-textarea" id="pack_descrptn"><?php echo $result['pack_descriptn']; ?></textarea></td>
                      <td></td>
                    </tr>
                    
                    <tr>
                      <th>&nbsp;</th>
                      <td valign="top"><input name="button" type="submit" class="form-submit" value="" />
					      <?php if(!isset($_GET['packid'])) { ?> 
                          <input name="reset" type="reset" class="form-reset" value=""  />
						  <?php } ?>
						  </td>
                      <td></td>
                    </tr>
                  </table>
                <!-- end id-form  -->
              </td>
              <td><!--  start related-activities -->
                <!-- end related-activities --></td>
            </tr>
            <tr>
              <td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
              <td></td>
            </tr>
          </table>
		  </form>
          <div class="clear"></div>
        </div>
      <!--  end content-table-inner  -->
    </td>
    <td id="tbl-border-right"></td>
  </tr>
  <tr>
    <th class="sized bottomleft"></th>
    <td id="tbl-border-bottom">&nbsp;</td>
    <th class="sized bottomright"></th>
  </tr>
</table>
<br /><br />
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
			
				<!--  start message-yellow -->
				<!--  end message-yellow -->
                <!--  start message-red -->
                <!--  end message-red -->
                <!--  start message-blue -->
                <!--  end message-blue -->
                <!--  start message-green -->
                <!--  end message-green -->
                <!--  start product-table ..................................................................................... -->
<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
				  <th colspan="7">
				  <div id="step-holder">
                    <div class="step-dark-left"><a href="">Package List </a></div>
                    <div class="step-dark-right">&nbsp;</div>
					<?php if($msg=='ds') { ?>
                    <div class="errmsg">Delete Successfully..</div>
					<?php } if($msg=='ups') { ?>
					<div class="errmsg"><strong>Update Successfully..</strong></div>
					<?php } ?>
                    <div class="clear"></div>
                  </div></th>
				  </tr>
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Package Name </a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Price</a></th>
					<th class="table-header-repeat line-left"><a href="">Pin Starting </a></th>
					<th class="table-header-repeat line-left"><a href="">Status</a></th>
					<th class="table-header-repeat line-left"><span class="table-header-repeat line-left"><a href="">Description</a></span></th>
					<th class="table-header-options line-left"><a href="">Options</a></th>
				</tr>
				<?php
				$sqlstr = "select * from package_list";
				$res = mysql_query($sqlstr) or die(mysql_error());
				$num = mysql_num_rows($res);
				if($num!=0)
				{
				  while($result = mysql_fetch_array($res))
				  { ?>
					<tr>
						<td><input  type="checkbox"/></td>
						<td><?php echo $result['pack_nme']; ?></td>
						<td><?php echo $result['pack_price']; ?></td>
						<td><?php echo $result['pack_pin']; ?></td>
						<td><?php echo $result['pack_status']; ?></td>
						<td class="options-width"><?php echo $result['pack_descriptn']; ?></td>
						<td class="options-width">
						<a href="package.php?packid=<?php echo $result['pack_id']; ?>" title="Edit" class="icon-1 info-tooltip"></a>
						<a href="delete_package.php?packid=<?php echo $result['pack_id']; ?>" onclick="return confirm('Are you sure you want to delete?')" class="icon-2 info-tooltip" title="Delete"></a></td>
					</tr>
				<?php } 
				} else { ?>
				<tr><td colspan="7" align="center">No Packages Found..</td></tr>
				 <?php } ?>
				</table>
				<!--  end product-table................................... --> 
			  </form>
			</div>
			<!--  end content-table  -->
		
		<!--  start paging..................................................... -->
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