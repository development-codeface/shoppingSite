<?php
include("class/dbc_class.php");
$dbc=new Dbc;
$id=$_REQUEST['hid_id'];
//update subcategory table
if($_POST['screate'])
{
	
$cat_id=$_POST['category_name'];
 $sname=$_POST['subcategory_name'];
$des=$dbc->clean_up($_POST['description']);
$s2="select * from sub_category where id='$id' and category_id='$cat_id'";
$q2=$dbc->query($s2);
$row=$dbc->fetch($q2);
$old_sname=$row['name'];
if($sname==$old_sname)
{
$s3="update sub_category set category_id='$cat_id',name='$sname',description='$des' where id='$id' ";	
$dbc->query($s3);
echo "<script>alert('Subcategory details updated successfully..');window.location='administrator.php?option=manage_subcategory';</script>";	
}
else
{
$s1="select * from sub_category where name='$sname' and category_id='$cat_id'";
 $q1=$dbc->query($s1);
 $c=$dbc->getNumRows($q1);
if($c>0)
{
echo "<script>alert('This subcategory already exists!!');window.location='administrator.php?option=manage_subcategory';</script>";	
}
else
{
$s3="update sub_category set category_id='$cat_id',name='$sname',description='$des' where id='$id'";	
$dbc->query($s3);
echo "<script>alert('Subcategory details updated successfully..');window.location='administrator.php?option=manage_subcategory';</script>";	
}
}
}
?>       