<?php
include("class/dbc_class.php");
$dbc=new Dbc;

$id=$_POST['hid_id'];
$new=$_POST['new_stock'] + $_POST['cur_stock'];

$select01 = "update product set quantity = '$new' where id = '$id'";
$query01 = $dbc -> query($select01);

echo "<script>alert('Stock updated successfully');window.location='administrator.php?option=stock&id=$id';</script>";	
?>	