<?php
$url = 'http://'.$_SERVER['SERVER_NAME'].''; 
//echo $user = $_SESSION['onlineuser'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<link rel="stylesheet" href="<?php echo $url; ?>/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo $url; ?>/css/email-style.css">
	<link rel="stylesheet" href="<?php echo $url; ?>/css/font-awesome.min.css">
</head>
<body>


<div class="container" style="border: 1px solid #ccc;">
	<div class="row">
		<div class="col-md-12" style="background: #ebd11c;">
			<div class="headbg  col-md-5 margin_auto" style="float:none !important;margin:0 auto !important;">
				<div class="email_header" style="margin-bottom: 25px;  display: inline-block;padding: 15px; text-align: center; text-transform: uppercase;margin: 0;">
				<img src="<?php echo $url?>/images/logo.png">
				</div>
			</div>
		
		</div>	
		<div class="content-bg col-md-12" style="margin-top:41px;padding-bottom: 40px;">
			<p class="content-line" style="font-size: 17px;color: #757575;">
			<?php
			 $bill_name =$_GET['name'];
			 $mail = $_GET['mail'];
			 if(isset($_GET['user']) == ''){
			 
			?>
			<span style=" font-weight: bold;font-size: 20px;color: #757575;">Congratulations </span>, We  are glad to inform that your order has been placed. Save this e-mail for future reference. 
			</p>
			<p class="log_info" style="font-size:16px;color: #757575;">Name :<span style="font-weight:bold;"><?php echo $bill_name; ?></span></p>
			
			<p class="log_info" style="font-size:16px;color: #757575;">Username :<span style="font-weight:bold;"><?php echo $mail; ?></span></p>
			<p  class="log_info1" style="font-size:16px;color: #2f2f2f;">Please click here to <a style="text-decoration:underline;" href="http://marginfreemarketonline.com/phpfiles/user/activation.php?em=<?php echo $mail ?>">Login</a> in to your account.</p>
		
			<p  class="log_info1" style="font-size:16px;color: #2f2f2f;"> Thank you for using our service. </p>
			
			<hr/>
			<?php
			
			 }else{
			?>
			
			<span style=" font-weight: bold;font-size: 20px;color: #757575;">Congratulations </span>, We  are glad to inform that your order has been placed. Save this e-mail for future reference. 
			</p>
			<p class="log_info" style="font-size:16px;color: #757575;">Name :<span style="font-weight:bold;"><?php echo $bill_name; ?></span></p>
			<p  class="log_info1" style="font-size:16px;color: #2f2f2f;"> Thank you for using our service. </p>
			<hr/>
			<?php
			 }
			?>
			
		</div>
		
		<section class="copyright_block" style=" background: #2e2b2b none repeat scroll 0 0;
    padding: 10px 0;clear: both;">
				<div class="row">
					<div class="copy_right_cus">
						<div class="col-md-12 columns">
							<div class="copyright"style="  color: #fff;    font-family: roboto;font-size: 14px;padding-top: 6px;text-align:center">Copyright &copy; 2016 <a href="#">Margin Free Market</a>. All Rights Reserved.</div>
					
						</div> 
						
					</div>
				</div>
			</section>
    </div>
</div>





<script type="text/javascript" src="<?php echo $url; ?>/js/bootstrap.js"></script>
</body>
</html>