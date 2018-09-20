<?php include_once('includes/header_links.php'); 
if($_SESSION['onlineuser'] == '')
	{
		echo "<script>window.location = 'index.php'</script>";
	}

date_default_timezone_set('Asia/kolkata');
?>	
	
	
<title>Order Review</title>
 <meta charset="UTF-8"> 
	<link href="css/style-table.css" rel="stylesheet">
	<div class="container order_summary">
	
	<?php include_once('includes/header_content.php'); ?>	
	<?php include_once('res_menu.php');
	
	$id = $_REQUEST['review']; 
										$query01 = $dbc -> query("select order_date from order_products where order_id = '$id'");
										$array01 = $dbc -> fetch($query01);

										$query02 = $dbc -> query("select a.name,a.price,a.offer_price,b.quantity from product a join order_products b on a.id = b.product_id where b.order_id = '$id'");
?>
	<section class="content_section_main my_order_page">
			<div class="row">
			<div class="large-12 columns">
			<div id="">
				<h2 class="page_title">Order Review</h2>
				<p class="order_sum1"><b>Order Placed </b>: <?php echo date("F j, Y, g:i a", strtotime($array01['order_date'])); ?></p>
				<p class="order_sum1"><b>Order Id </b>: #<?php echo $id; ?> </p>
				
				
				<form class="form-horizontal"  method="post" action="#">
					<table class="cart_page_table">
		<thead>
		<tr>
			<th>Items Ordered</th>
			<th>Quantity</th>
			<th>Unit Price</th>
			<th>Total</th>
			
		</tr>
		</thead>
		<tbody>
						                	<?php
						                	while($array02 = $dbc -> fetch($query02))
											{
						                	?>
		<tr>
			<td data-label="Product Name"  ><?php echo $array02['name']; ?></td>
			<td data-label="Quantity"  ><?php echo $array02['quantity']; ?></td>
			<td data-label="Unit Price"  >Rs. 										       			<?php
														if (!empty($array02['offer_price'])) { $new = $array02['offer_price'];
														} else { $new = $array02['price'];
														}
														echo $new;
														?>/-</td>
			<td data-label="Subtotal"  >Rs. <?php
														if (!empty($array02['offer_price'])) { echo $tot_price = str_replace(',', '', $array02['offer_price']) * $array02["quantity"];
														} else { echo $tot_price = str_replace(',', '', $array02['price']) * $array02["quantity"];
														}
														$sum = $sum + $tot_price;
													?>/-</td>
			
		</tr>
<?php } ?>
		</tbody>
	</table>
	
			<table class="cart_page_table">
		<thead>
		<tr>
			<th>Billing Address </th>
			<th>Total</th>
			
			
			
		</tr>
		</thead>
		<tbody>
		<tr>
			
						            	<?php
										$select = "select * from shipping_charge";
$query = $dbc -> query($select);
$array = $dbc -> fetch($query);

if(!empty($array)) {
	if($sum <= $array['amount']) {
		$ship = $array['shipping'];
	} else {
		$ship = 0;
	}
} else {
		$ship = 0;
	}
										
										
										$query04 = $dbc -> query("select * from billing where order_id = '$id'");
										$array04 = $dbc -> fetch($query04);
										?>
			<td><?php echo $array04['name']; ?>
				<br/><?php echo $array04['address']; ?><br/>
				<?php echo $array04['city']; ?><br/><?php echo $array04['pincode']; ?>, <?php echo $array04['state']; ?><br/>
				Ph. : <?php echo $array04['phone']; ?><br/>Email : <?php echo $array04['email']; ?><br/><td>
					
			  		<div class="large-12 columns grnd_total7">
						<div class="large-6 columns "></div>
						<div class="large-12 columns grnd_total">
							<div class="grnd_total_cus_2">
								<ul>
									<li class="sub_total_cart_page"><span>Sub Total </span>: <span> <i class="fa fa-rupee"></i> <?php if (!empty($sum)) { echo $sum; } ?></span>  </li>
									<li class="sub_total_cart_page2"><span>Delivery Charge </span>: <span> <i class="fa fa-rupee"></i>  <?php echo $ship; ?></span>  </li>
								</ul>
							</div>
							<p class="separator"></p>
								<div class="grnd_total_cus_2">
								<ul>
									<li class="sub_total_cart_page sub_total_cart_page_cus_block1 "><span class="sub_page_cus_block1 ">Grand Total </span>: <span> <i class="fa fa-rupee"></i> <?php if (!empty($sum)) { echo $sum + $ship; } ?></span>  </li>
									
								</ul>
							</div>

						</div>
						
					</div>

</td>
			
			
		</tr>




		</tbody>
	</table>
	
	
	<div class="cart_footer_block">
	<p class="continue_shoping_btn"><a href="index.php">Continue Shopping</a></p>

	</div>
	
				
  
              </form>


	
		</div>
		</div>
		

		
		
		</div>

					
			
			
			

		</section>

	<?php include_once('includes/header_content.php'); ?>	
			
	</div>
	<?php include_once('includes/footer_module.php'); ?>	
	<?php include_once('includes/footer_content.php'); ?>	



<script src="js/jquery-2.1.0.min.js"></script>
