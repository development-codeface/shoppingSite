<?php
include("../../class/dbc_class.php");
$dbc = new Dbc;

	
		$email = $_POST['email'];
		
		$sql2 = "INSERT INTO tbl_subscribe VALUES('','$email')";
		$query2 = $dbc->query($sql2);
		echo "subscribed successfully";
	


?>