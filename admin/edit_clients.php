<?php
require_once("../db_connect.php");
require_once("session_chk.php");

$msg = "";

if(isset($_GET['msg']))
{
  $msg = $_GET['msg'];
}

if(isset($_GET['page']))
{
  $page = $_GET['page'];
}

if(isset($_GET['clntid']))
{
  $clntid = $_GET['clntid'];
}

//get client details
$sqlstr = "select * from client_list where client_id = '".$clntid."'";
$res = mysql_query($sqlstr) or die(mysql_error());
$result = mysql_fetch_array($res);
$joindte = explode("-",$result['join_dte']);
$packid_price = $result['package_id']."-".$result['package_amut'];
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
<!--<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>-->

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
<script type="text/javascript" src="js/general.js"></script>
</head>
<body> 
<?php require_once("header.php"); ?>
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Edit Client Details </h1>
		<div style="margin-left:450px;"><div id="refdiv"></div></div>
	</div>
	
	<div style="color:#515151; font-weight:bold; margin-left:890px;"><a href="javascript:history.go(-1);">&gt;&gt; Back</a></div>
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
          <form name="frm" id="frm" method="post" action="updte_client_dtls.php?clntid=<?php echo $_GET['clntid']; ?>&page=<?php echo $page; ?>">
		  <table border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr valign="top">
              <td><!--  start step-holder -->
                <!--  end step-holder -->
                <!-- start id-form -->
