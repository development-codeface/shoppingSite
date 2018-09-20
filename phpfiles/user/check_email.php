<?php
include("../../class/dbc_class.php");
$dbc = new Dbc;

	
	$email = $_POST['email'];
	$sql = "select * from tbl_subscribe where email='$email'";
	$query = $dbc->query($sql);
    $num01 = $dbc ->getNumRows($query);
	if($num01 >= 1)
	{
	echo 'Already subscribed';
	}

?>