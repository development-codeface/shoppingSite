<?php

if($_POST['upd_sub']) {
include("class/dbc_class.php");
$dbc=new Dbc;

$query = $dbc -> query("select * from shipping_charge");
$count = $dbc -> getNumRows($query);

$amt = trim($_POST['amt'], "INR., ");
$ship = trim($_POST['ship'], "INR., ");

if($count == 0) {
$dbc -> query("insert into shipping_charge values('','$amt','$ship')");
} else {
$dbc -> query("update shipping_charge set amount = '$amt', shipping = '$ship'");
}
echo "<script>alert('Shipping charge updated successfully');window.location='administrator.php?option=shipping';</script>";	


}
?>