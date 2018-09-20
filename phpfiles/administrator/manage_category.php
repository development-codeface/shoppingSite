<?php
include_once("class/dbc_class.php");
	$dbc=new Dbc;
	
	if(isset($_POST['search_cat'])){
	echo "<script>window.location='administrator.php?option=manage_category&cat=$_POST[search]'</script>";
	}
		
	if(!empty($_REQUEST['cat'])){
	 $category=$_REQUEST['cat']; 
		   $path=$_SERVER['PHP_SELF'];
		   $targetpath="$path?option=manage_category&cat=$category";
			
		
		  $sql="select a.category,b.name,b.id from category b left join main_category a on a.id=b.main_id where a.id=$category order by b.name";	
		   $r = $dbc->query($sql) or die(mysql_error());
		   $total_count=$dbc->getNumRows($r);
		   //exit;
	} else {
		

		   $path=$_SERVER['PHP_SELF'];
		   $targetpath="$path?option=manage_category";
			
		
		  $sql="select a.category,b.name,b.id from category b left join main_category a on a.id=b.main_id order by b.name";	
		   $r = $dbc->query($sql) or die(mysql_error());
		   $total_count=$dbc->getNumRows($r);
	}


//delete category
 if(isset($_REQUEST['id']))
{
	$id=$_REQUEST['id'];
	 	
	 // $s1="delete a,category from sub_category a inner join category on category.id=a.category_id where category.id='$id'";
	// $q1=$dbc->query($s1);
	
	 
	 $sq="select * from sub_category where category_id='$id'";
	 $ql=$dbc->query($sq);
	 if($dbc->getNumRows($ql))
	 {
		 while($ro=$dbc->fetch($ql))
		 {
		 	$sq33="select * from product where subcategory_id='$ro[id]'";
			 $ql33=$dbc->query($sq33);
			 if($dbc->getNumRows($ql33)<>"")
			 {
				 	while($row22=$dbc->fetch($ql33))
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
				
			 	 $s3="delete from product where subcategory_id='$ro[id]'";
				 $q3=$dbc->query($s3);
			 }
		 }
	 }
	
 
	 $s1="delete from category where id='$id'";
	 $q1=$dbc->query($s1);
	
	
	 $s2="delete  from sub_category  where category_id='$id'";
	 $q2=$dbc->query($s2); 
 
	echo "<script>window.location='administrator.php?option=manage_category';</script>"; 
} 
	
?>
 	  <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="administrator.php"><span class="d-icon"><i class="fi-home"></i></span></a>
      <a class="current" href="#">manage category</a>
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
<?php

$select01 = "select * from main_category order by category";
$query01 = $dbc -> query ($select01);

?>
     	  <div class="search_con" style="margin-left: 50px; margin-top: 10px; width: 80%">
		  <form name="search" action="" method="post">
	  	<select class="srch_txt" name="search" id="search">
	  		<option value="">--Select--</option>
			<?php while($array01 = $dbc -> fetch($query01)) { ?>
			
	  		<option value="<?php echo $array01['id']; ?>" <?php if(!empty($category)){ if($category == $array01['id']) echo 'selected'; } ?>><?php echo $array01['category']; ?></option>
			
	  		<?php } ?>
	  	</select>
	<input type="Submit" class="button tiny radius" value="Search" style="margin-top:3px;" name="search_cat"/>
      
	  </form></div>

      </div>
            
     <div class="dash_bg">
     <h3><span class="iconcommon"></span>Manage Category</h3>
        <ul class="formBox">
          <div id="projects_area">
            <table class="dataTable" width="100%" cellpadding="0" cellspacing="0" border="0">
              <tbody>
                  <tr>
                 <th>SL NO.</th>
                 <th>MAIN CATEGORY</th>
                  <th>CATEGORY</th>
				  <!-- <th>DESCRIPTION</th> -->
                  <th>ACTION</th>
				 
                  </tr>
				  <?php
				  if(!empty($category)) {
				  $s="select a.category,b.name,b.id from category b left join main_category a on a.id=b.main_id where a.id = $category order by b.name LIMIT $offset, $rowsperpage";
                  } else {
				$s="select a.category,b.name,b.id from category b left join main_category a on a.id=b.main_id order by b.name LIMIT $offset, $rowsperpage";
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
				<!-- <td><?php echo $row['description'];?></td> -->
                
                <td>
               <a class="ad_edit" href="administrator.php?option=edit_category&id=<?php echo $row['id'];?>"><span class="a_d_icon"><i class="fi-widget"></i></span> Edit</a>
               <a class="ad_delete" href="administrator.php?option=manage_category&id=<?php echo $row['id'];?>" onClick="return del();"> <span class="a_d_icon"><i class="fi-trash"></i></span> Delete</a>
        
               </td>
			   <?php
			   $i++;
				}
				
				  } else { echo '<td colspan=4>No results found</td>'; }
				?>
                </tbody>
               
            </table>
          </div>
        </ul>
      </div>
  <script>
 function del()
 {
	
var r=confirm('Are you sure you want to delete this category ?');
return r;
 }
</script>
