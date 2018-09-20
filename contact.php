<?php include_once('includes/header_links.php'); ?>	
	
	
<title>Contact Us</title>

	
	<div class="container contt_page">
	
	<?php include_once('includes/header_content.php'); ?>	
	<?php include_once('res_menu.php'); ?>	
	<section class="content_section_main">
			<div class="row">
			<div class="large-12 columns">
			<h2 class="page_title">Contact Us</h2> 
								<?php
							if(isset($_REQUEST['msg']))
							{
								
							$status = $_REQUEST['msg'];
							if($status == 'suc')
							{
								echo "<div class='alert alert-success'><p class='succes_msg'>Your message sent successfully.</p></div>";
							}
							
							}
							?>
			<p class="page_content">
			Contact us for any queries. Call us at 9072853663, use the form below, or email your question directly using the email link at the bottom or right-hand side of this page. We will answer all your queries. We respect your privacy. The information provided below will only be used to reply to your request.
			</p>
		
		<div class="large-6 columns contact_form">
			
			<form id="contact_form" method="post" action="phpfiles/user/contact.php">
<div class="form_cus">
 
<input  placeholder="Name *" type="text" name="name" maxlength="50" size="30">
</div>


<div class="form_cus">
 

  <input placeholder="Email Address *" type="text" name="mail" maxlength="80" size="30">
</div>


<div class="form_cus">


  <input  placeholder="Phone No" type="text" name="telephone" maxlength="30" size="30">
</div>

<div class="form_cus">


  <textarea  placeholder="Comments *" name="comments" maxlength="1000" cols="25" rows="6"></textarea>
</div>

 <div class="form_cus submit_btn">
  <input type="submit" value="Submit" name="send_msg">  
</div>

</form>

		</div>
				
		<div class="large-6 columns contact_adres">
			
			<h3 class="logo_text">Margin Free Market Pvt Ltd.</h3>
			<h4 class="address_title">Address</h4>
			<h5 class="address_text">Chithra nagar junction, near sk hospital,  pangodu trivandrum </h5>
			<h5 class="address_phone_ico"><i class="fa fa-phone"></i>0471-2353663, +91 9072853663
			</h5>
			<h5 class="address_mail_ico"><i class="fa fa-envelope"></i> <a href="mailto:info@marginfreemarket.com">info@marginfreemarket.com</a></h5>
			
			<h4 class="address_title">Follow Us</h4>
			<ul class="social_icons">
			<li><a href="<?php echo loadsettings(facebook); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
			<li><a href="<?php echo loadsettings(twitter); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
			<li><a href="<?php echo loadsettings(google); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
			</ul>
		</div>
		
				<div class="large-12 columns map_block">
		<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:400px;width:100%;'><div id='gmap_canvas' style='height:400px;width:100%;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a class="map_uns"href='https://www.add-map.net/'>how to embed a google map into a website</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=1203d12f8e0845a2a6536352536a216d3d8efdf8'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:17,center:new google.maps.LatLng(8.5220732,76.92685410000001),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(8.5220732,76.92685410000001)});infowindow = new google.maps.InfoWindow({content:'<strong>Margin Free Market</strong><br>Chithra nagar junction, near sk hospital,  pangodu trivandrum <br>695011 Thiruvananthapuram<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
		</div>
		</div>
			

		</section>

	<?php include_once('includes/header_content.php'); ?>	
			
	</div>
	<?php include_once('includes/footer_module.php'); ?>	
	<?php include_once('includes/footer_content.php'); ?>	

<script src="js/jquery-2.1.0.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/validation.js"></script>