<?php

include("class/dbc_class.php");

$dbc=new Dbc;
if($_POST['create'])
{
$pin=$dbc->clean_up($_POST['location']);

 $s1="select * from pincode where pincode='$pin'";
 $q1=$dbc->query($s1);
 $c=$dbc->getNumRows($q1);
if($c>0)
{
echo "<script>alert('This delivery location already added!!');window.location='administrator.php?option=locations';</script>";	
}
else
{
$s2="insert into pincode values('','$pin')";	
$dbc->query($s2);

echo "<script>alert('New delivery location added successfully..');window.location='administrator.php?option=locations';</script>";
}
}
?>	