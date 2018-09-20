<?php
	include_once("class/dbc_class.php");
	$dbc=new Dbc;
	 $p=$_REQUEST['search'];
    $s=$_REQUEST['select'];
	
	//search
	if(isset($_POST['search']))
	{
		 $se=$_POST['product_name'];
		 $sel=$_POST['sale'];
		echo "<script>window.location='administrator.php?option=product_search&search=$se&select=$sel'</script>";
	}

	 //pagination
	$path=$_SERVER['PHP_SELF'];
	$targetpath="$path?option=product_search&search=$p&select=$s";
	if($s == "orders")
	{ $sql1 = "select b.quantity, d.name,a.name, b.order_date from product a join order_products b join orders c join user_registration d on b.product_id = a.id and c.id = b.order_id and b.user_id = d.id where a.name like '%$p%'"; }
	if($s == "orders_process")
	{ $sql1 = "select b.order_date, d.name, c.quantity, a.name from product a join orders_process b join order_products c join user_registration d on a.id = b.product_id and c.id = b.order_products_id and d.id = b.user_id where a.name like '%$p%'"; }
	if($s == "orders_sales")
	{ $sql1 = "select e.order_date, d.name, c.quantity, a.name from product a join orders_process b join order_products c join user_registration d join orders_sales e on a.id = b.product_id and c.id = b.order_products_id and d.id = b.user_id and e.orders_process_id = b.id where a.name like '%$p%'"; }
	$res1=$dbc->query($sql1);
	$total_count=mysql_num_rows($res1);
	 
?>
 	  <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="#"><span class="d-icon"><i class="fi-home"></i></span></a>
      <a class="current" href="#">Search by product</a>
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
<div class="hd_con" style="float:left; width:100%;">
	  <form name="search" action="" method="post">
      <div class="search_con" style="margin-left: 50px; margin-top: 10px; width: 80%">
	 <!-- <li class="form_cnt_con" style="width:750px"> -->
	 <input type="text" name="product_name" id="product_name" class="formTextBox" placeholder="--Enter product name--" value="<?php echo $p; ?>" />
	  <select name="sale" class="formTextBox" style="width: 14%"><option value="" >--Select--</option>
	  <option value="orders" <?php if($s=="orders") echo 'selected'?>>Orders</option>
	   <option value="orders_process" <?php if($s=="orders_process") echo 'selected'?>>Processed</option>
	  <option value="orders_sales" <?php if($s=="orders_sales") echo 'selected'?>>Sold</option>
	 </select>
	  <input type="Submit" class="button tiny radius" value="Search" style="margin-top:3px;" name="search"/>
	<?php if($total_count>0) { ?>
		<a href="phpfiles/do/pdf/pro_pdf.php?search=<?php echo $p ?>&category=<?php echo $s ?>" target="_blank"><img src="images/pdf.png" /></a>
		<a href="phpfiles/do/excel/excel_pro.php?search=<?php echo $p ?>&category=<?php echo $s ?>" ><img src="images/excel.png" /></a>
	<?php } ?>
      </div>       

        </form>

      </div>
	  

	<div class="dash_bg">

		<h3><span class="iconcommon"></span>By Product</h3>
			<ul class="formBox">
				<div id="projects_area">
					<table class="dataTable" width="100%" cellpadding="0" cellspacing="0" border="0">
					<tbody>
					<tr>
					<th>SL NO.</th>
					<th>PRODUCT NAME</th>
					<th>USER</th>
					<th>QUANTITY</th>
					<th>
						<?php 
						if($s=='orders')
						{ echo "ORDERED ON" ; }
						if($s=='orders_process')
						{ echo "PROCESSED ON" ; }
						if($s=='orders_sales')
						{ echo "SOLD ON" ; }
						?>
						
					</th>
					</tr>
					<?php
					if($s == "orders")
					{ $sql2 = "select b.quantity, d.name as user,a.name, b.order_date from product a join order_products b join orders c join user_registration d on b.product_id = a.id and c.id = b.order_id and b.user_id = d.id where a.name like '%$p%' LIMIT $offset, $rowsperpage"; }
					
					if($s == "orders_process")
					{ $sql2 = "select b.order_date, d.name as user, c.quantity, a.name from product a join orders_process b join order_products c join user_registration d on a.id = b.product_id and c.id = b.order_products_id and d.id = b.user_id where a.name like '%$p%' LIMIT $offset, $rowsperpage"; }
					
					if($s == "orders_sales")
					{ $sql2 = "select e.order_date, d.name as user, c.quantity, a.name from product a join orders_process b join order_products c join user_registration d join orders_sales e on a.id = b.product_id and c.id = b.order_products_id and d.id = b.user_id and e.orders_process_id = b.id where a.name like '%$p%' LIMIT $offset, $rowsperpage"; }
					$res2=$dbc->query($sql2);
					$i=$offset+1;
					if($total_count>0)
					{
					while($res3=$dbc->fetch($res2))
					{
						?>
						<tbody>
						<td><?php echo $i; ?></td>
						<td><?php echo $res3['name'];?></td>
						<td><?php echo $res3['user']; ?></td>
						<td><?php echo $res3['quantity']; ?></td>
						<td><?php echo $res3['order_date']; ?></td>
						<?php
						$i++;
					}
					}
					else
					{
				 ?>
                 <tr><td colspan="5">Sorry.. No Results Found.</td></tr>
                 <?php
				 }	
					?>
					</tbody>
					</table>
				</div>
			</ul>
</div>
<script language="javascript" type="text/javascript">
var frmvalidator = new Validator("search");
frmvalidator.addValidation("product_name","req","please enter the productname");
var frmvalidator = new Validator("search");
frmvalidator.addValidation("sale","req","Please select category");
</script>