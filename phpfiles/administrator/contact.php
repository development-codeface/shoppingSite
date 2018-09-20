<?php
include_once("class/dbc_class.php");
$dbc=new Dbc;


if(isset($_REQUEST['id']))
{
	$id=$_REQUEST['id'];
 
 	 $s2="delete from contact where id='$id'";
	 $q2=$dbc->query($s2); 
	 	
echo "<script>window.location='administrator.php?option=contact';</script>";
} 

?>
 	  <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="administrator.php"><span class="d-icon"><i class="fi-home"></i></span></a>
      <a class="current" href="#">manage contacts</a>
		 </nav>
		         
      </div>

    </div>
    
 	<div class="columns">

<div class="order_results">
<div class="hd_con" style="float:left; width:100%;">
     
        <div class="pagination_con">
        <div id="page_navigation">
          <div class="pagination">  
		<?php  
		  
		 $path=$_SERVER['PHP_SELF'];
		   $targetpath="$path?option=contact";
		$sql="select * from contact order by id desc";	
		   $r = $dbc->query($sql) or die(mysql_error());
		   $total_count=$dbc->getNumRows($r);
	      $rowsperpage =10;
		   if($total_count<>''){ include("class/pagination.php");}else { $offset=0; $rowsperpage=0;  }
		  
		  ?> 
          </div>
          </div>
            
        </div>

      </div>
            
     <div class="dash_bg">
     <h3><span class="iconcommon"></span>Manage Contacts</h3>
        <ul class="formBox">
          <div id="projects_area">
            <table class="dataTable" width="100%" cellpadding="0" cellspacing="0" border="0">
              <tbody>
                  <tr>
				   <th>SL NO.</th>
				   <th>NAME</th>
                 <th>PHONE</th>
                  <th>E-MAIL</th>
                  <th>MESSAGE</th>
				   <th>ACTION</th>
                  </tr>
				  <?php
				  $s="select * from contact order by id desc LIMIT $offset,$rowsperpage";
                       $q=$dbc->query($s);
					    $i=$offset+1;
		if($total_count>0)
		{
                while($row=$dbc->fetch($q))
				{
					
					?>
				
        		<tbody>
                <td><?php echo $i;?></td>
                <td><?php echo $row['name'];?></td>
				<td><?php echo $row['phone'];?></td>
                <td><?php echo $row['email'];?></td>
				<td><?php echo $row['message'];?></td>
                
                <td>
               <a class="ad_delete" href="administrator.php?option=contact&id=<?php echo $row['id'];?>" onclick="return del();"><span class="a_d_icon"><i class="fi-trash"></i></span> Delete</a>
        
               </td>
			   <?php
			   $i++;
				}
				
		} else { echo '<td colspan=6>No results found</td>'; }
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
</script>