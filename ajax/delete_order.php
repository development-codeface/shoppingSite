<?php
session_start();
include ("../class/dbc_class.php");
$dbc = new Dbc;


 //delete order product
 if(isset($_POST['productid']))
 {
	
	
		  $order_id = $_POST['orderid'];
  $order_product_id = $_POST['productid'];


$sql1="select a.price,b.quantity from product a left join order_products b on a.id=b.product_id where b.id='$order_product_id'";
$result1=$dbc->query($sql1);
$row1=$dbc->fetch($result1);
$product_price= $row1['price'];
$product_qty=$row1['quantity'];

 $total_price=$product_price*$product_qty;


$sql2="select * from orders where id='$order_id'";
$result2=$dbc->query($sql2);
$row2=$dbc->fetch($result2);
$total=$row2['amount'];
$quantity=$row2['quantity'];

 $final_amount=$total-$total_price;
 $final_qty=$quantity-1;

$sql3="update orders set amount='$final_amount',quantity='$final_qty' where id='$order_id'";
$dbc->query($sql3);


  $sql="delete  from order_products where id='$order_product_id'";
  $dbc->query($sql);

 echo "succ";
}
 
 
 
 
 //delete orders
 if(isset($_POST['order_id']))
	{
		 $order_id = $_REQUEST['order_id'];
		 
		 $select01 = "select product_id, quantity from order_products where order_id = '$order_id'";
		 $query01 = $dbc -> query($select01);
		 while($array01 = $dbc -> fetch($query01))
		 {
		 	$select02 = "select maximum_order from product where id = '$array01[product_id]'";
			$query02 = $dbc -> query($select02);
			$array02 = $dbc -> fetch($query02);
			$new_quant = $array02['maximum_order'] + $array01['quantity'];
			$update01 = "update product set maximum_order = '$new_quant' where id = '$array01[product_id]'";
			$query03 = $dbc -> query($update01);
		 }
		 
		 $sql1="delete from order_products where order_id='$order_id'";
		 $dbc->query($sql1);
		 
		 $sql="delete from orders where id='$order_id'";
		 $dbc->query($sql);
		 
		 
	}
 
 
 
 ?>
