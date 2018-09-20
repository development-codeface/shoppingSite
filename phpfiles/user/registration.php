<?php
include("../../class/dbc_class.php");
$dbc = new Dbc;
if(isset($_POST['create']))
{
	$user = $dbc->clean_up($_POST['name']);
	$email = $_POST['email'];
	$pass = md5($_POST['password']);
	$phone = $_POST['telephone'];
	date_default_timezone_set('Asia/Kolkata');
	$date = date('Y-m-d h:i:s');
	
	$select01 = "SELECT * FROM user_registration WHERE EMAIL = '$email'";
	$query01 = $dbc -> query($select01);
	if($dbc -> getNumRows($query01) > 0)
	{
		echo "<script>window.location = '../../registration.php?msg=err'</script>";
	}
	else 
	{
	$insert01 = "INSERT INTO user_registration VALUES('','$user','','','','','$phone','$email','$pass','$date','0')";
	$query02 = $dbc -> query($insert01);
	
	$to = $email;
	$subject = "Verify your account";
	$name = $user;
	/*$message = file_get_contents('../mail/registration_mail.php');
	
	 $message = 'Hi '.$name.',<br/><br/>
	
	Please verify your email and get started using your account.<br/><br/>
<a href="http://marginfreemarketonline.com/test/phpfiles/user/activation.php?em='.$email.'">Click Here</a><br/><br/>
	
Thanks';*/
 
 
 
 $server = $_SERVER['SERVER_NAME']; 
	$url = "http://www.marginfreemarketonline.com/phpfiles/mail/registration_mail.php?name=$name&mail=$email";  
	$message = file_get_contents($url);  
	
	
	
	
	/*$handle = fopen($url, "r");
$fcontents = fread($handle, filesize($url));
fclose($handle);
echo $fcontents; exit; */


	
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: Margin Free Market <info@marginfreemarketonline.com>' . "\r\n";
	mail($to, $subject, $message, $headers);
	
	echo "<script>window.location = '../../registration.php?msg=suc'</script>";
	}	
}
?>