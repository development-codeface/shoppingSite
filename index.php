<?php include_once('includes/header_links.php');
include_once("includes/search_array.php"); ?>	
  <meta charset="utf-8" />	
<title>Margin Free market</title>



<div id="preloader">
<div id="status"></div>
</div>

	
	<div class="container home">
		
	<?php include_once('includes/header_content.php'); ?>	
	<?php include_once('res_menu.php'); ?>	
	


		  <section class="banner_category_block left_right_block_main">
		   		<div class="row">
		   			<div class="large-3 columns cat_list_sec_block cat_list_sec_block_p">
		   				<div class="cat_list_sec">
 
   
							 <div id='cssmenu'>
									<ul>
<?php

$select01 = "select * from main_category order by category";
$query01 = $dbc -> query($select01);
while($array01 = $dbc -> fetch($query01))
{
?>
									   <li class=' has-sub'><a href='productlist.php?main_cat=<?php echo $array01['id'] ?>'><span><?php echo $array01['category']; ?></span></a>
											<ul>
											<?php
											$select02 = "select * from category where main_id = '$array01[id]' order by name";
											$query02 = $dbc -> query($select02);
											while($array02 = $dbc -> fetch($query02))
											{
											?>
											 <li class=''><a href='productlist.php?cat=<?php echo $array02['id'] ?>'><span><?php echo $array02['name']; ?></span></a></li>
											 <?php } ?>
											</ul>									   
										</li>
<?php } ?>	
									</ul>
							</div>
							
							


 
		   					
		   					
		   				</div>
						<?php
