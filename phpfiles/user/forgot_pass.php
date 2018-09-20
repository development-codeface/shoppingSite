<?php
include("../../class/dbc_class.php");
$dbc = new Dbc;


if(isset($_REQUEST['continue']))
{
	$email = $_POST['email'];
	$pass =rand();
	$password=md5($pass);
	$select01 = "SELECT * FROM user_registration WHERE email='$email' and status='1'";
	$query01 = $dbc -> query($select01);
	$fetch=$dbc->fetch($query01);
	$user_id=$fetch['id'];
	if($dbc -> getNumRows($query01) == 0)
	{
		echo "<script>window.location = '../../forgot_pwd.php?msg=err'</script>";
	}
	else
	{
		$update ="update user_registration set password='$password' where id='$user_id'";
		$dbc->query($update);
		
		
	$subject = "Password Reset";
	
	 $server = 'http://'.$_SERVER['SERVER_NAME'].'';
	 $url = "$server/phpfiles/mail/forgotpass_mail.php?pass=$pass&mail=$email"; 
     $message = file_get_contents($url);
     
	/*$message = 'Hi,<br/><br/>

	You are receiving this e-mail because you requested a password reset for your account at Online Bookshop.<br/><br/>
	
	Please go to the following link and choose a new password.<br/>
	
	Your password : ' .$pass. '<br/><br/>
	
	Thanks';*/
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: Margin Free Market <info@marginfreemarketonline.com>' . "\r\n";
	mail($email, $subject, $message, $headers);
		echo "<script>window.location = '../../forgot_pwd.php?msg=suc'</script>";
	}
}
?>