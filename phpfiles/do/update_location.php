<?php
include("class/dbc_class.php");
$dbc=new Dbc;
$id=$_REQUEST['hid_id'];
//update category table
if($_POST['create'])
{
$cname=$dbc->clean_up($_POST['location']);

$s3="select * from pincode where id='$id'";
$q3=$dbc->query($s3);
$row=$dbc->fetch($q3);
$old_cname=$row['name'];


$s1="select * from pincode where pincode='$cname'";
 $q1=$dbc->query($s1);
 $c=$dbc->getNumRows($q1);
 if($c>0)
{
	echo "<script>alert('This delivery location already exists!!');window.location='administrator.php?option=manage_locations';</script>";
}
else
{	
$s2="update pincode set pincode='$cname' where id='$id'";	
$dbc->query($s2);
echo "<script>alert('Delivery location updated successfully..');window.location='administrator.php?option=manage_locations';</script>";
}
}

?>	