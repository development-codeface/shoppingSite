<?php

include("../../class/dbc_class.php");
$dbc = new Dbc;

if(isset($_GET['em']))
{
	$email = $_GET['em'];
	
	$update01 = "UPDATE user_registration SET STATUS = '1' WHERE EMAIL = '$email'";
	$query01 = $dbc -> query($update01);
	echo 'Account activated. ';?>
	<br/><br/><a href="../../index.php">Go to site</a><?php
}

?>