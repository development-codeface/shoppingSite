<?php
session_start();
include ("../class/dbc_class.php");
$dbc = new Dbc;
$clear = $_POST['clear'];
$click = $_POST['click'];


 if($clear=='clear')
 {
 	unset($_SESSION['cart_item']);
 }
 
echo $_SESSION['c_count'] = $click;
?>