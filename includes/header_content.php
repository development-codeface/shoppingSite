<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<script src="js/jquery-2.1.0.min.js"></script>	
		

		<section class="top_block_menu_section">
		   	<div class="row">
		      <div class="large-8 medium-7   small-6  columns top_menu_sec_1">
		        		<span class="mail_icon_block" > 
							<i class="fa fa-envelope">
								
							</i> 
							info@marginfreemarket.com
						</span>
						<span class="mail_icon_block" > 
							<i class="fa fa-mobile-phone">
								
							</i> 
							+91 9072853663

						</span>
		      </div>
			  

		       
		      <div class="large-4 medium-5   small-9 columns top_menu_sec text-right">
			  

			  
			  
		        		<span class="mail_icon_block" > 
							<i class="fa fa-shopping-cart">
								
							</i>  
							<a href="<?php if (!empty($_SESSION["cart_item"])) { echo 'checkout.php'; } else { echo 'cart_page.php'; } ?>">Check Out</a>
						</span>
						<span class="mail_icon_block" > 
							<i class="fa fa-user">
								
							</i>  
													 <span class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">My Account
    <span class="caret"></span></button>
<ul id="drop1" data-dropdown-content="" class="f-dropdown dropdown-menu" aria-hidden="true">
  <li>
							<?php 
							
							if(!empty($_GET['log']))
							{
								include('phpfiles/user/logout.php');
							}
							
							if(empty($_SESSION['onlineuser'])){ ?>
							<a href="login.php">Login</a>
							<?php } else {?>
							<a href="?log=out">Logout</a>
							<?php } ?>
						</li>
	<?php if(empty($_SESSION['onlineuser'])){ ?>
  <li><a href="login.php">Register</a></li>
  <?php } else { ?>
  	<li><a href="personal_details.php">My Profile</a></li>
  	<?php } ?>

</ul>
						</span>
		      </div>
		      </div>
  		  </section>
  		   <section class="logo_block_section">
  		  	<div class="row">
		      <div class="large-6  small-6 medium-6  columns logo_sec">
		        	<a href="index.php">
		        		<img src="images/logo.png" title="Margin Free Market" alt="Margin Free Market">
		        	</a>
		      </div>
			      <div class="large-6  small-6  medium-6  columns home_delivery_img">
				  
				  <?php include_once ("class/dbc_class.php");
$dbc = new Dbc;
				  $select01 = "select * from shipping_charge";
				  $query01 = $dbc -> query($select01);
				  $array01 = $dbc -> fetch($query01);
				  ?>
				  
		        	<a href="#">
		        		<img src="images/home_delivery_img.png" title="Margin Free Market" alt="Margin Free Market">
						<div class="order-text">ON ORDERS RS. <?php echo $array01['amount']; ?> OR MORE</div>
		        	</a>
		      </div>
  		  </div>
  		  
  		</section>
  		   <section class="search_block_section">
  		   		 <div class="row">

  		   		 	<div class="category_title large-3 columns">
									 <div class="dropdown">
  <button class="dropbtn">
  		   		 		<h6> <i class="fa fa-bars">
  		   		 		</i> Category</h6></button>
  
  <div class="dropdown-content">
 <div class="nano-content">
      <ul class="gw-nav gw-nav-list">
<?php
include_once ("class/dbc_class.php");
$dbc = new Dbc;

if(isset($_SESSION['c_count']))
{$cart = $_SESSION['c_count'];}
else{ $cart=0;}

function loadsettings($name)
{

$resultssettings=mysql_query("select value from settings where name='$name'");

$settingsrow=mysql_fetch_row($resultssettings);
return $settingsrow[0];
}

