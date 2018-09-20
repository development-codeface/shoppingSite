<?php include_once('includes/header_links.php');
include_once("includes/search_array.php"); ?>	
	
	
<title>Product List</title>
 <meta charset="UTF-8"> 
	<?php include_once('res_menu.php'); ?>	
	<div class="container product_list_pge">
	
	<?php include_once('includes/header_content.php'); 

// for pagination
if(!empty($_REQUEST['main_cat']))
{
	$main_id = $_REQUEST['main_cat'];
	$select06 = "select d.*, e.thumb_image from main_category a join category b join sub_category c join product d join product_image e on a.id = b.main_id and b.id = c.category_id and c.id = d.subcategory_id and d.id = e.product_id where a.id = '$main_id'";
	$query06 = $dbc -> query($select06);
	$total_count = $dbc -> getNumRows($query06);
	
	$path=$_SERVER['PHP_SELF'];
	$targetpath="$path?main_cat=$main_id";
}
else if(!empty($_REQUEST['cat']))
{
	$cat_id = $_REQUEST['cat'];
	$select06 = "select d.*, e.thumb_image from category b join sub_category c join product d join product_image e on b.id = c.category_id and c.id = d.subcategory_id and d.id = e.product_id where b.id = '$cat_id'";
	$query06 = $dbc -> query($select06);
	$total_count = $dbc -> getNumRows($query06);
	
	$path=$_SERVER['PHP_SELF'];
	$targetpath="$path?cat=$cat_id";
}
else if(!empty($_REQUEST['sub_cat']))
{
	$sub_cat_id = $_REQUEST['sub_cat'];
	$select06 = "select d.*, e.thumb_image from product d join product_image e on d.id = e.product_id where d.subcategory_id = '$sub_cat_id'";
	$query06 = $dbc -> query($select06);
	$total_count = $dbc -> getNumRows($query06);
	
	$path=$_SERVER['PHP_SELF'];
	$targetpath="$path?sub_cat=$sub_cat_id";
}
else if(!empty($_REQUEST['category']) && !empty($_REQUEST['search']))
{ 
	$main_category = $_REQUEST['category'];
	$keyword = mysql_real_escape_string($_REQUEST['search']);
	
	$keys = explode(" ",$keyword);
	
	if($main_category == 'all') {
	$select08 = "select d.*, e.thumb_image from product d join product_image e on d.id = e.product_id 
	where d.name like '%$keyword%' or d.brand like '%$keyword%' or d.keywords like '%$keyword%'";
	foreach($keys as $k){
	$select08 .= " or d.name like '%$k%' or d.brand like '%$k%' or d.keywords like '%$k%'";
	}
} else {
	$select08 = "select d.*, e.thumb_image from main_category a join category b join sub_category c join product d 
	join product_image e on a.id = b.main_id and b.id = c.category_id and c.id = d.subcategory_id and d.id = e.product_id 
	where a.id = '$main_category' and (d.name like '%$keyword%' or d.brand like '%$keyword%' or d.keywords like '%$keyword%' ";
	foreach($keys as $k){
	$select08 .= " or d.name like '%$k%' or d.brand like '%$k%' or d.keywords like '%$k%)'";
	}
	}
	$query08 = $dbc -> query($select08);
	$total_count = $dbc -> getNumRows($query08);

	$path=$_SERVER['PHP_SELF'];
	$targetpath="$path?category=$main_category&search=$keyword";
}
else { 
	$main_category = $_REQUEST['category'];
	
	if($main_category == 'all') {
	$select10 = "select d.*, e.thumb_image from product d join product_image e on d.id = e.product_id";
	} else {
	$select10 = "select d.*, e.thumb_image from main_category a join category b join sub_category c join product d join product_image e on a.id = b.main_id and b.id = c.category_id and c.id = d.subcategory_id and d.id = e.product_id where a.id = '$main_category'";
	}
	$query10 = $dbc -> query($select10);
	$total_count = $dbc -> getNumRows($query10);

	$path=$_SERVER['PHP_SELF'];
	$targetpath="$path?category=$main_category&search=";
}

$rowsperpage = 20;?>	
	
			   <section class="banner_category_block left_right_block_main">
		   		<div class="row">
		   			<div class="large-3 columns cat_list_sec_block">
		   				<div class="cat_list_sec">
 
		 
 
 <!--Responsive Menu-->
 <div class="nano-content">
      <ul class="gw-nav gw-nav-list">
<?php

$select01 = "select * from main_category order by category";
$query01 = $dbc -> query($select01);
while($array01 = $dbc -> fetch($query01))
{
?>  
        <li class="init-arrow-down"> <a href="javascript:void(0)"> <span class="gw-menu-text"><?php echo $array01['category']; ?></span> <b class="gw-arrow"></b> </a>
          <ul class="gw-submenu" <?php //if(!empty($main_id)) { if($main_id == $array01['id']) echo 'style="display: block;"' ;}?>>
           

<div id='cssmenu'>
									<ul>
											<?php
											$select02 = "select * from category where main_id = '$array01[id]' order by name";
											$query02 = $dbc -> query($select02);
											while($array02 = $dbc -> fetch($query02))
											{
												$select001 = "select * from sub_category where category_id = '$array02[id]'";
												$query001 = $dbc -> query($select001);
												$num = $dbc -> getNumRows($query001);
											?>
									   <li <?php if($num > 0) echo "class=' has-sub'"; ?>><a href='productlist.php?cat=<?php echo $array02['id']; ?>'><span><?php echo $array02['name']; ?></span></a>
											<ul>
											<?php
											$select03 = "select * from sub_category where category_id = '$array02[id]' order by name";
											$query03 = $dbc -> query($select03);
											while($array03 = $dbc -> fetch($query03))
											{
											?>
											 <li class=''><a href='productlist.php?sub_cat=<?php echo $array03['id']; ?>'><span><?php echo $array03['name']; ?></span></a></li>
											 <?php } ?>
											</ul>									   
										</li>	
										<?php } ?>	
									  
									  
									  
									</ul>
							</div>


          </ul>
          </li>
     <?php } ?>
      </ul>
    </div> 
		   					
		   

		   					
		   					
		   				</div>
		   			<!--<div class="offers_block">
		   					<img src="images/offer_ad_img.png">
		   				</div> --->
		   				
		   				
		   				
		   			
		   			
		   			</div>
		   			<div class="large-9 columns  cat_list_sec_block_cus_2 product_list_sub_top">
		   				
<?php

//productlist according to main category id

if(!empty($_REQUEST['main_cat']) )
{ 
	
	$select04 = "select category from main_category where id = '$main_id'";
	$query04 = $dbc -> query($select04);
	$array04 = $dbc -> fetch($query04);
	
	$select002 = "select * from category where main_id = '$main_id' order by name";
	$query002 = $dbc -> query($select002);
	while($array002 = $dbc -> fetch($query002)) {?>
	<label class="product_list_sub"><a href="productlist.php?cat=<?php echo $array002 ['id'] ?>"><?php echo $array002 ['name'] ?></a></label>
	<?php }
?>
					<div class="pdt_list_block">
					<div class="large-12 small-12 out-blokk">
					<div class="pdt_list_block2 large-6 small-6 columns">
						<div class="large-12 small-12 columns">
							<h2 class="pdt_title_cus"><?php echo $array04['category']; ?></h2>
						</div>
				
				
					</div>
					<div class="pagi_cus large-6 small-6 columns">
							<ul class="pagination right">
									
								  	
								  		<?php
									if ($total_count <> '') {
										include ("class/user_pagination.php");
									} else { $offset = 0;
										$rowsperpage =20;
									}
								?>
								</ul>					
					</div>
					
					</div>
					
					
					
					
					
					
								<div class="product_list_block_cus  large-12 columns re_p">
								

	<div id='content'>
								
								<ul class="pdt_list_ul product_list_block ">
<?php 
$select05 = "select d.*, e.thumb_image from main_category a join category b join sub_category c join product d join product_image e on a.id = b.main_id and b.id = c.category_id and c.id = d.subcategory_id and d.id = e.product_id where a.id = '$main_id' LIMIT $offset, $rowsperpage";
$query05 = $dbc -> query($select05);
if($total_count > 0) {
while($array05 = $dbc -> fetch($query05)) {
?>
	
								<li class="pdt_list_ul_li pdt_hot_deals_list large-3 small-6 medium-3 columns ">
								<div class="border_li_cus">
									<a href="productdetails.php?id=<?php echo $array05['id']; ?>">
										<img src="<?php echo $array05['thumb_image']; ?>">
										<div class="min-heigh_out">
				                 		<h6 class="pdt_name"><?php echo $array05['name']; ?></h6>
										<h6 class="pdt_name pdt-brand">
										<?php
										if(!empty($array05['brand'])) {
										echo $array05['brand'];
										}
										?>
										</h6>
										<?php if(!empty($array05['offer_price'])) {?>
					                	
										<h6 class="pdt_price">
										<i class="fa fa-rupee"></i>
										<?php echo $array05['offer_price']; ?>
										(<strike>
										<i class="fa fa-rupee"></i> <?php echo $array05['price']; ?>
										</strike>)
										</h6>
										<?php } else { ?>
										<h6 class="pdt_price">
										<i class="fa fa-rupee"></i> 
										<?php echo $array05['price']; ?>
										
										</h6>
										<?php } ?>
										</div>
					                </a>
					                	<p class="add_to_cart_list_page"><i class="fa fa-shopping-cart"></i>
					                		
					                		<?php if($array05['quantity'] == 0) {?>
					                		<a class="add_to_cart_listpage" onclick="return false"> No Stock</a>
					                		<?php } else {
					                if (!empty($_SESSION["cart_item"]))
									{ $key = search_in_array($_SESSION["cart_item"], 'id', $array05['id']); }
									if(isset($key))
									{?>
										<a class="add_to_cart_listpage" onclick="return false"> Already added</a>
									<?php } else {?>
										<a class="add_to_cart_listpage" id="add<?php echo $array05['id']; ?>" onclick="addcart(<?php echo $array05['id']; ?>)"> Add To cart</a>
										<?php }} ?>
					                	</p>
								</div>
								</li>
<?php } } else { echo '<h6 class="pdt_name zero_pdt_page">No results found.</h6>'; }?>
								
						
						
								</ul>
								
								
		
						</div>

<div class="pagi_cus">
<ul class="pagination right">
									
								  	
								  	<?php
									if ($total_count <> '') {
										include ("class/user_pagination.php");
									} else { $offset = 0;
										$rowsperpage = 0;
									}
								?>
								  	
								</ul>
								</div>
 
					
					</div>
					
					
		   			</div>
		   			
		   			
		   			
		   			
		   			
		   			
		   			
		   			
		   			<?php } 

//productlist according to category id

else if(!empty($_REQUEST['cat']))
{
	$select04 = "select name from category where id = '$cat_id'";
	$query04 = $dbc -> query($select04);
	$array04 = $dbc -> fetch($query04);
	
	$select003 = "select * from sub_category where category_id = '$cat_id' order by name";
	$query003 = $dbc -> query($select003);
	while($array003 = $dbc -> fetch($query003)) {?>
	<label  class="product_list_sub"><a href="productlist.php?sub_cat=<?php echo $array003 ['id'] ?>"><?php echo $array003 ['name'] ?></a></label>
	<?php }
	?>
	
					<div class="pdt_list_block">
					<div class="large-12 small-12 out-blokk">
					<div class="pdt_list_block2 large-6 small-6 columns">
						<div class="large-12 small-12 columns">
							<h2 class="pdt_title_cus"><?php echo $array04['name']; ?></h2>
						</div>
				
				
					</div>
					<div class="pagi_cus large-6 small-6 columns">
							<ul class="pagination right">
									
								  	
								  <?php
									if ($total_count <> '') {
										include ("class/user_pagination.php");
									} else { $offset = 0;
										$rowsperpage = 0;
									}
								?>
								  	
								</ul>					
					</div>
					
					</div>
					
					
					
					
								<div class="product_list_block_cus  large-12 columns re_p">
								

	<div id='content'>
								
								<ul class="pdt_list_ul product_list_block ">
<?php 
$select05 = "select d.*, e.thumb_image from category b join sub_category c join product d join product_image e on b.id = c.category_id and c.id = d.subcategory_id and d.id = e.product_id where b.id = '$cat_id' LIMIT $offset, $rowsperpage";
$query05 = $dbc -> query($select05);
if($total_count > 0) {
while($array05 = $dbc -> fetch($query05)) {
?>
	
								<li class="pdt_list_ul_li pdt_hot_deals_list large-3 small-6 medium-3 columns ">
								<div class="border_li_cus">
									<a href="productdetails.php?id=<?php echo $array05['id']; ?>">
										<img src="<?php echo $array05['thumb_image']; ?>">
										<div class="min-heigh_out">
				                 		<h6 class="pdt_name"><?php echo $array05['name']; ?></h6>
										
										<h6 class="pdt_name pdt-brand">
										<?php
										if(!empty($array05['brand'])) {
										echo $array05['brand'];
										}
										?>
										</h6>
										<?php if(!empty($array05['offer_price'])) {?>
					                	
										<h6 class="pdt_price"><i class="fa fa-rupee"></i> 
										<?php echo $array05['offer_price']; ?>
										(<strike>
										<i class="fa fa-rupee"></i> <?php echo $array05['price']; ?>
										</strike>)
										</h6>
										<?php } else { ?>
										<h6 class="pdt_price"><i class="fa fa-rupee"></i> 
										<?php echo $array05['price']; ?>
										
										</h6>
										<?php } ?>
										</div>
					                	</a>
					                	<p class="add_to_cart_list_page"><i class="fa fa-shopping-cart"></i>
					          				<?php if($array05['quantity'] == 0) {?>
					                		<a class="add_to_cart_listpage" onclick="return false"> No Stock</a>
					                		<?php } else {
					                if (!empty($_SESSION["cart_item"]))
									{ $key = search_in_array($_SESSION["cart_item"], 'id', $array05['id']); }
									if(isset($key))
									{?>
										<a class="add_to_cart_listpage" onclick="return false"> Already added</a>
									<?php } else {?>
										<a class="add_to_cart_listpage" id="add<?php echo $array05['id']; ?>" onclick="addcart(<?php echo $array05['id']; ?>)"> Add To cart</a>
										<?php }} ?>
					                	</p>
								</div>
								</li>
<?php } } else { echo '<h6 class="pdt_name zero_pdt_page">No results found.</h6>'; }?>
						
						
								</ul>
								
								
		
						</div>
<div class="pagi_cus toppy_pg">
							<ul class="pagination right">
									
								  	
								  	<?php
									if ($total_count <> '') {
										include ("class/user_pagination.php");
									} else { $offset = 0;
										$rowsperpage = 0;
									}
								?>
								  	
								</ul>
 </div>
					
					</div>
					
					
		   			</div>
		   			<?php } 

//productlist according to sub-category id

else if(!empty($_REQUEST['sub_cat']))
{
	$select04 = "select name from sub_category where id = '$sub_cat_id'";
	$query04 = $dbc -> query($select04);
	$array04 = $dbc -> fetch($query04);
	?>
	
					<div class="pdt_list_block">
					<div class="large-12 small-12 out-blokk">
					<div class="pdt_list_block2 large-6 small-6 columns">
						<div class="large-12 small-12 columns">
							<h2 class="pdt_title_cus"><?php echo $array04['name']; ?></h2>
						</div>
				
				
					</div>
					<div class="pagi_cus large-6 small-6 columns">
							<ul class="pagination right">
									
								  	
								  <?php
									if ($total_count <> '') {
										include ("class/user_pagination.php");
									} else { $offset = 0;
										$rowsperpage = 0;
									}
								?>
								  	
								</ul>					
					</div>
					
					</div>
					
					
					
					
					
								<div class="product_list_block_cus  large-12 columns re_p">
								

	<div id='content'>
								
								<ul class="pdt_list_ul product_list_block ">
<?php 
$select05 = "select d.*, e.thumb_image from product d join product_image e on d.id = e.product_id where d.subcategory_id = '$sub_cat_id' LIMIT $offset, $rowsperpage";
$query05 = $dbc -> query($select05);
if($total_count > 0) {
while($array05 = $dbc -> fetch($query05)) {
?>
	
								<li class="pdt_list_ul_li pdt_hot_deals_list large-3 small-6 medium-3 columns ">
								<div class="border_li_cus">
									<a href="productdetails.php?id=<?php echo $array05['id']; ?>">
										<img src="<?php echo $array05['thumb_image']; ?>">
										<div class="min-heigh_out">
				                 		<h6 class="pdt_name"><?php echo $array05['name']; ?></h6>
										<h6 class="pdt_name pdt-brand">
										<?php
										if(!empty($array05['brand'])) {
										echo $array05['brand'];
										}
										?>
										</h6>
										<?php if(!empty($array05['offer_price'])) {?>
					                	
										<h6 class="pdt_price"><i class="fa fa-rupee"></i> 
										<?php echo $array05['offer_price']; ?>
										(<strike>
										<i class="fa fa-rupee"></i> <?php echo $array05['price']; ?>
										</strike>)
										</h6>
										<?php }  else { ?>
										<h6 class="pdt_price"><i class="fa fa-rupee"></i> 
										<?php echo $array05['price']; ?>
										
										</h6>
										<?php } ?>
										</div>
					                	</a>
					                	<p class="add_to_cart_list_page"><i class="fa fa-shopping-cart"></i>
					                		<?php if($array05['quantity'] == 0) {?>
					                		<a class="add_to_cart_listpage" onclick="return false"> No Stock</a>
					                		<?php } else {
					                if (!empty($_SESSION["cart_item"]))
									{ $key = search_in_array($_SESSION["cart_item"], 'id', $array05['id']); }
									if(isset($key))
									{?>
										<a class="add_to_cart_listpage" onclick="return false"> Already added</a>
									<?php }else {?>
										<a class="add_to_cart_listpage" id="add<?php echo $array05['id']; ?>" onclick="addcart(<?php echo $array05['id']; ?>)"> Add To cart</a>
										<?php }} ?>
					                	</p>
								
								</div>
								</li>
<?php } } else { echo '<h6 class="pdt_name zero_pdt_page">No results found.</h6>'; }?>							
						
						
								</ul>
								
								
		
						</div>
<div class="pagi_cus toppy_pg">
							<ul class="pagination right">
									
								  	
								  	<?php
									if ($total_count <> '') {
										include ("class/user_pagination.php");
									} else { $offset = 0;
										$rowsperpage = 0;
									}
								?>
								  	
								</ul>	
 </div>
					
					</div>
					
					
		   			</div>
		   			<?php } 
		   			
//productlist according to search

else if(!empty($_REQUEST['category']) && !empty($_REQUEST['search']))
{ 
	if(!empty($_REQUEST['category']) && $_REQUEST['category']!='all')
	{
	$select002 = "select * from category where main_id = '$main_category' order by name";
	$query002 = $dbc -> query($select002);
	while($array002 = $dbc -> fetch($query002)) {?>
	<label class="product_list_sub"><a href="productlist.php?cat=<?php echo $array002 ['id'] ?>"><?php echo $array002 ['name'] ?></a></label>
	<?php }
	}
	else
	{
		$select01 = "select * from main_category order by category";
		$query01 = $dbc -> query($select01);
		while($array01 = $dbc -> fetch($query01))
		{?>
	<label class="product_list_sub"><a href="productlist.php?main_cat=<?php echo $array01 ['id'] ?>"><?php echo $array01 ['category'] ?></a></label>
	<?php
		}
	}
	
	?>
	
					<div class="pdt_list_block">
					
					<div class="large-12 small-12 out-blokk">
					<div class="pdt_list_block2 large-6 small-6 columns">
						<div class="large-12 small-12 columns">
							<h2 class="pdt_title_cus"><?php echo '"'.$_REQUEST[search].'"'; if($total_count > 0) { echo ' - '.$total_count.' result(s) found'; } ?></h2>
						</div>
				
				
					</div>
					<div class="pagi_cus large-6 small-6 columns">
							<ul class="pagination right">
									
								  	
								  	<?php
									if ($total_count <> '') {
										include ("class/user_pagination.php");
									} else { $offset = 0;
										$rowsperpage = 0;
									}
								?>
								  	
								</ul>					
					</div>
					
					</div>
					
					
					
								<div class="product_list_block_cus  large-12 columns re_p">
								

	<div id='content'>
								
								<ul class="pdt_list_ul product_list_block ">
<?php 
if($main_category == 'all') {
	$select07 = "select d.*, e.thumb_image from product d join product_image e on d.id = e.product_id 
	where d.name like '%$keyword%' or d.brand like '%$keyword%' or d.keywords like '%$keyword%' ";
	foreach($keys as $k){
	$select07 .= "or d.name like '%$k%' or d.brand like '%$k%' or d.keywords like '%$k%' ";
	}
	$select07 .= "LIMIT $offset, $rowsperpage";
} else {
	$select07 = "select d.*, e.thumb_image from main_category a join category b join sub_category c join product d 
	join product_image e on a.id = b.main_id and b.id = c.category_id and c.id = d.subcategory_id and d.id = e.product_id 
	where a.id = '$main_category' and (d.name like '%$keyword%' or d.brand like '%$keyword%' or d.keywords like '%$keyword%' ";
	foreach($keys as $k){
	$select07 .= "or d.name like '%$k%' or d.brand like '%$k%' or d.keywords like '%$k%') ";
	}
	$select07 .= "LIMIT $offset, $rowsperpage";
	
} //echo $select07;
$query07 = $dbc -> query($select07);
if($total_count > 0) {
while($array06 = $dbc -> fetch($query07)) {
?>
	
								<li class="pdt_list_ul_li pdt_hot_deals_list large-3 small-6 medium-3 columns ">
								<div class="border_li_cus">
									<a href="productdetails.php?id=<?php echo $array06['id']; ?>">
										<img src="<?php echo $array06['thumb_image']; ?>">
										<div class="min-heigh_out">
				                 		<h6 class="pdt_name"><?php echo $array06['name']; ?></h6>
										<h6 class="pdt_name pdt-brand">
										<?php
										if(!empty($array06['brand'])) {
										echo $array06['brand'];
										}
										?>
										</h6>
										<?php if(!empty($array06['offer_price'])) {?>
					                	
										<h6 class="pdt_price">
										<i class="fa fa-rupee"></i> 
										<?php echo $array06['offer_price']; ?>
										(<strike>
										<i class="fa fa-rupee"></i> <?php echo $array06['price']; ?>
										</strike>)
										</h6>
										<?php }  else { ?>
										<h6 class="pdt_price">
										<i class="fa fa-rupee"></i> 
										<?php echo $array06['price']; ?>
										
										</h6>
										<?php } ?>
										</div>
					                	</a>
					                	<p class="add_to_cart_list_page"><i class="fa fa-shopping-cart"></i> 
					                		<?php if($array06['quantity'] == 0) {?>
					                		<a class="add_to_cart_listpage" onclick="return false"> No Stock</a>
					                		<?php } else {
					                if (!empty($_SESSION["cart_item"]))
									{ $key = search_in_array($_SESSION["cart_item"], 'id', $array06['id']); }
									if(isset($key))
									{?>
										<a class="add_to_cart_listpage" onclick="return false"> Already added</a>
									<?php }else {?>
										<a class="add_to_cart_listpage" id="add<?php echo $array06['id']; ?>" onclick="addcart(<?php echo $array06['id']; ?>)"> Add To cart</a>
										<?php }} ?>
					                		</p>
								
								</div>
								</li>
<?php } } else { echo '<h6 class="pdt_name zero_pdt_page">No results found.</h6>'; }?>
						
						
								</ul>
								
								
		
						</div>
<div class="pagi_cus toppy_pg">
							<ul class="pagination right">
									
								  	
								  	<?php
									if ($total_count <> '') {
										include ("class/user_pagination.php");
									} else { $offset = 0;
										$rowsperpage = 0;
									}
								?>
								  	
								</ul>	
 </div>
					
					</div>
					
					
		   			</div>
		   			<?php } 
		   			
//productlist empty search

else
{ 
	if(!empty($_REQUEST['category']) && $_REQUEST['category']!='all')
	{
	$select002 = "select * from category where main_id = '$main_category' order by name";
	$query002 = $dbc -> query($select002);
	while($array002 = $dbc -> fetch($query002)) {?>
	<label class="product_list_sub"><a href="productlist.php?cat=<?php echo $array002 ['id'] ?>"><?php echo $array002 ['name'] ?></a></label>
	<?php }
	}
	else
	{
		$select01 = "select * from main_category order by category";
		$query01 = $dbc -> query($select01);
		while($array01 = $dbc -> fetch($query01))
		{?>
	<label class="product_list_sub"><a href="productlist.php?main_cat=<?php echo $array01 ['id'] ?>"><?php echo $array01 ['category'] ?></a></label>
	<?php
		}
	}

	?>
	
					<div class="pdt_list_block">
					<div class="large-12 small-12 out-blokk">
					<div class="pdt_list_block2 large-6 small-6 columns">
						<div class="large-12 small-12 columns">
							<h2 class="pdt_title_cus"><?php if($total_count > 0) { echo $total_count.' result(s) found'; } ?></h2>
						</div>
				
				
					</div>
					<div class="pagi_cus large-6 small-6 columns">
							<ul class="pagination right">
									
								  	
								  	<?php
									if ($total_count <> '') {
										include ("class/user_pagination.php");
									} else { $offset = 0;
										$rowsperpage = 0;
									}
								?>
								  	
								</ul>					
					</div>
					
					</div>
					
					
								<div class="product_list_block_cus  large-12 columns re_p">
								

	<div id='content'>
								
								<ul class="pdt_list_ul product_list_block ">
<?php

if($main_category == 'all') {
	$select09 = "select d.*, e.thumb_image from product d join product_image e on d.id = e.product_id LIMIT $offset, $rowsperpage";
} else {
	$select09 = "select d.*, e.thumb_image from main_category a join category b join sub_category c join product d join product_image e on a.id = b.main_id and b.id = c.category_id and c.id = d.subcategory_id and d.id = e.product_id where a.id = '$main_category'  LIMIT $offset, $rowsperpage";
}
$query09 = $dbc -> query($select09);
if($total_count > 0) {
while($array07 = $dbc -> fetch($query09)) {
?>
	
								<li class="pdt_list_ul_li pdt_hot_deals_list large-3 small-6 medium-3 columns ">
								<div class="border_li_cus">
									<a href="productdetails.php?id=<?php echo $array07['id']; ?>">
										<img src="<?php echo $array07['thumb_image']; ?>">
										<div class="min-heigh_out">
				                 		<h6 class="pdt_name"><?php echo $array07['name']; ?></h6>
										<h6 class="pdt_name pdt-brand">
										<?php
										if(!empty($array07['brand'])) {
										echo $array07['brand'];
										}
										?>
										</h6>
										<?php if(!empty($array07['offer_price'])) {?>
					                	
										<h6 class="pdt_price"><i class="fa fa-rupee"></i> 
										<?php echo $array07['offer_price']; ?>
										(<strike>
										<i class="fa fa-rupee"></i> <?php echo $array07['price']; ?>
										</strike>)
										</h6>
										<?php }  else { ?>
										<h6 class="pdt_price"><i class="fa fa-rupee"></i> <?php echo $array07['price']; ?>
										
										</h6>
										<?php } ?>
										</div>
					                	</a>
					                	<p class="add_to_cart_list_page"><i class="fa fa-shopping-cart"></i> 
					                		<?php if($array07['quantity'] == 0) {?>
					                		<a class="add_to_cart_listpage" onclick="return false"> No Stock</a>
					                		<?php } else {
					                if (!empty($_SESSION["cart_item"]))
									{ $key = search_in_array($_SESSION["cart_item"], 'id', $array07['id']); }
									if(isset($key))
									{?>
										<a class="add_to_cart_listpage" onclick="return false"> Already added</a>
									<?php }else {?>
										<a class="add_to_cart_listpage" id="add<?php echo $array07['id']; ?>" onclick="addcart(<?php echo $array07['id']; ?>)"> Add To cart</a>
										<?php }} ?>
					                		</p>
								
								</div>
								</li>
<?php } } else { echo '<h6 class="pdt_name zero_pdt_page">No results found.</h6>'; }?>
						
						
								</ul>
								
								
		
						</div>
<div class="pagi_cus toppy_pg">
							<ul class="pagination right">
									
								  	
								  	<?php
									if ($total_count <> '') {
										include ("class/user_pagination.php");
									} else { $offset = 0;
										$rowsperpage = 0;
									}
								?>
								  	
								</ul>	
 </div>
					
					</div>
					
					
		   			</div>
		   			<?php } ?>
		   		</div>
		   </section>
		

	
	
	
	
	
	
	<?php include_once('includes/footer_module.php'); ?>	
	
    <script src="js/custom.js"></script>
	<?php include_once('includes/footer_content.php'); ?>	