<table width="891" border="0" cellpadding="0" cellspacing="0"  id="id-form">
                    <tr>
                      <th>Join Date  : <span class="imprtant">*</span> </th>
                      <th><table border="0" cellpadding="0" cellspacing="0">
                          <tr  valign="top">
                            <td class="noheight">
							<select name="dd" class="styledselect-day" id="dd">
                                <option value="">dd</option>
                                <?php for($d=1; $d<=31; $d++) { ?>
								<option value="<?php echo $d; ?>" <?php if($joindte[2]==$d){ echo "selected"; } ?>><?php echo $d; ?></option>
								<?php } ?>
                              </select>                            </td>
                            <td><select name="mm" class="styledselect-month" id="mm">
                                <option value="">mmm</option>
                                <option value="1" <?php if($joindte[1]=='1'){ echo "selected"; } ?>>Jan</option>
                                <option value="2" <?php if($joindte[1]=='2'){ echo "selected"; } ?>>Feb</option>
                                <option value="3" <?php if($joindte[1]=='3'){ echo "selected"; } ?>>Mar</option>
                                <option value="4" <?php if($joindte[1]=='4'){ echo "selected"; } ?>>Apr</option>
                                <option value="5" <?php if($joindte[1]=='5'){ echo "selected"; } ?>>May</option>
                                <option value="6" <?php if($joindte[1]=='6'){ echo "selected"; } ?>>Jun</option>
                                <option value="7" <?php if($joindte[1]=='7'){ echo "selected"; } ?>>Jul</option>
                                <option value="8" <?php if($joindte[1]=='8'){ echo "selected"; } ?>>Aug</option>
                                <option value="9" <?php if($joindte[1]=='9'){ echo "selected"; } ?>>Sep</option>
                                <option value="10"<?php if($joindte[1]=='10'){ echo "selected"; } ?>>Oct</option>
                                <option value="11" <?php if($joindte[1]=='11'){ echo "selected"; } ?>>Nov</option>
                                <option value="12" <?php if($joindte[1]=='12'){ echo "selected"; } ?>>Dec</option>
                              </select>                            </td>
                            <td><select name="yy"  class="styledselect-year"  id="yy">
                                <option value="">yyyy</option>
                                <?php for($y=2000; $y<2040; $y++) { ?>
								<option value="<?php echo $y; ?>" <?php if($joindte[0]==$y){ echo "selected"; } ?>><?php echo $y; ?></option>
								<?php } ?>
                              </select>                            </td>
                            <td><a href=""  id="date-pick"><img src="images/forms/icon_calendar.jpg"   alt="" /></a></td>
                          </tr>
                        </table></th>
                      <th>Package : <span class="imprtant">*</span> </th>
                      <th>
					   <select name="pack_id" id="pack_id" class="styledselect_form_1" onchange="return selct_packge(this.value)">
                          <option value="">-Select-</option>
                          <?php
						  $pck = "select * from package_list where pack_status = 'Yes'";
						  $pck1 = mysql_query($pck) or die(mysql_error());
						  while($pck2 = mysql_fetch_array($pck1))
						  { 
						     $pckval = $pck2['pack_id']."-".$pck2['pack_price'];
						  ?>
						  <option value="<?php echo $pckval; ?>" <?php if($pckval==$packid_price){ echo "selected"; } ?>>
						  <?php echo $pck2['pack_nme']." - ".$pck2['pack_price'] ?></option>
						  <?php } ?>
                        </select>					  </th>
                    </tr>
                    <tr>
                      <th width="158">Pin Number : <span class="imprtant">*</span> </th>
                      <th width="378">
					  <div id="sample">
					  <input name="pin_no" type="text" class="inp-form" id="pin_no" value="<?php echo $result['pin_no']; ?>"/>
					  </div>					  </th>
                      <th width="231">User ID : <span class="imprtant">*</span> </th>
                      <th width="124">
					  <input name="usr_id" type="text" class="inp-form" id="usr_id" value="<?php echo $result['user_id']; ?>" /></th>
                    </tr>
                    <tr>
                      <th valign="top">Upline ID : <span class="imprtant">*</span> </th>
                      <th>
					  <input name="up_id" type="text" class="inp-form" id="up_id" onblur="return lst_tag(this.value);" value="<?php echo $result['upline_id']; ?>"/></th>
                      <th>Tag : <span class="imprtant">*</span> </th>
                      <th>
					  <div id="tagdiv">
						<select name='tag' id='tag' class='styledselect_form_1'>
						<option value=''>-Select-</option>
						<option value='Left' <?php if($result['client_tag']=='Left') { echo "selected"; } ?>>Left</option>
						<option value='Right' <?php if($result['client_tag']=='Right') { echo "selected"; } ?>>Right</option>
						</select>
					  </div></th>
                    </tr>
                    <tr>
                      <th valign="top">Referrence ID : <span class="imprtant">*</span> </th>
                      <th><input name="ref_id" type="text" class="inp-form" id="ref_id" onblur="return chk_refid(this.value);" value="<?php echo $result['ref_id']; ?>"/>                        </th>
                      <th>Client Name  : <span class="imprtant">*</span> </th>
                      <th><input name="clent_nme" type="text" class="inp-form" id="clent_nme" 
					  value="<?php echo $result['usr_name']; ?>"/></th>
                    </tr>
                    
                    <tr>
                      <th valign="top">Address : <span class="imprtant">*</span> </th>
                      <th><input name="address" type="text" class="inp-form" id="address" value="<?php echo $result['address']; ?>"/></th>
                      <th>Mobile No. : <span class="imprtant">*</span> </th>
                      <th><input name="mble_no" type="text" class="inp-form" id="mble_no" value="<?php echo $result['mobile']; ?>"/></th>
                    </tr>
                    <tr>
                      <th valign="top">Email ID : <span class="imprtant">*</span> </th>
                      <th><input name="email_id" type="text" class="inp-form" id="email_id"  value="<?php echo $result['email_id']; ?>"/></th>
                      <th>Occupation : </th>
                      <th><input name="occupation" type="text" class="inp-form" id="occupation" value="<?php echo $result['occupation']; ?>"/></th>
                    </tr>
                    <tr>
                      <th valign="top">City : <span class="imprtant">*</span> </th>
                      <th><input name="city" type="text" class="inp-form" id="city" value="<?php echo $result['city']; ?>"/></th>
                      <th>State : <span class="imprtant">*</span> </th>
                      <th><input name="state" type="text" class="inp-form" id="state" value="<?php echo $result['state']; ?>"/></th>
                    </tr>
                    <tr>
                      <th valign="top">Country : <span class="imprtant">*</span> </th>
                      <th><input name="country" type="text" class="inp-form" id="country" value="<?php echo $result['country']; ?>"/></th>
                      <th>Pan Card No. : </th>
                      <th><input name="pan_card_no" type="text" class="inp-form" id="pan_card_no" value="<?php echo $result['pan_no']; ?>"/></th>
                    </tr>
                    <tr>
                      <th valign="top">Father Name : </th>
                      <th><input name="fname" type="text" class="inp-form" id="fname" value="<?php echo $result['usr_father']; ?>"/></th>
                      <th>Nominee : </th>
                      <th><input name="nominee" type="text" class="inp-form" id="nominee" value="<?php echo $result['usr_nominee']; ?>"/></th>
                    </tr>
                    <tr>
                      <th valign="top">Relation of Nominee : </th>
                      <th><input name="rela_nomine" type="text" class="inp-form" id="rela_nomine" value="<?php echo $result['nominee_relation']; ?>"/></th>
                      <th>Nominee Age : </th>
                      <th><input name="nomie_age" type="text" class="inp-form" id="nomie_age" value="<?php echo $result['nominee_age']; ?>"/></th>
                    </tr>
                    <tr>
                      <th valign="top">Nominee Mobile No. : </th>
                      <th><input name="nomie_mble" type="text" class="inp-form" id="nomie_mble" value="<?php echo $result['nominee_mble']; ?>"/></th>
                      <th>Education : </th>
                      <th><input name="education" type="text" class="inp-form" id="education" value="<?php echo $result['education']; ?>"/></th>
                    </tr>
                    <tr>
                      <th valign="top">Payment Method : </th>
                      <th><input name="pay_method" type="text" class="inp-form" id="pay_method" value="<?php echo $result['payment_mode']; ?>"/></th>
                      <th>Bank Name : </th>
                      <th><input name="bank_nme" type="text" class="inp-form" id="bank_nme" value="<?php echo $result['bnk_name']; ?>"/></th>
                    </tr>
                    <tr>
                      <th valign="top">Bank Acct. No. </th>
                      <th><input name="bnk_acct" type="text" class="inp-form" id="bnk_acct" value="<?php echo $result['bnk_acct_no']; ?>"/></th>
                      <th>Branch : </th>
                      <th><input name="branch" type="text" class="inp-form" id="branch" value="<?php echo $result['bnk_branch']; ?>"/></th>
                    </tr>
                    <tr>
                      <th valign="top">Bank Phone No. : </th>
                      <th><input name="bnk_ph" type="text" class="inp-form" id="bnk_ph" value="<?php echo $result['bnk_phone']; ?>"/></th>
                      <th>IFSC Code : </th>
                      <th><input name="ifsc_code" type="text" class="inp-form" id="ifsc_code" value="<?php echo $result['bnk_IFSC']; ?>"/></th>
                    </tr>
                    

                    <tr>
                      <th>&nbsp;</th>
                      <th valign="top">					 </th>
                      <th></th>
                      <th><input name="button" type="submit" class="form-submit" value="" /></th>
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