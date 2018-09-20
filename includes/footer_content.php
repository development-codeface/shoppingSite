	<section class="footer_menu_block">
		    	<div class="row">
		    		<div class="footer_menu">
		    			<div class="large-2 columns">
		    				<h2 class="footer_title">My Account</h2>
		    				<ul class="menu_list">
		    				<?php if(isset($_SESSION['onlineuser'])) { ?>
		    					<li><a title="Sign Out" href="?log=out">Sign Out</a> </li>
		    					<?php } else { ?>
		    					<li><a title="Sign In" href="login.php">Sign In</a> </li>
		    					<?php } ?>
							 	<li><a title="View cart" href="cart_page.php">View cart</a></li>
							 	<li><a title="Check Out" href="<?php if (!empty($_SESSION["cart_item"])) { echo 'checkout.php'; } else { echo 'cart_page.php'; } ?>">Check Out</a></li>
							</ul>
		    				
		    			</div>
		    					<div class="large-2 columns">
		    				<h2 class="footer_title">Information</h2>
		    				<ul class="menu_list">
									
							 	<li><a title="New Products" href="index.php">New Products</a></li>
							 		<li><a title="Areas" href="locations.php">Locations</a></li>
							 		<li><a title="Contact Us" href="contact.php">Contact Us</a></li>
									
 
		    				</ul>
		    				
		    			</div>
		    					<div class="large-2 columns">
		    				<h2 class="footer_title">Corporate</h2>
		    				<ul class="menu_list">
		    					<li><a title="About Us" href="about.php">About Us</a> </li>
							 		<li><a title="privacy policy" href="privacy_policy.php">Privacy Policy</a></li>
							 		<li><a title="Terms and Conditions" href="privacy_policy.php">Terms &amp; Conditions</a></li>
							 	
							
									
 
		    				</ul>
		    				
		    			</div>
		    					<div class="large-3 columns">
		    				<h2 class="footer_title">Most Popular Categories</h2>
		    				<ul class="menu_list">
		    					<li><a title="About Us" href="productlist.php?main_cat=23">Grocery</a> </li>
							 		<li><a title="Contact Us" href="productlist.php?main_cat=27">Personal Care</a></li>
							 		<li><a title="Areas" href="productlist.php?main_cat=28">Cleaning Agents</a></li>
							 
									
 
		    				</ul>
		    				
		    			</div>
		    			  					<div class="large-3 columns">
		    				<h2 class="footer_title">Contact Us</h2>
		    			
		    					<p class="address_line"><i class="fa fa-map-marker"></i> Chithra nagar junction, near sk hospital,<br/>&nbsp;&nbsp;&nbsp;&nbsp;pangodu trivandrum</p>
		    					<p class="phone_icon"><i class="fa fa-mobile-phone"></i> 0471-2353663 <br/>&nbsp;&nbsp;&nbsp;&nbsp;+91 9072853663 </p>
		    					<p class="mail_id"><i class="fa fa-envelope"></i> <a href="#"> info@marginfreemarket.com</a> </p>
		    				
		    				
		    			</div>
		    		</div>
		    	</div>
			</section>
	<section class="footer_block">
				<div class="row">
					<div class="footer_block_cus">
						<div class="large-3 columns">
								<div class="high_quality_block">
									<img src="images/high_quality_img.png" title="Margin Free Market" alt="Margin Free Market">
									<h6 class="footer_title">Search Products</h6>
									<p class="footer_content">Browse marginfreemarketonline.com for products or use the search feature</p>
								</div>
							
						</div>
							<div class="large-3 columns">
								<div class="awesome_support_block">
									<img src="images/reason6.png" title="Margin Free Market" alt="Margin Free Market">
									<h6 class="footer_title">Shopping</h6>
									<p class="footer_content">Add item to your Shopping Basket</p>
								</div>
							
						</div>
							<div class="large-3 columns">
								<div class="fast_delivery_block">
										<img src="images/really_fast_delivery.png" title="Margin Free Market" alt="Margin Free Market">
										<h6 class="footer_title">Really Fast Deliveries</h6>
										<p class="footer_content">Your products will be home-delivered as per your order.</p>
								</div>
							
						</div>
							<div class="large-3 columns">
								<div class="secure_check_block">
									<img src="images/secure_check_out.png" title="Margin Free Market" alt="Margin Free Market">
									<h6 class="footer_title">Secure Checkout</h6>
									<p class="footer_content">Select suitable payment option (Cash, Cards, Sodexo)</p>
								</div>
							
						</div>
					</div>
					
				</div>
				
			</section>
	<section class="copyright_block">
				<div class="row">
					<div class="copy_right_cus">
						<div class="large-8 columns">
							<div class="copyright ">Copyright &copy; 2016 <a href="#">Margin Free Market</a>. All Rights Reserved. Powered by <a href="http://crantia.com/" style="text-transform: capitalize;font-size: 13px;" target="_blank">Crantia Technologies</a>.</div>
					
						</div> 
						<div class="large-4 columns">
							<ul class="social_icons">
								<li><a href="<?php echo loadsettings(facebook); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="<?php echo loadsettings(twitter); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li><a href="<?php echo loadsettings(google); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</section>
		