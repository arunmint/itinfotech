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
                    <td width="154" align="right">&nbsp;</td>
                    <td width="654"><h4>&nbsp;</h4></td>
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
					<table width="713" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #000033; font-size:11px;">
                          <tr>
                            <th height="7" colspan="5" align="left">&nbsp;</th>
                          </tr>
                          <tr>
                            <th align="left">&nbsp;</th>
                            <th height="34" align="left" class="tblelft">Join Date  :</th>
                            <th height="34" align="left"><?php echo date("d-M-Y",strtotime($result['join_dte'])); ?></th>
                            <th height="34" align="left" class="tblelft">Package :<span class="imprtant"></span> </th>
                            <th height="34" align="left"><?php echo $p2['pack_nme']."&nbsp;-&nbsp;".$p2['pack_price']; ?>							</th>                       </tr>
                          <tr>
                            <th width="27" align="left">&nbsp;</th>
                            <th width="178" height="34" align="left" class="tblelft">User ID :<span class="imprtant"></span> </th>
                            <th width="184" height="34" align="left" class="event"><?php echo $result['user_id']; ?></th>
                            <th width="134" height="34" align="left" class="tblelft">Client Name  :<span class="imprtant"></span> </th>
                            <th width="188" height="34" align="left"><?php echo $result['usr_name']; ?></th>
                          </tr>
                          <tr>
                            <th align="left" valign="top">&nbsp;</th>
                            <th height="34" align="left" valign="top" class="tblelft">Tag :<span class="imprtant"></span> </th>
                            <th height="34" align="left" class="event"><?php echo $result['client_tag']; ?></th>
                            <th height="34" align="left" class="tblelft">&nbsp;</th>
                            <th height="34" align="left">&nbsp;</th>
                          </tr>
                          <tr>
                            <th align="left" valign="top">&nbsp;</th>
                            <th height="34" align="left" valign="top" class="tblelft">Upline ID :<span class="imprtant"></span> </th>
                            <th height="34" align="left" class="event"><?php echo $result['upline_id']; ?></th>
                            <th height="34" align="left" class="tblelft">Upline Name : </th>
                            <th height="34" align="left"><?php echo getClntName($result['upline_id']); ?></th>
                          </tr>
                          <tr>
                            <th align="left" valign="top">&nbsp;</th>
                            <th height="34" align="left" valign="top" class="tblelft">Referrence ID :<span class="imprtant"></span> </th>
                            <th height="34" align="left" class="event"><?php echo $result['ref_id']; ?>                            </th>
                            <th height="34" align="left" class="tblelft">Referrence Name : </th>
                            <th height="34" align="left"><?php echo getClntName($result['ref_id']); ?></th>
                          </tr>
                          <tr>
                            <th align="left" valign="top">&nbsp;</th>
                            <th height="34" align="left" valign="top" class="tblelft">Address :<span class="imprtant"></span> </th>
                            <th height="34" align="left" class="event"><?php echo $result['address']; ?></th>
                            <th height="34" align="left" class="tblelft">Mobile No. :<span class="imprtant"></span> </th>
                            <th height="34" align="left"><?php echo $result['mobile']; ?></th>
                          </tr>
                          <tr>
                            <th align="left" valign="top">&nbsp;</th>
                            <th height="34" align="left" valign="top" class="tblelft">Email ID :<span class="imprtant"></span> </th>
                            <th height="34" align="left" class="event"><?php echo $result['email_id']; ?></th>
                            <th height="34" align="left" class="tblelft">Occupation : </th>
                            <th height="34" align="left"><?php echo $result['occupation']; ?></th>
                          </tr>
                          <tr>
                            <th align="left" valign="top">&nbsp;</th>
                            <th height="34" align="left" valign="top" class="tblelft">City :<span class="imprtant"></span> </th>
                            <th height="34" align="left" class="event"><?php echo $result['city']; ?></th>
                            <th height="34" align="left" class="tblelft">State :<span class="imprtant"></span> </th>
                            <th height="34" align="left"><?php echo $result['state']; ?></th>
                          </tr>
                          <tr>
                            <th align="left" valign="top">&nbsp;</th>
                            <th height="34" align="left" valign="top" class="tblelft">Country :<span class="imprtant"></span> </th>
                            <th height="34" align="left" class="event"><?php echo $result['country']; ?></th>
                            <th height="34" align="left" class="tblelft">Pan Card No. : </th>
                            <th height="34" align="left"><?php echo $result['pan_no']; ?></th>
                          </tr>
                          <tr>
                            <th align="left" valign="top">&nbsp;</th>
                            <th height="34" align="left" valign="top" class="tblelft">Father Name : </th>
                            <th height="34" align="left" class="event"><?php echo $result['usr_father']; ?></th>
                            <th height="34" align="left" class="tblelft">Nominee : </th>
                            <th height="34" align="left"><?php echo $result['usr_nominee']; ?></th>
                          </tr>
                          <tr>
                            <th align="left" valign="top">&nbsp;</th>
                            <th height="34" align="left" valign="top" class="tblelft">Relation of Nominee : </th>
                            <th height="34" align="left" class="event"><?php echo $result['nominee_relation']; ?></th>
                            <th height="34" align="left" class="tblelft">Nominee Age : </th>
                            <th height="34" align="left"><?php echo $result['nominee_age']; ?></th>
                          </tr>
                          <tr>
                            <th align="left" valign="top">&nbsp;</th>
                            <th height="34" align="left" valign="top" class="tblelft">Nominee Mobile No. : </th>
                            <th height="34" align="left" class="event"><?php echo $result['nominee_mble']; ?></th>
                            <th height="34" align="left" class="tblelft">Education : </th>
                            <th height="34" align="left"><?php echo $result['education']; ?></th>
                          </tr>
                          <tr>
                            <th align="left" valign="top">&nbsp;</th>
                            <th height="34" align="left" valign="top" class="tblelft">Payment Method : </th>
                            <th height="34" align="left" class="event"><?php echo $result['payment_mode']; ?></th>
                            <th height="34" align="left" class="tblelft">Bank Name : </th>
                            <th height="34" align="left"><?php echo $result['bnk_name']; ?></th>
                          </tr>
                          <tr>
                            <th align="left" valign="top">&nbsp;</th>
                            <th height="34" align="left" valign="top" class="tblelft">Bank Acct. No. </th>
                            <th height="34" align="left" class="event"><?php echo $result['bnk_acct_no']; ?></th>
                            <th height="34" align="left" class="tblelft">Branch : </th>
                            <th height="34" align="left"><?php echo $result['bnk_branch']; ?></th>
                          </tr>
                          <tr>
                            <th align="left" valign="top">&nbsp;</th>
                            <th height="34" align="left" valign="top" class="tblelft">Bank Phone No. : </th>
                            <th height="34" align="left" class="event"><?php echo $result['bnk_phone']; ?></th>
                            <th height="34" align="left" class="tblelft">IFSC Code : </th>
                            <th height="34" align="left"><?php echo $result['bnk_IFSC']; ?></th>
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
