<?php include_once('includes/header_links.php'); ?>	
 <meta charset="UTF-8"> 
 <title>Checkout</title>

	<link href="css/style-table.css" rel="stylesheet">
	<div class="container check_out_page">
	
	<?php include_once('includes/header_content.php'); ?>	
	<?php include_once('res_menu.php'); ?>	
	<section class="content_section_main my_order_page">
			<div class="row">
			<div class="large-12 columns">
			<h2 class="page_title">One Step Checkout</h2>
			
			<?php 

if (!empty($_SESSION['onlineuser'])) {
	$session = $_SESSION['onlineuser'];
	$select02 = "SELECT * FROM user_registration WHERE email = '$session'";
	$query02 = $dbc -> query($select02);
	$array02 = $dbc -> fetch($query02);
}

			
			
			if(isset($_REQUEST['msg'])) {
				$status = $_REQUEST['msg'];
					if($status == 'check_err') {
			echo '<div class="reg_err" style="color: #D8000C"><p>Pincode error, cannot deliver to this address.</p></div>';
			}}
			
			if (isset($_REQUEST['stock_msg'])) {
				$status = $_REQUEST['stock_msg'];
					if ($status == 'no_stock') {
			echo '<div class="reg_err" style="color: #D8000C"><p>Sorry, No products available.</p></div>';
			}}
			
			$select01 = "select * from pincode order by pincode";
			$query01 = $dbc -> query($select01);
			?>
			
			<div id="content">
			<fieldset>			 
							
			<form action="phpfiles/user/checkout.php" method="post" class="form-horizontal billing_section" id="checkout_form">
    
     <div class="large-5 columns"> <legend>Billing Address</legend>
          <div class="form-group required large-12 columns">
            <label class="large-2 small-3 medium-2 columns control-label" for="input-firstname"> Name</label>
            <div class="large-10 small-9 medium-10 columns">
              <input type="text" name="name" value="<?php echo $array02['name']; ?>" id="name" placeholder="Name" id="input-firstname" class="form-control">
                          </div>
          </div>
       
          <div class="form-group required large-12 columns">
            <label class="large-2 small-3 medium-2 columns control-label" for="input-email">E-Mail</label>
            <div class="large-10 small-9 medium-10 columns">
              <input type="email" name="email" value="<?php echo $array02['email']; ?>" placeholder="E-Mail" id="input-email" class="form-control">
                          </div>
          </div>
          <div class="form-group required large-12 columns">
            <label class="large-2 small-3 medium-2 columns control-label" for="input-telephone">Telephone</label>
            <div class="large-10 small-9 medium-10 columns">
              <input type="tel" name="telephone" value="<?php echo $array02['phone']; ?>" placeholder="Telephone" id="input-telephone" class="form-control">
                          </div>
          </div>
      
   

          <div class="form-group required large-12 columns">
            <label class="large-2 small-3 medium-2 columns control-label" for="input-address-2">Address </label>
            <div class="large-10 small-9 medium-10 columns">
              <input type="text" name="address" value="<?php echo $array02['address']; ?>" placeholder="Address" id="input-address-2" class="form-control">
            </div>
          </div>
          <div class="form-group required large-12 columns">
            <label class="large-2 small-3 medium-2 columns control-label" for="input-city">City</label>
            <div class="large-10 small-9 medium-10 columns">
              <input type="text" name="city" value="<?php echo $array02['city']; ?>" placeholder="City" id="input-city" class="form-control">
                          </div>
          </div>
          <div class="form-group required large-12 columns">
            <label class="large-2 small-3 medium-2 columns control-label" for="input-postcode">Location</label>
            <div class="large-10 small-9 medium-10 columns">
              <!-- <input type="text" name="postcode" value="" placeholder="Post Code" id="input-postcode" class="form-control"> -->
              <select name="postcode" id="input-postcode" class="form-control">
              	<option value="">--Select--</option>
              	<?php while($array01 = $dbc -> fetch($query01)) { ?>
              		<option value="<?php echo $array01['pincode']; ?>" <?php if($array02['pincode'] == $array01['pincode']) echo 'selected'; ?>><?php echo $array01['pincode']; ?></option>
              	<?php } ?>
              	</select>
                          </div>
          </div>
		           <div class="form-group required large-12 columns" style="display: none">
            <label class="large-2 small-3 medium-2 columns control-label" for="input-zone">Region</label>
            <div class="large-10 small-9 medium-10 columns">
              <select name="state" id="input-zone" class="form-control"><option value="Trivandrum">Trivandrum</option>
              	</select>
                          </div>
          </div>

