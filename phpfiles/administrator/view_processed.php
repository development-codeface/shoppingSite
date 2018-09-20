<?php
	include_once("class/dbc_class.php");
	$dbc=new Dbc;
	$order = $_GET['id'];
	
	//pagination
	$path=$_SERVER['PHP_SELF'];
	$targetpath="$path?option=view_processed&id=$order";
	
	$sql4="SELECT b.id, b.name, b.price, a. * FROM order_products a JOIN product b ON a.product_id = b.id WHERE order_id = $order ORDER BY a.id ASC";
	$res4=$dbc->query($sql4);
	$total_count=mysql_num_rows($res4);
?>

<script type='text/javascript'>
function sell_order(id,product)
{
	var a=confirm('Are you sure you want to sell this order ?');
	if(a)
	window.location='phpfiles/do/details_sellorder.php?sell=' +id+'&id='+product;
}
</script>


 	  <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="administrator.php"><span class="d-icon"><i class="fi-home"></i></span></a>
		 	<a href="administrator.php?option=processed_orders">Orders Processed</a>
      <a class="current" href="#">orders details</a>
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
<div class="hd_con" style="float:left; width:100%;">

      </div>
	<div class="dash_bg">
		<h3><span class="iconcommon"></span>Order Details</h3>
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
					<!-- <th>ACTION</th> -->
					</tr>
					<?php
					
					//query to list received order details
					$sql1="SELECT b.id, b.name, b.price, b.offer_price, a. * FROM order_products a JOIN product b ON a.product_id = b.id WHERE order_id = $order ORDER BY a.id ASC LIMIT $offset, $rowsperpage";
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
							<?php echo $or['name'];
							?></td>
						<td><?php echo $or['quantity']; ?></td>
						<td>INR. <?php if(!empty($or['offer_price'])) { echo str_replace(',', '', $or['offer_price']) * $or['quantity']; } else { echo str_replace(',', '', $or['price']) * $or['quantity']; }?></td>
						<?php
						$i++;
					}
					?>
					</table>
				</div>
			</ul>
	</div>