<?php
include ("class/config.php");
include ("class/dbc_class.php");
$dbc = new Dbc;
$id = $_REQUEST['hid_id'];

if ($_POST['create']) {
	
	//$sql2=$dbc->query("SELECT a.email,b.name from notify a join product b on a.product_id = b.id where b.quantity = 0 and a.status = 0 and b.id = '$id'");
	//$num1=$dbc->getNumRows($sql2);
	
	$slider_image=$_POST['slider'];
	$slider_image1=$_POST['latest'];
	$main_cat_id=$_POST['main_cat'];
	$status = $_POST['status'];
	$val=$_POST['val'];
	$cat_id = $_POST['cat_id'];
	$subid = $_POST['sub'];
	$pname = $dbc -> clean_up($_POST['product_name']);
	$author = $dbc -> clean_up($_POST['author']);
	$code = $dbc -> clean_up($_POST['product_code']);
	$s1="select product_code from product where id='$id'";
	$q1=$dbc->query($s1);
	$a1=$dbc->fetch($q1);
	if($a1['product_code']==$code)
	{
	$lang = $dbc -> clean_up($_POST['language']);
	$brand = $dbc -> clean_up($_POST['product_brand']);
	$purchase_amount = trim($_POST['purchase_amount'], "INR., ");
	$des = $dbc -> clean_up($_POST['desc']);
	$pgs = $dbc -> clean_up($_POST['pages']);
	$price = trim($_POST['product_price'], "INR., ");
	$offer = trim($_POST['offer_price'], "INR., ");
	$shipping = trim($_POST['product_shipping'], "INR., ");
	$quantity = $dbc -> clean_up($_POST['product_quantity']);
	if($quantity > '0') { $q = '1'; }
	$max_order = $dbc->clean_up($_POST['max_order']);
	$kword = $dbc -> clean_up($_POST['product_kwords']);
	$s3 = "update product set subcategory_id='$subid',name='$pname',author='$author',product_code='$code',language='$lang',brand='$brand',
	description='$des',pages='$pgs',purchase_amount='$purchase_amount',price='$price',offer_price='$offer',shipping_charge='$shipping',quantity='$quantity',maximum_order='$max_order',keywords='$kword' where id='$id'";
	$q3 = $dbc -> query($s3);
	
	
	
			if(($slider_image=='latest')  || ($slider_image1=='latest'))
					{
						
						 $sql="select * from product_image where product_id='$id'";
						$result=$dbc->query($sql);
						$res=$dbc->fetch($result);
						 $thumb_img=$res['thumb_image'];
						
						 $se="select * from slider_image where main_category_id='$main_cat_id'";
						$x=$dbc->query($se);
						$y=$dbc->fetch($x);
						$count=$dbc->getNumrows($x);
						$slider_product=$y['product_id'];
						
						 $sql1="select * from slider_image where product_id='$id'";
						$result1=$dbc->query($sql1);
						$count1=$dbc->getNumRows($result1);
						if($count<'5')
						{
							  if($count1=='0')
							  {
							$sql3 = "insert into slider_image values('','$main_cat_id','$id','$pname','$thumb_img','$author','$lang','$brand','$price')";
							$dbc -> query($sql3);
							}
						}
						if($count1 > 0)
						{
							$update01 = "update slider_image set main_category_id = '$main_cat_id', name = '$pname', brand = '$brand', price = '$price' where product_id = '$id'";
							$query01 = $dbc -> query($update01);
						}
					}
				else 
				{
						 $se="select * from slider_image where main_category_id='$main_cat_id' and product_id='$id'";
						$x=$dbc->query($se);
						$y=$dbc->fetch($x);
						$count=$dbc->getNumrows($x);
						if($count<>'0')
						{
							$s3 = "delete  from slider_image where main_category_id='$main_cat_id' and product_id='$id' ";
							$q3 = $dbc -> query($s3);
						}
					
					
				}
				/* if($num1 > '0' && $q == '1')
				{
					while($array1=$dbc->fetch($sql2))
					{
						$to = $array1['email'];
						$arr_name = $array1['name'];
						$subject = 'Stocks updated!';
						
						//$server = 'http://'.$_SERVER['SERVER_NAME'].'/marginfree';
						//$url = "$server/phpfiles/mail/updateproduct_mail.php?name=$arr_name"; 
						//$message = file_get_contents($url); 
						
						//$message = 'Hi ,<br/><br/>
						//We are glad to inform that new stocks for '.$array1['name'].' has been arrived.
						//Save this e-mail for future reference. <br/><br/>
						//Thank you for using our service.';
						$headers  = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						$headers .= 'From: <picmall@crantia.com>' . "\r\n";
						mail($to, $subject, $message, $headers);
						$update1 = $dbc -> query("update notify set status = '1' where email = '$to' and product_id = '$id'");
					}
					echo '<script>alert("Notification mails sent.");</script>';
				} */
	
	
	if ($status == "")
	{
		echo '<script>alert("Product details updated..");window.location="administrator.php?option=manage_products";</script>';
	}
	else
	{
		echo '<script>alert("Product details updated..");</script>';?>
		<script>window.location="administrator.php?option=manageproduct_search&<?php echo $status;?>=<?php echo $val?>";</script>
	<?php }
}
else {
	$s2="select * from product where product_code='$code'";
	$q1=$dbc->query($s2);
	$c1=$dbc->getNumRows($q1);
	if($c1>0)
	{
		echo '<script>alert("This product code already exists");window.location="administrator.php?option=manage_products";</script>';
	}
	else {	$lang = $dbc -> clean_up($_POST['language']);
	$brand = $dbc -> clean_up($_POST['product_brand']);
	$purchase_amount = trim($_POST['purchase_amount'], "INR., ");
	$des = $dbc -> clean_up($_POST['desc']);
	$pgs = $dbc -> clean_up($_POST['pages']);
	$price = trim($_POST['product_price'], "INR., ");
	$offer = trim($_POST['offer_price'], "INR., ");
	$shipping = trim($_POST['product_shipping'], "INR., ");
	$quantity = $dbc -> clean_up($_POST['product_quantity']);
	if($quantity > '0') { $q = '1'; }
	$max_order = $dbc->clean_up($_POST['max_order']);
	$kword = $dbc -> clean_up($_POST['product_kwords']);
	$s3 = "update product set subcategory_id='$subid',name='$pname',author='$author',product_code='$code',language='$lang',brand='$brand',
	description='$des',pages='$pgs',purchase_amount='$purchase_amount',price='$price',offer_price='$offer',shipping_charge='$shipping',quantity='$quantity',maximum_order='$max_order',keywords='$kword' where id='$id'";
	$q3 = $dbc -> query($s3);
	
	
	
			if(($slider_image=='latest')  || ($slider_image1=='latest'))
					{
						
						 $sql="select * from product_image where product_id='$id'";
						$result=$dbc->query($sql);
						$res=$dbc->fetch($result);
						 $thumb_img=$res['thumb_image'];
						
						 $se="select * from slider_image where main_category_id='$main_cat_id'";
						$x=$dbc->query($se);
						$y=$dbc->fetch($x);
						$count=$dbc->getNumrows($x);
						$slider_product=$y['product_id'];
						
						 $sql1="select * from slider_image where product_id='$id'";
						$result1=$dbc->query($sql1);
						$count1=$dbc->getNumRows($result1);
						if($count<'5')
						{
							  if($count1=='0')
							  {
							$sql3 = "insert into slider_image values('','$main_cat_id','$id','$pname','$thumb_img','$author','$lang','$brand','$price')";
							$dbc -> query($sql3);
							}
						}
					}
				else 
				{
						 $se="select * from slider_image where main_category_id='$main_cat_id' and product_id='$id'";
						$x=$dbc->query($se);
						$y=$dbc->fetch($x);
						$count=$dbc->getNumrows($x);
						if($count<>'0')
						{
							$s3 = "delete  from slider_image where main_category_id='$main_cat_id' and product_id='$id' ";
							$q3 = $dbc -> query($s3);
						}
					
					
				}
				/* if($num1 > '0' && $q == '1')
				{
					while($array1=$dbc->fetch($sql2))
					{
						$to = $array1['email'];
						$subject = 'Stocks updated!';
						$arr_name2 = $array1['name'];
						$server = 'http://'.$_SERVER['SERVER_NAME'].'/marginfree';
						$url = "$server/phpfiles/mail/updateproduct_mail.php?name=$arr_name2"; 
						$message = file_get_contents($url);
						
						
						//$message = 'Hi ,<br/><br/>
						//We are glad to inform you that new stocks for '.$array1['name'].' has been arrived.
						//Save this e-mail for future reference. <br/><br/>
						//Thank you for using our service.';
						$headers  = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						$headers .= 'From: <picmall@crantia.com>' . "\r\n";
						mail($to, $subject, $message, $headers);
						$update1 = $dbc -> query("update notify set status = '1' where email = '$to' and product_id = '$id'");
					}
					echo '<script>alert("Notification mails sent.");</script>';
				} */
	
	
	if ($status == "")
	{
		echo '<script>alert("Product details updated..");window.location="administrator.php?option=manage_products";</script>';
	}
	else
	{
		echo '<script>alert("Product details updated..");</script>';?>
		<script>window.location="administrator.php?option=manageproduct_search&<?php echo $status;?>=<?php echo $val?>";</script>
	<?php }
		
	}
}
}
?>
