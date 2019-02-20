<?php 
require_once("../db_connect.php"); 
require_once("functions.php");

$msg = "";

//get rewards name
function rewrds_nme($val)
{
 $sqlstr = "select * from rewards_list where pari_business = '".$val."'"; 
 $res = mysql_query($sqlstr) or die(mysql_error());
 $result = mysql_fetch_array($res);
 
 return $result['item_name'];
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


function go()
{
	var a = window.open('','','width=700,height=300');
	a.document.open("text/html");
	a.document.write(document.getElementById('foo').innerHTML);
	a.document.close();
	a.print();
}

</script>
<style type="text/css">
.pagination { height:20px; padding:0px 0px; line-height:19px; color:#fff; }
.pagination a{ background:url(images/pagging.gif) repeat-x 0 0; height:20px; float:left; padding:0 8px; border:solid 1px #d5d5d5; text-decoration: none; color:#fff; margin-left:5px;  }
.pagination a:hover { border-color:#373737; background:#373737; color:#fff; }
.pagination span{ float:left; margin-left:5px; padding-top:2px; }
.current_x { background:url(images/pagging.gif) repeat-x 0 0; height:20px; float:left; padding:0 8px; border:solid 1px #373737; text-decoration: none; color:#fff; margin-left:5px; background:#373737; }

</style>
</head>
<body> 
<?php require_once("header.php"); ?>
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="70%"><h1>Rewards Archiever</h1></td>
    <td width="15%">
	<input name="prnt" id="prnt" type="submit" class="button" value="Print" onClick="return go()"/>
	</td>
    <td width="15%">&nbsp;</td>
  </tr>
</table>
	</div>
	<!-- end page-heading -->


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
  <table width="100%" height="52" border="0" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="2" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="2" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td valign="top">
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
				<div id="foo" style='font-family:Arial; font-size:11px; background:none;'>
				<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />

				<table border="0" width="95%" cellpadding="0" cellspacing="0" id="product-table">
				
				<tr>
					<th width="115" class="table-header-repeat line-left minwidth-1"><a href="">User ID </a>	</th>
					<th width="297" class="table-header-repeat line-left minwidth-1"><a href="">Name</a></th>
					<th width="188" class="table-header-repeat line-left"><a href="">Rewards</a></th>
					<th width="217" class="table-header-repeat line-left"><a href="">Signature</a></th>
				  </tr>
                <?php
				$norw = 0;
				$sqlstr = "select * from rewrds_clsing where rewrds_cunt <=30";
				$res = mysql_query($sqlstr) or die(mysql_error());
				$clr = 1;
				while($result = mysql_fetch_array($res))
				{ 
				$rwclr = "class='alternate-row'";
			   if($clr>2) { $clr = 1; }
		  if($result['lft_pt']>='2500' && $result['rght_pt']>='2500' && $result['lft_pt']<'5000' && $result['rght_pt']<'5000')
		  {	
		   $norw = 1; ?> 
			<tr <?php if($clr==2) { echo $rwclr; } ?>>
			<td><?php echo $result['user_id']; ?></td>
			<td><?php echo get_membername($result['user_id']); ?></td>
			<td><?php echo rewrds_nme('2500'); ?></td>
			<td>&nbsp;</td>
			</tr>
    <?php }
	      if($result['lft_pt']>='5000' && $result['rght_pt']>='5000')
		  {
		   $norw = 1;
		    ?>
	      	<tr <?php if($clr==2) { echo $rwclr; } ?>>
			<td><?php echo $result['user_id']; ?></td>
			<td><?php echo get_membername($result['user_id']); ?></td>
			<td><?php echo rewrds_nme('5000'); ?></td>
			<td>&nbsp;</td>
			</tr>  
    <?php } } //end of while($result = mysql_fetch_array($res)) 
        
		$sqlstr_x = "select * from rewrds_clsing where rewrds_cunt >30";
		$res_x = mysql_query($sqlstr_x) or die(mysql_error());
		while($result_x = mysql_fetch_array($res_x))
		{ 
		if($result_x['lft_pt']>='50000' && $result_x['rght_pt']>='50000' && $result_x['lft_pt']<'250000' && $result_x['rght_pt']<'250000')
		{
		$norw = 1;
		?>
		<tr <?php if($clr==2) { echo $rwclr; } ?>>
		<td><?php echo $result_x['user_id']; ?></td>
		<td><?php echo get_membername($result_x['user_id']); ?></td>
		<td><?php echo rewrds_nme('50000'); ?></td>
		<td>&nbsp;</td>
		</tr>
  <?php }  
        if($result_x['lft_pt']>='250000' && $result_x['rght_pt']>='250000')
		{ 
		$norw = 1;
		?>
	  	<tr <?php if($clr==2) { echo $rwclr; } ?>>
		<td><?php echo $result_x['user_id']; ?></td>
		<td><?php echo get_membername($result_x['user_id']); ?></td>
		<td><?php echo rewrds_nme('250000'); ?></td>
		<td>&nbsp;</td>
		</tr>
  <?php } } ?>
	            <?php if($norw==0) { ?>  
				<tr><td colspan="5">No Clients..</td></tr>
				<?php } ?>
     			</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td>
			<?php
			$csv_hdr = "S.No., User ID, Name, Join Date, Mobile No., Rewards";
			?>
			<form name="nwfrm" method="post" action="export_excel.php" id="nwfrm" >
			<?php
			$sqlstr1 = "select * from rewrds_clsing where rewrds_cunt <=30";
			$res1 = mysql_query($sqlstr1) or die(mysql_error());
			$sno = 1;
			while($result1 = mysql_fetch_array($res1))
			{
			//get member details
			$mem = "select * from client_list where client_id = '".$result1['member_id']."'";
			$mem1 = mysql_query($mem) or die(mysql_error());
			$mem2 = mysql_fetch_array($mem1);
			 
			if($result1['lft_pt']>='2500' && $result1['rght_pt']>='2500' && $result1['lft_pt']<'5000' && $result1['rght_pt']<'5000')
			{
			   @$csv_output .= $sno . ", ";
			   $csv_output .= $mem2['user_id'] . ", ";
			   $csv_output .= $mem2['usr_name'] . ", ";
			   $csv_output .= $mem2['join_dte'] . ", ";
			   $csv_output .= $mem2['mobile'] . ", ";
			   $csv_output .= rewrds_nme('2500') . "\n ";
			   $sno++; 
			} 
			if($result1['lft_pt']>='5000' && $result1['rght_pt']>='5000')
			{
			   @$csv_output .= $sno . ", ";
			   $csv_output .= $mem2['user_id'] . ", ";
			   $csv_output .= $mem2['usr_name'] . ", ";
			   $csv_output .= $mem2['join_dte'] . ", ";
			   $csv_output .= $mem2['mobile'] . ", ";
			   $csv_output .= rewrds_nme('5000') . "\n ";
			   $sno++;
			}
			
			}//end of while($result1 = mysql_fetch_array($res1))  
			
			$sqlstr2 = "select * from rewrds_clsing where rewrds_cunt >30";
			$res2 = mysql_query($sqlstr2) or die(mysql_error());
			while($result2 = mysql_fetch_array($res2))
			{
			//get member details
			$mem = "select * from client_list where client_id = '".$result2['member_id']."'";
			$mem1 = mysql_query($mem) or die(mysql_error());
			$mem2 = mysql_fetch_array($mem1);
			
			  if($result2['lft_pt']>='50000' && $result2['rght_pt']>='50000' && $result2['lft_pt']<'250000' && $result2['rght_pt']<'250000')
			{
			   @$csv_output .= $sno . ", ";
			   $csv_output .= $mem2['user_id'] . ", ";
			   $csv_output .= $mem2['usr_name'] . ", ";
			   $csv_output .= $mem2['join_dte'] . ", ";
			   $csv_output .= $mem2['mobile'] . ", ";
			   $csv_output .= rewrds_nme('50000') . "\n ";
			   $sno++;
			}
			if($result2['lft_pt']>='250000' && $result2['rght_pt']>='250000')
			{
			   @$csv_output .= $sno . ", ";
			   $csv_output .= $mem2['user_id'] . ", ";
			   $csv_output .= $mem2['usr_name'] . ", ";
			   $csv_output .= $mem2['join_dte'] . ", ";
			   $csv_output .= $mem2['mobile'] . ", ";
			   $csv_output .= rewrds_nme('250000') . "\n ";
			   $sno++;
			}
			 
			}
			?>
			</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td>
			<input name="submit" id="submit" type="submit" value="Export table to CSV"/>
			<input type="hidden" value="<? echo $csv_hdr; ?>" name="csv_hdr" />
			<input type="hidden" value="<? echo $csv_output; ?>" name="csv_output" />
			</td>
			</tr>
			</table>
			
			</form>
			</td>
			</tr>
			</table>

				</div>
				
				<!--  end product-table................................... --> 
		</div>
		
			<!--  end content-table  -->
		
		<!--  start paging..................................................... -->
        </div>
	  <!--  end content-table-inner ............................................END  -->		</td>
		<td id="tbl-border-right"></td>
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