<?php
session_start();
include ("../../class/dbc_class.php");
$dbc = new Dbc;

	$query01 = $dbc -> query("select * from pincode where pincode = '$_POST[postcode]'");
	//check pincode
	if ($dbc -> getNumRows($query01) > '0')
	{
		if (isset($_POST['place_order']))
		{
			$bill_name = $dbc -> clean_up($_POST['name']);
			$bill_mail = $dbc -> clean_up($_POST['email']);
			$bill_phone = $dbc -> clean_up($_POST['telephone']);
			$bill_add = $dbc -> clean_up($_POST['address']);
			$bill_city = $dbc -> clean_up($_POST['city']);
			$bill_pin = $dbc -> clean_up($_POST['postcode']);
			$bill_state = $_POST['state'];
			date_default_timezone_set('Asia/Kolkata');
			$date = date('Y-m-d h:i:s');
			if (isset($_POST['password']) <> '')
			{
				$md5 = md5($_POST['password']);
			}
			else
			{
				$md5 = '';
			}
			$ship=$_POST['ship'];
			$tot = $_POST['tot'];

			foreach ($_SESSION["cart_item"] as $item)
			{
				$pid = $item["id"];
				$select06 = "select quantity,maximum_order from product where id = '$pid'";
				$query002 = $dbc -> query($select06);
				$array05 = $dbc -> fetch($query002);

				if (($array05['maximum_order'] < $item['quantity']))
				{
					$stock = 'empty';
					unset($_SESSION["cart_item"]);
					unset($_SESSION["c_count"]);
					echo "<script>localStorage.total = 0;localStorage.removeItem('allItems');localStorage.clickcount = 0;</script>";
					echo "<script>window.location = '../../checkout.php?stock_msg=no_stock'</script>";
				}
			}

			if ($stock <> 'empty')
			{
				if ($_POST['password'] <> '')
				{
					$insert01 = "INSERT INTO user_registration VALUES('','$bill_name','$bill_add','$bill_city','$bill_state','$bill_pin','$bill_phone','$bill_mail','$md5','$date','0')";
					$query01 = $dbc -> query($insert01);

					$select01 = "SELECT MAX(id) AS id FROM user_registration where email = '$bill_mail'";
					$query02 = $dbc -> query($select01);
					$array01 = $dbc -> fetch($query02);

					$i = count($_SESSION["cart_item"]);

					$insert02 = "INSERT INTO orders VALUES('','$array01[0]','$i','$tot','$ship','$date','0')";
					$query03 = $dbc -> query($insert02);

					$select02 = "SELECT MAX(id) AS id FROM orders where user_id = '$array01[0]'";
					$query04 = $dbc -> query($select02);
					$array02 = $dbc -> fetch($query04);

					foreach ($_SESSION["cart_item"] as $item)
					{
						$pid = $item["id"];
						$insert03 = "INSERT INTO order_products VALUES('','$array02[0]','$pid','$array01[0]','$item[quantity]','$date','0')";
						$query05 = $dbc -> query($insert03);

						$select07 = "select maximum_order from product where id = '$pid'";
						$query004 = $dbc -> query($select07);
						$array06 = $dbc -> fetch($query004);

						$new_max_order = $array06['maximum_order'] - $item['quantity'];

						$update02 = "update product set maximum_order='$new_max_order' where id = '$pid'";
						$query003 = $dbc -> query($update02);
					}

					$insert03 = "INSERT INTO billing VALUES('','$array02[0]','$bill_name','$bill_add','$bill_city','$bill_state','$bill_pin','$bill_phone','$bill_mail','INR. $tot','INR. $ship')";
					$query05 = $dbc -> query($insert03);

					$subject = 'Order Placed';
					$message = 'Hi ' . $bill_name . ',<br/><br/>
				
				We  are glad to inform that your order has been placed. Save this e-mail for future reference. <br/><br/>
				
				Thank you for using our service. <br/>';

					$headers = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers .= 'From: MarginFreeMarket <order@marginfreemarketonline.com>' . "\r\n";
					mail($bill_mail, $subject, $message, $headers);
					
					$query08 = $dbc -> query("SELECT MAX(id) AS order_no FROM orders where user_id = '$array01[0]'");
					$array07 = $dbc -> fetch($query08);
					echo "<script>localStorage.total = 0;localStorage.removeItem('allItems');localStorage.clickcount = 0;</script>";
					unset($_SESSION["cart_item"]);
					unset($_SESSION["c_count"]);
					echo "<script>window.location='../../order_summary.php?review=$array07[order_no]'</script>";
				}
				else
				{
					if (isset($_SESSION['onlineuser']) <> '')
					{
						$select04 = "SELECT id FROM user_registration WHERE email = '$_SESSION[onlineuser]'";
						$query07 = $dbc -> query($select04);
						$array03 = $dbc -> fetch($query07);

						$i = count($_SESSION["cart_item"]);

						$insert02 = "INSERT INTO orders VALUES('','$array03[0]','$i','$tot','$ship','$date','0')";
						$query03 = $dbc -> query($insert02);

						$select02 = "SELECT MAX(id) AS id FROM orders where user_id = '$array03[0]'";
						$query04 = $dbc -> query($select02);
						$array02 = $dbc -> fetch($query04);

						foreach ($_SESSION["cart_item"] as $item)
						{
							$pid = $item["id"];
							$insert03 = "INSERT INTO order_products VALUES('','$array02[0]','$pid','$array03[0]','$item[quantity]','$date','0')";
							$query05 = $dbc -> query($insert03);

							$select05 = "select quantity,maximum_order from product where id = '$pid'";
							$query09 = $dbc -> query($select05);
							$array04 = $dbc -> fetch($query09);

							$new_max_order = $array04['maximum_order'] - $item['quantity'];

							$update01 = "update product set maximum_order='$new_max_order' where id = '$pid'";
							$query001 = $dbc -> query($update01);
						}

						$insert03 = "INSERT INTO billing VALUES('','$array02[0]','$bill_name','$bill_add','$bill_city','$bill_state','$bill_pin','$bill_phone','$bill_mail','INR. $tot','INR. $ship')";
						$query05 = $dbc -> query($insert03);

						$subject = 'Order Placed';
						$message = 'Hi ' . $bill_fname . ',<br/><br/>
					
					We  are glad to inform that your order has been placed. Save this e-mail for future reference. <br/><br/>
					
					Thank you for using our service. <br/>';

						$headers = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						$headers .= 'From: MarginFreeMarket <info@marginfreemarketonline.com>' . "\r\n";
						mail($bill_mail, $subject, $message, $headers);
						
						unset($_SESSION["cart_item"]);
					unset($_SESSION["c_count"]);
						$query005 = $dbc -> query("SELECT MAX(id) AS order_no FROM orders where user_id = '$array03[0]'");
						$array08 = $dbc -> fetch($query005);
						echo "<script>localStorage.total = 0;localStorage.removeItem('allItems');localStorage.clickcount = 0;</script>";
						echo "<script>window.location='../../order_summary.php?review=$array08[order_no]'</script>";
					}
					else
					{
						$insert01 = "INSERT INTO user_registration VALUES('','$bill_name','$bill_add','$bill_city','$bill_state','$bill_pin','$bill_phone','$bill_mail','$md5','$date','2')";
						$query01 = $dbc -> query($insert01);

						$select01 = "SELECT MAX(id) AS id FROM user_registration where email = '$bill_mail'";
						$query02 = $dbc -> query($select01);
						$array01 = $dbc -> fetch($query02);

						$i = count($_SESSION["cart_item"]);

						$insert02 = "INSERT INTO orders VALUES('','$array01[0]','$i','$tot','$ship','$date','0')";
						$query03 = $dbc -> query($insert02);

						$select02 = "SELECT MAX(id) AS id FROM orders where user_id = '$array01[0]'";
						$query04 = $dbc -> query($select02);
						$array02 = $dbc -> fetch($query04);

						foreach ($_SESSION["cart_item"] as $item)
						{
							$pid = $item["id"];
							$insert03 = "INSERT INTO order_products VALUES('','$array02[0]','$pid','$array01[0]','$item[quantity]','$date','0')";
							$query05 = $dbc -> query($insert03);

							$select05 = "select quantity,maximum_order from product where id = '$pid'";
							$query09 = $dbc -> query($select05);
							$array04 = $dbc -> fetch($query09);

							$new_max_order = $array04['maximum_order'] - $item['quantity'];

							$update01 = "update product set maximum_order='$new_max_order' where id = '$pid'";
							$query001 = $dbc -> query($update01);
						}

						$insert03 = "INSERT INTO billing VALUES('','$array02[0]','$bill_name','$bill_add','$bill_city','$bill_state','$bill_pin','$bill_phone','$bill_mail','INR. $tot','INR. $ship')";
						$query05 = $dbc -> query($insert03);

						$subject = 'Order Placed';
						$message = 'Hi ' . $bill_fname . ',<br/><br/>
					
					We  are glad to inform that your order has been placed. Save this e-mail for future reference. <br/><br/>
					
					Thank you for using our service. <br/>';

						$headers = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						$headers .= 'From: MarginFreeMarket <info@marginfreemarketonline.com>' . "\r\n";
						mail($bill_mail, $subject, $message, $headers);
						
						unset($_SESSION["cart_item"]);
					unset($_SESSION["c_count"]);
						$query006 = $dbc -> query("SELECT MAX(id) AS order_no FROM orders where user_id = '$array01[0]'");
						$array09 = $dbc -> fetch($query006);
						echo "<script>localStorage.total = 0;localStorage.removeItem('allItems');localStorage.clickcount = 0;</script>";
						echo "<script>window.location='../../order_summary.php?review=$array09[order_no]'</script>";
					}
				}

			}
		}
	}
	else
	{
		//pincode error msg
		echo "<script>window.location = '../../checkout.php?msg=check_err'</script>";
	}

?>