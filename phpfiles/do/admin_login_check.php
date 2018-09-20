<?php
session_start();
include_once("../../class/dbc_class.php");
$dbc=new Dbc;
if(isset($_POST['login']))
{
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	
	$sql="select * from admin where username='$username' and password='$password' and status='1'";
	$result=$dbc->query($sql) or die(mysql_error());
	$row=$dbc->fetch($result);
	if($dbc->getNumRows($result)==1)
	{
		$_SESSION['adminusername']=$row['username'];
			 
		 echo "<script>window.location='../../administrator.php'</script>";
	}
	else
	{
		echo "<script>alert('Login Invalid')</script>";
		echo "<script>window.location='../../@dmin_m@rgin/index.php'</script>";
	}
}
?>