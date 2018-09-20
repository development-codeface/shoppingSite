<?php
session_start();
include ("../class/dbc_class.php");
$dbc = new Dbc;
$price = $_POST['item_price'];
$quant = $_POST['count'];
$current_quant = $_POST['current_quantity'];
$array_index=$_POST['array_index'];
$id=$_POST['id'];
 
 
 $sql="select * from product where id='$id'";
 $result=$dbc->query($sql);
 $row=$dbc->fetch($result);
 
 $max_order=$row['maximum_order'];
 
 


		 if($quant>$max_order)
		 {
		 	 $order="Sorry! We are able to provide only " .$max_order. " units of " .$row['name']. ", for each customer.";
			 $quant=$max_order;
    		 $tot_price = str_replace(',','', $price) * $quant;
		 }
		 else 
		 {
			 
			  if($quant=='0')
			 {
			 	// echo $current_quant;
				  $quant=$current_quant;
			 	 $tot_price = str_replace(',','', $price) * $current_quant;
			 }
			 else
			 {
			 	 $order="The quantity of item " .$row['name']. " has been changed to " .$_POST['count'];
				 $quant=$_POST['count'];
	    		 $tot_price = str_replace(',','', $price) * $quant;
			 }
			 
		 }

 
 
 
 
	$array= $_SESSION['cart_item'];
	$count=count($_SESSION["cart_item"]);

	
	    foreach($array as $key => $value)
	    {
	       
			if($key==$array_index)
			{
				
				if($quant=='0')
				{
					$array[$array_index][quantity]=$quant;
				}
				else
				{
					$array[$array_index][quantity]=$quant;
				}
				
					
			}
			
	    }

 
	
$_SESSION['cart_item']=$array;


$array_new=$array;


foreach($array_new as $keys => $values)
	    {
	      if (!empty($values['offer'])) { $p=str_replace(',','', $values['offer']); }
else { $p=str_replace(',','', $values['price']); }
			
			
			 $t+=$p*$values['quantity'];
	    }

echo $tot_price.="|".$t."|".$quant."|".$order;


?>