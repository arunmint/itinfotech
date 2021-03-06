<?php 
require_once("../db_connect.php"); 
require_once("functions.php");


$msg = "";
$srtsql = "";
$pgelnk = "";
$clsing_dmy = date('Y-m-d');
$d = date('d');
$mm = date('m');
$yy = date('Y');

if(isset($_GET['d']) && isset($_GET['m']) && isset($_GET['y'])) 
{ 
  $clsing_dmy = $_GET['y']."-".$_GET['m']."-".$_GET['d']; 
  $d = $_GET['d'];
  $mm = $_GET['m'];
  $yy = $_GET['y'];
  $pgelnk = "d=".$d."&m=".$mm."&y=".$yy."&Submit=Go&";
}


//pagination script
$tbl_name="last_pp_detls";		//your table name
// How many adjacent pages should be shown on each side?
$adjacents = 7;

/* 
   First get total number of rows in data table. 
   If you have a WHERE clause in your query, make sure you mirror it here.
*/
$query = "SELECT COUNT(*) as num FROM $tbl_name where cmn_pair!= '0' and clsng_dt_id = '".$clsing_dmy."'";
$total_pages = mysql_fetch_array(mysql_query($query));
$total_pages = $total_pages[num];

/* Setup vars for query. */
$targetpage = "pair_payments.php"; 	//your file name  (the name of this file)
$limit = 50; 								//how many items to show per page
$page = $_GET['page'];
if($page) 
	$start = ($page - 1) * $limit; 			//first item to display on this page
else
	$start = 0;								//if no page var is given, set start to 0
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?".$pgelnk."page=$prev\"><strong><<</strong></a>";
		else
			$pagination.= "<span class=\"disabled\"><strong><<</strong></span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current_x\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?".$pgelnk."page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current_x\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?".$pgelnk."page=$counter\">$counter</a>";					
				}
				$pagination.= "<a href='' style='border:0px;'>...</a>";
				$pagination.= "<a href=\"$targetpage?".$pgelnk."page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?".$pgelnk."page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?".$pgelnk."page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?".$pgelnk."page=2\">2</a>";
				$pagination.= "<a href='' style='border:0px;'>...</a>";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current_x\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?".$pgelnk."page=$counter\">$counter</a>";					
				}
				$pagination.= "<a href='' style='border:0px;'>...</a>";
				$pagination.= "<a href=\"$targetpage?".$pgelnk."page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?".$pgelnk."page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?".$pgelnk."page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?".$pgelnk."page=2\">2</a>";
				$pagination.= "<a href='' style='border:0px;'>...</a>";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current_x\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?".$pgelnk."page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?".$pgelnk."page=$next\"><strong>>></strong></a>";
		else
			$pagination.= "<span class=\"disabled\"><strong>>></strong></span>";
		$pagination.= "</div>\n";		
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>ITINFOTECH - Administration Panel</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
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

<script type="text/javascript">
function chck_val()
{
  if(document.getElementById("dd").value=='') { alert('Select Date'); return false; }
  if(document.getElementById("mm").value=='') { alert('Select Month'); return false; }
  if(document.getElementById("yy").value=='') { alert('Select Year'); return false; }  
}
</script>
<!-- Printing Options -->
<script type="text/javascript">
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
    <td width="70%"><h1>Refferral Closing </h1></td>
    <td width="15%">&nbsp;</td>
  </tr>
</table>
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th width="20" rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th width="15" class="topleft"></th>
		<td width="696" id="tbl-border-top">&nbsp;</td>
		<td width="212" id="tbl-border-top">&nbsp;</td>
		<th width="15" class="topright"></th>
		<th width="20" rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td colspan="2" align="center">
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->

			<div id="table-content">
				<!--  start product-table ..................................................................................... -->
				<div id="foo" style='font-family:Arial; font-size:11px; background:none;'>
				<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
				<br />
				<form id="mainform" action="" method="get">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
				<td width="39%" height="29" align="right">Closing Date : </td>
				<td width="29%">
				<table border="0" cellpadding="0" cellspacing="0">
					  <tr  valign="top">
					<td>
					<select name="d" class="styledselect-day" id="d">
					<option value="">dd</option>
					<?php for($c=1; $c<=31; $c++) { 
   				    if(strlen($c)!=2) { $c = "0".$c; } ?>
					<option value="<?php echo $c; ?>" <?php if($c==$d) { echo "selected=selected"; } ?>><?php echo $c; ?></option>
					<?php } ?>
					</select>
					</td>
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
						<td>
						<select name="y"  class="styledselect-year"  id="y">
							<option value="">yyyy</option>
							<?php
							for($z=2012; $z<=2018; $z++)
							{ ?>
							<option value="<?php echo $z; ?>" <?php if($z==$yy) { echo "selected"; } ?>><?php echo $z; ?></option>
							<?php } ?>
						  </select>                            </td>
						<td><a href=""  id="date-pick"><img src="images/forms/icon_calendar.jpg"   alt="" /></a></td>
					  </tr>
				  </table>	  </td>
				<td width="32%"><input type="submit" name="Submit" value="Go" /></td>
				</tr>
				</table>
				</form>
				<br />
				<table border="0" width="95%" cellpadding="0" cellspacing="0" id="product-table">
				
				<tr>
					<th width="115" class="table-header-repeat line-left minwidth-1"><a href="">User ID </a>	</th>
					<th width="297" class="table-header-repeat line-left minwidth-1"><a href="">Name</a></th>
					<th width="188" class="table-header-repeat line-left"><a href="">Pair&nbsp;&nbsp;Points</a>&nbsp;</th>
					<th width="217" class="table-header-repeat line-left"><a href="">Amount</a>&nbsp;</th>
					<th width="217" class="table-header-repeat line-left"><a href="">Signature</a></th>
				  </tr>
				<?php
				$selstr = "select clsng_dt_id,membr_id,user_id,lft_pt,rght_pt,cmn_pair,par_pnt,par_amt from last_pp_detls where cmn_pair!= '0' and clsng_dt_id = '".$clsing_dmy."' LIMIT $start, $limit";
				$res = mysql_query($selstr) or die(mysql_error());
				$clr = 1;
				$num = mysql_num_rows($res);
				if($num!=0)
				{
				  while($result = mysql_fetch_array($res))
				  { 
				    $rwclr = "class='alternate-row'";
				    if($clr>2) { $clr = 1; }
					
					//$total_pair = ($result['cmn_pair']/100);
					//$total_amnt = (($result['cmn_pair']/100)*200);
				?>  
				<tr <?php if($clr==2) { echo $rwclr; } ?>>
				 <td><?php echo $result['user_id']; ?></td>
				 <td><?php echo get_membername($result['user_id']); ?></td>
				 <td><?php echo $result['par_pnt']; ?></td>
				 <td><?php echo $result['par_amt']; ?></td>
				 <td>&nbsp;</td>
				</tr>
		  <?php $clr++; } } else { ?>
				<tr><td colspan="5">No Clients..</td></tr>
				<?php } ?>
				<tr><td colspan="5"><?php echo $pagination; ?></td></tr>
     			</table>
				</div>
			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
			<!-- end actions-box........... -->
            <!--  start paging..................................................... -->
			
			<!--  end paging................ -->
			
			<div class="clear"></div>
		</div>
		<!--  end content-table-inner ............................................END  -->		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td colspan="2" id="tbl-border-bottom">&nbsp;</td>
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