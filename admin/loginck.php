<?php
include_once("../db_connect.php");
echo $id=mysql_real_escape_string($_POST['usrnme']);
//$password=md5($_POST['pswd']);
echo $password=$_POST['pswd'];

if($id!=''&& $password!='')
{
  echo $query="select * from admin_users where User_name='".$id."' and Pass_word='".$password."'";
  $result=mysql_query($query)or die("Query Failed : ".mysql_error());
  $row=mysql_fetch_row($result);
  $num=mysql_num_rows($result);
 if($num==1)
 {
	$_SESSION['adminid']=$row[0];
	$_SESSION['adminname']=$row[1];
 ?>
 <script language="javascript">window.location="welcome.php";</script>
 <?php
 }
 else
 {
		?>
		<script language="javascript">window.location="welcome.php";</script><?php
	}
} else { ?>
		<script language="javascript">window.location="welcome.php";</script>
<?php }  ?>

