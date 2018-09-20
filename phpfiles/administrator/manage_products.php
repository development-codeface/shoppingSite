<?php
include_once ("class/dbc_class.php");
$dbc = new Dbc;

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


//delete product
if (isset($_REQUEST['id'])) 
{
	 	$id = $_REQUEST['id'];
	
		$sd1 = "select * from product_image where product_id='$id'";
		$qd1 = $dbc -> query($sd1);
		while ($row3 = $dbc -> fetch($qd1))
		{
			unlink($row3['image']);
			unlink($row3['thumb_image']);
		}
		
		    $sql_1="select * from slider_image where product_id='$id'";
			$res_1=$dbc->query($sql_1);
			if($dbc->getNumRows($res_1)<>"")
			{
				$s3="delete from slider_image where product_id='$id'";
			 	 $q3=$dbc->query($s3);
			  
			}
 
  		$s1="delete from product_image where product_id='$id'";
	    $q1=$dbc->query($s1);
	  
	  $s2="delete from product where id='$id'";
	  $q2=$dbc->query($s2);
	
	 echo "<script>window.location='administrator.php?option=manage_products';</script>";
	
}
//end of delete
?>
 	  <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="administrator.php"><span class="d-icon"><i class="fi-home"></i></span></a>
      <a class="current" href="#">manage products</a>
		 </nav>
		                 <div class="pagination">  
	<?php

$path = $_SERVER['PHP_SELF'];
$targetpath = "$path?option=manage_products";
$sql = "select * from product a left join sub_category b on a.subcategory_id=b.id left join category c on c.id=b.category_id order by a.id desc";
$r = $dbc -> query($sql) or die(mysql_error());
$total_count = $dbc -> getNumRows($r);

	$rowsperpage = 10;
	if ($total_count <> '') {
		include ("class/pagination.php");
	} else { $offset = 0;
		$rowsperpage = 0;
	}
		  ?> 
          </div>  
      </div>

    </div>
    
 	<div class="columns">
      <div class="order_results">
<div class="hd_con" style="float:left; width:100%;">
	  <form name="search" id="search1" action="" method="post">
	  <div class="search_con" style="margin-left: 50px; margin-top: 10px; width: 80%">
	  	<select class="srch_txt" name="search" id="search" onchange="select()" style="float:left;">
	  		<option value="">--Select--</option>
	  		<option value="Category">Category</option>
	  		<option value="Product">Product</option>
	  	</select>
	  	<span id="s_count"></span>
	<input type="Submit" class="button tiny radius" value="Search" style="margin-top:3px;" name="search_s" onclick="return valid()"/>
      </div>
     
</form>
       </div>
            
     <div class="dash_bg">
     <h3><span class="iconcommon"></span>Manage Products</h3>
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
                <!-- <th>DESCRIPTION</th>--->
				 <th>PRICE</th>
				 <th>QUANTITY</th>
				 <th>IMAGE</th>
				 <th>ACTION</th>
                  </tr>
				  <?php
				  $s="select a.id,a.name,a.brand,a.description,a.price,a.quantity,a.language,b.name as sub_category,c.name as category from product a left join sub_category b on a.subcategory_id=b.id left join category c on c.id=b.category_id order by a.id desc  LIMIT $offset,$rowsperpage";
                 $q=$dbc->query($s);
				  $i=$offset+1;
		if($total_count>0)
		{
                while($row=$dbc->fetch($q))
				{
					
					
					?>
				
        		<tbody>
                <td><?php echo $i; ?></td>
				<td><?php echo $row['category']; ?></td>
				<td><?php echo $row['sub_category']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['brand']; ?></td>
				<!--<td><?php echo $row['description']; ?></td>--->
				<td>
				<a href="phpfiles/administrator/update_price.php?id=<?php echo $row['id']; ?>" onclick="javascript&#58;
	window.open(this.href, this.target, 'width=500,height=400,screenX=400,screenY=100,resizable,scrollbars');return false;" title="View">
				<?php echo $row['price']; ?>
				</a></td>
			<td><?php echo $row['quantity']; ?></td>
				
				
				<?php
				$id=$row['id'];
				$s2="select * from product_image where product_id='$id'";
               $q2=$dbc->query($s2);
               $row2=$dbc->fetch($q2);
               $c=$dbc->getNumRows($q2);
			   if($c<>'0')
			   {
			   ?>
			   
                <td> <a href="phpfiles/administrator/manage_images.php?id=<?php echo $row['id']; ?>&img_id=<?php echo $row2['id']; ?>" onclick="javascript&#58;
	window.open(this.href, this.target, 'width=810,height=600,screenX=200,screenY=20,resizable,scrollbars');return false;" title="View">Edit image</a>

</td>
			   <?php
			}
			   ?>
			   <td width="180px">
               <a class="ad_edit" href="administrator.php?option=stock&id=<?php echo $row['id']; ?>"><span class="a_d"></span> Stock</a>
               <a class="ad_edit" href="administrator.php?option=edit_product&id=<?php echo $row['id']; ?>"><span class="a_d_icon"><i class="fi-widget"></i></span> Edit</a>
               <a class="ad_delete" href="administrator.php?option=manage_products&id=<?php echo $row['id']; ?>" onclick="return del();"><span class="a_d_icon"><i class="fi-trash"></i></span> Delete</a>
        
               </td>
			   <?php
			$i++;
			}

			} else { echo '<td colspan=10>No result found</td>'; }
				?>
                </tbody>
               
            </table>
          </div>
        </ul>
      </div>
   <script>
	function del() {

		var r = confirm('Are you sure you want to delete this product ?');
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