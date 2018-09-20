<?php
include("../../class/dbc_class.php");
$dbc=new Dbc;

$old_password=md5($_REQUEST['old_password']);
//$passwrd_type=$_REQUEST['passwrd_type'];
	   $s="select * from admin where password='$old_password'";
	 $res=mysql_query($s);
$c=mysql_num_rows($res);



if($c==0)
{
	echo "<script>alert('Old Password Incorrect')</script>";
}

?>