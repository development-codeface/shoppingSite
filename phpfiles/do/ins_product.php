<?php

include_once ("class/Util.class.php");
include ("class/dbc_class.php");
$dbc = new Dbc;
if ($_POST['create']) {
	$main_cat_id = $_POST['main_cat'];
	$cat_id = $_POST['cat_id'];
	$sub_id = $_POST['sub'];
	
	   $slider_image=$_POST['slider'];

	 $pname = $dbc->clean_up($_POST['product_name']);
	$author = $dbc->clean_up($_POST['author']);
	$code = $dbc->clean_up($_POST['product_code']);
	$se1="select * from product where product_code='$code'";
	$q=$dbc->query($se1);
	$c1=$dbc->getNumRows($q);
	if($c1>0)
	{
		echo"<script>alert('A product with same code already exists!!');window.location='administrator.php?option=product';</script>";
	}
	else
	{
	$lang = $dbc->clean_up($_POST['language']);
	$brand = $dbc->clean_up($_POST['product_brand']);
	$des = $dbc->clean_up($_POST['desc' ]);
	$pgs = $dbc->clean_up($_POST['pages']);
	$purchase_amount = trim($_POST['purchse_amount'], "INR., ");
	$price = trim($_POST['product_price'], "INR., ");
	$offer = trim($_POST['offer_price'], "INR., ");
	$shipping = trim($_POST['product_shipping'], "INR., ");
	$quantity = $dbc->clean_up($_POST['product_quantity']);
	$max_order = $dbc->clean_up($_POST['max_order']);
	$kword = $dbc->clean_up($_POST['product_kwords']);
	date_default_timezone_set('Asia/Kolkata');
	$date = date('Y-m-d');
	$status = $_POST['status'];

	$util = new Util();
	$i = $util -> getRandomWord(4);
	$errors = array();
	$upload = true;
	$image = $_FILES['product_image']['name'];
	if ($image <> "") {
		if ($upload == true) {
			foreach ($_FILES['product_image']['tmp_name'] as $key => $tmp_name) {
				$file_name = $rand . $key . $_FILES['product_image']['name'][$key];
				$file_size = $_FILES['product_image']['size'][$key];
				$file_tmp = $_FILES['product_image']['tmp_name'][$key];
				$file_type = strtolower($_FILES['product_image']['type'][$key]);
				list($img_width, $img_height) = getimagesize($file_tmp);
			
			if ($file_size > 512000) {
				$upload = false;
				$errors[] = 'Product images size limit exceeds. (Max.:500KB)';
				echo "<script>alert('Product images size limit exceeds. (Max.:500KB)')</script>";
				echo "<script>window.location='administrator.php?option=product'</script>";
			}
			if ($file_type != "image/jpeg" && $file_type != "image/gif" && $file_type != "image/jpg" && $file_type != "image/png") {
				$upload = false;
				$errors[] = 'Invalid image, only JPG,PNG and GIF types are accepted.';
				echo "<script>alert('Invalid image, only JPG,PNG and GIF types are accepted.')</script>";
				echo "<script>window.location='administrator.php?option=product'</script>";
			}}

		}
		if ($upload == true) {
			
	$s2 = "insert into product values('','$sub_id','$pname','$code','$author','$lang','$brand','$des','$pgs','$purchase_amount','$price','$offer','$shipping','$quantity','$max_order','$kword','$status','$date')";
	$q2 = $dbc -> query($s2);
	$s3 = "select max(id) as 'is' from product";
	$q3 = $dbc -> query($s3);
	$row = $dbc -> fetch($q3);
	$product_id = $row['is'];
			
			foreach ($_FILES['product_image']['tmp_name'] as $key => $tmp_name) {
				$file_name = $rand . $key . $_FILES['product_image']['name'][$key];
				$file_size = $_FILES['product_image']['size'][$key];
				$file_tmp = $_FILES['product_image']['tmp_name'][$key];
				$file_type = strtolower($_FILES['product_image']['type'][$key]);
				$desired_dir = "product/original";
				$desired_dir1 = "product/thumb";
				$dir = "product/" . $i;
				$file = $desired_dir . $i . "_" . $image_name;
				if (empty($errors) == true) {
						move_uploaded_file($file_tmp, $desired_dir . '/'. $i . '_' . $file_name);
						$util -> createThumbs($desired_dir . '/'. $i . '_' . $file_name, $desired_dir1 . '/thumb_'. $i . '_' . $file_name);
						$thumb_img = $desired_dir1 . '/thumb_'. $i . '_' . $file_name;
						$file_name = $desired_dir . '/'. $i . '_' . $file_name;
						$folder = $dir;
					}
					$sql2 = "insert into product_image values('','$product_id','$file_name','$thumb_img')";
					$dbc -> query($sql2);
					
					
					
				}


			
				if($slider_image=='latest')
					{
						
						$se="select * from slider_image where main_category_id='$main_cat_id'";
						$x=$dbc->query($se);
						$count=$dbc->getNumrows($x);
						if($count<='4')
						{
							$sql3 = "insert into slider_image values('','$main_cat_id','$product_id','$pname','$thumb_img','$author','$lang','$brand','$price')";
							$dbc -> query($sql3);
						}
					}
					
			}
			  echo "<script>alert('New product added successfully..')</script>";
			  echo "<script>window.location='administrator.php?option=product'</script>";

		}
	} }
?>

