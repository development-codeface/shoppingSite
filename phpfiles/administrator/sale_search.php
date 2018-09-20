<?php
	include_once("class/dbc_class.php");
	$dbc=new Dbc;

	
	 $d=$_REQUEST['search'];
	 $s=$_REQUEST['select'];
	if(isset($_POST['search']))
	{
		 $sel=$_POST['sale'];
		$se=$_POST['current_date'];
		echo "<script>window.location='administrator.php?option=sale_search&search=$se&select=$sel'</script>";
	}
	
	
	//pagination
	 $path=$_SERVER['PHP_SELF'];
		   $targetpath="$path?option=sale_search&search=$d&select=$s";
if($s == "orders")
	{ $sql = "select b.quantity, d.name,a.name, b.order_date from product a join order_products b join orders c join user_registration d on b.product_id = a.id and c.id = b.order_id and b.user_id = d.id where b.order_date like '%$d%'"; }
	if($s == "orders_process")
	{ $sql = "select b.order_date, d.name, c.quantity, a.name from product a join orders_process b join order_products c join user_registration d on a.id = b.product_id and c.id = b.order_products_id and d.id = b.user_id where b.order_date like '%$d%'"; }
	if($s == "orders_sales")
	{ $sql = "select e.order_date, d.name, c.quantity, a.name from product a join orders_process b join order_products c join user_registration d join orders_sales e on a.id = b.product_id and c.id = b.order_products_id and d.id = b.user_id and e.orders_process_id = b.id where e.order_date like '%$d%'"; }	
		   $r = $dbc->query($sql) or die(mysql_error());
		   $total_count=$dbc->getNumRows($r);
	//end
	
?>
 	  <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="#"><span class="d-icon"><i class="fi-home"></i></span></a>
		 	<a class="current" href="#">Dashboard</a>
      <a class="current" href="#">Search by day</a>
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
<link rel="stylesheet" href="calendar/calendar.css" media="screen">
<script type="text/javascript" src="calendar/calendar.js"></script>
 <div class="order_results">
 <div class="hd_con" style="float:left; width:100%;">
     <form name="search" action="" method="post">
       
      <div class="search_con" style="margin-left: 50px; margin-top: 10px; width: 80%">
	  <!-- <li class="form_cnt_con" style="width:800px"> -->
	  	<input name="current_date" type="text" id="current_date"  class="textbox_slim datainput" size="10" maxlength="13"  value="<?php echo $d; ?>"  readonly="true" onclick="displayCalendar(document.getElementById('current_date'),'yyyy-mm-dd',this); " style="height:26px;width:100px;"/>
	  <!--<input type="date" name="current_date" id="current_date" class="formTextBox" value="<?php echo $d; ?>" />!-->
	  <select name="sale" class="formTextBox" style="width: 18%"> <option value="">--Category--</option>
	  <option value="orders" <?php if($s=="orders") echo 'selected'?>>Orders</option>
	   <option value="orders_process" <?php if($s=="orders_process") echo 'selected'?>>Processed</option>
	  <option value="orders_sales" <?php if($s=="orders_sales") echo 'selected'?>>Sold</option>
	 </select>
	<input type="Submit" class="button tiny radius" value="Search" style="margin-top:3px;" name="search"/>
	<?php if($total_count>0) { ?>
		<a href="phpfiles/do/pdf/day_pdf.php?search=<?php echo $d ?>&category=<?php echo $s ?>" target="_blank"><img src="images/pdf.png" /></a>
		<a href="phpfiles/do/excel/excel_day.php?search=<?php echo $d ?>&category=<?php echo $s ?>" ><img src="images/excel.png" /></a>
	<?php } ?>
      </div
        </form>

       </div>
            
     <div class="dash_bg">
     <h3><span class="iconcommon"></span>By Day</h3>
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
						if($s=='orders')
						{ echo "ORDERED ON" ; }
						if($s=='orders_process')
						{ echo "PROCESSED ON" ; }
						if($s=='orders_sales')
						{ echo "SOLD ON" ; }
						?></th>
                  </tr>
				 <?php
				 if($s == "orders")
					{ $sql4 = "select b.quantity, d.name as user,a.name, b.order_date from product a join order_products b join orders c join user_registration d on b.product_id = a.id and c.id = b.order_id and b.user_id = d.id where b.order_date like '%$d%' LIMIT $offset, $rowsperpage"; }
					
					if($s == "orders_process")
					{ $sql4 = "select b.order_date, d.name as user, c.quantity, a.name from product a join orders_process b join order_products c join user_registration d on a.id = b.product_id and c.id = b.order_products_id and d.id = b.user_id where b.order_date like '%$d%' LIMIT $offset, $rowsperpage"; }
					
					if($s == "orders_sales")
					{ $sql4 = "select e.order_date, d.name as user, c.quantity, a.name from product a join orders_process b join order_products c join user_registration d join orders_sales e on a.id = b.product_id and c.id = b.order_products_id and d.id = b.user_id and e.orders_process_id = b.id where e.order_date like '%$d%' LIMIT $offset, $rowsperpage"; }
					$q4=$dbc->query($sql4);
				 	$i=$offset+1;
				 
				 if($total_count>0)
				 {
                while($row=$dbc->fetch($q4))
				{
					?>
				
        		<tbody>
                
                <td><?php echo $i;?></td>
				<td><?php echo $row['name'];?></td>
                <td><?php echo $row['user'];?></td>
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
    <script  language="javascript" type="text/javascript">
var frmvalidator = new Validator("search");
frmvalidator.addValidation("current_date","req","Please enter the date");
var frmvalidator = new Validator("search");
frmvalidator.addValidation("sale","req","Please select category");
</script>
  