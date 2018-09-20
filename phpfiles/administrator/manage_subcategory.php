<?php
include_once("class/dbc_class.php");
	$dbc=new Dbc;
	
	if(isset($_POST['submit_cat'])){
	echo "<script>window.location='administrator.php?option=manage_subcategory&cat=$_POST[search_cat]&sub=$_POST[search_subcat]'</script>";
	}


//delete subcategory
if(isset($_REQUEST['id']))
{
	$id=$_REQUEST['id'];
  
$sq="select * from product where subcategory_id='$id'";
$ql=$dbc->query($sq);
$count_image=$dbc->getNumRows($ql);
if($count_image>0)
{
	$sqp="select * from product where subcategory_id='$id'";
	$q22=$dbc->query($sqp);
	while($row22=$dbc->fetch($q22))
	{
	$product_id=$row22['id'];
	$sq1="select * from product_image where product_id='$product_id'";
	$ql1=$dbc->query($sq1);
	while($row1=$dbc->fetch($ql1))
	{
	
			unlink($row1['image']);
			unlink($row1['thumb_image']);
			
		$s3="delete  from product_image where product_id='$product_id'";
		$q3=$dbc->query($s3);
	}
	
		$sq2="select * from slider_image where product_id='$product_id'";
		$ql2=$dbc->query($sq2);
		if($dbc->getNumRows($ql2)<>"")
		{
				$s4="delete  from slider_image where product_id='$product_id'";
			    $q4=$dbc->query($s4);
		}
	
	} 
	$s4="delete  from product  where subcategory_id='$id'";
	$q4=$dbc->query($s4);
	
}
 	 $s2="delete  from sub_category  where id='$id'";
	 $q2=$dbc->query($s2); 
	 	
echo "<script>window.location='administrator.php?option=manage_subcategory';</script>";

} 

?>
 	  <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="administrator.php"><span class="d-icon"><i class="fi-home"></i></span></a>
      <a class="current" href="#">manage subcategory</a>
		 </nav>
		  <div class="pagination">  
		<?php
		 $path=$_SERVER['PHP_SELF'];
		 
		  if(!empty($_REQUEST['cat']) && !empty($_REQUEST['sub'])){
			  $cat = $_REQUEST['cat'];
			  $sub = $_REQUEST['sub'];
		   $targetpath="$path?option=manage_subcategory&cat=$cat&sub=$sub";
		$sql="select a.category,b.name,c.name from sub_category c left join category b on b.id=c.category_id left join main_category a on a.id=b.main_id where a.id=$cat and b.id=$sub order by c.id desc";	
		  } else {
		   $targetpath="$path?option=manage_subcategory";
		$sql="select a.category,b.name,c.name from sub_category c left join category b on b.id=c.category_id left join main_category a on a.id=b.main_id order by c.id desc";
		  }
		  $r = $dbc->query($sql) or die(mysql_error());
		   $total_count=$dbc->getNumRows($r);
	      $rowsperpage =10;
		   if($total_count<>''){ include("class/pagination.php");}else { $offset=0; $rowsperpage=0;  }
		  
		  ?> 
          </div>       
      </div>

    </div>
    
 	<div class="columns">

<div class="order_results">
<div class="hd_con" style="float:left; width:100%;">
          	  <div class="search_con" style="margin-left: 50px; margin-top: 10px; width: 80%">
		  <form name="search" action="" method="post">
	  	<select class="srch_txt" name="search_cat" id="search_cat" onchange="getCat()">
	  		<option value="">--Select--</option>
			<?php 
			$select01 = "select * from main_category order by category";
			$query01 = $dbc -> query ($select01);
			while($array01 = $dbc -> fetch($query01)) { ?>
			
	  		<option value="<?php echo $array01['id']; ?>" <?php if(!empty($_REQUEST['cat'])) { if($array01['id'] == $_REQUEST['cat']) echo 'selected'; } ?> ><?php echo $array01['category']; ?></option>
			
	  		<?php } ?>
	  	</select>
		
		<span id="cat">
		<?php if(!empty($_REQUEST['cat'])) {
		$select02 = "select * from category where main_id='$_REQUEST[cat]'";
$query02 = $dbc -> query($select02);
 $count=$dbc->getNumRows($query02);
if($count > 0) {?>
<select class="srch_txt" name="search_subcat">
<?php while($array02 = $dbc -> fetch($query02)) { ?>
<option value="<?php echo $array02['id']; ?>" <?php if(!empty($_REQUEST['sub'])) { if($array02['id'] == $_REQUEST['sub']) echo 'selected'; } ?>><?php echo $array02['name']; ?></option>
<?php } ?>
</select>
<?php
		} }
?>
		</span>
	<input type="Submit" class="button tiny radius" value="Search" style="margin-top:3px;" name="submit_cat"/>
      
	  </form></div>

      </div>
            
     <div class="dash_bg">
     <h3><span class="iconcommon"></span>Manage Subcategory</h3>
        <ul class="formBox">
          <div id="projects_area">
            <table class="dataTable" width="100%" cellpadding="0" cellspacing="0" border="0">
              <tbody>
                  <tr>
				   <th>SL NO.</th>
				   <th>MAIN CATEGORY</th>
                 <th>CATEGORY</th>
                  <th>SUBCATEGORY</th>
                  <!-- <th>DESCRIPTION</th> -->
				   <th>ACTION</th>
                  </tr>
				  <?php
				  if(!empty($cat) && !empty($sub)) {
				$s="select a.category,b.name,c.name as sub_category,c.id from sub_category c left join category b on b.id=c.category_id left join main_category a on a.id=b.main_id where a.id=$cat and b.id=$sub order by c.id desc LIMIT $offset,$rowsperpage";
				  } else {
				  $s="select a.category,b.name,c.name as sub_category,c.id from sub_category c left join category b on b.id=c.category_id left join main_category a on a.id=b.main_id order by c.id desc LIMIT $offset,$rowsperpage";
                  }
				  $q=$dbc->query($s);
					    $i=$offset+1;
		if($total_count>0)
		{
                while($row=$dbc->fetch($q))
				{
					
					?>
				
        		<tbody>
                <td><?php echo $i;?></td>
                <td><?php echo $row['category'];?></td>
				<td><?php echo $row['name'];?></td>
                <td><?php echo $row['sub_category'];?></td>
				<!-- <td><?php echo $row['description'];?></td> -->
                
                <td>
               <a class="ad_edit" href="administrator.php?option=edit_subcategory&id=<?php echo $row['id'];?>"><span class="a_d_icon"><i class="fi-widget"></i></span> Edit</a>
                <a class="ad_delete" href="administrator.php?option=manage_subcategory&id=<?php echo $row['id'];?>" onclick="return del();"><span class="a_d_icon"><i class="fi-trash"></i></span> Delete</a>
        
               </td>
			   <?php
			   $i++;
				}
				
		} else { echo '<td colspan=5>No results found</td>'; }
				?>
                </tbody>
               
            </table>
          </div>
        </ul>
      </div>
<script>
 function del()
 {
	
var r=confirm('Are you sure you want to delete this ?');
return r;
 }
 
 function getCat()
 {
	 var cat = $("#search_cat option:selected").val();
		$.post("phpfiles/do/getCat.php", {
			cat : cat
		}, function(data) {
			$("#cat").html(data);
		});
 }
</script>