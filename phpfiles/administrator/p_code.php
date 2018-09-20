<?php

include("../../class/config.php");
include("../../class/dbc_class.php");
$dbc=new Dbc;
$pc=$_POST['p_code'];
$se="select * from product where product_code='$pc'";
$x=$dbc->query($se);
$c=$dbc->getNumRows($x);
if($c>0)
{
	echo 'This product code already exists';
}
?>