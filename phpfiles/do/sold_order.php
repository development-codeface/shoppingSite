<?php
include_once("../../class/dbc_class.php");
$dbc = new Dbc;

	//sell order
	if(isset($_REQUEST['sell']))
	{
		$id_sell = $_GET['sell'];
		$sell = '';
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d h:i:s');
		
		$select01 = "SELECT a.quantity,b.id, a.product_id, a.user_id FROM order_products a JOIN orders_process b ON a.id = b.order_products_id WHERE a.order_id = '$id_sell'";
		$query01 = $dbc -> query($select01);
		while($array01 = $dbc -> fetch($query01))
		{
			$select06 =  "select quantity from product where id = '$array01[product_id]'";
			$query05 = $dbc -> query($select06);
			$array05 = $dbc -> fetch($query05);
			if($array05['quantity'] == '0')
			{
				$sell = '1';
				echo "<script>alert('Cannot  sell, stock empty');</script>";
			}
			if($array05['quantity'] < $array01['quantity'])
			{
				$sell = '1';
				echo "<script>alert('You dont have enough stock');</script>";
			}
			else {
			$select05 = "select * from orders_sales where orders_process_id = '$array01[id]' and product_id = '$array01[product_id]'";
			$query09 = $dbc -> query($select05);
			$num01 = $dbc -> getNumRows($query09);
			if($num01 == '0')
			{
			$insert01 = "insert into orders_sales values('','$array01[id]','$array01[product_id]','$array01[user_id]','$date','2')";
			$query05 = $dbc -> query($insert01);
			$select04 = "select quantity from product where id = '$array01[product_id]'";
			$query06 = $dbc -> query($select04);
			$array04 = $dbc -> fetch($query06);
			$q = $array04['quantity'] - $array01['quantity'];
			$update02 = "update product set quantity = '$q' where id = '$array01[product_id]'";
			$query07 = $dbc -> query($update02);
			}}
		}
		
		if($sell <> '1')
		{
		$update01 = "update order_products set status = '2' where order_id = '$id_sell'";
		$query02 = $dbc -> query($update01);
		
		$update03 = "update orders set status = '1' where id = '$id_sell'";
		$query08 = $dbc -> query($update03);
		
		$select02 = "select user_id from orders where id = '$id_sell'";
		$query03 = $dbc -> query($select02);
		$array02 = $dbc -> fetch($query03);
		
		$select03 = "select email, name from user_registration where id = '$array02[user_id]'";
		$query04 = $dbc -> query($select03);
		$array03 = $dbc -> fetch($query04);
		
		$to = $array03['email'];
		$name = $array03['name'];
		$subject = 'Order Processed & Shipped !';
		
		 $server = 'http://'.$_SERVER['SERVER_NAME'].'';
		 $url = "$server/phpfiles/mail/soldorder_mail.php?name=$name"; 
		 $message = file_get_contents($url); 
		
		
		
		//$message = 'Hi '.$name.',<br/><br/>
		//We are glad to inform that your order has been shipped. 
		//Save this e-mail for future reference. <br/><br/>
		//Thank you for using our service.'; 
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: Margin free market  <order@marginfreemarketonline.com>' . "\r\n";	
		mail($to, $subject, $message, $headers);
		}
		echo "<script>window.location='../../administrator.php?option=processed_orders';</script>";
	}
?>