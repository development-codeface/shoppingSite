<?php
	include_once("class/dbc_class.php");
	$dbc=new Dbc;
	$m=$_REQUEST['search'];

	if(isset($_POST['search']))
	{
		$mo=$_POST['month'];
		$ye=$_POST['year'];
		$ca=$_POST['table'];
		echo "<script>window.location='administrator.php?option=monthly_sale&month=$mo&category=$ca&year=$ye'</script>";
	}
	
	//pagination
	$mh=$_GET['month'];
	$cy=$_GET['category'];
	$yr=$_GET['year'];
	$path=$_SERVER['PHP_SELF'];
	$targetpath="$path?option=monthly_sale&month=$mh&category=$cy&year=$yr";
	if($cy == "orders")
	{ $sql = "select b.quantity,b.order_date,c.name from orders a join order_products b join product c on b.order_id = a.id and c.id = b.product_id where month(a.order_date) = '$mh'  and year(a.order_date) = '$yr'"; }
	if($cy == "orders_process")
	{ $sql = "select c.quantity,a.user_id,b.name, a.order_date from orders_process a join product b join order_products c on b.id = a.product_id and c.id = a.order_products_id where month(a.order_date) = '$mh' and year(a.order_date) = '$yr'"; }
	if($cy == "orders_sales")
	{ $sql = "select c.quantity,d.name, a.order_date, a.user_id from orders_sales a join orders_process b join order_products c join product d on a.orders_process_id = b.id and c.id = b.order_products_id and d.id = a.product_id where month(a.order_date) = '$mh' and year(a.order_date) = '$yr'"; }	
	$r = $dbc->query($sql) or die(mysql_error());
	$total_count=$dbc->getNumRows($r);
	//end
	
?>
 	  <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="#"><span class="d-icon"><i class="fi-home"></i></span></a>
      <a class="current" href="#">Search by month</a>
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
	  
	<form name="search" action="" method="post">
       
      <div class="search_con" style="margin-left: 50px; margin-top: 10px; width: 80%">
	  
	  			  <!-- <li class="form_cnt_con" style="width:800px"> -->
                 <select name="month" id="month" class="formTextBox" value="" style="width: 14%"/><option value="">--Month--</option>
				<option value="01" <?php if($mh==01) echo 'selected'?>>January</option>
				<option value="02" <?php if($mh==02) echo 'selected'?>>February</option>
				<option value="03" <?php if($mh==03) echo 'selected'?>>March</option>
				<option value="04" <?php if($mh==04) echo 'selected'?>>April</option>
				<option value="05" <?php if($mh==05) echo 'selected'?>>May</option>
				<option value="06" <?php if($mh==06) echo 'selected'?>>June</option>
				<option value="07" <?php if($mh==07) echo 'selected'?>>July</option>
				<option value="08" <?php if($mh==08) echo 'selected'?>>August</option>
				<option value="09" <?php if($mh==09) echo 'selected'?>>September</option>
				<option value="10" <?php if($mh==10) echo 'selected'?>>October</option>
				<option value="11" <?php if($mh==11) echo 'selected'?>>November</option>
				<option value="12" <?php if($mh==12) echo 'selected'?>>December</option></select>
                 <select name="year" id="year" class="formTextBox" value="" style="width: 14%"/><option value="">--Year--</option>
				<option value="2016" <?php if($yr==2016) echo 'selected'?>>2016</option>
				<option value="2017" <?php if($yr==2017) echo 'selected'?>>2017</option>
				<option value="2018" <?php if($yr==2018) echo 'selected'?>>2018</option>
				<option value="2019" <?php if($yr==2019) echo 'selected'?>>2019</option>
				<option value="2020" <?php if($yr==2020) echo 'selected'?>>2020</option>
				 </select>
                 <select name="table" id="table" class="formTextBox" value="" style="width: 14%"/><option value="" >--Category--</option>
	  <option value="orders" <?php if($cy=="orders") echo 'selected'?>>Orders</option>
	   <option value="orders_process" <?php if($cy=="orders_process") echo 'selected'?>>Processed</option>
	  <option value="orders_sales" <?php if($cy=="orders_sales") echo 'selected'?>>Sold</option>
				 </select>
	<input type="Submit" class="button tiny radius" value="Search" style="margin-top:3px;" name="search"/>
      <?php if($total_count>0) { ?>
		<a href="phpfiles/do/pdf/mon_pdf.php?month=<?php echo $mh ?>&category=<?php echo $cy ?>&year=<?php echo $yr ?>" target="_blank"><img src="images/pdf.png" /></a>
		<a href="phpfiles/do/excel/excel_mon.php?month=<?php echo $mh ?>&category=<?php echo $cy ?>&year=<?php echo $yr ?>" ><img src="images/excel.png" /></a>
	<?php } ?>
                  <div class="form_btm_line"></div>
                <!-- </li> --></div>
        </form>
			 </div>
            
     <div class="dash_bg">
     <h3><span class="iconcommon"></span>By Month</h3>
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
						{ echo "ORDERED ON" ; }
						if($cy=='orders_process')
						{ echo "PROCESSED ON" ; }
						if($cy=='orders_sales')
						{ echo "SOLD ON" ; }
						?></th>
				   </tr>
				 <?php
				if($cy == "orders")
	{ $sql4 = "select b.quantity,b.order_date,c.name,a.user_id from orders a join order_products b join product c on b.order_id = a.id and c.id = b.product_id where month(a.order_date) = '$mh'  and year(a.order_date) = '$yr' LIMIT $offset, $rowsperpage"; }
	if($cy == "orders_process")
	{ $sql4 = "select c.quantity,a.user_id,b.name, a.order_date from orders_process a join product b join order_products c on b.id = a.product_id and c.id = a.order_products_id where month(a.order_date) = '$mh' and year(a.order_date) = '$yr' LIMIT $offset, $rowsperpage"; }
	if($cy == "orders_sales")
	{ $sql4 = "select c.quantity,d.name, a.order_date, a.user_id from orders_sales a join orders_process b join order_products c join product d on a.orders_process_id = b.id and c.id = b.order_products_id and d.id = a.product_id where month(a.order_date) = '$mh' and year(a.order_date) = '$yr' LIMIT $offset, $rowsperpage"; }
					$q4=$dbc->query($sql4);
				 	$i=$offset+1;
				 
				 if($total_count>0)
				 {
                while($row=$dbc->fetch($q4))
				{
					$sql1 = "select name from user_registration where id = '$row[user_id]'";
					$q1 = $dbc -> query($sql1);
					$ar1 = $dbc -> fetch($q1);
					?>
				
        		<tbody>
                
                <td><?php echo $i;?></td>
				<td><?php echo $row['name'];?></td>
                <td><?php echo $ar1['name'];?></td>
				<td><?php echo $row['quantity'];?></td>
				<td><?php echo $row['order_date'];?></td>
               
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
frmvalidator.addValidation("month","req","Please select month");
var frmvalidator = new Validator("search");
frmvalidator.addValidation("table","req","Please select category");
var frmvalidator = new Validator("search");
frmvalidator.addValidation("year","req","Please select year");

</script>