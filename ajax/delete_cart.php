<?php
session_start();
include ("../class/dbc_class.php");
$dbc = new Dbc;
  $id1=$_POST['id'];
 $current_quant=$_POST['current_quantity'];
 $array_index=$_POST['array_index'];
 //$qunt= $current_quant - 1;
    $qunt= $_POST['click'];
 
$array= $_SESSION['cart_item'];

$count=count($_SESSION["cart_item"]);

	

  
    
	    foreach($array as $key => $value)
	    {
	       
			if($key==$array_index)
			{
				
				
					unset($array[$array_index]);
					
					
			}
		
		 }
	
	echo $_SESSION['c_count']=$qunt;
$_SESSION['cart_item']=$array;

?>