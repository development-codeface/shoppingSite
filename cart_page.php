<?php include_once('includes/header_links.php'); ?>	
	
	
<title>Cart</title>
 <meta charset="UTF-8"> 
	<link href="css/style-table.css" rel="stylesheet">
	<div class="container cart_page">
	
	<?php include_once('includes/header_content.php'); ?>	
	<?php include_once('res_menu.php'); ?>	
	<section class="content_section_main my_order_page">
			<div class="row">
			<div class="large-12 columns">
			<div id=""><div class="reg_err" id="reg_err" style="color: #D8000C"><p></p></div>
				<h2 class="page_title">Cart</h2>
				<form class="form-horizontal"  method="post" action="#">
					<table class="cart_page_table">
		<thead>
		<tr>
			<th>Product Image </th>
			<th>Name</th>
			<th>Unit Price</th>
			<th>Quantity</th>
			<th>Subtotal</th>
			<th>Action</th>
			
		</tr>
		</thead>
		<tbody>
<?php

if (!empty($_SESSION["cart_item"])) 
{
	foreach ($_SESSION["cart_item"] as $item => $value)
	{
		$id=$value["id"];
		
		$sql="select thumb_image from product_image where product_id='$id'";
		$result=$dbc->query($sql);
		$row=$dbc->fetch($result);
?>
		<tr id="cart_items<?php echo $value["id"]; ?>">
			<td data-label="Product Image" class="my_cart_img_block"><img src="<?php echo $row['thumb_image']; ?>"></td>
			<td data-label="Product Name"><?php echo $value["name"]; ?></td>
			<td data-label="Unit Price">
				Rs. <span id="product_price<?php echo $value["id"]; ?>">
					<?php if(!empty($value["offer"])) { echo $value["offer"]; } else { echo $value["price"]; } ?></span>/-</td>
			<td data-label="Quantity">
			<input type="hidden" name="current_qunt" id="current_qunt<?php echo $value["id"]; ?>" value="<?php echo $value["quantity"]; ?>" />
				<input class="quatity_box" min="1" id="quant<?php echo $value["id"]; ?>" type="number" value="<?php echo $value["quantity"]; ?>">
				<a onclick="addquantity(<?php echo $value["id"]; ?>,<?php echo $item;?>);"><p class="cart_update">Update</p></a>
				</td>
			<td data-label="Subtotal">
				<?php
				if(!empty($value["offer"])) { $price=$value["offer"]; } else { $price=$value["price"]; }
				?>
			Rs. <span id="ca_price<?php echo $value["id"]; ?>"><?php echo str_replace(',','', $price)*$value["quantity"]; ?></span>/-</td>
			<td data-label="Action"  >
			<a  onclick="deletecart(<?php echo $value["id"]; ?>,<?php echo $item;?>)" title="Remove item"><i class="fa fa-close"></i></a></td>
			
		</tr>
		
<?php 
$total_amount+=str_replace(',','', $price)*$value['quantity'];

$select = "select * from shipping_charge";
$query = $dbc -> query($select);
$array = $dbc -> fetch($query);

if(!empty($array)) {
	if($total_amount < $array['amount']) {
		$ship = $array['shipping'];
	} else {
		$ship = 0;
	}
} else {
		$ship = 0;
	}
} } 
else {?> <tr><td colspan="6" align="center">There are no items in this cart.</td></tr> <?php }?>

		</tbody>
	</table>
	
	
	<input type="hidden" id="del_charge" name="del_charge" value="<?php echo $array['amount'];?>" />
	<input type="hidden" id="del_fee" name="del_fee" value="<?php echo $array['shipping'];?>" />
<?php
if (!empty($_SESSION["cart_item"])) 
{?>
	<div class="cart_footer_block">
	<p class="continue_shoping_btn"><a href="index.php">Continue Shopping</a></p>
	<p class="continue_shoping_btn"><a onclick="clear_cart();">Clear Cart</a></p>
	</div>
	
				
  
              </form>


			  
			  		<div class="large-12 columns grnd_total7">
						<div class="large-6 columns "></div>
						<div class="large-6 columns grnd_total">
							<div class="grnd_total_cus_2">
								<ul>
									<li class="sub_total_cart_page"><span>Sub Total </span>: <span> <i class="fa fa-rupee"></i>
										<span id="sub_total"><?php echo $total_amount; ?></span>
										</span>  </li>
									<li class="sub_total_cart_page2"><span>Delivery Charge </span>: <span> <i class="fa fa-rupee"></i><span id="delivery_fee"> <?php echo $ship; ?></span></span>  </li>
								</ul>
							</div>
							<p class="separator"></p>
								<div class="grnd_total_cus_2">
								<ul>
									<li class="sub_total_cart_page sub_total_cart_page_cus_block1 "><span class="sub_page_cus_block1 ">Grand Total </span>: 
										<span> <i class="fa fa-rupee"></i><span id="grand_total"> <?php echo $total_amount + $ship; ?></span></span>  </li>
									
								</ul>
							</div>
								<div class="cart_footer_block">
	<p class="continue_shoping_btn"><a href="checkout.php">Proceed To Checkout</a></p>
	</div>
						</div>
						
					</div>
<?php } else{?>
	<div class="cart_footer_block">
	<p class="continue_shoping_btn"><a href="index.php">Continue Shopping</a></p>
	</div>
	
<?php } ?>
		</div>
		</div>
		

		
		
		</div>

					
			
			
			

		</section>

	<?php include_once('includes/header_content.php'); ?>	
			
	</div>
	<?php include_once('includes/footer_module.php'); ?>	
	<?php include_once('includes/footer_content.php'); ?>	



<script src="js/jquery-2.1.0.min.js"></script>

<script src="js/custom.js"></script>