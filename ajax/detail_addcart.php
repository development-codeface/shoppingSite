<?php
session_start();
include ("../class/dbc_class.php");
include ("../includes/search_array.php");
$dbc = new Dbc;
if (isset($_POST['count']))
{
	$id = $_POST['pro_id'];
	$quant = $_POST['count'];
	
	//cart count
	echo $_SESSION['c_count']=$_POST['click'];
	
	$qty = $_POST['quant'];
	
	$select03 = "select maximum_order from product where id = '$id'";
	$query02 = $dbc -> query($select03);
	$array02 = $dbc -> fetch($query02);
	if($array02['maximum_order'] < $qty)
	{ $qy = $array02['maximum_order']; }
	else { $qy = $qty; }
	$item = $_POST['all']; 
 
	$select01 = "SELECT * FROM product WHERE id = '$id'";
	$productById = $dbc -> runQuery($select01);
	echo $productById['name'];
	$itemArray = array($productById[0]["id"] => array('name' => $productById[0]["name"], 'id' => $productById[0]["id"], 'quantity' => $qy, 'price' => $productById[0]["price"], 'offer' => $productById[0]["offer_price"]));

	if (!empty($_SESSION["cart_item"])) 
	{
		if(search_in_array($_SESSION["cart_item"], 'id', $id))
		{
		
			foreach($_SESSION["cart_item"] as $key => $product)
			{
				if ( $product[id] === $id )
				{
					$select02 = "select maximum_order from product where id='$id'";
					$query01 = $dbc -> query($select02);
					$array01 = $dbc -> fetch($query01);
					$limit = $_SESSION["cart_item"][$key]["quantity"] + $qty;
					if($limit <= $array01['maximum_order'])
					{
						$_SESSION["cart_item"][$key]["quantity"] = $_SESSION["cart_item"][$key]["quantity"] + $qty;
						echo $add ="|".$productById['name'];
					}
					else
					{
						echo $add ="|".$productById['name']."|".$array01['maximum_order'];
					}
				}
			}
		}
		else
		{
			$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
		}
	}
	else
	{
		$_SESSION["cart_item"] = $itemArray;
	}
}
?>