$select03 = "select a.id, a.name, a.quantity, a.price, a.offer_price, b.thumb_image from product a join product_image b join  order_products c on a.id = b.product_id and a.id = c.product_id order by c.id desc limit 0,4";
$query03 = $dbc -> query($select03);
$count1 = $dbc -> getNumRows($query03);
if($count1 > 0) {
?>
		   				<div class="hot_deals">
		   				
								<h3><span>Best Sellers</span></h3>
		   					     <div id="owl-example1" class="owl-carousel">

				
				                <div class="item ">
								<?php
								while($array03 = $dbc -> fetch($query03)) {
								?>
				                	<div class="pdt_list_hot_deals">
					                	<div class="large-4 columns">
					                		 <img src="<?php echo $array03['thumb_image']; ?>"  alt="Margin Free Market" title="Margin Free Market">
					                	</div>
					                 	<div class="large-8 columns b_b">
					            
					                		<h6 class="pdt_name"><?php echo $array03['name']; ?></h6>
					                		<h6 class="pdt_price"><i class="fa fa-rupee"></i> <?php if(!empty($array03['offer_price'])) { echo $array03['offer_price']; } else { echo $array03['price']; } ?></h6>
					                	
					                	</div>
				                     </div>
									 <?php } ?>
</div><?php  
$select033 = "select a.id, a.name, a.quantity, a.price, a.offer_price, b.thumb_image from product a join product_image b join  order_products c on a.id = b.product_id and a.id = c.product_id order by c.id desc limit 4,4";
$query033 = $dbc -> query($select033);
$count11 = $dbc -> getNumRows($query033);
if($count11 > 0) {
?>
				             
				               <div class="item ">
							   								<?php
								while($array033 = $dbc -> fetch($query033)) {
								?>
				                     	<div class="pdt_list_hot_deals">
					                	<div class="large-4 columns">
					                		 <img src="<?php echo $array033['thumb_image']; ?>"  alt="Margin Free Market" title="Margin Free Market">
					                	</div>
					                 	<div class="large-8 columns b_b">
					     
					                		<h6 class="pdt_name"><?php echo $array033['name']; ?></h6>
					                		<h6 class="pdt_price"><i class="fa fa-rupee"></i> <?php if(!empty($array033['offer_price'])) { echo $array033['offer_price']; } else { echo $array033['price']; } ?></h6>
					                	
					                	</div>
				                     </div><?php } ?>
</div><?php } ?>
				             

				             
				         
				             </div>
		   					
		   				</div>
						
						<?php } ?>
		   				
		   				<!--Quick Contact-->
		   				<div class="quick_contact">
		   					<h3><span>Quick Contact</span></h3>
		   					<div class="quick_block">
		   					<p id="quick_notify"></p>
		   						<input type="text" placeholder="Name *" id="quick_name">
		   						<input type="text" placeholder="Email ID *" id="quick_email">
		   						<input type="text" placeholder="Phone No. *" id="quick_phone">
		   						<textarea placeholder="Comments *" id="quick_text"></textarea>
		   						<input class="quick_contact_submit_btn" id="quick_btn" type="submit" value="SEND">
		   					</div>
		   				</div>
		   				
		   				<div class="testimonials">
		   					<h3><span>Testimonials</span></h3>
		   					<div class="testy_block">
		   						
		   						
		   						
		   						

		   						 <div id="owl-example5" class="owl-carousel">
				
				                <div class="item ">
				                	<div class="testy_block ">
				                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</p>
				                  <img src="images/testy_img1.png"> <span class="testy_name">Peter Thomas</span>
				                    
				                     </div>
				                </div>
				                <div class="item ">
				                 	<div class="testy_block ">
				                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</p>
				                  <img src="images/testy_img1.png"> <span class="testy_name">Peter Thomas</span>
				                    
				                     </div>
				                    
				                </div>
				                 <div class="item ">
				                  	<div class="testy_block ">
				                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</p>
				                  <img src="images/testy_img1.png"> <span class="testy_name">Peter Thomas</span>
				                    
				                     </div>
				                    
				                </div>
				         
				             </div>
		   					</div>
		   				</div>
		   				
		   				<!--<div class="offers_block">
		   					<img src="images/offer_ad_img.png">
		   				</div>-->
		   				
		   				
		   				
		   			
		   			
		   			</div>
		   			<div class="large-9 columns cat_list_sec_block_p1r">
		   				<div class="banner_section_main large-12 columns">
		   				
				              <div id="owl-example" class="owl-carousel">
							  <?php
							  $select07 = "select image_url from home_banner limit 0,3";
							  $query07 = $dbc -> query($select07);
							  
							  while($array07 = $dbc -> fetch($query07)) {
							  ?>
				
				                <div class="item ">
				                  <img src="<?php echo $array07['image_url'] ?>"  alt="Margin Free Market" title="Margin Free Market">
				                    
				                </div>
								<?php } 
								
							  $select08 = "select image_url from home_banner limit 3,2";
							  $query08 = $dbc -> query($select08);
							  while($array08 = $dbc -> fetch($query08)) {
							  $img[] = $array08['image_url'];
							  }
								?>
				         
				             </div>

						</div>
						<div class="menu-icon-mob large-12 columns">
						<a href="productlist.php?main_cat=25">
							<div class="small-6 columns menu-img-con">
								<div class="small-7 marg_auto">
								<img src="images/fish-meat.png"/>
								</div>
								<p>Fish & Meat</p>
							</div>
							</a>
						<a href="productlist.php?main_cat=23">
							<div class="small-6 columns menu-img-con">
								<div class="small-7 marg_auto">
								<img src="images/grocery.png"/>
								</div>
								<p>Grocery</p>
							</div>
							</a>
						<a href="productlist.php?main_cat=27">
							<div class="small-6 columns menu-img-con">
								<div class="small-7 marg_auto">
								<img src="images/beauty_health.png"/>
								</div>
								<p>Health & Beauty</p>
							</div>
							</a>
						<a href="productlist.php?main_cat=28">
							<div class="small-6 columns menu-img-con">
								<div class="small-7 marg_auto">
								<img src="images/house-hold.png"/>
								</div>
								<p>House Hold</p>
							</div>
							</a>
						<a href="productlist.php?main_cat=31">
							<div class="small-6 columns menu-img-con">
								<div class="small-7 marg_auto">
								<img src="images/import.png"/>
								</div>
								<p>Imported Produts</p>
							</div>
							</a>
						<a href="productlist.php?main_cat=29">
							<div class="small-6 columns menu-img-con">
								<div class="small-7 marg_auto">
								<img src="images/mom-baby.png"/>
								</div>
								<p>Momz & Baby</p>
							</div>
							</a>
						<a href="productlist.php?main_cat=26">
							<div class="small-6 columns menu-img-con">
								<div class="small-7 marg_auto">
								<img src="images/organic.png"/>
								</div>
								<p>Organic Produts</p>
							</div>
							</a>
						<a href="productlist.php?main_cat=32">
							<div class="small-6 columns menu-img-con">
								<div class="small-7 marg_auto">
								<img src="images/pet.png"/>
								</div>
								<p>Pet Zone</p>
							</div>
							</a>
						<a href="productlist.php?main_cat=30">
							<div class="small-6 columns menu-img-con">
								<div class="small-7 marg_auto">
								<img src="images/stationery.png"/>
								</div>
								<p>Stationery</p>
							</div>
							</a>
						<a href="productlist.php?main_cat=24">
							<div class="small-6 columns menu-img-con">
								<div class="small-7 marg_auto">
								<img src="images/veg-fruit.png"/>
								</div>
								<p>Vegetables&Fruits</p>
							</div>
							</a>
							
						</div>
						<div class="hot_deals_main large-12 columns">
		   				
						<h3 ><span>Hot Deals</span></h3>
				              <div id="owl-example2" class="owl-carousel">
