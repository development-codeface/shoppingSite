<?php

include_once ("class/dbc_class.php");
$dbc = new Dbc;

date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');

if(isset($_POST['order_id']) && isset($_POST['product_id']))
{
	$id = $_POST['order_id'];
	$product = $_POST['product_id'];
	$reason = $_POST['cancel_reason'];
	
	$select04 = "select * from order_products where order_id = '$id' and product_id = '$product'";
	$query06 = $dbc -> query($select04);
	$array04 = $dbc -> fetch($query06);
	
	$insert02 = "insert into cancel_order values('','$array04[order_id]','$array04[product_id]','$array04[quantity]','$reason','$date','0')";
	$query07 = $dbc -> query($insert02);
	
	$select002 = "select quantity,maximum_order from product where id = '$product'";
	$query009 = $dbc -> query($select002);
	$array001 = $dbc -> fetch($query009);
	$new_quant = $array04['quantity'] + $array001['maximum_order'];
	$update05 = "update product set maximum_order = '$new_quant' where id = '$product'";
	$dbc -> query($update05);
	
	$select05 = "select user_id from orders where id = '$id'";
	$query08 = $dbc -> query($select05);
	$array05 = $dbc -> fetch($query08);
	$arr_id1 = $array05['user_id'];
	$select06 = "select name, email from user_registration where id = '$arr_id1'";
	$query09 = $dbc -> query($select06);
	$array06 = $dbc -> fetch($query09);
	
	$to = $array06['email'];
	$name = $array06['name'];
	$subject = 'Order Cancelled';
	
	$data = array('param1' => $name, 'param2' => $reason);
	//print_r($data);
	$query = http_build_query($data);
	$options = array('http' => array(
		 'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                    "Content-Length: ".strlen($query)."\r\n".
                    "User-Agent:MyAgent/1.0\r\n",
		'method'  => 'POST',
		'content' => $query
	));

      $context  = stream_context_create($options);
    $server = 'http://'.$_SERVER['SERVER_NAME'].'';
	 $url = "$server/phpfiles/mail/cancelorder_mail.php"; 
	 $message = file_get_contents($url,false,$context);
	 
	//$message = 'Hi '.$name.',<br/><br/>
	//We are very sorry to inform that your order has been cancelled for the following reason.<br/><br/>
	//Reason : '.$reason.'<br/><br/>
	//Save this e-mail for future reference. <br/><br/>
	//Thank you for using our service.';
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: Margin free market <order@marginfreemarketonline.com>' . "\r\n";	
	mail($to, $subject, $message, $headers);
	
	$delete02 = "delete from order_products where order_id = '$id' and product_id = '$product'";
	$query10 = $dbc -> query($delete02);
	
	$select07 = "SELECT a.price,a.offer_price, b.quantity FROM product a JOIN order_products b ON a.id = b.product_id where b.order_id = '$id'";
	$query001 = $dbc -> query($select07);
	
	while($array07 = $dbc -> fetch($query001))
	{
		if (!empty($array07['offer_price']))
		{
			$total+= $array07['offer_price'] * $array07['quantity'];
		}
		else
		{
			$total+= $array07['price'] * $array07['quantity'];
		}
	}
	
	$select08 = "select * from order_products where order_id = '$id'";
	$query003 = $dbc -> query($select08);
	$num01 = $dbc -> getNumRows($query003);
	
	$update01 = "update orders set quantity = '$num01', amount = '$total' where id = '$id'";
	$query002 = $dbc -> query($update01);
	
	$select09 = "select quantity from orders where id = '$id'";
	$query004 = $dbc -> query($select09);
	$array08 = $dbc -> fetch($query004);
	if($array08['quantity'] == '0')
	{
		$update02 = "update orders set status = '2' where id = '$id'";
		$query005 = $dbc -> query($update02);
	}
	
	echo "<script>window.location='administrator.php?option=manage_orders';</script>";
}
elseif (isset($_POST['order_id']))
{
	$cancel = $_POST['order_id'];
	$reason = $_POST['cancel_reason'];
	
	$select01 = "select * from order_products where order_id = '$cancel'";
	$query01 = $dbc -> query($select01);
	
	while($array01 = $dbc -> fetch($query01))
	{
		$insert01 = "insert into cancel_order values('','$array01[order_id]','$array01[product_id]','$array01[quantity]','$reason','$date','0')";
		$query02 = $dbc -> query($insert01);
		$select001 = "select quantity,maximum_order from product where id = '$array01[product_id]'";
		$query007 = $dbc -> query($select001);
		$array09 = $dbc -> fetch($query007);
		$new_quant = $array01['quantity'] + $array09['maximum_order'];
		$update04 = "update product set quantity = '$new_quant' where id = '$array01[product_id]'";
		$query008 = $dbc -> query($update04);
	}
	
	$select02 = "select user_id from orders where id = '$cancel'";
	$query04 = $dbc -> query($select02);
	$array02 = $dbc -> fetch($query04);
	$arr_id = $array02['user_id'];
	$select03 = "select name, email from user_registration where id = '$arr_id'";
	$query05 = $dbc -> query($select03);
	$array03 = $dbc -> fetch($query05);
	
	$to = $array03['email'];
	$name = $array03['name'];
	$subject = 'Order Cancelled';
	
	$data = array('param1' => $name, 'param2' => $reason);
	//print_r($data);
	$query = http_build_query($data);
	$options = array('http' => array(
		 'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                    "Content-Length: ".strlen($query)."\r\n".
                    "User-Agent:MyAgent/1.0\r\n",
		'method'  => 'POST',
		'content' => $query
	));

      $context  = stream_context_create($options);
    $server = 'http://'.$_SERVER['SERVER_NAME'].'';
	 $url = "$server/phpfiles/mail/cancelorder_mail.php"; 
	 $message = file_get_contents($url,false,$context);
	
	
	/* 
	 $server = 'http://'.$_SERVER['SERVER_NAME'].'';
	 $url = "$server/phpfiles/mail/cancelorder_mail.php?name=$name&reason=$reason"; 
	$message = file_get_contents($url);  */
	
	//$message = 'Hi '.$name.',<br/><br/>
	//We are very sorry to inform that your order has been cancelled for the following reason.<br/><br/>
	//Reason : '.$reason.'<br/><br/>
	//Save this e-mail for future reference. <br/><br/>
	//Thank you for using our service.';
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: Margin free market <order@marginfreemarketonline.com>' . "\r\n";	
	mail($to, $subject, $message, $headers);
	
	$delete01 = "delete from order_products where order_id = '$cancel'";
	$query03 = $dbc -> query($delete01);
	
	$update03 = "update orders set status = '2' where id = '$cancel'";
	$query006 = $dbc -> query($update03);
	
	echo "<script>window.location='administrator.php?option=manage_orders';</script>";
}
?>