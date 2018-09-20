<?php include_once('includes/header_links.php'); 
if($_SESSION['onlineuser'] == '')
	{
		echo "<script>window.location = 'index.php'</script>";
	}

?>	
	
	
<title>My Order</title>
 <meta charset="UTF-8"> 
	<link href="css/style-table.css" rel="stylesheet">
	<div class="container my_order">
	
	<?php include_once('includes/header_content.php'); ?>	
	<?php include_once('res_menu.php'); 

if(isset($_REQUEST['id']))
{
 $id=$_REQUEST['id'];
}
$select01 = "SELECT a.id as product_id,a.name,a.price,a.offer_price,a.brand,a.author,b.quantity as quantity,b.order_date,b.status,b.id as order_pdt_id,b.order_id,b.id
 FROM product a left JOIN order_products b ON a.id = b.product_id WHERE b.order_id = '$id'";
$query01 = $dbc -> query($select01);
$count = $dbc -> getNumRows($query01);

$query03 = $dbc -> query("select amount from orders where status = 0 and id = '$id'");
$array03 = $dbc -> fetch($query03);

$query04 = $dbc -> query("select * from billing where order_id = '$id'");
$array04 = $dbc -> fetch($query04);
?>

	
	<section class="content_section_main my_order_page">
			<div class="row">
			<div class="large-9 columns r_p0">
			<div id="content">
				<h2 class="page_title">Order Details</h2>
					<table>
		<thead>
		<tr>
			<th>Order ID</th>
			<th>Billing Address</th>
			<th>Shipping</th>
			<th>Grand Total</th>
			
		</tr>
		</thead>
		<tbody>

		<tr id="order_items">
			
			<td data-label="Item "  class="my_order_img_block">
				#<?php echo $id; ?>
			</td>
			<td data-label="Address"  >
				<?php echo $array04['name'];?><br/>
					<?php echo $array04['address'];?><br/>
					<?php echo $array04['city'];?><br/>
					<?php echo $array04['pincode'];?> - <?php echo $array04['state'];?><br/>
					Ph. : <?php echo $array04['phone'];?><br/>
					Email : <?php echo $array04['email'];?><br/>
			</td>
			<td data-label="Shipping" >
				Rs. <?php echo trim($array04['ship'], "INR."); ?>/-
			</td>
			<td data-label="Amount" >
				Rs. <?php echo number_format($array03['amount'], 2); ?>/-
			</td>
			
		</tr>

		</tbody>
	</table>
	
				
  




		</div>
		</div>
		<div class="large-3 columns">
	<?php include_once('includes/myaccount_sidebar.php'); ?>	
		</div>	
			
			<div class="large-12 columns r_p0">
			<div id="content">
				<h2 class="page_title"></h2>
					<table>
		<thead>
		<tr>
			<th></th>
			<th>Item</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Date & Time</th>
			
		</tr>
		</thead>
		<tbody>
						                <?php
						                if($count > 0)
										{
											
						                while($array01 = $dbc -> fetch($query01))
						                {
						                	$select02 = "SELECT thumb_image FROM product_image WHERE product_id = '$array01[product_id]'";
											$query02 = $dbc -> query($select02);
											$array02 = $dbc -> fetch($query02);
											
											
												$sql1="select * from orders_process where order_products_id='$array01[id]'";
												$result1=$dbc->query($sql1);
												$row1=$dbc->fetch($result1);
												
						                		?>
		<tr id="order_items<?php echo $array01["order_pdt_id"]; ?>">
			
			<td data-label="Item "  class="">
<img width="100" src="<?php echo $array02['thumb_image']; ?>" />
			</td>
			<td data-label="Item Name"  ><?php echo $array01['name']; ?></td>
			<td data-label="Quantity" ><?php
						    						
													echo $array01['quantity'];
												   ?></td>
			<td data-label="Price" ><?php if(!empty($array01['offer_price'])) { echo $array01['offer_price']; } else { echo $array01['price']; }?></td>
			<td data-label="Date & Time" ><?php echo $array01['order_date']; ?></td> 
			
		</tr>
<?php }} else {?> <tr><td class="a-center" colspan="5">Oops! Looks like you don't have any current orders.</td></tr> <?php } ?>


		</tbody>
	</table>
	
				
  




		</div>
		</div>
		</section>
		
		

	<?php include_once('includes/header_content.php'); ?>	
			
	</div>
	<?php include_once('includes/footer_module.php'); ?>	
	<?php include_once('includes/footer_content.php'); ?>	


	
	
<script src="js/jquery-2.1.0.min.js"></script>
 
<script src="js/custom.js"></script>