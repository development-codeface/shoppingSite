<?php
	include_once("class/dbc_class.php");
	$dbc=new Dbc;
	
	//search
	if(isset($_POST['search']))
	{
		$ye=$_POST['year'];
		$ca=$_POST['table'];
		echo "<script>window.location='administrator.php?option=yearly_search&year=$ye&category=$ca'</script>";
	}
	
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
	  
	<form name="search"  method="post">
       
      <div class="search_con" style="margin-left: 50px; margin-top: 10px; width: 80%">
	  			  <!-- <li class="form_cnt_con" style="width:800px"> -->
                 <select name="year" id="year" class="formTextBox" value="" style="width: 14%"/><option value="">--Year--</option>
				<option value="2016">2016</option>
				<option value="2017">2017</option>
				<option value="2018">2018</option>
				<option value="2019">2019</option>
				<option value="2020">2020</option>
				 </select>
                 <select name="table" id="table" class="formTextBox" value="" style="width: 14%"/><option value="">--Select--</option>
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
					<th>ORDER DATE</th>
					</tr>
					</tbody>
					</table>
				</div>
			</ul>
</div>
<script  language="javascript" type="text/javascript">
var frmvalidator = new Validator("search");
frmvalidator.addValidation("year","req","Please select Year");
var frmvalidator = new Validator("search");
frmvalidator.addValidation("table","req","Please select Category");
</script>