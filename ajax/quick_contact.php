<?php
include_once ("../class/dbc_class.php");
$dbc = new Dbc;

$name = $_POST['name'];
$mail = $_POST['email'];
$phone = $_POST['phone'];
$comment = $_POST['comment'];

if (filter_var($mail, FILTER_VALIDATE_EMAIL) === false) {
  echo 'Please enter a valid e-mail id';
}
else if(is_numeric($phone) === false)
{
	echo 'Please enter a valid phone no.';
}
else{
$insert01 = "insert into contact values('','$name','$phone','$mail','$comment')";
$query01 = $dbc -> query($insert01);
echo 'Thank you!';
}
?>