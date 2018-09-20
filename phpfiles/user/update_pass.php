<?php
session_start();
$session = $_SESSION['onlineuser'];
include("../../class/dbc_class.php");
$dbc = new Dbc;

if(isset($_POST['update_pass']))
{
	$cur_pass = md5($_POST['current_password']);
	$new_pass = md5($_POST['new_password']);
	$con_pass = md5($_POST['confirm_password']);
	if($new_pass == $con_pass)
	{
		$select01 = "SELECT * FROM user_registration WHERE password = '$cur_pass' AND email = '$_SESSION[onlineuser]'";
		$query01 = $dbc -> query($select01);
		$num01 = $dbc -> getNumRows($query01);
		if($num01 > 0)
		{
			$update01 = "UPDATE user_registration SET password = '$new_pass' WHERE email = '$_SESSION[onlineuser]'";
			$query02 = $dbc -> query($update01);
			echo "<script>window.location='../../change_password.php?msg=suc';</script>"; 
		}
		
	}
	else
	{
		echo "<script>window.location='../../change_password.php?msg=err';</script>"; 
	}
}
?>