<?php

session_start();
$adminusername=$_SESSION['adminusername'];

// $co=mysql_connect('localhost','root','root');
// mysql_select_db('margin_free');

if(isset($_GET['log'])=="out")
{
	session_destroy();
	echo "<script>window.location='index.php'</script>";
}

if(!empty($adminusername))
{

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Margin Free</title>

	<link rel="icon" type="image/x-icon" href="" />

	<link href="css/admin.css" rel="stylesheet" type="text/css" />

 	<script src="js/jquery-1.2.1.min.js" type="text/javascript"></script>

	<script src="js/menu.js" type="text/javascript"></script>
	<script src="js/common.js" type="text/javascript"></script>

	<link rel="stylesheet" type="text/css" href="css/sidemenustyle.css" />
	
    <script type="text/javascript" src="js/gen_validatorv31.js"></script>
    
	<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
	
	
	
	<!-- New -->
	
	<link rel="stylesheet" href="css/intervine.foundation.css" />
    <link rel="stylesheet" href="css/intervine.app2.css" />
    <link rel="stylesheet" href="foundation-icons/foundation-icons.css">
	
	
</head>

<body>
<div class="wraper"> 
  <!----------------------------- BEGIN top ----------------------->
  
  <div class="top_con large-12">
    <div class="left logo">
    	
    	<a href="administrator.php">
    		<img src="images/admin_logo.png">
    	</a>  
    	
    </div>
    
    <div class="right">
    	
    	<div class="row">
    		<div class="adm_welcome">
    			Welcome, <span>Administrator</span>
    		</div>
    	</div>

    </div>
	
	<div class="right">
		<div class="row">
			
    		<div class="client_logo">
    			<!---<div class="inner" style="background: url(images/admin_client_logo.png) center center; ">
    				
    			</div>-->
    		</div>
    		
    	</div>
	</div>
	
	
    <!-- <div class="user_con"> 
    
      <div class="user_dtl_con">   
           <span class="logout"><a href="administrator.php?log=out"><img src="images/logout.png" height="40" width="40" alt="logout" title="logout"/></a></span>
      </div>
      
    </div> -->

  </div>
  
  
  <!-- Menu -->
  
  <div class="large-12 menu_bar">
	<nav class="top-bar" data-topbar="" role="navigation">
  <!-- Title -->
  <ul class="title-area">

    <!-- Mobile Menu Toggle -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <!-- Top Bar Section -->
  
<section class="top-bar-section">

    <!-- Top Bar Left Nav Elements -->
    
    <ul class="left">
    	<li class="divider"></li>
			<li><a href="index.php">Go to Website</a></li>
      	<li class="divider"></li>
    </ul>

    <!-- Top Bar Right Nav Elements -->
    <ul class="right">
      <!-- Divider -->
      <li class="divider"></li>
	  
	  <li class="active"><a href="administrator.php">Dashboard</a></li>
      <li class="divider"></li>
	  
      <!-- Dropdown -->
      
      <li class="has-dropdown not-click"><a href="#">Main Category</a>
        <ul class="dropdown"><li class="title back js-generated"><h5><a href="javascript:void(0)">Back</a></h5></li><li class="parent-link hide-for-medium-up"><a class="parent-link js-generated" href="#">Item 1</a></li>
		   <li><a href="administrator.php?option=main_category">Add Category</a></li>
          <li><a href="administrator.php?option=manage_main_category">Manage Category</a></li>
        </ul>
      </li>
      
      <li class="divider"></li>
      
      <li class="has-dropdown not-click"><a href="#">Product Category</a>
        <ul class="dropdown"><li class="title back js-generated"><h5><a href="javascript:void(0)">Back</a></h5></li><li class="parent-link hide-for-medium-up"><a class="parent-link js-generated" href="#">Item 1</a></li>
		   <li><a href="administrator.php?option=category">Add Category</a></li>
          <li><a href="administrator.php?option=manage_category">Manage Category</a></li>
          
          <li class="title back js-generated"><h5><a href="javascript:void(0)">Back</a></h5></li><li class="parent-link hide-for-medium-up"><a class="parent-link js-generated" href="#">Item 1</a></li>
		   <li><a href="administrator.php?option=subcategory">Add Subcategory</a></li>
          <li><a href="administrator.php?option=manage_subcategory">Manage Subcategory</a></li>
        </ul>
      </li>
      
     <!-- <li class="divider">
      
      <li class="has-dropdown not-click"><a href="#">Sub Category</a>
        <ul class="dropdown"><li class="title back js-generated"><h5><a href="javascript:void(0)">Back</a></h5></li><li class="parent-link hide-for-medium-up"><a class="parent-link js-generated" href="#">Item 1</a></li>
		   <li><a href="administrator.php?option=subcategory">Add Category</a></li>
          <li><a href="administrator.php?option=manage_subcategory">Manage Category</a></li>
        </ul>
      </li>--->
      
      <li class="divider"></li>
      
      <li class="has-dropdown not-click"><a href="#">Products</a>
        <ul class="dropdown"><li class="title back js-generated"><h5><a href="javascript:void(0)">Back</a></h5></li><li class="parent-link hide-for-medium-up"><a class="parent-link js-generated" href="#">Item 1</a></li>
		   <li><a href="administrator.php?option=product">Add Product</a></li>
          <li><a href="administrator.php?option=manage_products">Manage Products</a></li>
        </ul>
      </li>

      <li class="divider"></li>
      
      <li class="has-dropdown not-click"><a href="#">Orders</a>
        <ul class="dropdown"><li class="title back js-generated"><h5><a href="javascript:void(0)">Back</a></h5></li><li class="parent-link hide-for-medium-up"><a class="parent-link js-generated" href="#">Item 1</a></li>
		   <li><a href="administrator.php?option=manage_orders">Received</a></li>
          <li><a href="administrator.php?option=processed_orders">Processed</a></li>
          <li><a href="administrator.php?option=sold_orders">Sold</a></li>
          <li><a href="administrator.php?option=cancelled_orders">Cancelled</a></li>
        </ul>
      </li>

      <li class="divider"></li>
      
      <li class="has-dropdown not-click"><a href="#">Search</a>
        <ul class="dropdown"><li class="title back js-generated"><h5><a href="javascript:void(0)">Back</a></h5></li><li class="parent-link hide-for-medium-up"><a class="parent-link js-generated" href="#">Item 1</a></li>
		   <li><a href="administrator.php?option=product_sales">By Product</a></li>
          <li><a href="administrator.php?option=daily_search">By Day</a></li>
          <li><a href="administrator.php?option=monthly_search">By Month</a></li>
          <li><a href="administrator.php?option=yearly_sales">By Year</a></li>
        </ul>
      </li>

      <li class="divider"></li>
      
      <li class="has-dropdown not-click"><a href="#">Locations</a>
        <ul class="dropdown"><li class="title back js-generated"><h5><a href="javascript:void(0)">Back</a></h5></li><li class="parent-link hide-for-medium-up"><a class="parent-link js-generated" href="#">Item 1</a></li>
		   <li><a href="administrator.php?option=locations">Add Locations</a></li>
          <li><a href="administrator.php?option=manage_locations">Manage Locations</a></li>
          <li><a href="administrator.php?option=shipping">Shipping</a></li>
        </ul>
      </li>

      <li class="divider"></li>
            
      <li class="has-dropdown not-click"><a href="#">Users</a>
        <ul class="dropdown"><li class="title back js-generated"><h5><a href="javascript:void(0)">Back</a></h5></li><li class="parent-link hide-for-medium-up"><a class="parent-link js-generated" href="#">Item 1</a></li>
		   <li><a href="administrator.php?option=users">Manage Users</a></li>
          <li><a href="administrator.php?option=contact">Contact Enquiry</a></li>
          <li><a href="administrator.php?option=subscibe">Manage Subscribe</a></li>
        </ul>
      </li>
      
      <li class="divider"></li>
      
      <li class="has-dropdown not-click"><a href="#">Settings</a>
        <ul class="dropdown"><li class="title back js-generated"><h5><a href="javascript:void(0)">Back</a></h5></li><li class="parent-link hide-for-medium-up"><a class="parent-link js-generated" href="#">Item 1</a></li>
		   <li><a href="administrator.php?option=slider">Home Slider</a></li>
		   <li><a href="administrator.php?option=password">Change Password</a></li>
          <li><a href="administrator.php?option=social_links">Social media links</a></li>
        </ul>
      </li>
      
      <li class="divider"></li><!-- 
      
      <li class="has-dropdown not-click"><a href="#">Products</a>
        <ul class="dropdown"><li class="title back js-generated"><h5><a href="javascript:void(0)">Back</a></h5></li><li class="parent-link hide-for-medium-up"><a class="parent-link js-generated" href="#">Item 1</a></li>
          <li><label>New</label></li>
          <li><a href="administrator.php?option=add_products">Add Products</a></li>
          <li class="divider"></li>
          <li><label>Edit</label></li>
          <li><a href="administrator.php?option=manage_products">Manage Products</a></li>
        </ul>
      </li> 

      <li class="divider"></li>
	  
      <!-- Anchor 
      <li><a href="administrator.php?option=manage_contact">Edit Contact</a></li>

      <!-- Button -->
      <li class="has-form show-for-large-up">
        <a href="administrator.php?log=out" class="button">Log Out</a>
      </li>
    </ul>
  </section></nav>
  </div>
  
  <!----------------------------- END top ----------------------->
  
  <div class="cnt_wrpr"> 
    <!----------------------------- BEGIN lft_panel ----------------------->
    
   
    <!----------------------------- END lft_panel -----------------------> 
    
    <!----------------------------- BEGIN cont ----------------------->
  
    <!-----------------order------------------------>
        	<?php
     if(isset($_REQUEST['option'])<>"")
     {
         $class="class/admin_class.php";
         if(file_exists($class))
         {
             include_once($class);
             $dbc=new marginfree;
         }
         else
         {
             echo "page not found";
         }
     }
	 else {
	 
	 include_once("class/dbc_class.php");
	$dbc=new Dbc;
	
	$path=$_SERVER['PHP_SELF'];
	$targetpath="$path?";
	
	$sql4="SELECT distinct c.order_id,b.name, b.status AS user_status, a . * FROM orders a JOIN user_registration b JOIN order_products c ON a.user_id = b.id and c.order_id = a.id where c.status = 0";
	$res4=$dbc->query($sql4);
	$total_count=mysql_num_rows($res4);
	 ?>
		 
	 
 	
 	  <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="#"><span class="d-icon"><i class="fi-home"></i></span></a>
		 	<a class="current" href="#">Dashboard</a>
		 </nav>
		     
			          <div class="pagination">  
					 <?php
					 $rowsperpage = 10;
					 if($total_count<>''){ include("class/pagination.php");}else { $offset=0; $rowsperpage=0;  }?> 
			          </div>    
      </div>

    </div>
    
 	<div class="columns">
 			
		    <div class="order_results">

		      
		            
	<div class="dash_bg">
		<h3><span class="iconcommon"></span>Recent Orders</h3>
			<ul class="formBox">
				<div id="projects_area">
					<table class="dataTable" width="100%" cellpadding="0" cellspacing="0" border="0">
					<tbody>
					<tr>
					<th>SL NO.</th>
					<th>ORDER ID</th>
					<th>CUSTOMER</th>
					<th>TOTAL AMOUNT</th>
					<th>DATE</th>
					<th>ORDER SUMMARY</th>
					<th>ACTIONS</th>
					</tr>
					<?php
					
					//query to list received order details
					$sql1="SELECT distinct c.order_id,b.name, b.status AS user_status, a . * FROM orders a JOIN user_registration b JOIN order_products c ON a.user_id = b.id and c.order_id = a.id where c.status = 0 ORDER BY id DESC LIMIT $offset, $rowsperpage";
					$res1=$dbc->query($sql1);
					$i=$offset+1;
					$sql2 = "select * from order_products where status = '0'";
					$res2 = $dbc -> query($sql2);
					$res3 = $dbc -> getNumRows($res2);
					if($res3 > 0)
					{
					while($or=$dbc->fetch($res1))
					{
					?>
						<tbody>
						<td><?php echo $i;?></td>
						<td><?php echo $or['order_id'];?></td>
						<td><?php echo $or['name']; ?></td>
						<td>INR. <?php echo $or['amount']; ?></td>
						<td><?php echo $or['order_date']; ?></td>
						<td><a href="administrator.php?option=view_order&id=<?php echo $or['id']; ?>">View (<?php echo $or['quantity'] ?>)</a></td>
						<td><?php
						if($or['user_status']==3 || $or['user_status']==4)
						{
							?>
							<img src="images/block.jpg" height="24" width="27" title="Order from blocked user"/></td>
							<?php
						}
						else
						{
							?>
							<a class="ad_edit" href="javascript:process_order(<?php echo $or['id'] ?>)"><span class="a_d_icon"><i class="fi-widget"></i></span> Process</a></td>
						
						<?php
						}
						$i++;
						}
					?>
					</tbody> <?php } else { ?> <tbody><td colspan="7"><?php echo 'No new orders.';?></td></tbody> <?php } ?>
					</table>
				</div>
			</ul>
	</div>
		    </div>
	  
		</div>	    
	    
	    
    
  </div>
  </div>
  
  <!---------------------End order---------------> 
  <!----------------------------- END cont -----------------------> 
</div>
</div>
</body>

<!--process function!-->
<script type='text/javascript'>
function process_order(id)
{
	var a=confirm('Are you sure you want to process this order ?');
	if(a)
	window.location='phpfiles/do/process_order.php?process=' +id;
}
</script>

</html>
<?php
}}
else
{
echo "<script>window.location='index.php'</script>";
}
?>
