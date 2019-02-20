<?php
require_once("../db_connect.php");
require_once("session_chk.php");

$curnt_dte = date('Y-m-d');

//Total Members
$ttal = "select count(*) from client_list";
$ttal1 = mysql_query($ttal) or die(mysql_error());
$ttal2 = mysql_fetch_array($ttal1);

//Today Registerations
$tdy_reg = "select count(*) from client_list where join_dte = '".date('Y-m-d')."'";
$tdy_reg1 = mysql_query($tdy_reg) or die(mysql_error());
$tdy_reg2 = mysql_fetch_array($tdy_reg1);

//Get Total of Monthly Payment reached count
$mnth_pymnt_count = 0;
$mnth_pymnt = "select client_id,user_id,nxt_pymnt_dte from client_list";
$mnth_pymnt1 = mysql_query($mnth_pymnt) or die(mysql_error());
while($mnth_pymnt2 = mysql_fetch_array($mnth_pymnt1))
{
	$d = "SELECT DATEDIFF( '".$curnt_dte."', '".$mnth_pymnt2['nxt_pymnt_dte']."' )";
	$d1 = mysql_query($d) or die(mysql_error());	
	$d2 = mysql_fetch_array($d1); 
  
	if($d2[0]>=30) { $mnth_pymnt_count+=1;  }
}

//Get Renewal Count
$renwal_count = 0;
$rnwl_lst = "select client_id,user_id,nxt_pymnt_dte from client_list";
$rnwl_lst1 = mysql_query($rnwl_lst) or die(mysql_error());
while($rnwl_lst2 = mysql_fetch_array($rnwl_lst1))
{
	$r = "SELECT DATEDIFF( '".$curnt_dte."', '".$rnwl_lst2['nxt_pymnt_dte']."' )";
	$r1 = mysql_query($r) or die(mysql_error());	
	$r2 = mysql_fetch_array($r1); 

	if($r2[0]>=300) { $renwal_count+=1;  }
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
		<h1>Welcome ITINFOTECH</h1>
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
		<td align="center">
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			<h3>GreatItinfotech India (P) Ltd </h3>
			<table width="58%" height="79" border="0" cellpadding="0" cellspacing="0">
			<tr>
			  <td width="28%" height="20">Total Members : </td>
			  <td width="72%" height="20">
			  <?php echo $ttal2[0]; ?></td>
			  </tr>
			<tr>
			  <td height="20">&nbsp;</td>
			  <td height="20">&nbsp;</td>
			  </tr>
			  
			<tr>
			  <td height="20">Today Registeration : </td>
			  <td height="20">
			  <?php
			  if($tdy_reg2[0]!=0) { echo $tdy_reg2[0]; } else { echo "Nil"; }
			  ?>			  </td>
			  </tr>
			<tr>
			  <td height="20">&nbsp;</td>
			  <td height="20">&nbsp;</td>
			  </tr>
			<tr>
			  <td height="20">Monthly Payment : </td>
			  <td height="20">
     <?php if($mnth_pymnt_count!=0) { echo " <a href='mnthly_pay_memlist.php'>".$mnth_pymnt_count."</a>"; } else { echo "Nil"; } ?>
</td>
			  </tr>
			<tr>
			  <td height="20">&nbsp;</td>
			  <td height="20">&nbsp;</td>
			  </tr>
			<tr>
			  <td height="20">Renewal</td>
			  <td height="20">
	<?php if($renwal_count!=0) { echo " <a href='renewal_membr_list.php'>".$renwal_count."</a>"; } else { echo "Nil"; } ?>
	          </td>
			  </tr>
			<tr>
			  <td height="20">&nbsp;</td>
			  <td height="20">&nbsp;</td>
			  </tr>
			<tr>
			<td height="20">

			</td>
			<td height="20">
			</td>
			</tr>
			</table>
			</div>
			<!--  end table-content  -->
	
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