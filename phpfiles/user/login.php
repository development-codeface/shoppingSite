<?php
session_start();
include("../../class/dbc_class.php");
$dbc = new Dbc;

if(isset($_REQUEST['login']))
{
	$email = $_POST['email'];
	$pass = md5($_POST['password']);
	
	$select01 = "SELECT * FROM user_registration WHERE EMAIL = '$email' and password = '$pass' and status ='1'";
	$query01 = $dbc -> query($select01);
	$array01 = $dbc -> fetch($query01);
	if($dbc -> getNumRows($query01) == 1)
	{
		if(!empty($_REQUEST['user']))
		{
		$_SESSION['onlineuser'] = $array01['email'];
		echo "<script>window.location = '../../checkout.php'</script>";
		}
		else
		{
		$_SESSION['onlineuser'] = $array01['email'];
		echo "<script>window.location = '../../personal_details.php'</script>";	
		}
	}
	else 
	{
		echo "<script>window.location = '../../login.php?msg=log_err'</script>";
	}
}
?>