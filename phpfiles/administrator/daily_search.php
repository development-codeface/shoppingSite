<?php
	include_once("class/dbc_class.php");
	$dbc=new Dbc;

	if(isset($_POST['search']))
	{		
	  $sel=$_POST['sale'];
	  $se=$_POST['current_date'];
	  echo "<script>window.location='administrator.php?option=sale_search&search=$se&select=$sel'</script>";
	}		
?>
 	  <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="#"><span class="d-icon"><i class="fi-home"></i></span></a>
      <a class="current" href="#">Search by day</a>
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
<link rel="stylesheet" href="calendar/calendar.css" media="screen">
<script type="text/javascript" src="calendar/calendar.js"></script>
<div class="order_results">
<div class="hd_con" style="float:left; width:100%;">
	  
	<form name="search" action="" method="post">
       
      <div class="search_con" style="margin-left: 50px; margin-top: 10px; width: 80%">
	  <!-- <li class="form_cnt_con" style="width:800px"> -->
	  	<td width="155">
	  		<input name="current_date" placeholder="--Date--" type="text" id="current_date"  class="textbox_slim datainput" size="10" maxlength="1"  value=""  readonly="true" onclick="displayCalendar(document.getElementById('current_date'),'yyyy-mm-dd',this); " style="height:26px;width:100px;"/>
          
	  <select name="sale" class="formTextBox" style="width: 18%"> <option value="">--Select--</option>
		<option value="orders">Orders</option>
		<option value="orders_process">Processed</option>
		<option value="orders_sales">Sold</option>
	 </select>
	<input type="Submit" class="button tiny radius" value="Search" style="margin-top:3px;" name="search"/>
      </div>  
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
					<th>ORDER DATE</th>
				 </tr>
				
        		<tbody>
                </tbody>
               
            </table>
          </div>
        </ul>
      </div>
	  
 <script  language="javascript" type="text/javascript">
var frmvalidator = new Validator("search");
frmvalidator.addValidation("current_date","req","Please enter the date");
var frmvalidator = new Validator("search");
frmvalidator.addValidation("sale","req","Please select Category");
</script>
	  