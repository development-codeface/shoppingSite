<?php
	include_once("class/dbc_class.php");
	$dbc=new Dbc;
	
	//ban user
	if(isset($_REQUEST['ban']))
	{
		$id_ban=$_GET['ban'];
		$sql2="update user_registration set status=3 where id='$id_ban'";
		$dbc->query($sql2);
		echo '<script>window.location="administrator.php?option=users";</script>';
	}

	//unban user
	if(isset($_REQUEST['unban']))
	{
		$id_ban=$_GET['unban'];
		$sql2="update user_registration set status=1 where id='$id_ban'";
		$dbc->query($sql2);
		echo '<script>window.location="administrator.php?option=users";</script>';
	}
	
	//delete user
	if(isset($_REQUEST['delete']))
	{
		$id_del=$_GET['delete'];
		$sql2="update user_registration set status=4 where id='$id_del'";
		$dbc->query($sql2);
		echo '<script>window.location="administrator.php?option=users";</script>';
	}
	
	//pagination
		$path=$_SERVER['PHP_SELF'];
		$targetpath="$path?option=manage_users";
		$sql2="select * from user_registration where status!=4 order by id desc";
		$res2=$dbc->query($sql2);
		$total_count=mysql_num_rows($res2);
?>
 	  <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="administrator.php"><span class="d-icon"><i class="fi-home"></i></span></a>
      <a class="current" href="#1">manage users</a>
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
		<h3><span class="iconcommon"></span>Manage Users</h3>
			<ul class="formBox">
				<div id="projects_area">
					<table class="dataTable" width="100%" cellpadding="0" cellspacing="0" border="0">
					<tbody>
					<tr>
					<th>SL.NO</th>
					<th>NAME</th>
					<th>ADDRESS</th>
					<th>CITY</th>
					<th>DISTRICT</th>
					<th>PINCODE</th>
					<th>PHONE</th>
					<th>E-MAIL</th>
					<th>DATE</th>
					<th>ACTION</th>
					</tr>
					<?php
					
					//query to list all user details
					$sql1="select * from user_registration where status!=4 order by id desc LIMIT $offset, $rowsperpage";
					$res1=$dbc->query($sql1);
					 $i=$offset+1;
					while($us=$dbc->fetch($res1))
					{
					?>
						<tbody>
						<td><?php echo $i; ?></td>
						<td><?php echo $us['name']; ?></td>
						<td><?php echo $us['address']; ?></td>
						<td><?php echo $us['city']; ?></td>
						<td><?php echo $us['district']; ?></td>
						<td><?php echo $us['pincode']; ?></td>
						<td><?php echo $us['phone']; ?></td>
						<td><?php echo $us['email']; ?></td>
						<td><?php echo $us['date']; ?></td>
						<td>
						<?php
						if($us['status'] == '1')
						{
							?>
							<a class="ad_edit" href="administrator.php?option=users&ban=<?php echo $us['id']; ?>" title="Click to de-activate" onclick="return ban();"><span class="a_d_icon"><i class="fi-widget"></i></span> Account activated</a>
							<?php
						}
						else if($us['status'] == '0')
						{
							?>
							<a class="ad_edit" href="#1"><span class="a_d_icon"><i class="fi-widget"></i></span> Account not activated</a>
							<?php
						}
						else if($us['status'] == '3')
						{
							?>
							<a class="ad_delete" href="administrator.php?option=users&unban=<?php echo $us['id']; ?>" title="Click to unblock" onclick="return unban();"><img src="images/block.jpg" width="15"/> Account blocked</a>
							<?php
						}
						else
						{
							?>
							<a class="ad_edit"href="#1"><span class="a_d_icon"></span> Guest</a>
							<?php
						}
						?>
						<a class="ad_delete" href="administrator.php?option=users&delete=<?php echo $us['id']; ?>"  onclick="return del();"><span class="a_d_icon"><i class="fi-trash"></i></span> Delete</a>
						</td>
						<?php
						$i++;
					}
 					
					?>
					</tbody>
					</table>
				</div>
			</ul>
	</div>
<script>
function ban()
{
	var a=confirm('Are you sure you want to block this user account ?');
	return a;
}
function unban()
{
	var a=confirm('Are you sure you want to unblock this user account ?');
	return a;
}
function del()
{
	var a=confirm('Are you sure you want to delete this user account ?');
	return a;
}
</script>