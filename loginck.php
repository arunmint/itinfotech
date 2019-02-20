<?php
include_once("db_connect.php");
$id=mysql_real_escape_string($_POST['username']);
$password=$_POST['password'];
if($id!=''&& $password!='')
{
	$query="select * from client_list where user_id='".$id."' and usr_pswd 	='".$password."'";
	$result=mysql_query($query)or die("Query Failed : ".mysql_error());
	$row=mysql_fetch_row($result);
	$num=mysql_num_rows($result);
	if($num==1)
	{
		$_SESSION['userid']=$row[0];
		$_SESSION['usr_nme']=$row[7];
		$_SESSION['upline_id'] = $row[2];
	?>
		<script language="javascript">window.location="welcome.php";</script>
		<?php
	}
	else
	{
		?>
		<script language="javascript">window.location="login.php?err=1";</script><?php
	}
}
else
{?>
		<script language="javascript">window.location="login.php?err=2";</script>
        <?php }
?>

