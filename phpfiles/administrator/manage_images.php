<?php
error_reporting(0);
include("../../class/dbc_class.php");
include("../../class/Util.class.php");
$dbc=new Dbc;
$product_id=$_REQUEST['id'];
$image_id=$_REQUEST['img_id'];

$s_p="select a.name,a.language,a.author,a.price,a.brand,a.id,d.id as main_id from product a left join sub_category b on a.subcategory_id=b.id 
left join category c on b.category_id=c.id left join main_category d on d.id=c.main_id where a.id='$product_id'";
$q_p=$dbc->query($s_p);
$r_p=$dbc->fetch($q_p);


$s="select * from product_image where product_id='$product_id'";
$q=$dbc->query($s);
$count=$dbc->getNumRows($q);
?>
<table width="100%" height="180" style=" solid #DDDDDD;">
<tr>
<td width="176" colspan="2">
<?php
while($row=$dbc->fetch($q))
{
?>
<a href="manage_images.php?id=<?php echo $product_id;?>&img_id=<?php echo $row['id'];?>"><img width="150" height="150" src="../../<?php echo $row['image'];?>"></a>
<?php
}
if($count=='1')
{
	?>
  <!-- <a href="manage_images.php?id=<?php echo $product_id;?>&img_id=noimage"><img src="../../images/noimage.jpg" width="150" height="150" /></a>
  <a href="manage_images.php?id=<?php echo $product_id;?>&img_id=noimage"><img src="../../images/noimage.jpg" width="150" height="150" /></a>
  <a href="manage_images.php?id=<?php echo $product_id;?>&img_id=noimage"><img src="../../images/noimage.jpg" width="150" height="150" /></a>
  <a href="manage_images.php?id=<?php echo $product_id;?>&img_id=noimage"><img src="../../images/noimage.jpg" width="150" height="150" /></a> -->
  <?php 
}
if($count=='2')
{?>
 <!-- <a href="manage_images.php?id=<?php echo $product_id;?>&img_id=noimage"><img src="../../images/noimage.jpg" width="150" height="150" /></a>
<a href="manage_images.php?id=<?php echo $product_id;?>&img_id=noimage"><img src="../../images/noimage.jpg" width="150" height="150" /></a>
<a href="manage_images.php?id=<?php echo $product_id;?>&img_id=noimage"><img src="../../images/noimage.jpg" width="150" height="150" /></a> -->
<?php
}
if($count=='3')
{
	?>
	 <!-- <a href="manage_images.php?id=<?php echo $product_id;?>&img_id=noimage"><img src="../../images/noimage.jpg" width="150" height="150" /></a>
<a href="manage_images.php?id=<?php echo $product_id;?>&img_id=noimage"><img src="../../images/noimage.jpg" width="150" height="150" /></a> -->
	<?php
}
if($count=='4')
{
	?>
	<!-- <a href="manage_images.php?id=<?php echo $product_id;?>&img_id=noimage"><img src="../../images/noimage.jpg" width="150" height="150" /></a> -->
	<?php
}
if($count=='')
{
?>
   <a href="manage_images.php?id=<?php echo $product_id;?>&img_id=noimage"><img src="../../images/noimage.jpg" width="150" height="150" /></a>
  <a href="manage_images.php?id=<?php echo $product_id;?>&img_id=noimage"><img src="../../images/noimage.jpg" width="150" height="150" /></a>
  <a href="manage_images.php?id=<?php echo $product_id;?>&img_id=noimage"><img src="../../images/noimage.jpg" width="150" height="150" /></a>
  <a href="manage_images.php?id=<?php echo $product_id;?>&img_id=noimage"><img src="../../images/noimage.jpg" width="150" height="150" /></a>
  <a href="manage_images.php?id=<?php echo $product_id;?>&img_id=noimage"><img src="../../images/noimage.jpg" width="150" height="150" /></a>
<?php }
?>
</td>
</tr>
</table>
<?php
if($image_id <> "noimage")
{	
$sq2="select * from product_image where id='$image_id'";
$ql2=$dbc->query($sq2);
$row2=$dbc->fetch($ql2);
$count=$dbc->getNumRows($ql2);
$image=$row2['image'];
$sc="select * from product_image where product_id='$product_id'";
$qc=$dbc->query($sc);
$img_count=$dbc->getNumRows($qc);
?>
<div style="float:left; margin-left:150px;" id="images">
<form action="" method="post" enctype="multipart/form-data">
<table width="200" border="0" align="center">
<tr>
<td>
<?php
if($count<>'0')
{?>
<a href="manage_images.php?id=<?php echo $product_id;?>&img_id=<?php echo $image_id;?>"><img src="../../<?php echo $image;?>" width="150px" height="150px"/></a>
<?php
}
else
{
?>
<img src="../../images/noimage.jpg" width="150px" height="150px"/> 
<?php
}
if($img_count == "1")
{
?>
</td></tr><br/><br/>
<tr><td colspan="2">Image's size must be less than 500KB.<br/>Only JPG, GIF, PNG images allowed.</td></tr>
<tr><td>Upload an image<input type="file" name="product_image"></td></tr>
<tr><td><br/><input type="submit" name="update" value="Update"></td></tr>
</table>
</form>
</div>
<?php
}
else
{
?>
</td></tr><br/><br/>

<tr><td colspan="2">Image's size must be less than 500KB.<br/>Only JPG, GIF, PNG images allowed.</td></tr>
<tr><td>Upload an image<input type="file" name="product_image"></td></tr>
<tr><td><br/><input type="submit" name="update" value="Update">&nbsp;
<input type="submit" name="delete" value="Delete" onClick="return del();"></td></tr>
</table>
</form>
</div>
</table>
</form>
</div>	
<?php
}
}
else
{?>
<div style="float:left; margin-left:150px;" id="images">
<form action="" method="post" enctype="multipart/form-data">
<table width="200" border="0" align="center">
<tr>
<td>

<?php
if(isset($image_new))
{?>

	$sql="select * from product_image where product_id='$image_new'";
	$ql=$dbc->query($sql);
	$r=$dbc->fetch($ql);
?>
<a href="manage_images.php?id=<?php echo $product_id;?>&img_id=<?php echo $image_id;?>"><img src="../../<?php echo $r['image'];?>" width="150px" height="150px"/></a>
<?php
}
else
{
?>
<img src="../../images/noimage.jpg" width="150px" height="150px"/>
<?php
}
?>

</td>
</tr><br/><br/>
<tr><td colspan="2">Image's size must be less than 500KB.<br/>Only JPG, GIF, PNG images allowed.</td></tr>
<tr><td>Upload an image<input type="file" name="product_image"></td></tr>
<tr><td><input type="submit" value="Add" name="add"></td></tr>
</table>
</form>
</div>
<?php } 
?>

