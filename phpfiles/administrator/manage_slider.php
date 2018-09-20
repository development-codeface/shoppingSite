<?php
error_reporting(0);
include("../../class/dbc_class.php");
include("../../class/Util.class.php");
$dbc=new Dbc;
$id=$_REQUEST['id'];
$typ=$_REQUEST['type'];

$select01="select * from home_banner where id='$id'";
$query01=$dbc->query($select01);
$array01=$dbc->fetch($query01);
?>

<div style="float:left; margin-left:100px;" id="images">
<form action="" method="post" enctype="multipart/form-data">
<table width="300" border="0" align="center">
<tr>
<td>
<img src="../../<?php echo $array01['image_url'];?>" width="300px" />
</td>
</tr><br/>
<tr><td colspan="2"><?php if($typ=='slider') {
echo 'For best results upload images with 888px width & 364px height with size less than 600KB.</br><br/>';
} else { echo 'For best results upload images with 870px width & 115px height with size less than 200KB..</br><br/>'; }?>
Only JPG, GIF, PNG images are allowed.</br><br/></td></tr>
<tr><td><input type="file" name="product_image"></td></tr>
<tr><td><input type="submit" value="Update" name="update"></td></tr>
</table>
</form>
</div>
<?php

if (isset($_POST['update']))
{
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
			$desired_dir="images/banner";
			if ($upload == true)
			{			

	            if($image_type != "image/jpeg" &&  $image_type != "image/gif" && $image_type != "image/jpg" && $image_type != "image/png")
	            {
	                $upload = false;
					$errors[]='Invalid image. Only JPG,PNG and GIF types are accepted.';
	                echo"<script>alert('Invalid image. Only JPG,PNG and GIF types are accepted.')</script>";               
	            }
				if(empty($errors)==true)
				{
					
						if(is_dir("$desired_dir/".$image_name)==false)
						{
							unlink("../../".$array01['image_url']);
							move_uploaded_file($image_tmp,'../../'.$desired_dir . '/'. $image_name);
				
							$file_name=$desired_dir."/".$image_name;
						}

							$update01 = "update home_banner set image_url = '$file_name' where id = '$id'";
							$query02 = $dbc -> query($update01);

						echo"<script>alert('Image updated successfully');</script>"; ?>
				<script>
				window.onunload = refreshParent;
				function refreshParent() {
				window.close();
				window.opener.location.reload();
				}
				</script>";
						<?php
						echo"<script>window.location='manage_slider.php?id=$id'</script>";
				}						
			}				
		}
		else
		{
			echo "<script>alert('Please select an image')</script>";
			echo "<script>window.location='manage_slider.php?id=$id'</script>";
		}
}
?>