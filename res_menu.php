
 <link href="css/drawer.min.css" rel="stylesheet">
<body class="drawer drawer--left">

	  <header role="banner">
		<button type="button" class="drawer-toggle drawer-hamburger">
		  <span class="sr-only">toggle navigation</span>
		  <span class="drawer-hamburger-icon"></span>
		</button>

		<nav class="drawer-nav" role="navigation">
		  <ul class="drawer-menu">
			<li><a class="drawer-brand" href="#">Margin Free Market</a></li>
			
<?php
include_once ("class/dbc_class.php");
$dbc = new Dbc;

$select01 = "select * from main_category order by category";
$query01 = $dbc -> query($select01);
while($array01 = $dbc -> fetch($query01))
{
?>

			<li class="drawer-dropdown">
			  <a class="drawer-menu-item" data-target="#" href="#" data-toggle="dropdown" role="button" aria-expanded="false">
			  	<?php echo $array01['category']; ?><span class="drawer-caret"></span>
			  </a>
			  <ul class="drawer-dropdown-menu">
											<?php
											$select02 = "select * from category where main_id = '$array01[id]' order by name";
											$query02 = $dbc -> query($select02);
											while($array02 = $dbc -> fetch($query02))
											{
											?>
				<li><a class="drawer-dropdown-menu-item" href='productlist.php?cat=<?php echo $array02['id']; ?>'><?php echo $array02['name']; ?></a></li>
				<?php } ?>
			  </ul>
			</li>
			<?php } ?>
			
		  </ul>
		</nav>
	
	  </header>
	  


  <link rel="stylesheet" href="css/cus.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/iscroll.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/drawer.min.js" charset="utf-8"></script>
	<script>
		jQuery(document).ready(function() {
		jQuery.noConflict();
		 $('.drawer').drawer();
		});
	</script>

</body>
