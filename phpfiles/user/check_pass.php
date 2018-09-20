<?php
session_start();
error_reporting(0);
include("../../class/dbc_class.php");
$dbc = new Dbc;
$c = md5($_POST['curr_pass']);
$select01 = "SELECT * FROM user_registration WHERE password = '$c' and email = '$_SESSION[onlineuser]'";
$query01 = $dbc -> query($select01);
$num01 = $dbc -> getNumRows($query01);
if($num01 == 0)
{
	echo 'Current password error';?><img src="images/error.png" /><?php
}
?>