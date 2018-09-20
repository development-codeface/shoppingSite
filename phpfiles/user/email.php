<?php

include("../../class/dbc_class.php");
$dbc = new Dbc;
$eml = $_POST['eml'];
if (filter_var($eml, FILTER_VALIDATE_EMAIL)) {
$select01 = "select * from user_registration where email = '$eml'";
$query01 = $dbc->query($select01);
if($dbc -> getNumRows($query01)>0)
{
	echo 'Email already exists ';?><img src="images/error.png" /><?php
}
else
{
	echo 'Email available ';?><img src="images/success.png" /><?php
}
}
?>