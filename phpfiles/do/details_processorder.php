<?php
include_once("../../class/dbc_class.php");
$dbc = new Dbc;

	//process order
	if(isset($_REQUEST['process']))
	{
		$id = $_GET['process'];
		$id_process = $_GET['id'];
		
		$select04 = "select quantity from product where id = '$id_process'";
		$query06 = $dbc -> query($select04);
		$array04 = $dbc -> fetch($query06);
		if($array04['quantity'] == '0')
		{
			echo "<script>alert('Cannot process, this product is out of stock');</script>";
			echo "<script>window.location = '../../administrator.php?option=manage_orders';</script>";
		}
		else
		{
		$select01 = "select * from order_products where order_id = '$id' and product_id = '$id_process'";
		$query01 = $dbc -> query($select01);
		$array01 = $dbc -> fetch($query01);
		
		if($array01['quantity'] > $array04['quantity'])
		{
			echo "<script>alert('Cannot process, limited stock remaining');</script>";
			echo "<script>window.location = '../../administrator.php?option=view_order&id='+$id;</script>";
		}
		else {
		$select02 = "select a.user_id from orders a join order_products b on a.id = b.order_id where a.id = '$id' and product_id = '$id_process'";
		$query03 = $dbc -> query($select02);
		$array02 = $dbc -> fetch($query03);
		
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d h:i:s');
		
		$insert01 = "insert into orders_process values('','$array01[id]','$array01[product_id]','$array02[user_id]','$date','1')";
		$query02 = $dbc -> query($insert01);
		
		$update01 = "update order_products set status = 1 where order_id = '$id' and product_id = '$id_process'";
		$query04 = $dbc -> query($update01);
		
		$select03 = "select email, name from user_registration where id = '$array02[user_id]'";
		$query05 = $dbc -> query($select03);
		$array03 = $dbc -> fetch($query05);
		
		$to = $array03['email'];
		$name = $array03['name'];
		$subject = 'Order Processed';
		
		$server = 'http://'.$_SERVER['SERVER_NAME'].'';
		$url = "$server/phpfiles/mail/details_process_mail.php?name=$name"; 
		$message = file_get_contents($url);
		
		
		//$message = 'Hi '.$name.',<br/><br/>
		//We  are glad to inform that your order has been processed .
		//Save this e-mail for future reference. <br/><br/>
		//Thank you for using our service.';
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: Margin free market <order@marginfreemarketonline.com>' . "\r\n";	
		mail($to, $subject, $message, $headers);
		
		echo "<script>window.location='../../administrator.php?option=view_order&id=$id';</script>";
		}}
	}
?>