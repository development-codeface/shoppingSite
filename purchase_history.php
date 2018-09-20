<?php include_once('includes/header_links.php');
if($_SESSION['onlineuser'] == '')
	{
		echo "<script>window.location = 'index.php'</script>";
	}
 ?>	
	
	
<title>Purchase History</title>
 <meta charset="UTF-8"> 
	<link href="css/style-table.css" rel="stylesheet">
	<div class="container purchse_hstry">
	
	<?php include_once('includes/header_content.php'); ?>	
	<?php include_once('res_menu.php');
	
$select01 = "SELECT b . * 
FROM user_registration a
JOIN orders b ON a.id = b.user_id
WHERE a.email = '$_SESSION[onlineuser]' AND b.status =1";
$query01 = $dbc -> query($select01);
$count = $dbc -> getNumRows($query01);
?>
	<section class="content_section_main my_order_page">
			<div class="row">
			<div class="large-9 columns">
			<div id="content">
				<h2 class="page_title">Purchase History</h2>
				<form class="form-horizontal"  method="post" action="#">
					<table>
		<thead>
		<tr>
			<th>Order Details</th>
			<th>Total Items</th>
			<th>Amount</th>
			<th>Date & Time</th>
			<th>Bill</th>
		
			
		</tr>
		</thead>
		<tbody>
						                <?php
						                if($count > 0)
										{
											
						                while($array01 = $dbc -> fetch($query01))
						                {
												
												$sql="select * from order_products where order_id='$array01[id]'";
												$result=$dbc->query($sql);
												$row=$dbc->fetch($result);
												
												$sql1="select * from orders_process where order_products_id='$row[id]'";
												$result1=$dbc->query($sql1);
												$row1=$dbc->fetch($result1);
												
											
						                	$select02 = "SELECT * FROM orders_sales where orders_process_id='$row1[id]'";
											$query02 = $dbc -> query($select02);
											$array02 = $dbc -> fetch($query02);
											
						                		?>
		<tr id="order_data<?php echo $array01['id']; ?>">
			<td data-label="Order Details" class="my_order_img_block">
				<a href="history_details.php?id=<?php echo $array01['id']; ?>">View</a>
			</td>
			<td data-label="Total Items" ><?php echo $array01['quantity']; ?></td>
			<td data-label="Amount" >Rs. <?php echo $array01['amount']; ?>/-</td>
			<td data-label="Date & Time" ><?php echo $array02['order_date']; ?></td>
			<td data-label="Bill" ><a target="_blank" href="phpfiles/do/pdf/bill.php?id=<?php echo $array01['id']; ?>">View</a></td>
		
			
		</tr>
<?php } } ?>



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

