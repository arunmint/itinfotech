<?php 
require_once("../db_connect.php"); 
require_once("../functions.php");
require_once("session_chk.php");

$msg = "";
$srtsql = "";
$srtlnk = "";
$pckge = "";
if(isset($_GET['page']))
{
  $page = $_GET['page'];
}

if(isset($_GET['pckge']))
{
  $pckge = $_GET['pckge'];
  $srtsql = "where package_id = '".$pckge."'";
  $srtlnk = "pckge=".$_GET['pckge']."&";

//pagination script
$tbl_name="client_list";		//your table name
// How many adjacent pages should be shown on each side?
$adjacents = 7;

/* 
   First get total number of rows in data table. 
   If you have a WHERE clause in your query, make sure you mirror it here.
*/
$query = "SELECT COUNT(*) as num FROM $tbl_name $srtsql";
$total_pages = mysql_fetch_array(mysql_query($query));
$total_pages = $total_pages[num];

/* Setup vars for query. */
$targetpage = "packge_wse_lst.php"; 	//your file name  (the name of this file)
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
			$pagination.= "<a href=\"$targetpage?".$srtlnk."page=$prev\">« previous</a>";
		else
			$pagination.= "<span class=\"disabled\">« previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current_x\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?".$srtlnk."page=$counter\">$counter</a>";					
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
						$pagination.= "<a href=\"$targetpage?".$srtlnk."page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?".$srtlnk."page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?".$srtlnk."page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?".$srtlnk."page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?".$srtlnk."page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current_x\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?".$srtlnk."page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?".$srtlnk."page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?".$srtlnk."page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?".$srtlnk."page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?".$srtlnk."page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current_x\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?".$srtlnk."page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?".$srtlnk."page=$next\">next »</a>";
		else
			$pagination.= "<span class=\"disabled\">next »</span>";
		$pagination.= "</div>\n";		
	}
	
} // if(isset($_GET['pckge']))	
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
.pagination { height:20px; padding:0px 0px; line-height:19px; color:#949494; }
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
		<form name="frm" id="frm" method="get" action="">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="32%"><h1>Package Wise - Client List </h1></td>
    <td width="34%" align="center">Packages :
		<select name="pckge" id="pckge">
		<option value="">-Select-</option>
		<?php
		$pkgelst = "select pack_id,pack_nme,pack_price from package_list";
		$pkgelst1 = mysql_query($pkgelst) or die(mysql_error());
		while($pkgelst2 = mysql_fetch_array($pkgelst1))
		{ ?>
		<option value="<?php echo $pkgelst2['pack_id']; ?>" <?php if($pkgelst2['pack_id']==$pckge) { echo "selected"; } ?>><?php echo $pkgelst2['pack_price']; ?></option>
		<?php } ?>
		</select>
		
		<input type="submit" name="submit" id="submit" value="Go" onclick="return chck_val();" />	</td>
    <td width="13%">&nbsp;</td>
    <td width="21%">
	<input name="prnt" id="prnt" type="submit" class="button" value="Print" onClick="return go()"/>
	</td>
  </tr>
</table>
        
        </form>
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
		<td colspan="2">
		
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">

			<div id="table-content">
				<!--  start product-table ..................................................................................... -->
				
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				
				<tr>
					<th width="148" class="table-header-repeat line-left minwidth-1"><a href="">User ID </a>	</th>
					<th width="141" class="table-header-repeat line-left minwidth-1"><a href="">Name</a></th>
					<th width="120" class="table-header-repeat line-left minwidth-1"><a href="">Ref. ID </a></th>
					<th width="141" class="table-header-repeat line-left minwidth-1"><a href="">Ref. Name</a></th>
					<th width="72" class="table-header-repeat line-left minwidth-1"><a href="">Join Date</a></th>
					<th width="131" class="table-header-repeat line-left"><a href="">Package</a></th>
					<th width="121" class="table-header-repeat line-left"><a href="">Mobile</a></th>
				</tr>
			   <?php
			   if(isset($_GET['pckge']))
			   {
				$sqlstr = "select * from client_list $srtsql  LIMIT $start, $limit";
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
				<tr <?php if($clr==2) { echo $rwclr; } ?>>
					<td><?php echo $result['user_id']; ?></td>
					<td><?php echo $result['usr_name']; ?></td>
					<td><?php echo $result['ref_id']; ?></td>
					<td><?php echo getClntName($result['ref_id']); ?></td>
					<td><?php echo date("d-M-Y",strtotime($result['join_dte'])); ?></td>
					<td><?php echo $result['package_amut']; ?></td>
					<td><?php echo $result['mobile']; ?></td>
				</tr>
				
				<?php $clr++; } } else { ?>
				<tr><td colspan="12">No Clients..</td></tr>
				
								
				<?php }
				} else { ?>
				<tr><td colspan="12">No Clients..</td></tr>
				<?php } ?>
				<tr>
				  <td colspan="12" align="center">
				  <?php 
				  if(isset($_GET['pckge']))
				  { echo $pagination; } ?></td>
				  </tr>
				</table>
				
				<!--  end product-table................................... -->
				<!--  start product-table ..................................................................................... -->
				<?php
				$csv_hdr = "S.No., User ID, Name, Ref. ID, Ref. Name, Join Date, Package, Mobile No.";
				?>
				<form name="nwfrm" method="post" action="export_excel.php" id="nwfrm" >
				<div id="foo" style='display:none; font-family:Arial; font-size:11px; background:none;'>
				<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				
				<tr>
				<th width="143" class="table-header-repeat line-left minwidth-1"><a href="">User ID</a>	</th>
				<th width="160" class="table-header-repeat line-left minwidth-1"><a href="">Name</a></th>
				<th width="137" class="table-header-repeat line-left minwidth-1"><a href="">Ref. ID </a></th>
				<th width="160" class="table-header-repeat line-left minwidth-1"><a href="">Ref. Name</a></th>
				<th width="140" class="table-header-repeat line-left minwidth-1"><a href="">Join Date</a></th>
				<th width="122" class="table-header-repeat line-left"><a href="">Package</a></th>
				<th width="122" class="table-header-repeat line-left"><a href="">Mobile</a></th>
				</tr>
			   <?php
				$sqlstr = "select * from client_list $srtsql";
				$res = mysql_query($sqlstr) or die(mysql_error());
				$numresult = mysql_num_rows($res);
				if($numresult!=0)
				{
				 $sno = 1;
				 while($result = mysql_fetch_array($res))
				 { 
				    //get package amount
					$pckge = "select pack_price from package_list where pack_id = '".$result['package_id']."'";
					$pckge1 = mysql_query($pckge) or die(mysql_error());
					$pckge2 = mysql_fetch_array($pckge1);
				 
				   @$csv_output .= $sno . ", ";
				   $csv_output .= $result['user_id'] . ", ";
				   $csv_output .= $result['usr_name'] . ", ";
				   $csv_output .= $result['ref_id'] . ", ";
				   $csv_output .= getClntName($result['ref_id']) . ", ";
				   //$csv_output .= date("d-M-Y",strtotime($result['join_dte'])) . ", ";
				   $csv_output .= $result['join_dte'] . ", ";
				   //$csv_output .= $result['package_amut'] . ", ";
				   $csv_output .= $pckge2['pack_price'] . ", ";
				   $csv_output .= $result['mobile'] . "\n ";
				   $sno++; } } else { ?>
				<tr><td colspan="9">No Clients..</td></tr>
				<?php } ?>
				</table>
				</div>
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
			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
			<!-- end actions-box........... -->
            <!--  start paging..................................................... --><!--  end paging................ -->
			
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