<?php

$select04 = "select a.quantity,a.price,a.offer_price,b.* from product a join slider_image b on a.id = b.product_id order by id desc";
$query04 = $dbc -> query($select04);
while($array04 = $dbc -> fetch($query04))
{
?>
				
				                <div class="item ">
				                 
				                 	<div class="pdt_hot_deals_list">
									<a href="productdetails.php?id=<?php echo $array04['product_id']; ?>">
				                 		<img src="<?php echo $array04['image']; ?>">
				
				                 		<h6 class="pdt_name"><?php echo $array04['name']; ?></h6>
					                	
					                			<?php if(!empty($array04['offer_price'])) {?>
					                <h6 class="pdt_price">
										<i class="fa fa-rupee"></i>
										<?php echo $array04['offer_price']; ?>
										(<strike>
										 <?php echo $array04['price']; ?>
										</strike>)
										</h6>
										<?php }
										else{?>
										<h6 class="pdt_price">
										<i class="fa fa-rupee"></i> 
										<?php echo $array04['price']; ?>
										
										</h6>										<?php }?>
					                	
										</a>
					                	<p class="add_to_cart">
					                		
					                <?php if($array04['quantity'] == 0) {?>
					                	<a onclick="return false"> No stock</a>
					                <?php } else {
					                if (!empty($_SESSION["cart_item"]))
									{ $key = search_in_array($_SESSION["cart_item"], 'id', $array04['product_id']); }
									if(isset($key))
									{?>
										<a onclick="return false"> Already added</a>
									<?php } else {?>
					                		<a id="add<?php echo $array04['product_id']; ?>" onclick="addcart(<?php echo $array04['product_id']; ?>)"><i class="fa fa-shopping-cart"></i> Add To cart</a>
					                	</p>
					                <?php } } ?>
				                 	</div>
				                    
				                </div>
				                
<?php } ?>
				         
				         
				             </div>

						</div>
						
						<div class="new_arrivals_ad_block large-12 columns">
							<div class="new_arrivals_ad_block_">
							<div class="large-12 columns red_block_cus">
							 <img src="<?php echo $img[0]; ?>"style="width: 870px;height: 115px;"/>
								<!--<div class="red_block">
									<div class="large-7 columns">
										<h2 class="new_arr_b">new arrials </h2>
										<p class="new_arrivals_content">
											Lorem Ipsum is simply dummy text of the printing
											</p>
										
									</div>
									<div class="large-5 columns">
										<img src="images/new_arr_img1.png">
									</div>
									
								</div>-->
								 
							</div>
								<!--<div class="large-6 columns orange_block_cus">
								<div class="oranger_block">
									<div class="large-7 columns ofrs_bl_new">
										<div class="ofrs_new_arr">
											50% <sub>OFF</sub>
											</div>
											<div class="ofrs_on_all_pdts">
											<p class="on_all_pdt">On All</p> 
											<p class="on_all_pdt2">PRODUCTS</p>
											</div>
										
									</div>
									<div class="large-5 columns">
										<img src="images/new_arr_img2.png">
									</div>
									
								</div>
								 
							</div>-->
							</div>
						</div>
			
						<div class="new_arrivals_block_pdt_list large-12 columns">
		   				
		   				<h3 ><span>New Arrivals</span></h3>
				              <div id="owl-example3" class="owl-carousel">
	<?php
