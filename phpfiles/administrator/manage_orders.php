<?php
	include_once("class/dbc_class.php");
	$dbc=new Dbc;

	//pagination
	$path=$_SERVER['PHP_SELF'];
	$targetpath="$path?option=manage_orders";
	
	$sql4="SELECT distinct c.order_id,b.name, b.status AS user_status, a . * FROM orders a JOIN user_registration b JOIN order_products c ON a.user_id = b.id and c.order_id = a.id where c.status = 0 ORDER BY id ASC";
	$res4=$dbc->query($sql4);
	$total_count=mysql_num_rows($res4);
?>

<!--process function!-->
<script type='text/javascript'>
function process_order(id)
{
	var a=confirm('Are you sure you want to process this order ?');
	if(a)
	window.location='phpfiles/do/process_order.php?process=' +id;
}
</script>

<script type='text/javascript'>
function cancel_order(id)
{
	var a=confirm('Are you sure you want to cancel this order ?');
	if(a)
	window.location='administrator.php?option=cancel_order&id=' +id;
}
</script>

 	  <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="administrator.php"><span class="d-icon"><i class="fi-home"></i></span></a>
      <a class="current" href="#">Orders Received</a>
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
		<h3><span class="iconcommon"></span>Orders Received</h3>
			<ul class="formBox">
				<div id="projects_area">
					<table class="dataTable" width="100%" cellpadding="0" cellspacing="0" border="0">
					<tbody>
					<tr>
					<th>SL NO.</th>
					<th>ORDER ID</th>
					<th>CUSTOMER</th>
					<th>TOTAL AMOUNT</th>
					<th>DATE</th>
					<th>ORDER SUMMARY</th>
					<th>ACTIONS</th>
					</tr>
					<?php
					
					//query to list received order details
					$sql1="SELECT distinct c.order_id,b.name, b.status AS user_status, a . * FROM orders a JOIN user_registration b JOIN order_products c ON a.user_id = b.id and c.order_id = a.id where c.status = 0 ORDER BY id ASC LIMIT $offset, $rowsperpage";
					$res1=$dbc->query($sql1);
					$i=$offset+1;
					$sql2 = "select * from order_products where status = '0'";
					$res2 = $dbc -> query($sql2);
					$res3 = $dbc -> getNumRows($res2);
					if($res3 > 0)
					{
					while($or=$dbc->fetch($res1))
					{
					?>
						<tbody>
						<td><?php echo $i;?></td>
						<td><?php echo $or['order_id'];?></td>
						<td><?php echo $or['name']; ?></td>
						<td>INR. <?php echo $or['amount']; ?></td>
						<td><?php echo $or['order_date']; ?></td>
						<td><a href="administrator.php?option=view_order&id=<?php echo $or['id']; ?>">View (<?php echo $or['quantity'] ?>)</a></td>
						<td><?php
						if($or['user_status']==3 || $or['user_status']==4)
						{
							?>
							<img src="images/block.jpg" height="24" width="27" title="Order from blocked user"/>
							<a class="ad_delete" href="javascript:cancel_order(<?php echo $or['id'] ?>)" onclick="return cancel();"><span class="a_d_icon"><i class="fi-trash"></i></span> Cancel</a></td>
							<?php
						}
						else
						{
							?>
							<a class="ad_edit" href="javascript:process_order(<?php echo $or['id'] ?>)"><span class="a_d_icon"><i class="fi-widget"></i></span> Process</a>
							<a class="ad_delete" href="javascript:cancel_order(<?php echo $or['id'] ?>)" onclick="return cancel();"><span class="a_d_icon"><i class="fi-trash"></i></span> Cancel</a></td>
						
						<?php
						}
						$i++;
						}
					?>
					</tbody> <?php } else { ?> <tbody><td colspan="6"><?php echo 'No new orders.';?></td></tbody> <?php } ?>
					</table>
				</div>
			</ul>
	</div>