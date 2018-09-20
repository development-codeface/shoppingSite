<?php
	include_once("class/dbc_class.php");
	$dbc=new Dbc;
	
	//search
	if($_POST['search'])
	{
		$ye=$_POST['year'];
		$ca=$_POST['table'];
		echo "<script>window.location='administrator.php?option=yearly_search&year=$ye&category=$ca'</script>";
	}
	
	//pagination
	$yr=$_GET['year'];
	$cy=$_GET['category'];
	$path=$_SERVER['PHP_SELF'];
	$targetpath="$path?option=yearly_search&year=$yr&category=$cy";
	if($cy == "orders")
	{ $sql1 = "select b.user_id, b.quantity,b.order_date,c.name from orders a join order_products b join product c on b.order_id = a.id and c.id = b.product_id where year(a.order_date) = '$yr'"; }
if($cy == "orders_process")
	{ $sql1 = "select c.quantity,a.user_id,b.name, a.order_date from orders_process a join product b join order_products c on b.id = a.product_id and c.id = a.order_products_id where year(a.order_date) = '$yr'"; }
if($cy == "orders_sales")
	{ $sql1 = "select c.quantity,d.name, a.order_date, a.user_id from orders_sales a join orders_process b join order_products c join product d on a.orders_process_id = b.id and c.id = b.order_products_id and d.id = a.product_id where year(a.order_date) = '$yr'"; }
	$res1=$dbc->query($sql1);
	$total_count=mysql_num_rows($res1);
	
?>
 	  <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="#"><span class="d-icon"><i class="fi-home"></i></span></a>
      <a class="current" href="#">Search by year</a>
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
	  			  <!-- <li class="form_cnt_con" style="width:800px"> -->
                 <select name="year" id="year" class="formTextBox" value="" style="width: 14%"/><option value="">--Year--</option>
				<option value="2016" <?php if($yr==2016) echo 'selected'?>>2016</option>
				<option value="2017" <?php if($yr==2017) echo 'selected'?>>2017</option>
				<option value="2018" <?php if($yr==2018) echo 'selected'?>>2018</option>
				<option value="2019" <?php if($yr==2019) echo 'selected'?>>2019</option>
				<option value="2020" <?php if($yr==2020) echo 'selected'?>>2020</option>
				 </select>
                 <select name="table" id="table" class="formTextBox" value="" style="width: 14%"/><option value="">--Select--</option>
	  <option value="orders" <?php if($cy=="orders") echo 'selected'?>>Orders</option>
	   <option value="orders_process" <?php if($cy=="orders_process") echo 'selected'?>>Processed</option>
	  <option value="orders_sales" <?php if($cy=="orders_sales") echo 'selected'?>>Sold</option>
				 </select>
	<input type="Submit" class="button tiny radius" value="Search" style="margin-top:3px;" name="search"/>
<?php if($total_count>0) { ?>
		<a href="phpfiles/do/pdf/year_pdf.php?year=<?php echo $yr ?>&category=<?php echo $cy ?>" target="_blank"><img src="images/pdf.png" /></a>
		<a href="phpfiles/do/excel/excel_year.php?year=<?php echo $yr ?>&category=<?php echo $cy ?>" ><img src="images/excel.png" /></a>
	<?php } ?>      
                  <div class="form_btm_line"></div>
                <!-- </li> --></div>      
        </form>

      </div>
	  

	<div class="dash_bg">

		<h3><span class="iconcommon"></span>By Year</h3>
			<ul class="formBox">
				<div id="projects_area">
					<table class="dataTable" width="100%" cellpadding="0" cellspacing="0" border="0">
					<tbody>
					<tr>
					 <th>SL NO.</th>
					<th>PRODUCT NAME</th>
					<th>USER</th>
					<th>QUANTITY</th>
					<th><?php 
						if($cy=='orders')
						{ echo "ORDER DATE" ; }
						if($cy=='orders_process')
						{ echo "PROCESS DATE" ; }
						if($cy=='orders_sales')
						{ echo "SOLD DATE" ; }
						?></th>
					</tr>
					<?php
					if($cy == "orders")
					{ $sql2 = "select b.user_id,b.quantity,b.order_date,c.name from orders a join order_products b join product c on b.order_id = a.id and c.id = b.product_id where year(a.order_date) = '$yr' LIMIT $offset, $rowsperpage"; }
					if($cy == "orders_process")
					{ $sql2 = "select c.quantity,a.user_id,b.name, a.order_date from orders_process a join product b join order_products c on b.id = a.product_id and c.id = a.order_products_id where year(a.order_date) = '$yr' LIMIT $offset, $rowsperpage"; }
					if($cy == "orders_sales")
					{ $sql2 = "select c.quantity,d.name, a.order_date, a.user_id from orders_sales a join orders_process b join order_products c join product d on a.orders_process_id = b.id and c.id = b.order_products_id and d.id = a.product_id where year(a.order_date) = '$yr' LIMIT $offset, $rowsperpage"; }
					$res2=$dbc->query($sql2);
					$i=$offset+1;
					if($total_count>0)
					{
					while($res3=$dbc->fetch($res2))
					{
						$sql3="select name from user_registration where id=$res3[user_id]";
						$res4=$dbc->query($sql3);
						$res5=$dbc->fetch($res4);
						?>
						<tbody>
						<td><?php echo $i; ?></td>
						<td><?php echo $res3['name'];?></td>
						<td><?php echo $res5['name']; ?></td>
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
frmvalidator.addValidation("year","req","Please enter the year");
var frmvalidator = new Validator("search");
frmvalidator.addValidation("table","req","Please select the category");
</script>