<?php
//update image
if (isset($_POST['update']))
{
	    $img_id=$_REQUEST['img_id'];
		$s3="select * from product_image where id='$img_id'";
		$q3=$dbc->query($s3);
		$row=$dbc->fetch($q3);
		$product_id=$row['product_id'];
		$image=$row['image'];
		$thumb=$row['thumb_image'];
		$util= new Util();
		$i=$util->getRandomWord(4);
		$image_name=$i."_".$_FILES['product_image']['name'];
		$image_namee=$_FILES['product_image']['name'];
		if($image_namee<>"")
		{
			$image_tmp=$_FILES['product_image']['tmp_name'];
			$image_size=$_FILES['product_image']['size'];
			$image_type= strtolower($_FILES['product_image']['type']);
			$errors= array();
			$upload = true;
			$desired_dir="product/original";
			$desired_dir1="product/thumb";
			if ($upload == true)
			{			
				if($image_size > 512000 )
	            {
	                $upload = false;
	                $errors[]='Images max. size must be less than 500KB';
	                echo"<script>alert('Images max. size must be less than 500KB')</script>";	               
	            }
	            if($image_type != "image/jpeg" &&  $image_type != "image/gif" && $image_type != "image/jpg" && $image_type != "image/png")
	            {
	                $upload = false;
	                $errors[]='Invalid image. Only JPG,PNG and GIF types are accepted.';
	                echo"<script>alert('Invalid image. Only JPG,PNG and GIF types are accepted.')</script>";               
	            }
				if(empty($errors)==true)
				{
					
						if(is_dir("$desired_dir/".$i."_".$image_name)==false)
						{
							unlink("../../".$image);
							unlink("../../".$thumb);
							move_uploaded_file($image_tmp,'../../'.$desired_dir . '/'. $image_name);
				
							$util->createThumbs('../../'.$desired_dir."/".$image_name,'../../'.$desired_dir1.'/thumb_'.$image_name);
							$thumb_img=$desired_dir1.'/thumb_'.$image_name;
							$file_name=$desired_dir."/".$image_name;
							$folder=$dir;
						}
						 $sql1="select * from slider_image where product_id='$product_id'";
						$result1=$dbc->query($sql1);
						$count1=$dbc->getNumRows($result1);
						if($count1 > 0)
						{
							$update01 = "update slider_image set image = '$thumb_img' where product_id = '$product_id'";
							$query01 = $dbc -> query($update01);
						}
						
						
						$sql2="update product_image set image='$file_name',thumb_image='$thumb_img' where id='$img_id'";
						$dbc->query($sql2);
						echo"<script>alert('Image Updated successfully');</script>"; 
						echo"<script>window.location='manage_images.php?id=$product_id&img_id=$img_id'</script>";
				}						
			}				
		}
		else
		{
			echo "<script>alert('Please select an image')</script>";
			echo "<script>window.location='manage_images.php?id=$product_id&img_id=$image_id'</script>";
		}
}
//ADD NEW IMAGE	
if (isset($_POST['add']))
{		 
	$product_id=$_REQUEST['id'];
	$s3="select * from product_image where product_id='$product_id'";
	$q3=$dbc->query($s3);
	$row=$dbc->fetch($q3);
	$ct=$dbc->getNumRows($q3);
	//add image to existing folder 
	if($ct<>"")
	{		
	    $image_id=$row['id'];
	    $image=$row['image'];
	    $thumb=$row['thumb_image'];
		$util= new Util();
		$i=$util->getRandomWord(4);
		$image_namee=$_FILES['product_image']['name'];
		$image_name=$i.'_'.$_FILES['product_image']['name'];
		if($image_namee<>"")
		{		
			$image_tmp=$_FILES['product_image']['tmp_name'];
			$image_size=$_FILES['product_image']['size'];
			$image_type= strtolower($_FILES['product_image']['type']);
			$errors= array();
			$upload = true;
			$desired_dir="product/original";
			$desired_dir1="product/thumb";
			if ($upload == true)
			{			
				if($image_size > 512000 )
	            {
	                $upload = false;
	                $errors[]='Images max. size must be less than 500KB';
	                echo"<script>alert('Images max. size must be less than 500KB')</script>";	               
	            }
	            if($image_type != "image/jpeg" &&  $image_type != "image/gif" && $image_type != "image/jpg" && $image_type != "image/png")
	            {
	                $upload = false;
	                $errors[]='Invalid image. Only JPG,PNG and GIF types are accepted.';
	                echo"<script>alert('Invalid image. Only JPG,PNG and GIF types are accepted.')</script>";	               
	            }
				if(empty($errors)==true)
				{				
					if(is_dir("$desired_dir/".$i."_".$image_name)==false)
					{
							move_uploaded_file($image_tmp,'../../'.$desired_dir . '/'. $image_name);
				
							$util->createThumbs('../../'.$desired_dir."/".$image_name,'../../'.$desired_dir1.'/thumb_'.$image_name);
							$thumb_img=$desired_dir1.'/thumb_'.$image_name;
							$file_name=$desired_dir."/".$image_name;
					}
									?><script>
				window.onunload = refreshParent;
				function refreshParent() {
				window.opener.location.reload();
				}
				</script><?php
					$sql2="insert into product_image values('','$product_id','$file_name','$thumb_img')";
					$dbc->query($sql2);
					echo"<script>alert('New image added successfully');</script>"; 
					echo"<script>window.location='manage_images.php?id=$product_id&img_id=$image_id'</script>";
				}							
			}				
		}	
		else
		{
		 		echo "<script>alert('Please select an image')</script>";
				echo "<script>window.location='manage_images.php?id=$product_id&img_id=noimage'</script>";
		}
	}
}

