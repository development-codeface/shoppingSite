<?php

include("../../class/dbc_class.php");
$dbc = new Dbc;

if(isset($_REQUEST['send_msg']))
{
	$name = $_POST['name'];
	$mail = $_POST['mail'];
	$sub = $_POST['telephone'];
	$msg = $_POST['comments'];
	
	if(!empty($name)) {
	$query01 = $dbc -> query("insert into contact values('','$name','$sub','$mail','$msg')");
	
	echo "<script>window.location = '../../contact.php?msg=suc'</script>";
	}
	else {
			echo "<script>window.location = '../../contact.php'</script>";
	}
}
?>