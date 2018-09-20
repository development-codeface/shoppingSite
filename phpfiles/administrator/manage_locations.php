<?php
	include_once("class/dbc_class.php");
	$dbc=new Dbc;
	
	//delete pin
	if(!empty($_REQUEST['delete']))
	{
		$id_del=$_GET['delete'];
		$sql2="delete from pincode where id='$id_del'";
		$dbc->query($sql2);
		echo '<script>window.location="administrator.php?option=manage_locations";</script>';
	}
	
	//pagination
		$path=$_SERVER['PHP_SELF'];
		$targetpath="$path?option=manage_locations";
		$sql2="select * from pincode";
		$res2=$dbc->query($sql2);
		$total_count=mysql_num_rows($res2);
?>
 	  <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="administrator.php"><span class="d-icon"><i class="fi-home"></i></span></a>
      <a class="current" href="#">manage locations</a>
		 </nav>
		         
          <div class="pagination">  
		<?php  
		  
	      $rowsperpage = 10;
		  
		   if($total_count<>''){ include("class/pagination.php");}else { $offset=0; $rowsperpage=0;  }
		  
		  ?> 
          </div>
      </div>

    </div>
    
 	<div class="columns">
<div class="order_results">
	<div class="dash_bg">
		<h3><span class="iconcommon"></span>Manage Locations</h3>
			<ul class="formBox">
				<div id="projects_area">
					<table class="dataTable" width="100%" cellpadding="0" cellspacing="0" border="0">
					<tbody>
					<tr>
					<th>SL.NO</th>
					<th>PINCODE</th>
					<th>ACTION</th>
					</tr>
					<?php
					
					$sql1="select * from pincode LIMIT $offset, $rowsperpage";
					$res1=$dbc->query($sql1);
					 $i=$offset+1;
					$c=$dbc->getNumRows($res1);
					if($c>0)
					{
					while($us=$dbc->fetch($res1))
					{
					?>
						<tbody>
						<td><?php echo $i; ?></td>
						<td><?php echo $us['pincode']; ?></td>
						<td>
						<a class="ad_edit"  href="administrator.php?option=edit_location&edit=<?php echo $us['id']; ?>" ><span class="a_d_icon"><i class="fi-widget"></i></span>Edit</a>
						<a class="ad_delete" href="administrator.php?option=manage_locations&delete=<?php echo $us['id']; ?>"  onclick="return del();"><span class="a_d_icon"><i class="fi-trash"></i></span> Delete</a>
						</td>
						<?php
						$i++;
					}} else {?> <td colspan="3" align="center"><?php echo 'No locations added.'; ?></td> <?php }
 					
					?>
					</tbody>
					</table>
				</div>
			</ul>
	</div>
<script>
function del()
{
	var a=confirm('Are you sure you want to delete this ?');
	return a;
}
</script>