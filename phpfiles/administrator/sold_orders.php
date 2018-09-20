<?php
	include_once("class/dbc_class.php");
	$dbc=new Dbc;
	
	//pagination
	$path=$_SERVER['PHP_SELF'];
	$targetpath="$path?option=sold_orders";
	$sql4="SELECT distinct c.order_id,b.name, b.status AS user_status, a.user_id,a.quantity, a.amount FROM orders a JOIN user_registration b JOIN order_products c ON a.user_id = b.id and c.order_id = a.id where c.status = 2 ORDER BY c.id desc";
	$res4=$dbc->query($sql4);
	$total_count=mysql_num_rows($res4);	
?>

 	  <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="administrator.php"><span class="d-icon"><i class="fi-home"></i></span></a>
      <a class="current" href="#">orders sold</a>
		 </nav>
		               <div class="pagination">  
		<?php  
		  
	      $rowsperpage =10;
		  
		   if($total_count<>''){ include("class/pagination.php");}else { $offset=0; $rowsperpage=0;  }
		  
		  ?> 
          </div>    
      </div>

    </div>
    
 	<div class="columns">
<div class="order_results">

	<div class="dash_bg">
		<h3><span class="iconcommon"></span>Orders Sold</h3>
			<ul class="formBox">
				<div id="projects_area">
					<table class="dataTable" width="100%" cellpadding="0" cellspacing="0" border="0">
					<tbody>
					<tr>
					<th>SL NO.</th>
					<th>CUSTOMER</th>
					<th>TOTAL AMOUNT</th>
					<th>SOLD ON</th>
					<th>ITEMS</th>
					<th>BILL</th>
					</tr>
					<?php
					
					//query to list sold order details
					$sql1="SELECT distinct c.order_id,b.name, b.status AS user_status, a.user_id,a.quantity, a.amount FROM orders a JOIN user_registration b JOIN order_products c ON a.user_id = b.id and c.order_id = a.id where c.status = 2 ORDER BY c.id desc LIMIT $offset, $rowsperpage";
					$res1=$dbc->query($sql1);
					$i=$offset+1;
					$sql2 = "select * from order_products where status = '2'";
					$res2 = $dbc -> query($sql2);
					$res3 = $dbc -> getNumRows($res2);
					if($res3 > 0)
					{
					while($or=$dbc->fetch($res1))
					{
						$sql5 = "select distinct a.order_date from orders_sales a join orders_process b join order_products c on b.id = a.orders_process_id and c.id = b.order_products_id where c.order_id = $or[order_id] and c.status = 2";
						$res6 = $dbc -> query($sql5);
						$res7 = $dbc -> fetch($res6);
						?>
						<tbody>
						<td><?php echo $i; ?></td>
						<td><?php echo $or['name']; ?></td> 
						<td>INR. <?php echo $or['amount']; ?></td>
						<td><?php echo $res7['order_date']; ?></td>
						<td><a href="administrator.php?option=view_processed&id=<?php echo $or['order_id']; ?>">Products (<?php echo $or['quantity']; ?>)</a></td>
						<td><a target="_blank" href="phpfiles/do/pdf/bill.php?id=<?php echo $or['order_id'];?>">Generate</a></td>
						<?php
						$i++;
					?>
					</tbody><?php 
					} } else { ?> <tbody><td colspan="6"><?php echo 'No new orders.';?></td></tbody> <?php } ?>
					</table>
				</div>
			</ul>
	</div>