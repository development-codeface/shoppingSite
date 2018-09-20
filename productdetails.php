<?php include_once('includes/header_links.php'); ?>	
	
	
<title>Product Details</title>
	<?php include_once('res_menu.php'); ?>	
	  <link rel="stylesheet" href="css/jquery-ui.css">	 
	
	<div class="container pdt_dtails_page">
	
	<?php include_once('includes/header_content.php');
	
	$id = $_REQUEST['id'];
	$select01 = "select a.*, b.image from product a join product_image b on a.id = b.product_id where a.id = '$id'";
	$query01 = $dbc -> query($select01);
	$array01 = $dbc -> fetch($query01);
	
	$select02 = "select * from pincode order by pincode";
	$query02 = $dbc -> query($select02);
	?>	
	
			   <section class="banner_category_block left_right_block_main">
		   		<div class="row">
		   		
					<div class="large-12 columns">
							<div class="pdt_details_page">
								<div class="pdt_details_page2">
								<div class="large-4 small-12 medium-6  columns pdt_img_block">
									<img src="<?php echo $array01['image']; ?>">
								</div>
								<div class="large-8 small-12 medium-6 columns pdt_contnt_block">
									<h2 class="pdt_details_page_pdt_title"><?php echo $array01['name']; ?></h2>
									<ul class="pdt_details_li">
									<li><b>Brand </b>: <span><?php echo $array01['brand']; ?></span></li>
									
									<?php if(!empty($array01['offer_price'])) { ?>
										
									<li><b>MRP </b>: <span class="actual_price"><i class="fa fa-rupee"></i> <?php echo $array01['price']; ?></span></li>
									<li><b>You Pay </b>: <span class="special_price"><i class="fa fa-rupee"></i> <?php echo $array01['offer_price']; ?></span></li>
									
									<?php } else {?>
									
									<li><b>MRP </b>: <span class="special_price"><i class="fa fa-rupee"></i> <?php echo $array01['price']; ?></span></li>
									
									<?php } 
									
									if($array01['quantity'] == 0) {?>
									
									<li><b>Availability </b>: <span class="outstock_txt"> Out of stock </span></li>
									
									<?php } else { ?>
										
									<li><b>Availability </b>: <span class="instock_txt">Instock </span></li>
									
									<?php } ?>
								
								
									</ul>
									<div class="quan">	<b>Quantity</b> : <input id="spinner" value="1" min="1"></div>
									
									<?php if($array01['quantity'] > 0) { ?>
								<p class="add_to_cart_list_page"><i class="fa fa-shopping-cart"></i> 
									<a class="add_to_cart_listpage" id="add<?php echo $array01['id']; ?>" onclick="detail_addcart(<?php echo $array01['id']; ?>)"> Add To Cart</a></p>
								<?php } ?>
								
								<div id="pincheck"> <strong class="fk-font-15 lmargin3"> Faster delivery options in your location</strong> <p class="fk-font-15 lmargin3" id="pin_msg"></p> <a href="#" data-reveal-id="myModal"> <input type="submit" value="Check Delivery Locations" class="btn btn-large btn-blue" id="chkpin"></a> </div>

							</div>
						<input type="hidden" id="cart_count" value="<?php echo $cart; ?>" >
							
							
								</div>
								
	

<div id="myModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <h2 id="modalTitle" class="loc_title">Locations</h2>
  
<?php while($array02 = $dbc -> fetch($query02)) { ?>
<div class="large-3 columns loc_m"><?php echo $array02['pincode']; ?></div>
<?php } ?>
  <a class="close-reveal-modal " aria-label="Close">&#215;</a>