<?php if (empty($_SESSION['onlineuser'])) { ?>
		            <legend>Your Password</legend>
          <div class="form-group required large-12 columns">
            <label class="large-2 small-3 medium-2 columns control-label" for="input-password">Password</label>
            <div class="large-10 small-9 medium-10 columns">
              <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control">
                          </div>
          </div>
          <div class="form-group required large-12 columns">
            <label class="large-2 small-3 medium-2 columns control-label" for="input-confirm">Password Confirm</label>
            <div class="large-10 small-9 medium-10 columns">
              <input type="password" name="confirm" value="" placeholder="Password Confirm" id="input-confirm" class="form-control">
                          </div>
          </div>
		   <div class="form-group required large-12 columns">
				<input type="checkbox" checked="checked" class="watch-me" name="show_pass_fields" id="show_pass_field"><label for="show_pass_field">Create an account for later use</label>
							</div>
      <?php } ?>
 </div>
<div class="large-7 columns">
    <legend>Order List</legend>
					<table class="cart_page_table">
		<thead>
		<tr>
			<th>Product Image </th>
			<th>Name</th>
			<th>Unit.Price</th>
			<th>Quantity</th>
			<th>Subtotal</th>
		
			
		</tr>
		</thead>
		
		<tbody>
<?php if (!empty($_SESSION["cart_item"])) 
{ $sum = 0;
foreach ($_SESSION["cart_item"] as $item)
{
	$id=$item["id"];
	
	$sql="select thumb_image from product_image where product_id='$id'";
	$result=$dbc->query($sql);
	$row=$dbc->fetch($result);
	?>
		<tr>
			<td data-label="Product Image"  class="my_cart_img_block"><img src="<?php echo $row['thumb_image']; ?>" alt="<?php echo $item["name"]; ?>"></td>
			<td data-label="Product Name"  ><?php echo $item["name"]; ?></td>
			<td data-label="Unit.Price">Rs. <?php
														if (!empty($item["offer"])) { echo $item["offer"];
														} else { echo $item["price"];
														}
													?>/-</td>
			<td data-label="Quantity" ><?php echo $item["quantity"]; ?>
			</td>
			<td data-label="Subtotal">Rs. <?php
														if (!empty($item["offer"])) { echo $tot_price = str_replace(',', '', $item['offer']) * $item["quantity"];
														} else { echo $tot_price = str_replace(',', '', $item['price']) * $item["quantity"];
														}
														$sum = $sum + $tot_price;?>/-</td>
		
			
		</tr>
<?php } } 
else {?> <tr><td colspan="5" align="center">There are no items in this cart.</td></tr> <?php }?> 
		</tbody>
	</table>

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

 if (!empty($_SESSION["cart_item"])) {?>
	<div class="large-12 columns grnd_total">
							<div class="grnd_total_cus_2">
								<ul>
									<li class="sub_total_cart_page"><span>Sub Total </span>: <span> <i class="fa fa-rupee"></i> <?php
											if (!empty($sum)) { echo $sum;
											}
										?></span>  </li>
									<li class="sub_total_cart_page2"><span>Delivery Charge </span>: <span> <i class="fa fa-rupee"></i>  <?php echo $ship; ?></span>  </li>
								</ul>
							</div>
							<p class="separator"></p>
								<div class="grnd_total_cus_2">
								<ul>
									<li class="sub_total_cart_page sub_total_cart_page_cus_block1 "><span class="sub_page_cus_block1 ">Grand Total </span>: <span> <i class="fa fa-rupee"></i> <?php
											if (!empty($sum)) { echo $sum + $ship;
											}
										?></span>  </li>
									
								</ul>
							</div>							<input type="hidden" name="tot" value="<?php
										if (isset($sum)) { echo $sum + $ship;
										}
									?>" />
									
									<input type="hidden" name="ship" value="<?php
										if (isset($ship)) { echo $ship;
										}
									?>" />
                <div class="buttons reg_form">
          <div class="pull-right">
                      
            <input type="submit" value="Place order now" name="place_order" class="btn btn-primary">
          </div>
        </div>
						</div>
<?php } ?>				
  

  
		</div>



              </form>
						
						</fieldset>	
	

		</div>
		</div>
		

		
		
		</div>

					
			
			
			

		</section>
		


	<?php include_once('includes/header_content.php'); ?>	
			
	</div>
	<?php include_once('includes/footer_module.php'); ?>
	<?php include_once('includes/footer_content.php'); ?>


<script src="js/jquery-2.1.0.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/jquery.validate.methods.min.js"></script>
<script src="js/validation.js"></script>