$x=0;
			$select05 = "select a.id, a.name, a.quantity, a.price, b.thumb_image from product a join product_image b
				on a.id = b.product_id  where offer_price='' order by a.id desc";
				 $query05 = $dbc -> query($select05);
				while($array05 = $dbc -> fetch($query05))
				{
					  $select005 = "select id from slider_image where product_id='$array05[id]'";
					  $query005 = $dbc -> query($select005);
					  $count005 = $dbc->getNumRows($query005);
					  if($count005=='0' && $x<=8)
					  {
?>				
				                <div class="item ">
				                 
				                 	<div class="pdt_hot_deals_list">
				                 	<a href="productdetails.php?id=<?php echo $array05['id']; ?>">
				                 		<img src="<?php echo $array05['thumb_image']; ?>">
				           
				                 		<h6 class="pdt_name"><?php echo $array05['name']; ?></h6>
					                	<h6 class="pdt_price"><i class="fa fa-rupee"></i> <?php echo $array05['price']; ?></h6>
					                </a>
					                	<p class="add_to_cart">
					                
					                <?php if($array05['quantity'] == 0) {?>
					                	<a onclick="return false"> No stock</a>
					                <?php } else {
					                if (!empty($_SESSION["cart_item"]))
									{ $key = search_in_array($_SESSION["cart_item"], 'id', $array05['id']); }
									if(isset($key))
									{?>
										<a onclick="return false"> Already added</a>
									<?php } else {?>
					                		<a id="add<?php echo $array05['id']; ?>" onclick="addcart(<?php echo $array05['id']; ?>)"><i class="fa fa-shopping-cart"></i> Add To cart</a>
					                	</p>
					                <?php } } ?>
				                 	</div>
				                    
				                </div>
				<?php $x++; } 
					
					}?>
				         
				         
				             </div>

						</div>
							
						<div class="new_arrivals_ad_block large-12 columns">
							<div class="new_arrivals_ad_block_">
							<div class="large-12 columns red_block_cus">
							 <img src="<?php echo $img[1]; ?>"style="width: 870px;height: 115px;"/>
								<!--<div class="red_block">
									<div class="large-7 columns">
										<h2 class="new_arr_b">new arrials </h2>
										<p class="new_arrivals_content">
											Lorem Ipsum is simply dummy text of the printing
											</p>
										
									</div>
									<div class="large-5 columns">
										<img src="images/new_arr_img1.png">
									</div>
									
								</div>-->
							</div>
								<!--<div class="large-6 columns orange_block_cus">
								<div class="oranger_block">
									<div class="large-7 columns ofrs_bl_new">
										<div class="ofrs_new_arr">
											50% <sub>OFF</sub>
											</div>
											<div class="ofrs_on_all_pdts">
											<p class="on_all_pdt">On All</p> 
											<p class="on_all_pdt2">PRODUCTS</p>
											</div>
										
									</div>
									<div class="large-5 columns">
										<img src="images/new_arr_img2.png">
									</div>
									
								</div>
							</div>-->
							</div>
						</div>
							
						<div class="featured_block_pdt_list large-12 columns">
		   				<h3 ><span>Offer Products </span></h3>
				              <div id="owl-example4" class="owl-carousel">