</div>
	
	
							</div>
	<div id="tabs-container" class="large-12 columns pdt_details_view_page">
    <ul class="tabs-menu">
        <li class="current"><a href="#tab-1">Description</a></li>
        <!-- <li><a href="#tab-2">Tab 2</a></li> -->
    
    </ul>
    <div class="tab">
        <div id="tab-1" class="tab-content">
            <p><?php echo $array01['description']; ?></p>
        </div>
        <div id="tab-2" class="tab-content">
            <p>Donec semper dictum sem, quis pretium sem malesuada non. Proin venenatis orci vel nisl porta sollicitudin. Pellentesque sit amet massa et orci malesuada facilisis vel vel lectus. Etiam tristique volutpat auctor. Morbi nec massa eget sem ultricies fermentum id ut ligula. Praesent aliquet adipiscing dictum. Suspendisse dignissim dui tortor. Integer faucibus interdum justo, mattis commodo elit tempor id. Quisque ut orci orci, sit amet mattis nulla. Suspendisse quam diam, feugiat at ullamcorper eget, sagittis sed eros. Proin tortor tellus, pulvinar at imperdiet in, egestas sed nisl. Aenean tempor neque ut felis dignissim ac congue felis viverra. </p>
        
        </div>
   

    </div>
</div>


<?php
/*$new_keyword= $array01['name'];
	$keys = explode(" ",$new_keyword);
	
	foreach($keys as $k){
		$query = "a.name like '%$k%' and a.keywords like '%$k%' ";
	}
$sql_relate = "select a.name, b.image,a.price,a.offer_price, a.id from product a join product_image b on a.id = b.product_id 
	where ".$query." and a.brand='$array01[brand]' and a.id!='$array01[id]' " ;
	$res_relate = $dbc->query($sql_relate);
	$res_count = $dbc->getNumRows($res_relate);*/
	

	    $new_keyword= $array01['name'];
	  $brand = $array01['brand'];
	 $keys = explode(" ",$new_keyword);
	$query = '';
	$i = 0;
	
	 foreach($keys as $k){
		//echo $k;
		if($i == 0){
			$query .= "a.name like '%$k%' or a.keywords like '%$k%' ";
		}
		else{
			$query .= "or a.name like '%$k%' or a.keywords like '%$k%' ";
		}
		$i++;
	}
	
 $sql_relate = "select a.name, b.image,a.price,a.offer_price,a.brand, a.id from product a join product_image b on a.id = b.product_id where a.brand = '".$brand."' and a.subcategory_id = '$array01[subcategory_id]' and a.id != '$array01[id]' and (".$query.") " ; 
	
	$res_relate = $dbc->query($sql_relate);
	$res_count = $dbc->getNumRows($res_relate);
	
	if($res_count<>''){
	?>


<div class="large-12 clr-b columns">
	<h4>Related Products</h4>
	<?php 
	
	while($row_relate = $dbc->fetch($res_relate))
	{
	?>
	<a href="productdetails.php?id=<?php echo $row_relate['id'];?>" >
	<div class="large-2 small-5 medium-3 prod-outer-size">	
		<img src="<?php echo $row_relate['image']; ?>"/>
		<p class="pdt_name"><?php echo $row_relate['name'];?></p>
			<?php if(!empty($row_relate['offer_price'])) {?>
					                	
										<h6 class="pdt_price">
										<i class="fa fa-rupee"></i>
										<?php echo $row_relate['offer_price']; ?>
										
										(<strike>
										 <?php echo $row_relate['price']; ?>
										</strike>)
										</h6>
										<?php } else { ?>
										<h6 class="pdt_price">
										<i class="fa fa-rupee"></i> 
										<?php echo $row_relate['price']; ?>
										
										</h6>
										<?php } ?>
		
		
		
	</div>
	</a>
	<?php
	}
	
	?>
	
</div>

	<?php } ?>
					



					
					</div>
		   			
		   			
		   			
		   			
		   			
		   			
		   			
		   			
		   			
		   		</div>
		   </section>
		   
		   


		
	
	
		<?php include_once('includes/footer_module.php'); ?>
		 
		
		
	<?php include_once('includes/footer_content.php'); ?>	

 
  <script src="js/custom.js"></script>
  <!-- <script src="js/jquery.min.js"></script> -->
  <script src="js/foundation.min.js"></script>

	<script>
	$( "#spinner" ).spinner();
	 $(document).foundation().foundation('joyride', 'start');
	$(document).ready(function() {
    $(".tabs-menu a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
    });
});
	
	

    </script>
	

	
 
