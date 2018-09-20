<?php
	include_once("class/dbc_class.php");
	$dbc=new Dbc;
	
	//search
	if(isset($_POST['search']))
	{
		$se=$_POST['product_name'];
		$sel=$_POST['sale'];
		echo "<script>window.location='administrator.php?option=product_search&search=$se&select=$sel'</script>";
	}
	
	?>
 	  <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="administrator.php"><span class="d-icon"><i class="fi-home"></i></span></a>
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
	  <!-- <li class="form_cnt_con" style="width:80%"> -->
	<input type="text" name="product_name" id="product_name" class="formTextBox" placeholder="--Product Name--" value="" />
	  <select name="sale" class="srch_txt" style="width:200px;"> <option value="">--Select--</option>
	  <option value="orders">Orders</option>
	   <option value="orders_process">Processed</option>
	  <option value="orders_sales">Sold</option>
	 </select>
	  
	<input type="Submit" class="button tiny radius" value="Search" style="margin-top:3px;" name="search"/>
	<div class="form_btm_line"></div>
      <!-- </li> --></div>
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
					<th>ORDER DATE</th>
					</tr>
				</tbody>
					</table>
				</div>
			</ul>
	</div>
<script  language="javascript" type="text/javascript">
var frmvalidator = new Validator("search");
frmvalidator.addValidation("product_name","req","Please enter Product name");
var frmvalidator = new Validator("search");
frmvalidator.addValidation("sale","req","Please select Category");
</script>