<?php
include("class/dbc_class.php");
$dbc=new Dbc;
$pro=$_REQUEST['product'];
$cat=$_REQUEST['category'];



 
if (isset($_POST['cat'], $_POST['search_s']))
{
	$category=$_POST['cat'];
	echo "<script>window.location='administrator.php?option=manageproduct_search&category=$category'</script>";
}

if (isset($_POST['product_name'], $_POST['search_s']))
{
	$product=$_POST['product_name'];
	echo "<script>window.location='administrator.php?option=manageproduct_search&product=$product'</script>";
}

//pagination	
if (isset($pro)){
	    $path=$_SERVER['PHP_SELF'];
		$targetpath="$path?option=manageproduct_search&product=$pro";
		$sql="SELECT * FROM product where name like '%$pro%'";	
		$r = $dbc->query($sql) or die(mysql_error());
		$total_count=$dbc->getNumRows($r);
}

if (isset($cat)){
	    $path=$_SERVER['PHP_SELF'];
		$targetpath="$path?option=manageproduct_search&category=$cat";
		
		$sql="select * from product a left join sub_category b on a.subcategory_id=b.id left join category c on c.id=b.category_id where c.id='$cat'";
		//$sql="SELECT * FROM product where category_id like '%$cat%'  ";	
		$r = $dbc->query($sql) or die(mysql_error());
		$total_count=$dbc->getNumRows($r);
}






$sql_category="select * from category where id='$cat'";
$result_category=$dbc->query($sql_category);
$row_category=$dbc->fetch($result_category);

				
?>
 	  <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="administrator.php"><span class="d-icon"><i class="fi-home"></i></span></a>
      <a href="administrator.php?option=manage_product">manage products</a>
      <a class="current" href="#">products search</a>
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
      <div class="hd_con" style="float:left; width:100%; background:#FFF;">
	  <form name="search" id="search1" action="" method="post">
	  <div class="search_con" style="margin-left: 50px; margin-top: 10px; width: 80%">
	  <select class="srch_txt" name="search" id="search" onchange="select()">
	  		<option value="" >--Select--</option>
	  		<option id="s1" value="Category" <?php if($cat<>"") echo 'selected'; ?>>Category</option>
	  		<option id="s2" value="Product" <?php if($pro<>"") echo 'selected'; ?>>Product</option>
	  	</select>
	  	<span id="s_count">
	  		<?php
	  		if($cat<>"")
			{
			?>
			<select style="width :24%" name="cat" id="cat" class="formTextBox">
				<option value="">--Select--</option>
				<?php
				$s1="select * from category";
				$q1=$dbc->query($s1);
				while($a1=$dbc->fetch($q1))
				{
				?>
				<option value="<?php echo $a1['id']; ?>" <?php if($cat==$a1['id']) echo 'selected'; ?> ><?php echo $a1['name'];?></option>
				<?php 
				} ?>
				</select>
				<?php
			}
			else
			{?>
				<input type="text" name="product_name" id="product_name" value="<?php echo $pro;?>" class="formTextBox" />
			<?php }?>
	  		
	  	</span>
	<input type="Submit" class="button tiny radius" value="Search" style="margin-top:3px;" name="search_s" onclick="return valid()"/>
      </div>
     
