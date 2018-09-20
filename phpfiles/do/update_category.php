<?php
include("class/dbc_class.php");
$dbc=new Dbc;
$id=$_REQUEST['hid_id'];
//update category table
if($_POST['create'])
{
	$main_id=$_POST['main_category'];
$cname=$_POST['category_name'];
$des=$dbc->clean_up($_POST['description']);
$s3="select * from category where id='$id' and main_id='$main_id'";
$q3=$dbc->query($s3);
$row=$dbc->fetch($q3);
$old_cname=$row['name'];
if($cname==$old_cname)
{
$s2="update category set name='$cname',description='$des',main_id='$main_id' where id='$id'";	
$dbc->query($s2);
echo "<script>alert('Category updated successfully..');window.location='administrator.php?option=manage_category';</script>";	
}
else
{
$s1="select * from category where name='$cname' and main_id='$main_id'";
 $q1=$dbc->query($s1);
 $c=$dbc->getNumRows($q1);
 if($c>0)
{
	echo "<script>alert('This category already exists!!');window.location='administrator.php?option=manage_category';</script>";
}
else
{	
$s2="update category set name='$cname',description='$des',main_id='$main_id' where id='$id'";	
$dbc->query($s2);
echo "<script>alert('Category updated successfully..');window.location='administrator.php?option=manage_category';</script>";
}
}
}
?>	