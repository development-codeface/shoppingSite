<?php
include("class/dbc_class.php");
$dbc=new Dbc;

if($_POST['create'])
{
$cname=$_POST['category_name'];

 $s1="select * from main_category where category='$cname'";
 $q1=$dbc->query($s1);
 $c=$dbc->getNumRows($q1);
if($c>0)
{
echo "<script>alert('This category already exists!!');window.location='administrator.php?option=main_category';</script>";	
}
else
{
$s2="insert into main_category values('','$cname')";	
$dbc->query($s2);

echo "<script>alert('New category added successfully..');window.location='administrator.php?option=main_category';</script>";
}
}
?>	