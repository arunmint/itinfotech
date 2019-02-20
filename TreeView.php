<?php 
require_once("db_connect.php");
require_once("session_chk.php");
require_once("functions.php");

//get client details
$clnt = "select client_id,upline_id,ref_id,client_tag,user_id from client_list where client_id = '".$_SESSION['userid']."' ";
$clnt1 = mysql_query($clnt) or die(mysql_error());
$clnt2 = mysql_fetch_array($clnt1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: GREAT IT INFOTECH INDIA (P) LTD ::</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style2 {color: #FFFFFF}
-->
* {font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; }
a { color:#550000; font-family:arial; font-size:12px; }
a:hover {background:#D6D7A0; text-decoration:none;} /*BG color is a must for IE6*/
a.tooltip span {display:none; padding:2px 3px; margin-left:8px; width:430px;}
a.tooltip:hover span{display:block; position:absolute; border:1px solid #cccccc; background:#F2F2F2; color:#6c6c6c;}
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
        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="10%">&nbsp;</td>
                <td colspan="2"><table width="100%" height="30" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="154" align="right">&nbsp;</td>
                    <td width="654" align="center" style="color:#FF0000; font-size:12px;">
					<?php if(isset($_GET['msg']) && $_GET['msg']=='ups') { echo "Updated Successfully.."; } ?>					</td>
                  </tr>
                </table></td>
              </tr>
              
              
              <tr>
                <td colspan="3" align="center" valign="top">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center">
				    <table width="994" border="0" align="left" cellpadding="0" cellspacing="0">
                <tr>
              <td colspan="4" align="center">&nbsp;</td>
              <td colspan="4" align="center">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="8" align="center"></td>
            </tr>
			<?php
			$clnt_id = "WHERE upline_id = '".$_SESSION['upline_id']."'  and client_tag = '".$clnt2['client_tag']."'";
			
			if(isset($_GET['clnt_id']))
			{
			 $clnt_id = "WHERE upline_id ='".$_GET['clnt_id']."' and client_tag = '".$_GET['tag']."'";
			}
			$t = "select * from client_list $clnt_id";
			$t1 = mysql_query($t) or die(mysql_error());
			$t2 = mysql_fetch_array($t1);
			$usr_id = $t2['user_id'];
			?>
            <tr>
              <td colspan="4" align="center"><span id="Label16" style="font-size:Small;">Total Left : 
			  <?php 
			    echo get_LeftCount($usr_id);
			  ?></span></td>
              <td colspan="4" align="center"><span id="Label17" style="font-size:Small;">Total Right : 
			  <?php 
			     echo get_RightCount($usr_id);
			  ?></span><br/>
              </td>
            </tr>
            <tr>
              <td width="50%" colspan="8" align="center"><div style="margin:0 auto; width:300px;" align="center">
                  <div id="txtmem1" style="position:absolute;" onMouseOut="zxY()"></div>
                </div>
               <?php
			   $v="<a href='#' class='tooltip'><img src='tree_img/".packge_dtls($t2['package_id'])."'/>";
               $v.="<br/>";
			   $v.=$t2['user_id']; 
			   $v.="<br>";
			   $v.=$t2['usr_name'];
			   echo $v;
			   ?>
<span>
<?php $clntdlts = get_Clntdtls($t2['user_id']); ?>
<table width="400" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="12" height="30">&nbsp;</td>
<td width="119" height="30">Name : </td>
<td width="269" height="30"><?php echo $clntdlts['usr_name']; ?></td>
</tr>
<tr>
<td height="30">&nbsp;</td>
<td height="30"><strong>Joining Date : </strong></td>
<td height="30"><?php echo date("d-M-Y",strtotime($clntdlts['join_dte'])); ?></td>
</tr>
<tr>
<td height="30">&nbsp;</td>
<td height="30"><strong>Package :</strong></td>
<td height="30"><?php echo $clntdlts['package_amut']; ?></td>
</tr>
<tr>
<td height="30">&nbsp;</td>
<td height="30"><strong>Member Left : </strong></td>
<td height="30"><?php echo get_LeftCount($clntdlts['user_id']); ?></td>
</tr>
<tr>
<td height="30">&nbsp;</td>
<td height="30"><strong>Member Right : </strong></td>
<td height="30"><?php echo get_RightCount($clntdlts['user_id']); ?></td>
</tr>
<tr>
<td height="23" valign="top">&nbsp;</td>
<td height="23" colspan="2" valign="top">
<table width="100%" border="0">
  <tr>
    <td align="center">Packages</td>
    <td align="center">Left</td>
    <td align="center">Points</td>
    <td align="center">Right</td>
    <td align="center">Points</td>
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
 	  $lftmem = get_Pckge_LeftCount($clntdlts['user_id'],$pck2['pack_id'],'Left');
	  $rgt = get_Pckge_LeftCount($clntdlts['user_id'],$pck2['pack_id'],'Right');
	
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
    <td height="25" align="center"><?php echo $pck2['pack_price']; ?></td>
    <td height="25" align="center"><?php echo $lftmem; ?></td>
    <td height="25" align="center"><?php echo $lftpnt; ?></td>
    <td height="25" align="center"><?php echo $rgt; ?></td>
    <td height="25" align="center"><?php echo $rgtpnt; ?></td>
  </tr>
<?php } ?>
  <tr>
    <td height="25" align="center"><strong>Total</strong></td>
    <td height="25" align="center"><?php echo $totlftmem; ?></td>
    <td height="25" align="center"><?php echo $totlftpnt; ?></td>
    <td height="25" align="center"><?php echo $totrghtmem; ?></td>
    <td height="25" align="center"><?php echo $totrghtpnt; ?></td>
  </tr>
</table>
</td>
</tr>
</table>
</span>

</a>
			  </td>
            </tr>
            <tr>
              <td colspan="8" align="center"><img src="tree_img/line.png" width="486" height="59" id="Image1" style="height:63px;width:509px;border-width:0px;" />              </td>
            </tr>
            <tr>
              <td colspan="4" align="center" width="50%" valign="top"><div style="margin:0 auto; width:300px;" align="center">
                  <div id="txtmem2" style="position:absolute;" onMouseOut="zxY()"></div>
                </div>
                <br/>
                <?php
				$t3 = "select * from client_list where upline_id = '".$t2['user_id']."' and client_tag = 'Left'";
				$t4 = mysql_query($t3) or die(mysql_error());
				$t5 = mysql_fetch_array($t4);
				echo clnt_dtls_tre($t5['client_id']);
				?>
              </td>
              <td colspan="4" align="center" valign="top"><div style="margin:0 auto; width:300px;" align="center">
                  <div id="txtmem3" style="position:absolute;" onMouseOut="zxY()"></div>
                </div>
                <br/>
                <?php
				$t6 = "select * from client_list where upline_id = '".$t2['user_id']."' and client_tag = 'Right'";
				$t7 = mysql_query($t6) or die(mysql_error());
				$t8 = mysql_fetch_array($t7);
				echo clnt_dtls_tre($t8['client_id']);
				?>
			  </td>
            </tr>
            <tr>
              <td colspan="4" align="center" width="50%"><img src="tree_img/line2.png" width="245" height="30" id="Image2" style="width:245px;border-width:0px;" />              </td>
              <td colspan="4" align="center"><img src="tree_img/line2.png" width="245" height="30" id="Image2" style="width:245px;border-width:0px;" /></td>
            </tr>
            <tr>
              <td colspan="2" align="center" valign="top" width="25%"><div style="margin:0 auto; width:235px;" align="center">
                  <div id="txtmem4" style="position:absolute;" onMouseOut="zxY()"></div>
                </div>
               <?php
				$t9 = "select * from client_list where upline_id = '".$t5['user_id']."' and client_tag = 'Left'";
				$t10 = mysql_query($t9) or die(mysql_error());
				$t11 = mysql_fetch_array($t10);
				//echo clnt_dtls_tre($t11['client_id']);
				echo clnt_dtls_tre($t11['client_id']);
			   ?>
              </td>
              <td colspan="2" align="center" valign="top" width="25%"><div style="margin:0 auto; width:235px;" align="center">
                  <div id="txtmem5" style="position:absolute;" onMouseOut="zxY()"></div>
                </div>
                
                <?php
				$t12 = "select * from client_list where upline_id = '".$t5['user_id']."' and client_tag = 'Right'";
				$t13 = mysql_query($t12) or die(mysql_error());
				$t14 = mysql_fetch_array($t13);
				//echo $t14['usr_name'];
				echo clnt_dtls_tre($t14['client_id']);
				?>
			  </td>
              <td colspan="2" align="center" valign="top" width="25%"><div style="margin:0 auto; width:235px;" align="center">
                  <div id="txtmem6" style="position:absolute;" onMouseOut="zxY()"></div>
                </div>
                
			  <?php
				$t15 = "select * from client_list where upline_id = '".$t8['user_id']."' and client_tag = 'Left'";
				$t16 = mysql_query($t15) or die(mysql_error());
				$t17 = mysql_fetch_array($t16);
				//echo $t17['usr_name'];
				echo clnt_dtls_tre($t17['client_id']);
				?>
			  </td>
              <td colspan="2" align="center" valign="top" width="25%"><div style="margin:0 auto; width:235px;" align="center">
                  <div id="txtmem7" style="position:absolute;" onMouseOut="zxY()"></div>
                </div>
                
			  <?php
				$t18 = "select * from client_list where upline_id = '".$t8['user_id']."' and client_tag = 'Right'";
				$t19 = mysql_query($t18) or die(mysql_error());
				$t20 = mysql_fetch_array($t19);
				//echo $t20['usr_name'];
				echo clnt_dtls_tre($t20['client_id']);
				?>
			  </td>
            </tr>
            <tr>
              <td colspan="2" align="center"><img src="tree_img/line3.png" width="120" height="15" id="Image4" style="width:120px;border-width:0px;" />              </td>
              <td colspan="2" align="center"><img src="tree_img/line3.png" width="120" height="15" id="Image4" style="width:120px;border-width:0px;" /></td>
              <td colspan="2" align="center"><img src="tree_img/line3.png" width="120" height="15" id="Image4" style="width:120px;border-width:0px;" /></td>
              <td colspan="2" valign="top" align="center"><img src="tree_img/line3.png" width="120" height="15" id="Image7" style="width:120px;border-width:0px;" />              </td>
            </tr>
            <tr>
              <td align="center" valign="top"><div style="margin:0 auto; width:120px;" align="center">
                  <div id="txtmem8" style="position:absolute;" onMouseOut="zxY()"></div>
                </div>
				<?php
					$t21 = "select * from client_list where upline_id = '".$t11['user_id']."' and client_tag = 'Left'";
					$t22 = mysql_query($t21) or die(mysql_error());
					$t23 = mysql_fetch_array($t22);
					//echo $t23['usr_name'];
					echo clnt_dtls_tre($t23['client_id']);
				?>
			  </td>
              <td align="center" valign="top"><div style="margin:0 auto; width:120px;" align="center">
                  <div id="txtmem9" style="position:absolute;" onMouseOut="zxY()"></div>
                </div>
                <?php
					$t24 = "select * from client_list where upline_id = '".$t11['user_id']."' and client_tag = 'Right'";
					$t25 = mysql_query($t24) or die(mysql_error());
					$t26 = mysql_fetch_array($t25);
					//echo $t26['usr_name'];
					echo clnt_dtls_tre($t26['client_id']);
				?>
			  </td>
              <td align="center" valign="top">
              <div style="margin:0 auto; width:120px;" align="center">
                <div id="txtmem10" style="position:absolute;" onMouseOut="zxY()"></div>
              </div>
				<?php
				$t27 = "select * from client_list where upline_id = '".$t14['user_id']."' and client_tag = 'Left'";
				$t28 = mysql_query($t27) or die(mysql_error());
				$t29 = mysql_fetch_array($t28);
				//echo $t29['usr_name'];
				echo clnt_dtls_tre($t29['client_id']);
				?>
			  </td>
            
            <td align="center" valign="top"><div style="margin:0 auto; width:120px;" align="center">
                  <div id="txtmem11" style="position:absolute;" onMouseOut="zxY()"></div>
                </div>
			  <?php
				$t30 = "select * from client_list where upline_id = '".$t14['user_id']."' and client_tag = 'Right'";
				$t31 = mysql_query($t30) or die(mysql_error());
				$t32 = mysql_fetch_array($t31);
				//echo $t32['usr_name'];
				echo clnt_dtls_tre($t32['client_id']);
				?>
			  </td>
              <td align="center" valign="top"><div style="margin:0 auto; width:120px;" align="center">
                  <div id="txtmem12" style="position:absolute;" onMouseOut="zxY()"></div>
                </div>
			  <?php
				$t33 = "select * from client_list where upline_id = '".$t17['user_id']."' and client_tag = 'Left'";
				$t34 = mysql_query($t33) or die(mysql_error());
				$t35 = mysql_fetch_array($t34);
				//echo $t35['usr_name'];
				echo clnt_dtls_tre($t35['client_id']);
				?>
			  </td>
              <td align="center" valign="top"><div style="margin:0 auto; width:120px;" align="center">
                  <div id="txtmem13" style="position:absolute;" onMouseOut="zxY()"></div>
                </div>
			  <?php
				$t35 = "select * from client_list where upline_id = '".$t17['user_id']."' and client_tag = 'Right'";
				$t36 = mysql_query($t35) or die(mysql_error());
				$t37 = mysql_fetch_array($t36);
				//echo $t37['usr_name'];
				echo clnt_dtls_tre($t37['client_id']);
				?>
			  </td>

              <td align="center" valign="top"><div style="margin:0 auto; width:120px;" align="center">
                  <div id="txtmem14" style="position:absolute;" onMouseOut="zxY()"></div>
                </div>
			   <?php
				$t38 = "select * from client_list where upline_id = '".$t20['user_id']."' and client_tag = 'Left'";
				$t39 = mysql_query($t38) or die(mysql_error());
				$t40 = mysql_fetch_array($t39);
				//echo $t40['usr_name'];
				echo clnt_dtls_tre($t40['client_id']);
				?>
			  </td>
              <td align="center" valign="top"><div style="margin:0 auto; width:120px;" align="center">
                  <div id="txtmem15" style="position:absolute;" onMouseOut="zxY()"></div>
                </div>
			  <?php
				$t41 = "select * from client_list where upline_id = '".$t20['user_id']."' and client_tag = 'Right'";
				$t42 = mysql_query($t41) or die(mysql_error());
				$t43 = mysql_fetch_array($t42);
				//echo $t43['usr_name'];
				echo clnt_dtls_tre($t43['client_id']);
				?>
			  </td>
            </tr>
            <tr>
              <td align="center" valign="top"></td>
              <td align="center" valign="top"></td>
              <td align="center" valign="top">
               
            </td>
            
            <td align="center" valign="top"></td>
              <td align="center" valign="top"></td>
              <td align="center" valign="top"></td>
              <td align="center" valign="top"></td>
              <td align="center" valign="top"></td>
            </tr>
            <tr>
              <td valign="top" colspan="8">&nbsp;</td>
            </tr>
           
            <tr>
              <td align="center" valign="top">&nbsp;</td>
              <td align="center" valign="top">&nbsp;</td>
              <td align="center" valign="top">&nbsp;</td>
              <td align="center" valign="top">&nbsp;</td>
              <td align="center" valign="top">&nbsp;</td>
              <td align="center" valign="top">&nbsp;</td>
              <td align="center" valign="top">&nbsp;</td>
              <td align="center" valign="top">&nbsp;</td>
            </tr>
          </table>
					</td>
                  </tr>
                                </table></td>
              </tr>
              
              <tr>
                <td colspan="2">&nbsp;</td>
                <td width="81%">&nbsp;</td>
              </tr>
            </table>
			<br />
			<table width="18%" height="114" border="0" align="left" cellpadding="0" cellspacing="0" style="border:1px solid #993300;">
                     <tr>
                       <td colspan="2" align="center" bgcolor="#993300" style="font-family:arial; font-size:14px; font-weight:bold; color:#993300;" ><span class="style2">Package List </span></td>
                     </tr>
                     <tr>
                       <td width="52%" align="center">&nbsp;</td>
                       <td width="48%" align="center">&nbsp;</td>
                     </tr>
					 <?php
					 $p = "select * from package_list";
					 $p1 = mysql_query($p) or die(mysql_error());
					 while($p2 = mysql_fetch_array($p1))
					 { ?>
                     <tr>
                       <td align="center" valign="middle" style="padding:5px;"><img src="tree_img/<?php echo $p2['pack_imag']; ?>" border="0"></td>
                       <td align="left" valign="middle"><?php echo $p2['pack_nme']; ?></td>
                     </tr>
					 <?php } ?>
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
