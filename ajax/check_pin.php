<?php
include ("../class/dbc_class.php");
$dbc = new Dbc;
$pin = $_POST['pin'];
if($pin)
{
	$query01 = $dbc -> query("select * from pincode where pincode = '$pin'");
	if($dbc -> getNumRows($query01) > '0') { echo 'Available!'; } else { echo 'Sorry, not available'; }
}
else {
	echo "Invalid pincode!";
}
?>