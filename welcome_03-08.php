<?php 
require_once("db_connect.php");
require_once("session_chk.php");
require_once("functions.php");

 //get Client Details
 $sqlstr = "select * from client_list where client_id = '".$_SESSION['userid']."'";
 $res = mysql_query($sqlstr) or die(mysql_error());
 $result = mysql_fetch_array($res);
 
 //get package details
 $p = "select * from package_list where pack_id = '".$result['package_id']."'";
 $p1 = mysql_query($p) or die(msql_error());
 $p2 = mysql_fetch_array($p1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: GREAT IT INFOTECH INDIA (P) LTD ::</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style2 {color: #940D00}
-->
</style>
</head>

<body>
	<!--header start -->
<?php require_once("inner_header.php"); ?>
    	<!--header end -->
    <!--Special In 2007 start -->
    	
    <!--Special In 2007 end -->
    <!--not body part start -->
    	<div id="botBody">
        	<!--member start --><!--member end -->
            <!--latest start -->
            <!--latest end -->
            <!--more service start -->
            <!--more service end -->
            <!--testimonial start -->
            <!--testimonial end -->
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              
              <tr>
                <td width="10%">&nbsp;</td>
                <td colspan="2"><table width="808" height="30" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="154" align="right"><img src="images/about.png" width="50" height="37" /></td>
                    <td width="654"><h4><span class="footer">Welcome</span> <?php echo $result['usr_name']; ?>,</h4></td>
                  </tr>
                </table></td>
              </tr>
              
              
              <tr>
                <td colspan="2" align="center" valign="top">
				<?php require_once("leftmenu.php"); ?>
				</td>
                <td width="81%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center">
					<!--  Client Details Table -->
					<table width="91%" border="0" style="border:1px solid #550000;">
                          <tr>
                            <td height="25" colspan="5" valign="middle" style="color:#003366; font-size:14px; font-weight:bold;"><span class="style2">Client Details</span></td>
                          </tr>
                          
                          <tr>
                            <td width="6%" valign="middle">&nbsp;</td>
                            <td width="20%" height="34" valign="middle" style="color:#003366;">Join Date : </td>
                            <td width="20%" height="34" valign="middle"><?php echo date("d-M-Y",strtotime($result['join_dte'])); ?></td>
                            <td width="22%" valign="middle"><span style="color:#003366;">User ID : </span></td>
                            <td width="32%" valign="middle"><?php echo $result['user_id']; ?></td>
                          </tr>
                          <tr>
                            <td valign="middle">&nbsp;</td>
                            <td height="34" valign="middle" style="color:#003366;">Upline ID : </td>
                            <td height="34" valign="middle"><?php echo $result['upline_id']; ?></td>
                            <td height="34" valign="middle"><span style="color:#003366;">User Name : </span></td>
                            <td valign="middle"><?php echo $result['usr_name']; ?></td>
                          </tr>
                          <tr>
                            <td valign="middle">&nbsp;</td>
                            <td height="34" valign="middle" style="color:#003366;">Upline Name : </td>
                            <td height="34" valign="middle"><?php echo getClntName($result['upline_id']); ?></td>
                            <td height="34" valign="middle"><span style="color:#003366;">Email Id : </span></td>
                            <td valign="middle"><?php echo $result['email_id']; ?></td>
                          </tr>
                          <tr>
                            <td valign="middle">&nbsp;</td>
                            <td height="34" valign="middle" style="color:#003366;">Refference ID : </td>
                            <td height="34" valign="middle"><?php echo $result['ref_id']; ?></td>
                            <td height="34" valign="middle"><span style="color:#003366;">Refference Name : </span></td>
                            <td valign="middle"><?php echo getClntName($result['ref_id']); ?></td>
                          </tr>
                          <tr>
                            <td valign="middle">&nbsp;</td>
                            <td height="34" valign="middle" style="color:#003366;">Mobile No. : </td>
                            <td height="34" valign="middle"><?php echo $result['mobile']; ?></td>
                            <td height="34" valign="middle"><span style="color:#003366;">Packages : </span></td>
                            <td valign="middle"><?php echo $p2['pack_nme']."&nbsp;-&nbsp;".$p2['pack_price']; ?></td>
                          </tr>
                      </table>
					<!-- End of Client Details Table -->  
					<br /><br />
					<table width="94%" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #550000;">
                          
                          <tr><td height="5" colspan="6" align="center" valign="middle" bgcolor="#550000"></td>
                          </tr>
                          <tr>
                            <td colspan="2" align="center" valign="middle" bgcolor="#550000"><span class="style1">Package</span></td>
                            <td width="16%" height="34" align="center" valign="middle" bgcolor="#550000"><span class="style1">Left Member </span></td>
                            <td width="18%" height="34" align="center" valign="middle" bgcolor="#550000"><span class="style1">Left Point </span></td>
                            <td width="18%" align="center" valign="middle" bgcolor="#550000"><span class="style1">Right Member </span></td>
                            <td width="19%" align="center" valign="middle" bgcolor="#550000"><span class="style1">Right Point </span></td>
                          </tr>
						  <?php
						  $pck = "select * from package_list";
						  $pck1 = mysql_query($pck) or die(mysql_error());
						  $totlftmem = 0;
						  $totrghtmem = 0;
						  $totlftpnt = 0;
						  $totrghtpnt = 0;
						  while($pck2 = mysql_fetch_array($pck1))
						  { 
						    //get left & right member count
							$lftmem = get_Pckge_LeftCount($result['user_id'],$pck2['pack_id'],'Left');
							//get_cunt_pckgwse($result['user_id'],'Left',$pck2['pack_id']);
							$rgt = get_Pckge_LeftCount($result['user_id'],$pck2['pack_id'],'Right');
							//get left & right member point
							$lftpnt = ($lftmem * $pck2['pack_point']);
							$rgtpnt = ($rgt * $pck2['pack_point']);
							//get total member ccount
							$totlftmem+=$lftmem; 
							$totrghtmem+=$rgt;
							//get total point count
							$totlftpnt+=$lftpnt;
							$totrghtpnt+=$rgtpnt;
						  ?>
                          <tr>
                            <td width="3%" height="34" align="center" valign="middle">&nbsp;</td>
                            <td width="26%" align="left" valign="middle" style="color:#003366;"><?php echo $pck2['pack_nme']."-".$pck2['pack_price']; ?></td>
                            <td width="16%" height="34" align="center" valign="middle"><?php echo $lftmem; ?></td>
                            <td width="18%" height="34" align="center" valign="middle"><?php echo $lftpnt; ?></td>
                            <td width="18%" height="34" align="center" valign="middle"><?php echo $rgt; ?></td>
                            <td width="19%" height="34" align="center" valign="middle"><?php echo $rgtpnt; ?></td>
                          </tr>
						 <?php } 
						 
						 //get total last user point from last_pp_detls table
					 $get_lppt = "select lft_pt,rght_pt,cmn_pair from last_pp_detls where membr_id = '".$_SESSION['userid']."'";
					 $get_lppt1 = mysql_query($get_lppt) or die(mysql_error());
					 $tot_last_pair = 0;
					 $get_lppt2 = mysql_fetch_array($get_lppt1);
					 while($get_lppt2 = mysql_fetch_array($get_lppt1))
					 {
					    $tot_last_pair+=$get_lppt2['cmn_pair'];
					 }
                        $tot_last_pair = "79400";

						 //get current Point
						 $get_cur_lft_pnt = ($totlftpnt - $tot_last_pair);
						 $get_cur_rght_pnt = ($totrghtpnt - $tot_last_pair);
						 
						 //get common pair point
						 $cmn_pair_pnt = $get_cur_lft_pnt;
						 if($get_cur_lft_pnt>$get_cur_rght_pnt) { $cmn_pair_pnt = $get_cur_rght_pnt; }
						 					 
						 
						 //get remaining Pair
						 $reming_lft_pair = ($get_cur_lft_pnt - $cmn_pair_pnt);
						 $reming_rght_pair = ($get_cur_rght_pnt - $cmn_pair_pnt);
						 ?> 
						 <tr>
                            <td width="3%" height="37" align="center" valign="middle">&nbsp;</td>
                            <td width="26%" align="left" valign="middle" style="color:#003366;"><strong>Total </strong></td>
                            <td width="16%" height="37" align="center" valign="middle" ><?php echo $totlftmem; ?></td>
                            <td width="18%" height="37" align="center" valign="middle"><?php echo $totlftpnt; ?></td>
                            <td width="18%" height="37" align="center" valign="middle"><?php echo $totrghtmem; ?></td>
                            <td width="19%" height="37" align="center" valign="middle"><?php echo $totrghtpnt; ?></td>
                      </tr>
						 <tr>
						   <td height="34" align="center" valign="middle">&nbsp;</td>
						   <td align="left" valign="middle" style="color:#003366;"><strong>Last Used Point </strong></td>
						   <td height="34" align="center" valign="middle">-</td>
						   <td height="34" align="center" valign="middle"><?php echo $tot_last_pair;  ?></td>
						   <td height="34" align="center" valign="middle">-</td>
						   <td height="34" align="center" valign="middle"><?php echo $tot_last_pair; ?></td>
				      </tr>
						 <!--<tr>
						   <td height="34" align="center" valign="middle">&nbsp;</td>
						   <td align="left" valign="middle" style="color:#003366;"><strong>Current Point </strong></td>
						   <td height="34" align="center" valign="middle">-</td>
						   <td height="34" align="center" valign="middle"><?php //echo $get_cur_lft_pnt; ?></td>
						   <td height="34" align="center" valign="middle">-</td>
						   <td height="34" align="center" valign="middle"><?php //echo $get_cur_rght_pnt; ?></td>
				      </tr>-->
						 <tr>
						   <td height="34" align="center" valign="middle">&nbsp;</td>
						   <td align="left" valign="middle" style="color:#003366;"><strong>Current Pair </strong></td>
						   <td height="34" align="center" valign="middle">-</td>
						   <td height="34" align="center" valign="middle"><?php echo $cmn_pair_pnt; ?></td>
						   <td height="34" align="center" valign="middle">-</td>
						   <td height="34" align="center" valign="middle"><?php echo $cmn_pair_pnt; ?></td>
				      </tr>
						 <tr>
						   <td height="34" align="center" valign="middle">&nbsp;</td>
						   <td align="left" valign="middle" style="color:#003366;"><strong>New Pair </strong></td>
						   <td height="34" align="center" valign="middle">-</td>
						   <td height="34" align="center" valign="middle"><?php echo $reming_lft_pair; ?></td>
						   <td height="34" align="center" valign="middle">-</td>
						   <td height="34" align="center" valign="middle"><?php echo $reming_rght_pair; ?></td>
				      </tr>
						 <tr>
						   <td height="34" align="center" valign="middle">&nbsp;</td>
						   <td align="left" valign="middle" style="color:#003366;"><strong>Current Reward Status </strong></td>
						   <td height="34" align="center" valign="middle">-</td>
						   <td height="34" align="center" valign="middle">-</td>
						   <td height="34" align="center" valign="middle">-</td>
						   <td height="34" align="center" valign="middle">-</td>
				      </tr>
                      </table>
					</td>
                  </tr>
                </table></td>
              </tr>
              
              <tr>
                <td colspan="2">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table>
            <br class="spacer" />
</div>
    <!--bot bgody part end -->
    <!-- hightlight part start -->
<div id="highlight"></div>
		
		<br class="spacer" />
    <!--hightlight part end -->
    <!--100% div -->
<?php require_once("footer.php"); ?>
    <!--100% footer end -->
</body>
</html>
