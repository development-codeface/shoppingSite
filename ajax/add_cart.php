<?php
session_start();
include ("../includes/search_array.php");
include ("../class/dbc_class.php");
$dbc = new Dbc;
if (isset($_POST['count'])) {
	$id = $_POST['pro_ids'];
	echo $_SESSION['c_count'] = $_POST['count'];

	foreach ($id as $value) {
		$select01 = "SELECT * FROM product WHERE id = '$value'";
		$productById = $dbc -> runQuery($select01);
		$itemArray = array($productById[0]["id"] => array('name' => $productById[0]["name"], 'id' => $productById[0]["id"], 'quantity' => 1, 'price' => $productById[0]["price"], 'offer' => $productById[0]["offer_price"]));
		if (!empty($_SESSION["cart_item"])) {

			if (search_in_array($_SESSION["cart_item"], id, $value)) {
				foreach ($_SESSION["cart_item"] as $key => $product) {
					if ($product[id] === $value) {
						$_SESSION["cart_item"][$key]["quantity"] = $_SESSION["cart_item"][$key]["quantity"] + $qty;
					}
				}
			} else {
				$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
			}
		} else {
			$_SESSION["cart_item"] = $itemArray;
		}
	}
}
?>