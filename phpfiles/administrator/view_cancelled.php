<?php
include_once ("class/dbc_class.php");
$dbc = new Dbc;
$order = $_GET['id'];

//pagination
$path = $_SERVER['PHP_SELF'];
$targetpath = "$path?option=view_cancelled&id=$order";

$sql4 = "select b.name, b.price, product_id, a.quantity from cancel_order a join product b on b.id = a.product_id where order_id = '$order' ORDER BY a.id desc";
$res4 = $dbc -> query($sql4);
$total_count = mysql_num_rows($res4);
?>

<script type='text/javascript'>
	function sell_order(id, product) {
		var a = confirm('Are you sure you want to sell this order ?');
		if (a)
			window.location = 'phpfiles/do/details_sellorder.php?sell=' + id + '&id=' + product;
	}
</script>


 	  <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="administrator.php"><span class="d-icon"><i class="fi-home"></i></span></a>
      <a href="administrator.php?option=cancelled_orders">Cancelled Orders</a>
      <a class="current" href="#">Order Details</a>
		 </nav>
		         
          <div class="pagination">  
		<?php

			$rowsperpage = 10;

			if ($total_count <> '') {
				include ("class/pagination.php");
			} else { $offset = 0;
				$rowsperpage = 0;
			}
		  ?> 
          </div>
      </div>

    </div>
    
 	<div class="columns">
<div class="order_results">
<div class="hd_con" style="float:left; width:100%;">
	  
	<form name="search" action="" method="post">
       
      <div class="search_con">
</div>
     
		</form>

      </div>
	<div class="dash_bg">
		<h3><span class="iconcommon"></span>Order Details</h3>
			<ul class="formBox">
				<div id="projects_area">
					<table class="dataTable" width="100%" cellpadding="0" cellspacing="0" border="0">
					<?php
					$select1=$dbc->query("select b.id,a.status from user_registration a join orders b on b.user_id = a.id where b.status = 0 and b.id = '$order'");
					$array1=$dbc->fetch($select1);
					?>
					<tr>
					<th>ORDER ID</th>
					<!--<th>USER GROUP</th>-->
					<th>BILLING ADDRESS</th>
					</tr>
					<tr>
					<td>#<?php echo $order; ?></td>
					<!---<td><?php if($array1['status'] == '0' || $array1['status'] == '1') { echo 'Registered'; }
					else if($array1['status'] == '3' || $array1['status'] == '4') { echo 'Blocked'; }
					else { echo 'Guest';}?></td>--->
					<?php
					$select2=$dbc->query("select * from billing where order_id = '$order'");
					$array2=$dbc->fetch($select2);
					?>
					<td><?php echo $array2['name'];?><br/>
					<?php echo $array2['address'];?><br/>
					<?php echo $array2['city'];?><br/>
					<?php echo $array2['pincode'];?> - <?php echo $array2['state'];?><br/>
					<?php echo $array2['phone'];?><br/>
					<?php echo $array2['email'];?><br/></td>
										</tr>
					</table>
				</div>
			</ul>
	</div>
	<div class="dash_bg">
		<h3><span class="iconcommon"></span>Items Ordered</h3>
			<ul class="formBox">
				<div id="projects_area">
					<table class="dataTable" width="100%" cellpadding="0" cellspacing="0" border="0">
					<tbody>
					<tr>
					<th>SL NO.</th>
					<th>IMAGE</th>
					<th>PRODUCT DETAIL</th>
					<th>REASON</th>
					<th>QUANTITY</th>
					<th>TOTAL</th>
					<!-- <th>ACTION</th> -->
					</tr>
					<?php
					
					//query to list received order details
					$sql1="select b.name, b.price, b.offer_price, product_id, a.quantity, a.reason from cancel_order a join product b on b.id = a.product_id where order_id = '$order' ORDER BY a.id desc LIMIT $offset, $rowsperpage";
					$res1=$dbc->query($sql1);
					$i=$offset+1;
					while($or=$dbc->fetch($res1))
					{
						?>
						<tbody>
						<td><?php echo $i; ?></td>
						<td>
							<?php $sql2 = "select thumb_image from product_image where product_id = '$or[product_id]'";
							$q1 = $dbc -> query($sql2);
							$a1 = $dbc -> fetch($q1);
							 ?><img width="100" src="<?php echo $a1['thumb_image']; ?>" /></td>
						<td><a href="phpfiles/do/view_details.php?id=<?php echo $or['product_id']; ?>" onclick="javascript&#58;window.open(this.href, this.target, 'width=600,height=600,screenX=400,screenY=20,resizable,scrollbars');return false;" title="View Product">
							<?php echo $or['name']; ?></td>
							<td><?php echo $or['reason']; ?></td>
						<td><?php echo $or['quantity']; ?></td>
						<td>INR. <?php if(!empty($or['offer_price'])) { echo $or['offer_price'] * $or['quantity']; } else { echo $or['price'] * $or['quantity']; }?></td>
						<?php
						$i++;
						}
					?>
					</table>
				</div>
			</ul>
	</div>