<?php
$y=0;
$select06 = "select a.id, a.name, a.quantity, a.offer_price,a.price, b.thumb_image from product a join product_image b on a.id = b.product_id where a.offer_price !='' order by a.id desc limit 0,8";
$query06 = $dbc -> query($select06);
while($array06 = $dbc -> fetch($query06))
{


 $select005 = "select id from slider_image where product_id='$array06[id]'";
					  $query005 = $dbc -> query($select005);
					  $count005 = $dbc->getNumRows($query005);
					   if($count005=='0' && $y<=8)
					  { 
?>					
				                <div class="item ">
				                 
				                 	<div class="pdt_hot_deals_list">
				                 	<a href="productdetails.php?id=<?php echo $array06['id']; ?>">
				                 		<img src="<?php echo $array06['thumb_image']; ?>">
				                 		
				                 		<h6 class="pdt_name"><?php echo $array06['name']; ?></h6>
					                	<!--<h6 class="pdt_price"><i class="fa fa-rupee"></i> <?php echo $array06['offer_price']; ?></h6>--->
					                	
					                	
					                	<h6 class="pdt_price">
										<i class="fa fa-rupee"></i>
										<?php echo $array06['offer_price']; ?>
										(<strike>
										 <?php echo $array06['price']; ?>
										</strike>)
										</h6>
										
					                </a>
					                	<p class="add_to_cart"> 
					                <?php if($array06['quantity'] == 0) {?>
					                	<a onclick="return false"> No stock</a>
					                <?php } else {
					                if (!empty($_SESSION["cart_item"]))
									{ $key = search_in_array($_SESSION["cart_item"], 'id', $array06['id']); }
									if(isset($key))
									{?>
										<a onclick="return false"> Already added</a>
									<?php } else {?>
					                		<a id="add<?php echo $array06['id']; ?>" onclick="addcart(<?php echo $array06['id']; ?>)"><i class="fa fa-shopping-cart"></i> Add To cart</a>
					                	</p>
					                <?php } } ?>
				                 	</div>
				                    
				                </div>
<?php $y++;  } } ?>
				         
				             </div>

						</div>
							
						
		   			</div>
		   			
		   			
		   			
		   			
		   			
		   			
		   			
		   			
		   			
		   		</div>
		   </section>
		   <section class="subscribtion_block">
		   		<div class="row">
		   			<div class="large-7 columns">
					
					<form method="post" action="" id="subscribe_form" name="subscribe_form">
						
					
				   			<div class="subs_cus">
							<div class="form-group">
				   				<span class="large-10  small-10 medium-10 columns span_input_subsc" >
								
									<input class="subscription_field form-control" type="text" name="sub_email" id="sub_email" onmouseout="cnfrm_email()">
								</span>
								</div>
								<span class="subsc_btn large-2  small-2 medium-2"><button type="submit" name="submit" id="sub_submit">Subscribe</button></span>
								
							<!--<input type="submit" value="Subscribe" name="subscribe" id="subscribe" class="subsc_btn large-2  small-2 medium-2">-->
				   			</div>
							<label id="error3"></label>
							<label id="succ"></label>
							</form>
		   			</div>
		   			<div class="large-5 columns">
		   				<h4 class="sign_up_save">Sign Up and Save</h4>
		   				<p class="subsc_note">Receive email-only deals, special offers & product exclusives</p>
		   			</div>
		   		</div>
		   </section>
		<?php include_once('includes/footer_module.php'); ?>
			<?php include_once('includes/footer_content.php'); ?>	
	
			
			
	</div>



	
	
	<script src="js/jquery-2.1.0.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
	<script src="js/validation.js"></script>
	<script src="js/subscribe_email.js"></script>
    <script src="js/custom.js"></script>

    <script src="js/crantia/crantia.carousel.min.js"></script>
    <script src="js/crantia/crantia.custom.js"></script>



	

<script type="text/javascript">

jQuery(window).load(function() {
     // will first fade out the loading animation
    jQuery("#status").fadeOut();
// will fade out the whole DIV that covers the website.
    jQuery("#preloader").delay(1000).fadeOut("slow");
	});

</script>

 
