	<link rel="stylesheet" href="../../css/foundation.min.css">
	<link rel="stylesheet" href="../../css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../../css/custom.css">
<!-- Owl Carousel Assets -->
<link href="../../css/crantia/crantia.carousel.css" rel="stylesheet">
<link href="../../css/crantia/crantia.theme.css" rel="stylesheet">
<!-- Vertical Menu -->
<link rel="stylesheet" href="../../css/styles.css">
<?php

include("../../class/dbc_class.php");
$dbc = new Dbc;

if(isset($_GET['em']))
{
	$email = $_GET['em'];
	
	$update01 = "UPDATE user_registration SET STATUS = '1' WHERE EMAIL = '$email'";
	$query01 = $dbc -> query($update01);
	?>
	
	
	   <section class="logo_block_section">
  		  	<div class="row">
		      <div class="large-6  small-6 medium-6  columns logo_sec">
		        	<a href="index.php">
		        		<img src="../../images/logo.png" title="Margin Free Market" alt="Margin Free Market">
		        	</a>
		      </div>
			      <div class="large-6  small-6  medium-6  columns home_delivery_img">
				  
			
				  
		        	<a href="#">
		        		<img src="../../images/home_delivery_img.png" title="Margin Free Market" alt="Margin Free Market">
						<div class="order-text">ON ORDERS RS.1200.00 OR MORE</div>
		        	</a>
		      </div>
  		  </div>
  		  
  		</section>
  		  <section style="min-height:508px;background:#fff;">
		  <div class="large-12 small-12">
			<div class="large-7 small-10 margin_auto">
				<div class="row top_activate">
					<div class="large-2 small-6 columns">
					<img src="../../images/accunt.jpg"/>
					</div>
					<div class="large-10 small-12 columns top_text">
					Your Account Has Been Activated Go To <a href="../../index.php" style="color: #cea125;text-decoration: underline;">Site</a>
					</div>
			   </div>
			</div>
			
		  </div>
		  </section>
	<section class="copyright_block">
				<div class="row">
					<div class="copy_right_cus">
						<div class="large-8 small-8 columns">
							<div class="copyright ">Copyright &copy; 2016 <a href="#">Margin Free Market</a>. All Rights Reserved.</div>
					
						</div> 
						<div class="large-4 small-4 columns">
							<ul class="social_icons">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</section>





<?php


}

?>
 <link rel="stylesheet" type="text/css" href="../../css/bs_leftnavi.css">
<script src="../../js/bs_leftnavi.js"></script> 
		