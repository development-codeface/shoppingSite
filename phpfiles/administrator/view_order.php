<?php
	include_once("class/dbc_class.php");
	$dbc=new Dbc;
	$order = $_GET['id'];
	
	//pagination
	$path=$_SERVER['PHP_SELF'];
	$targetpath="$path?option=view_order&id=$order";
	
	$sql4="SELECT b.id,b.name, b.price, a . *FROM order_products a JOIN product b ON a.product_id = b.id where order_id  = $order order by a.id asc";
	$res4=$dbc->query($sql4);
	$total_count=mysql_num_rows($res4);
?>

<script type='text/javascript'>
function process_order(id,product)
{
	var a=confirm('Are you sure you want to process this item ?');
	if(a)
	window.location='phpfiles/do/details_processorder.php?process=' +id+'&id='+product;
}
</script>

<script type='text/javascript'>
function cancel_order(id,product)
{
	var a=confirm('Are you sure you want to cancel this item ?');
	if(a)
	window.location='administrator.php?option=cancel_order&id=' +id+'&product='+product;
}
</script>

 	  <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="administrator.php"><span class="d-icon"><i class="fi-home"></i></span></a>
		 	<a href="administrator.php?option=manage_orders">Orders Received</a>
      <a class="current" href="#">order summary</a>
		 </nav>
		               <div class="pagination">  
		<?php  
		  
	      $rowsperpage = 10;
		  
		   if($total_count<>''){ include("class/pagination.php");}else { $offset=0; $rowsperpage=0;  }
		  
		  ?> 
          </div>    
      </div>

    </div>
    
 	<div class="columns">
<div class="order_results">
      
	<div class="dash_bg">
		<h3><span class="iconcommon"></span>Order Details</h3>
			<ul class="formBox">
				<div id="projects_area">
					<table class="dataTable" width="100%" cellpadding="0" cellspacing="0" border="0">
					<?php
					$select1=$dbc->query("select b.id,a.status,b.amount from user_registration a join orders b on b.user_id = a.id where b.status = 0 and b.id = '$order'");
					$array1=$dbc->fetch($select1);
					?>
					
					
					<?php
					$select2=$dbc->query("select * from billing where order_id = '$array1[id]'");
					$array2=$dbc->fetch($select2);
					?>
					<tr>
					<th>ORDER ID</th>
					<!--<th>USER GROUP</th>-->
					<th>BILLING ADDRESS</th>
					<?php if($array2['ship']){?><th> SHIPPING CHARGE</th> <?php }?>
					<th>GRAND TOTAL</th>
					<!-- <th></th> -->
					</tr>
					<tr>
					<td>#<?php echo $array1['id']; ?></td>
					<!--<td><?php if($array1['status'] == '0' || $array1['status'] == '1') { echo 'Registered'; }
					else if($array1['status'] == '3' || $array1['status'] == '4') { echo 'Blocked'; }
					else { echo 'Guest';}?></td>-->
					<td><?php echo $array2['name'];?><br/>
					<?php echo $array2['address'];?><br/>
					<?php echo $array2['city'];?><br/>
					<?php echo $array2['pincode'];?> - <?php echo $array2['state'];?><br/>
					<?php echo $array2['phone'];?><br/>
					<?php echo $array2['email'];?><br/></td>
					
					<?php if($array2['ship']){?><td> <?php echo $array2['ship'];?></td> <?php }?>
					<td>INR. <?php echo $array1['amount']; ?></td>
					<!-- <td><a href="#">View PDF</a></td> -->
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
					<th>QUANTITY</th>
					<th>TOTAL</th>
					<th>ACTION</th>
					</tr>
					<?php
					
					//query to list received order details
					$sql1="SELECT a.user_id,b.id,b.name, b.price, b.offer_price, a . *FROM order_products a JOIN product b ON a.product_id = b.id where order_id  = $order order by a.id asc LIMIT $offset, $rowsperpage";
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
							 ?><img src="<?php echo $a1['thumb_image'] ?>" width="100" /></td>
						<td><a href="phpfiles/do/view_details.php?id=<?php echo $or['product_id']; ?>" onclick="javascript&#58;window.open(this.href, this.target, 'width=600,height=600,screenX=400,screenY=20,resizable,scrollbars');return false;" title="View Product">
							<?php echo $or['name'] ?>
						</td>
						<td><?php echo $or['quantity']; ?></td>
						<td>INR. <?php if(!empty($or['offer_price'])) { echo str_replace(',', '', $or['offer_price']) * $or['quantity']; } else { echo str_replace(',', '', $or['price']) * $or['quantity']; }?></td>
						<td><?php $res5 = $dbc->query("select * from orders_process where order_products_id = $or[id]"); 
							$tot = mysql_num_rows($res5);
							if($tot>0)
							{
							echo 'Processed..';
							}
							else
							{
								$sql3 = "select status from user_registration where id = '$or[user_id]'";
								$q2 = $dbc -> query($sql3);
								$ar = $dbc -> fetch($q2);
								if($ar['status'] == '0' || $ar['status'] == '1' || $ar['status'] == '2')
								{
								?>
							<a class="ad_edit" href="javascript:process_order(<?php echo $or['order_id'] ?>,<?php echo $or['product_id'] ?>);"><span class="a_d_icon"><i class="fi-widget"></i></span> Process</a>
							<?php } ?>
							<a class="ad_delete" href="javascript:cancel_order(<?php echo $or['order_id'] ?>,<?php echo $or['product_id'] ?>);" onclick="return cancel();"><span class="a_d_icon"><i class="fi-trash"></i></span> Cancel</a></td>
						
						<?php
						}
						$i++;
					}
					?>
					</table>
				</div>
			</ul>
	</div>