<?php
include_once("../../class/dbc_class.php");
$dbc = new Dbc;

	//process order
	if(isset($_REQUEST['process']))
	{
	$refer = $_SERVER['HTTP_REFERER'];
		$id_process = $_GET['process'];
		
		$select01 = "select a.user_id, a.amount, b.* from orders a join order_products b on a.id = b.order_id where a.id = $id_process";
		$query01 = $dbc -> query($select01);
		
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d h:i:s');
		
		$flag = 1;
		
		$select05 = "select b.product_id, b.quantity from orders a join order_products b on a.id = b.order_id where a.id = $id_process";
		$query06 = $dbc -> query($select05);
		while($array03 = $dbc -> fetch($query06))
		{
			$select06 = "select quantity from product where id = $array03[product_id]";
			$query07 = $dbc -> query($select06);
			$array04 = $dbc -> fetch($query07);
			if($array04['quantity'] < $array03['quantity'])
			{
				$flag = '0';
				echo "<script>alert('Cannot process, limited stocks remaining');
				window.location = '../../administrator.php?option=view_order&id='+$id_process;</script>";
			}
		}
		
		if($flag == '1')
		{
		while($array01 = $dbc -> fetch($query01))
		{
			$select04 = "select * from orders_process where order_products_id = '$array01[id]' and product_id = '$array01[product_id]'";
			$query05 = $dbc -> query($select04);
			$num01 = $dbc -> getNumRows($query05);
			if($num01 == '0')
			{
			$insert01 = "insert into orders_process values('','$array01[id]','$array01[product_id]','$array01[user_id]','$date','1')";
			$query02 = $dbc -> query($insert01);
			}
		}
		
		$update01 = "update order_products set status = 1 where order_id = $id_process";
		$query03 = $dbc -> query($update01);
		
		$select02 = "select a.user_id from orders a join order_products b on a.id = b.order_id where a.id = $id_process";
		$query02 = $dbc -> query($select02);
		$array02 = $dbc -> fetch($query02);
		
		$select03 = "select email, name from user_registration where id = '$array02[user_id]'";
		$query04 = $dbc -> query($select03);
		$array04 = $dbc -> fetch($query04);
		
		$to = $array04['email'];
		$name = $array04['name'];
		$subject = 'Order Processed';
		
		 $server = 'http://'.$_SERVER['SERVER_NAME'].'';
		 $url = "$server/phpfiles/mail/processorder_mail.php?name=$name"; 
		 $message = file_get_contents($url); 
		
		//$message = 'Hi '.$name.',<br/><br/>
		//We  are glad to inform that your order has been processed .
		//Save this e-mail for future reference. <br/><br/>
		//Thank you for using our service.';
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: Margin free market <order@marginfreemarketonline.com>' . "\r\n";	
		mail($to, $subject, $message, $headers);
		
		echo "<script>window.location='$refer';</script>";
		}
	}

?>