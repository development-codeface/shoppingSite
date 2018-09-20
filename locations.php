<?php include_once('includes/header_links.php'); ?>	
	
	
<title>Locations</title>

	
	<div class="container locations">
	
	<?php include_once('includes/header_content.php'); ?>	
	<?php include_once('res_menu.php'); ?>	
	<section class="content_section_main privacy_policy_block">
			<div class="row">
			<div class="large-12 columns">
	
		
			<h2 class="page_title">Locations</h2> 
			<p class="page_content">We currently operate in:</p>
			<div class="loc_cus">
 <div class="large-3 medium-3 small-12 columns loc_cus_blk">
     <ul class="loc_cus_li">
<?php

$select01 = "select * from pincode order by pincode limit 0, 30";
$query01 = $dbc -> query($select01);
while($array01 = $dbc -> fetch($query01))
{
?>
          <li ><?php echo $array01['pincode']; ?></li>
<?php } ?>
</ul>
     </div>
    
     
     
 <div class="large-3 medium-3 small-12 columns loc_cus_blk">
     <ul class="loc_cus_li">
<?php

$select01 = "select * from pincode order by pincode limit 30, 30";
$query01 = $dbc -> query($select01);
while($array01 = $dbc -> fetch($query01))
{
?>
          <li ><?php echo $array01['pincode']; ?></li>
<?php } ?>
</ul>
     </div>

 <div class="large-3 medium-3 small-12 columns loc_cus_blk">
     <ul class="loc_cus_li">
<?php

$select01 = "select * from pincode order by pincode limit 60, 30";
$query01 = $dbc -> query($select01);
while($array01 = $dbc -> fetch($query01))
{
?>
          <li ><?php echo $array01['pincode']; ?></li>
<?php } ?>
</ul>
     </div>
 <div style="clear:both;"></div> 
<p>We currently have two delivery slots ( 12:00 PM - 03:00 PM &amp; 06:00 PM - 09:00 PM )</p>
</div>
	
		</div>
		</section>

	<?php include_once('includes/header_content.php'); ?>	
			
	</div>
	<?php include_once('includes/footer_module.php'); ?>	
	<?php include_once('includes/footer_content.php'); ?>	



<script src="js/jquery-2.1.0.min.js"></script>
