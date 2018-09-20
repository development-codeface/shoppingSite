<?php
session_start();
$session = $_SESSION['onlineuser'];
include("../../class/dbc_class.php");
$dbc = new Dbc;

if(isset($_POST['up_account']))
{
	$name = $dbc -> clean_up($_POST['username']);
	$address = $dbc -> clean_up($_POST['address']);
	$city = $dbc -> clean_up($_POST['city']);
	$district = $dbc -> clean_up($_POST['district']);
	$pin = $dbc -> clean_up($_POST['pin']);
	$phone = $dbc -> clean_up($_POST['telephone']);
	$update01 = "UPDATE user_registration SET name = '$name', address = '$address', city = '$city', district = '$district', pincode = '$pin', phone = '$phone' WHERE email = '$session'";
	$query01 = $dbc -> query($update01);
	echo "<script>window.location = '../../personal_details.php?msg=suc'</script>";
}
?>