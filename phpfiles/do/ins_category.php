<?php

	//insert into category table
include("class/dbc_class.php");

$dbc=new Dbc;
if($_POST['create'])
{
$cname=$dbc->clean_up($_POST['category_name']);
$main_cat=$_POST['main_cat'];
$des=$dbc->clean_up($_POST['description']);

 $s1="select * from category where name='$cname' and main_id='$main_cat'";
 $q1=$dbc->query($s1);
 $c=$dbc->getNumRows($q1);
if($c>0)
{
echo "<script>alert('This category already exists!!');window.location='administrator.php?option=category';</script>";	
}
else
{
$s2="insert into category values('','$main_cat','$cname','$des')";	
$dbc->query($s2);

echo "<script>alert('New category added successfully..');window.location='administrator.php?option=category';</script>";
}
}
?>	