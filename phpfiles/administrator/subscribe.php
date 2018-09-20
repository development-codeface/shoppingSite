<?php
include_once("class/dbc_class.php");
	$dbc=new Dbc;

		   $path=$_SERVER['PHP_SELF'];
		   $targetpath="$path?option=subscibe";
			
		
		  $sql="SELECT * FROM tbl_subscribe order by id desc";	
		   $r = $dbc->query($sql) or die(mysql_error());
		   $total_count=$dbc->getNumRows($r);



	
?>
 	  <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="administrator.php"><span class="d-icon"><i class="fi-home"></i></span></a>
      <a class="current" href="#">manage subscribe</a>
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
     <h3><span class="iconcommon"></span>Manage Subscribe</h3>
        <ul class="formBox">
          <div id="projects_area">
            <table class="dataTable" width="100%" cellpadding="0" cellspacing="0" border="0">
              <tbody>
                  <tr>
                 <th>SL NO.</th>
                  <th>EMAIL</th>
				 
                  </tr>
				  <?php
				  $s="select * from tbl_subscribe order by id desc  LIMIT $offset, $rowsperpage";
                    $q=$dbc->query($s);
				  $i=$offset+1;
		
				  if($total_count>0)
				  {
                while($row=$dbc->fetch($q))
				{
					?>
				
        		<tbody>
                <td><?php echo $i;?></td>
                <td><?php echo $row['email'];?></td>
                
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

