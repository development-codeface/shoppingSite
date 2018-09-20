<?php
include("class/dbc_class.php");
$dbc=new Dbc;
//insert into subcategory table
if($_POST['screate'])
{
$cat_id=$_POST['category_name'];
 $sname=$_POST['subcategory_name'];
$des=$dbc->clean_up($_POST['description']);
 $s1="select * from sub_category where name='$sname' and category_id='$cat_id'";
 $q1=$dbc->query($s1);
 $c=$dbc->getNumRows($q1);
if($c>0)
{
echo "<script>alert('This subcategory already exist!!');window.location='administrator.php?option=create_subcategory';</script>";	
}
else
{
 $s2="insert into sub_category values('','$cat_id','$sname','$des')";	
$dbc->query($s2);
echo "<script>alert('New subcategory added successfully..');</script>";	
echo "<script>window.location='administrator.php?option=subcategory';</script>";	
} 
}
?>	