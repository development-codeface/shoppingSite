<?php
include_once("class/dbc_class.php");
$dbc=new Dbc;
if(isset($_POST['create']))
{
	 $username=trim($_POST['user_name']);
	 $old_password=$_POST['old_password'];
	 $new_password=$_POST['new_password'];
	 $confirm_password=$_POST['confirm_password'];

	 //old_password
	if (empty($old_password))
	{
	   $errorString1 .= "\n<br>The Old Password field cannot be blank.";
	}
	else
	{
	$oldpassword=md5($old_password);
	}
	 //new_password
	if (empty($new_password))
	{
	   $errorString2 .= "\n<br>The New Password field cannot be blank.";
	}
	else
	{
	$newpassword=md5($new_password);
	}
	//confirm_password
	if (empty($confirm_password))
	{
	   $errorString3 .= "\n<br>The Confirm Password field cannot be blank.";
	}
	else
	{
	$confirmpassword=md5($confirm_password);
	}
	
	 
	 if(($oldpassword<>"") && ($newpassword<>"") && ($confirmpassword<>""))
	 {

	  $s="select * from admin where username='$username' and password='$oldpassword'";
	  $res=$dbc->query($s);
	  $count=$dbc->getNumRows($res);
	  if($count>0)
	  {
		$sql="update admin set password='".$newpassword."' where username='".$username."'";
		$result=$dbc->query($sql);

		echo "<script>alert('Password Updated Successfully')</script>";
		echo "<script>window.location='administrator.php?option=password'</script>";
	  }
	 }
	 else
	 {
		 echo "<script>alert('ERROR : Please try again!')</script>";
		 echo "<script>window.location='administrator.php?option=password'</script>";
	 }


}
?>