</form>
      </div>
            
     <div class="dash_bg">
     <h3><span class="iconcommon"></span>Products Search</h3>
        <ul class="formBox">
          <div id="projects_area">
            <table class="dataTable" width="100%" cellpadding="0" cellspacing="0" border="0">
              <tbody>
                  <tr>
                 <th>SL NO.</th>
                  <th>CATEGORY</th>
				  <th>SUBCATEGORY</th>
				  <th>PRODUCT NAME</th>
				  <th>BRAND</th>
                  <!--<th>DESCRIPTION</th>-->
				   <th>PRICE</th>
				    <th>QUANTITY</th>
					  <th>IMAGE</th>
					  <th>ACTION</th>
					   
                  </tr>
				  <?php
				  if(isset($pro))
				  {
				 $s="select a.id,a.name,a.brand,a.description,a.price,a.quantity,b.name as sub_category,c.name as category from product a 
				 left join sub_category b on a.subcategory_id=b.id left join category c on c.id=b.category_id where a.name like '%$pro%' LIMIT $offset,$rowsperpage";
                 $q=$dbc->query($s);
				  $i=$offset+1;
				if($total_count>0)
				{
	            while($row=$dbc->fetch($q))
				{
					$d="product";
					?>
				
        		<tbody>
                <td><?php echo $i;?></td>
				<td><?php echo $row['category'];?></td>
				<td><?php echo $row['sub_category'];?></td>
                <td><?php echo $row['name'];?></td>
				<td><?php echo $row['brand'];?></td>
				<!---<td><?php echo $row['description'];?></td>--->
				<td><a href="phpfiles/administrator/update_price.php?id=<?php echo $row['id']; ?>" onclick="javascript&#58;
	window.open(this.href, this.target, 'width=500,height=400,screenX=400,screenY=100,resizable,scrollbars');return false;" title="View">
				<?php echo $row['price']; ?>
				</a></td>
				<td><?php echo $row['quantity'];?></td>
				
				
			   <?php
			   $id=$row['id'];
			   $s2="select * from product_image where product_id='$id'";
               $q2=$dbc->query($s2);
               $row2=$dbc->fetch($q2);
               $c=$dbc->getNumRows($q2);
			   if($c<>'0')
			   {
			   ?>			   
                <td><a href="phpfiles/administrator/manage_images.php?id=<?php echo $row['id'];?>&img_id=<?php echo $row2['id'];?>" onclick="javascript&#58;
	window.open(this.href, this.target, 'width=810,height=600,screenX=200,screenY=20,resizable,scrollbars');return false;" title="Zoom">Edit image</a></td>
			   <?php 
			   }			   
			   ?>
               <td>
               <a class="ad_edit" href="administrator.php?option=stock&id=<?php echo $row['id']; ?>"><span class="a_d"></span> Stock</a>
               <a class="ad_edit" href="administrator.php?option=edit_product&id=<?php echo $row['id'];?>&status=<?php echo $d."-".$pro; ?>"><span class="a_d_icon"><i class="fi-widget"></i></span> Edit</a>
               <a class="ad_delete" href="administrator.php?option=manage_products&id=<?php echo $row['id'];?>" onclick="return del();"><span class="a_d_icon"><i class="fi-trash"></i></span> Delete</a>       
               </td>
			   <?php
			   $i++;
				}				
				}
				else
				{
				 ?>
                 <tr><td colspan="9">Sorry.. No Results Found.</td></tr>
                 <?php
				 }
				}
				if(isset($cat))
				{
				$s="select a.id,a.name,a.brand,a.description,a.price,a.quantity,b.name as sub_category,c.name as category from product a 
				left join sub_category b on a.subcategory_id=b.id left join category c on c.id=b.category_id where c.id='$cat' LIMIT $offset,$rowsperpage";
				$q=$dbc->query($s);
				  $i=$offset+1;
		if($total_count>0)
		{
                while($row=$dbc->fetch($q))
				{ $d="category";
					
					?>
				
        		<tbody>
                <td><?php echo $i;?></td>
				<td><?php echo $row['category'];?></td>
				<td><?php echo $row['sub_category'];?></td>
                <td><?php echo $row['name'];?></td>
				<td><?php echo $row['brand'];?></td>
				<!---<td><?php echo $row['description'];?></td>--->
				<td><a href="phpfiles/administrator/update_price.php?id=<?php echo $row['id']; ?>" onclick="javascript&#58;
	window.open(this.href, this.target, 'width=500,height=400,screenX=400,screenY=100,resizable,scrollbars');return false;" title="View">
				<?php echo $row['price']; ?>
				</a></td>
				<td><?php echo $row['quantity'];?></td>
				
				
			   <?php
			   $id=$row['id'];
			   $s2="select * from product_image where product_id='$id'";
               $q2=$dbc->query($s2);
               $row2=$dbc->fetch($q2);
               $c=$dbc->getNumRows($q2);
			   if($c<>'0')
			   {
			   ?>			   
                <td><a href="phpfiles/administrator/manage_images.php?id=<?php echo $row['id'];?>&img_id=<?php echo $row2['id'];?>" onclick="javascript&#58;
	window.open(this.href, this.target, 'width=810,height=600,screenX=200,screenY=0,resizable,scrollbars');return false;" title="Zoom">Edit image</a></td>
			   <?php 
			   }			   
			   ?>
               <td>
               <a class="ad_edit" href="administrator.php?option=stock&id=<?php echo $row['id']; ?>"><span class="a_d"></span> Stock</a>
               <a class="ad_edit" href="administrator.php?option=edit_product&id=<?php echo $row['id'];?>&status=<?php echo $d."-".$cat; ?>"><span class="a_d_icon"><i class="fi-widget"></i></span> Edit</a>
               <a class="ad_delete" href="administrator.php?option=manage_products&id=<?php echo $row['id'];?>" onclick="return del();"><span class="a_d_icon"><i class="fi-trash"></i></span> Delete</a>       
               </td>
			   <?php
			   $i++;
				}				
				}
				else
				{
				 ?>
                 <tr><td colspan="9">Sorry.. No Results Found.</td></tr>
                 <?php
				 }
				 }	
				?>
                </tbody>
            </table>
          </div>
        </ul>
      </div>
<script>
 function del()
 {
var r=confirm('Are you sure you want to delete this product ?');
return r;
 }
</script>
<script language="javascript" type="text/javascript">
 function valid()
 {
 	var flag = true;
 	var se = document.getElementById('search').value;
 	if(se == "")
 	{
 		alert("Select a search option.");
 		document.getElementById('search').focus();
		flag = false;
 	}
 	return flag;
 }
</script>
<script src="js/jquery1.8.min.js"></script>
<script  language="javascript" type="text/javascript">
	function select() {
		var sel = $("#search").val();
		$.post("phpfiles/administrator/select.php", {
			sect : sel
		}, function(data) {
			$("#s_count").html(data);
		});
	}
</script>
<script  language="javascript" type="text/javascript">
$(document).ready(function(){
    $('#search1').submit(function() {
        var error = 0;
        var cy = $('#cat').val();
        var pn = $('#product_name').val();

        if (cy == "") {
            error = 1;
            alert('Select a category.');
        }
        
        else if (pn == "") {
            error = 1;
            alert('Enter a product name.');
            $("#product_name").focus();
        }

        if (error) {
            return false;
        } else {
            return true;
        }

    });
});
</script>