<?php
include_once("class/dbc_class.php");
	$dbc=new Dbc;

		   $path=$_SERVER['PHP_SELF'];
		   $targetpath="$path?option=manage_main_category";
			
		
		  $sql="SELECT * FROM main_category order by id desc";	
		   $r = $dbc->query($sql) or die(mysql_error());
		   $total_count=$dbc->getNumRows($r);


//delete category
 if(isset($_REQUEST['id']))
{
	$id=$_REQUEST['id'];
	 	
 // $s1="delete from category,sub_category,main_category using category inner join sub_category inner join main_category where main_category.id=category.main_id and category.id=sub_category.category_id and main_category.id='$id'";
 // $q1=$dbc->query($s1);
	
	
	 $sql_1="select * from category where main_id='$id'";
	 $res_1=$dbc->query($sql_1);
	 if($dbc->getNumRows($res_1)<>"")
	 {
		 while($row_1=$dbc->fetch($res_1))
		 {
		 	 $sq_2="select * from sub_category where category_id='$row_1[id]'";
			 $res_2=$dbc->query($sq_2);
			 if($dbc->getNumRows($res_2))
			 {
			 	
				
				 while($ro=$dbc->fetch($res_2))
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
				
				
				 $s2="delete  from sub_category  where category_id='$row_1[id]'";
				 $q2=$dbc->query($s2); 
			 }
			 
			 $s1="delete  from category  where main_id='$id'";
			  $q1=$dbc->query($s1);
		 }
	 }
	 
	  $s0="delete  from main_category  where id='$id'";
	  $q0=$dbc->query($s0);
	 
	
	echo "<script>window.location='administrator.php?option=manage_main_category';</script>"; 
} 
	
?>
 	  <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="administrator.php"><span class="d-icon"><i class="fi-home"></i></span></a>
      <a class="current" href="#">manage main category</a>
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
<!--<div class="hd_con" style="float:left; width:100%;">
     
        <!--div class="pagination_con">
        <div id="page_navigation">
          <div class="pagination">  

		<?php  
		  
	      //$rowsperpage =1;
		   //if($total_count<>''){ include("class/pagination.php");}else { $offset=0; $rowsperpage=0;  }
		  
		  ?> 
          </div>
          </div>
            
        </div>

      </div>-->
            
     <div class="dash_bg">
     <h3><span class="iconcommon"></span>Manage Main Category</h3>
        <ul class="formBox">
          <div id="projects_area">
            <table class="dataTable" width="100%" cellpadding="0" cellspacing="0" border="0">
              <tbody>
                  <tr>
                 <th>SL NO.</th>
                  <th>CATEGORY</th>
                  <th>ACTION</th>
				 
                  </tr>
				  <?php
				  $s="select * from main_category order by category asc  LIMIT $offset, $rowsperpage";
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
                
                <td>
               <a class="ad_edit" href="administrator.php?option=edit_main_category&id=<?php echo $row['id'];?>"><span class="a_d_icon"><i class="fi-widget"></i></span> Edit</a>
               <a class="ad_delete" href="administrator.php?option=manage_main_category&id=<?php echo $row['id'];?>" onClick="return del();"> <span class="a_d_icon"><i class="fi-trash"></i></span> Delete</a>
        
               </td>
			   <?php
			   $i++;
				}
				
				  } else { echo '<td colspan=3>No results found</td>'; }
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