//DELETE IMAGE
if (isset($_POST['delete']))
{			
			$sc="select * from product_image where product_id='$product_id'";
   			$qc=$dbc->query($sc);
			$rr=$dbc->fetch($qc);
			$img_count=$dbc->getNumRows($qc);
			if($img_count > "1")
			{ 							
				$img_id=$_REQUEST['img_id'];
				$sd="select * from product_image where id='$img_id'";
				$qd=$dbc->query($sd);
				$roww=$dbc->fetch($qd);
				$sd1="select * from product_image where id='$img_id'";
				$qd1=$dbc->query($sd1);			
				while($row3=$dbc->fetch($qd1))
				 {
						 unlink("../../".$row3['image']);
	 	    			 unlink("../../".$row3['thumb_image']);
				 }
				 
				  $de="delete from product_image where id='$image_id'";
				 $dbc->query($de); 		
				 
				  $sc1="select * from slider_image where product_id='$product_id'";
   				$qc1=$dbc->query($sc1);
   				$rc=$dbc->fetch($qc1);
				 $img_count11=$dbc->getNumRows($qc1);
				if($img_count11 <> "0")
				{
					 $s01="select * from product_image where product_id='$product_id'";
					$r01=$dbc->query($s01);
					$re01=$dbc->fetch($r01);
					
					  $de1="delete from slider_image where id='$rc[id]'";
					  $dbc->query($de1); 
				 
					  $ss_insert="insert into slider_image values('','$r_p[main_id]','$product_id','$r_p[name]','$re01[image]','$r_p[author]','$r_p[language]','$r_p[brand]','$r_p[price]')";
					 $dbc->query($ss_insert);
					 
					 	
				}
				 
						
?>
				<script>
				window.onunload = refreshParent;
				function refreshParent() {
				window.opener.location.reload();
				}
				</script>
				<?php echo"<script>window.location='manage_images.php?id=$product_id&img_id=noimage'</script>"; 
			}
}				 
?>	
<script>				 
			function del()
			{
				var a=confirm('Are you sure you want to delete this image ?');
				return a;
			}
</script>