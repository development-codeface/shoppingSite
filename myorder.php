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
	
	$select01 = "SELECT b . * 
FROM user_registration a
JOIN orders b ON a.id = b.user_id
WHERE a.email = '$_SESSION[onlineuser]' AND b.status = 0";
$query01 = $dbc -> query($select01);
$count = $dbc -> getNumRows($query01);

?>	
	<section class="content_section_main my_order_page">
			<div class="row">
			<div class="large-9 columns r_p0">
			<div id="content">
				<h2 class="page_title">My Order</h2>
				<form class="form-horizontal"  method="post" action="#">
					<table>
		<thead>
		<tr>
			<th>Order Summary </th>
			<th>Total Items</th>
			<th>Amount</th>
			<th>Date & Time</th>
			<th>Status</th>
			<th>Action</th>
			
		</tr>
		</thead>
		<tbody>
						                <?php
						                if($count > 0)
										{
											
						                while($array01 = $dbc -> fetch($query01))
						                {
						                	?>
		<tr id="order_data<?php echo $array01['id']; ?>">
			
			<td data-label="Order Summary "  class="my_order_img_block">
				<a href="myorder_details.php?id=<?php echo $array01['id']; ?>">View</a>
			</td>
			<td data-label="Total Items"  >
				<?php echo $array01['quantity']; ?>
			</td>
			<td data-label="Amount" >
				Rs. <?php echo $array01['amount']; ?>/-
			</td>
			<td data-label="Date & Time" >
				<?php echo $array01['order_date']; ?>
			</td>
			<td data-label="Status" ><?php if($array01['status'] == 0)
												{ echo 'Pending'; } else { echo 'Processing'; }?></td>
			<td data-label="Action" >
				<?php if($array01['status'] == 0)
				{?>				
				<a  onclick="delete_order(<?php echo $array01['id']; ?>)">
					<i class="fa fa-close "></i></a><?php } ?>
				</td>
			
		</tr>
<?php } } else {?> <tr><td class="a-center" colspan="6">You don't have any current orders.</td></tr> <?php } ?>
		</tbody>
	</table>
	
				
  
              </form>




		</div>
		</div>
		<div class="large-3 columns">
	<?php include_once('includes/myaccount_sidebar.php'); ?>	
		</div>	
			

		</section>

	<?php include_once('includes/header_content.php'); ?>	
			
	</div>
	<?php include_once('includes/footer_module.php'); ?>	
	<?php include_once('includes/footer_content.php'); ?>	


	
	
<script src="js/jquery-2.1.0.min.js"></script>
 
<script src="js/custom.js"></script>