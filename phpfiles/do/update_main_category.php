<?php
include("class/dbc_class.php");
$dbc=new Dbc;
$id=$_REQUEST['hid_id'];
//update category table
if($_POST['create'])
{
$cname=$_POST['category_name'];

$s3="select * from main_category where id='$id'";
$q3=$dbc->query($s3);
$row=$dbc->fetch($q3);
$old_cname=$row['name'];


$s1="select * from main_category where category='$cname'";
 $q1=$dbc->query($s1);
 $c=$dbc->getNumRows($q1);
 if($c>0)
{
	echo "<script>alert('This category already exists!!');window.location='administrator.php?option=manage_main_category';</script>";
}
else
{	
$s2="update main_category set category='$cname' where id='$id'";	
$dbc->query($s2);
echo "<script>alert('Category updated successfully..');window.location='administrator.php?option=manage_main_category';</script>";
}
}

?>	