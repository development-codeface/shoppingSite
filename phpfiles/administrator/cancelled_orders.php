<?php
	include_once("class/dbc_class.php");
	$dbc=new Dbc;
	
	//pagination
	$path=$_SERVER['PHP_SELF'];
	$targetpath="$path?option=cancelled_orders";
	$sql4="select distinct a.order_id,c.name, a.reason, a.date from cancel_order a join orders b join user_registration c on b.id = a.order_id and c.id = b.user_id order by c.id desc";
	$res4=$dbc->query($sql4);
	$total_count=mysql_num_rows($res4);	
?>

 	  <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="administrator.php"><span class="d-icon"><i class="fi-home"></i></span></a>
      <a class="current" href="#">Cancelled orders</a>
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
		<h3><span class="iconcommon"></span>Cancelled Orders</h3>
			<ul class="formBox">
				<div id="projects_area">
					<table class="dataTable" width="100%" cellpadding="0" cellspacing="0" border="0">
					<tbody>
					<tr>
					<th>SL NO.</th>
					<th>USER</th>
					<th>CANCELLED ON</th>
					<th>DETAILS</th>
					</tr>
					<?php
					
					//query to list sold order details
					$sql1="select distinct a.order_id,c.name, a.date from cancel_order a join orders b join user_registration c on b.id = a.order_id and c.id = b.user_id order by c.id desc LIMIT $offset, $rowsperpage";
					$res1=$dbc->query($sql1);
					$i=$offset+1;
					$sql2 = "select * from cancel_order";
					$res2 = $dbc -> query($sql2);
					$res3 = $dbc -> getNumRows($res2);
					if($res3 > 0)
					{
					while($or=$dbc->fetch($res1))
					{
						$sql3 = "select product_id from cancel_order where order_id = '$or[order_id]'";
						$res5 = $dbc -> query($sql3);
						$res6 = $dbc -> getNumRows($res5);
						?>
						<tbody>
						<td><?php echo $i; ?></td>
						<td><?php echo $or['name']; ?></td>
						<td><?php echo $or['date']; ?></td>
						<td><a href="administrator.php?option=view_cancelled&id=<?php echo $or['order_id']; ?>">View (<?php echo $res6; ?>)</a></td>
						<?php
						$i++;
					?>
					</tbody><?php 
					} } else { ?> <tbody><td colspan="6"><?php echo 'No new orders.';?></td></tbody> <?php } ?>
					</table>
				</div>
			</ul>
	</div>