<?php
	include_once("class/dbc_class.php");
	$dbc=new Dbc;
	
	//pagination
	$path=$_SERVER['PHP_SELF'];
	$targetpath="$path?option=processed_orders";
	$sql7="SELECT distinct c.order_id,b.name, b.status AS user_status, a.user_id,a.quantity, a.amount FROM orders a JOIN user_registration b JOIN order_products c ON a.user_id = b.id and c.order_id = a.id where c.status = 1 ORDER BY c.id ASC";
	$res7=$dbc->query($sql7);
	$total_count=mysql_num_rows($res7);
	
?>
<script type='text/javascript'>
function sell_order(id)
{
	var a=confirm('Are you sure you want to sell this order ?');
	if(a)
	window.location='phpfiles/do/sold_order.php?sell=' +id;
}
</script>

<script type='text/javascript'>
function cancel_order(id)
{
	var a=confirm('Are you sure you want to cancel this order ?');
	if(a)
	window.location='phpfiles/do/cancel_order.php?cancel=' +id;
}
</script>


 	  <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="administrator.php"><span class="d-icon"><i class="fi-home"></i></span></a>
      <a class="current" href="#">Orders Processed</a>
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
		<h3><span class="iconcommon"></span>Orders Processed</h3>
			<ul class="formBox">
				<div id="projects_area">
					<table class="dataTable" width="100%" cellpadding="0" cellspacing="0" border="0">
					<tbody>
					<tr>
					<th>SL NO.</th>
					<th>CUSTOMER</th>
					<th>TOTAL AMOUNT</th>
					<th>PROCESSED ON</th>
					<th>ORDER SUMMARY</th>
					<th>ACTION</th>
					</tr>
					<?php
					
					//query to list processed order details
					$sql1="SELECT distinct c.order_id,b.name, b.status AS user_status, a.user_id,a.quantity, a.amount FROM orders a JOIN user_registration b JOIN order_products c ON a.user_id = b.id and c.order_id = a.id where c.status = 1 ORDER BY c.id ASC LIMIT $offset, $rowsperpage";
					$res1=$dbc->query($sql1);
					$i=$offset+1;
						$sql2 = "select * from order_products where status = '1'";
						$res2 = $dbc -> query($sql2);
						$res3 = $dbc -> getNumRows($res2);
						if($res3 > 0)
						{
					while($or=$dbc->fetch($res1))
					{
						$sql3 = "select distinct b.order_date from order_products a join orders_process b on a.id = b.order_products_id where order_id = $or[order_id] and a.status = 1";
						$res4 = $dbc -> query($sql3);
						$res5 = $dbc -> fetch($res4);
						?>
						<tbody>
						<td><?php echo $i;?></td>
						<td><?php echo $or['name']; ?></td>
						<td>INR. <?php echo $or['amount']; ?></td>
						<td><?php echo $res5['order_date']; ?></td>
						<td><a href="administrator.php?option=view_order&id=<?php echo $or['order_id']; ?>">View (<?php echo $or['quantity']; ?>)</a></td>
						<td><?php
						if($or['user_status']==3)
						{
							?>
							<img src="images/block.jpg" height="24" width="27" title="Order is from a blocked user"/>
							<?php
						}
						else
						{
							?>
							<a class="ad_edit" href="javascript:sell_order(<?php echo $or['order_id'] ?>)"><span class="a_d_icon"><i class="fi-widget"></i></span> Sell</a>
						
						<?php
						}
						$i++;
					?>
					</tbody> <?php 
					} } else { ?> <tbody><td colspan="6"><?php echo 'No new orders.';?></td></tbody> <?php } ?>
					</table>
				</div>
			</ul>
	</div>