$select01 = "select * from main_category order by category";
$query01 = $dbc -> query($select01);
while($array01 = $dbc -> fetch($query01))
{
?>    
        <li class="init-arrow-down"> <a href="javascript:void(0)"> <span class="gw-menu-text"><?php echo $array01['category']; ?></span> <b class="gw-arrow"></b> </a>
          <ul class="gw-submenu">
           

<div id='cssmenu'>
									<ul>
											<?php
											$select02 = "select * from category where main_id = '$array01[id]' order by name";
											$query02 = $dbc -> query($select02);
											while($array02 = $dbc -> fetch($query02))
											{
												$select05 = "select * from sub_category where category_id = '$array02[id]'";
												$query06 = $dbc -> query($select05);
												$num = $dbc -> getNumRows($query06);
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

    </div> 			
  </div>
</div>
  		   		 	 </div>
  		   		 	 <div class="search_block large-7 medium-8 small-8 columns">
  	
          <form action="productlist.php" class="navbar-form navbar-left top_search_cus">
		  
		  <select name="category" class="cat_li_cus  large-4 small-5 medium-5  columns" id="search_cat_id">
			<option value="all">All Categories</option>
			<?php
			
			$select04 = "select * from main_category order by category";
			$query04 = $dbc -> query($select04);
			while($array04 = $dbc -> fetch($query04)) {?>
			<option value="<?php echo $array04['id']; ?>" 
				<?php 
				if(!empty($_REQUEST['cat']))
				{
					$select04 = "select main_id from category where id = '$_REQUEST[cat]'"; 
					$query05 = $dbc -> query($select04);
					$array05 = $dbc -> fetch($query05);
					
					if($array04['id'] == $array05['main_id']) echo 'selected';
				}
				
				if(!empty($_REQUEST['sub_cat']))
				{
					$select04 = "select main_id from category a join sub_category b on a.id = b.category_id where b.id = '$_REQUEST[sub_cat]'"; 
					$query05 = $dbc -> query($select04);
					$array05 = $dbc -> fetch($query05);
					
					if($array04['id'] == $array05['main_id']) echo 'selected';
				}
				
				if(!empty($_REQUEST['category']) || !empty($_REQUEST['main_cat'])) 
				{ if($_REQUEST['category'] == $array04['id'] || $_REQUEST['main_cat'] == $array04['id']) echo 'selected'; } 
				?>>
				<?php echo $array04['category']; ?></option>
			<?php } ?>
		  
		  </select>
		 
		  <input name="search" class="large-7 small-6 medium-6 columns search_input_cus auto" id="search_keyword"  autocomplete="off"
		  value="<?php if(!empty($_REQUEST['search'])) echo $_REQUEST['search']; ?>" placeholder="Search..">
		  <span class="search_icon large-1 small-1 medium-1">
		  	<input type="submit" class=" main_search">
		
		  </span>
                <!-- <div class="typeahead-container">
                    <div class="typeahead-field">

                        <span class="typeahead-query">
                            <input id="q"
                                   name="q"
                                   type="search"
                                   autofocus
                                   autocomplete="off">
                        </span>
                        <span class="typeahead-button">
                            <button class="btn btn-default" type="submit">
                                <span class="typeahead-search-icon"></span>
                            </button>
                        </span>

                    </div>
                </div> -->
            </form>
			   <input id="select_cat" name="select_cat" value="<?php if(!empty($_REQUEST['category'])){ echo $_REQUEST['category']; } else { echo "all"; } ?>" type="hidden"  />
  		   		 	 </div>
  		   		 	  <div class="minicart large-2  medium-3 small-3 columns">
  		   		 			<h6> <a href="cart_page.php"><img class="minicart_img" src="images/Shopping-Cart.png" title="Margin Free Market" alt="Margin Free Market"> Cart (<span id="c_count"><?php echo $cart; ?></span>)</a></h6>
  		   		 	 </div>
  		   		 </div>
  		   	
  			</section>
	

 <link rel="stylesheet" type="text/css" href="css/bs_leftnavi.css">
<script src="js/bs_leftnavi.js"></script> 
<!---<script type="text/javascript" src="js/autocomplete.js"></script>
<script type="text/javascript" src="js/search_bar.js"></script>-->


