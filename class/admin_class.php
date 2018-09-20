<?php
class marginfree
{
	function marginfree()
	{
		switch($_REQUEST['option'])
		{
			//main category
			case "main_category" : include_once("phpfiles/administrator/main_category.php");
			break;
			case "ins_main_category" : include_once("phpfiles/do/ins_main_category.php");
			break;
			case "manage_main_category" : include_once("phpfiles/administrator/manage_main_category.php");
			break;
			case "edit_main_category" : include_once("phpfiles/administrator/edit_main_category.php");
			break;
			case "update_main_category" : include_once("phpfiles/do/update_main_category.php");
			break;
			
			//category
			case "category" : include_once("phpfiles/administrator/category.php");
			break;
			case "ins_category" : include_once("phpfiles/do/ins_category.php");
			break;
			case "manage_category" : include_once("phpfiles/administrator/manage_category.php");
			break;
			case "edit_category" : include_once("phpfiles/administrator/edit_category.php");
			break;
			case "update_category" : include_once("phpfiles/do/update_category.php");
			break;
			
			//sub category
			case "subcategory" : include_once("phpfiles/administrator/subcategory.php");
			break;
			case "ins_subcategory" : include_once("phpfiles/do/ins_subcategory.php");
			break;
			case "manage_subcategory" : include_once("phpfiles/administrator/manage_subcategory.php");
			break;
			case "edit_subcategory" : include_once("phpfiles/administrator/edit_subcategory.php");
			break;
			case "update_subcategory" : include_once("phpfiles/do/update_subcategory.php");
			break;
			
			//Products
			case "stock" : include_once("phpfiles/administrator/stock.php");
			break;
			case "upd_stock" : include_once("phpfiles/do/update_stock.php");
			break;
			case "product" : include_once("phpfiles/administrator/product.php");
			break;
			case "ins_product" : include_once("phpfiles/do/ins_product.php");
			break;
			case "manage_products" : include_once("phpfiles/administrator/manage_products.php");
			break;
			case "manageproduct_search" : include_once("phpfiles/administrator/manageproduct_search.php");
			break;
			case "edit_product" : include_once("phpfiles/administrator/edit_product.php");
			break;
			case "update_product" : include_once("phpfiles/do/update_product.php");
			break;
			
			//locations
			case "shipping" : include_once("phpfiles/administrator/shipping.php");
			break;
			case "upd_ship" : include_once("phpfiles/do/update_ship.php");
			break;
			case "locations" : include_once("phpfiles/administrator/locations.php");
			break;
			case "ins_location" : include_once("phpfiles/do/ins_location.php");
			break;
			case "manage_locations" : include_once("phpfiles/administrator/manage_locations.php");
			break;
			case "edit_location" : include_once("phpfiles/administrator/edit_location.php");
			break;
			case "update_location" : include_once("phpfiles/do/update_location.php");
			break;
			
			//users
			case "users" : include_once("phpfiles/administrator/users.php");
			break;
			case "contact" : include_once("phpfiles/administrator/contact.php");
			break;
			case "subscibe" : include_once("phpfiles/administrator/subscribe.php");
			break;
			
			//settings
			case "slider" : include_once("phpfiles/administrator/slider.php");
			break;
			case "password" : include_once("phpfiles/administrator/password.php");
			break;
			case "social_links" : include_once("phpfiles/administrator/settings.php");
			break;
			case "change_settings" : include_once("phpfiles/do/change_settings.php");
			break;
			
			 //order
			case "view_order" : include_once("phpfiles/administrator/view_order.php");
			break;
			case "view_processed" : include_once("phpfiles/administrator/view_processed.php");
			break;
			case "view_cancelled" : include_once("phpfiles/administrator/view_cancelled.php");
			break;
           	case "manage_orders" : include_once("phpfiles/administrator/manage_orders.php");
			break;
			case "processed_orders" : include_once("phpfiles/administrator/processed_orders.php");
			break;
			case "sold_orders" : include_once("phpfiles/administrator/sold_orders.php");
			break;
			case "cancel_order" : include_once("phpfiles/administrator/order_cancel.php");
			break;
			case "cancelled_orders" : include_once("phpfiles/administrator/cancelled_orders.php");
			break;
			case "ins_cancel_order" : include_once("phpfiles/do/cancel_order.php");
			break;
			
			//search
			case "product_sales" : include_once("phpfiles/administrator/product_sales.php");
			break;
			case "product_search" : include_once("phpfiles/administrator/product_search.php");
			break;
			case "daily_search" : include_once("phpfiles/administrator/daily_search.php");
			break;
			case "sale_search" : include_once("phpfiles/administrator/sale_search.php");
			break;
			case "monthly_search" : include_once("phpfiles/administrator/monthly_search.php");
			break;
			case "monthly_sale" : include_once("phpfiles/administrator/monthly_sale.php");
			break;
			case "yearly_sales" : include_once("phpfiles/administrator/yearly_sales.php");
			break;
			case "yearly_search" : include_once("phpfiles/administrator/yearly_search.php");
			break;
			default : echo "page not found";
			
			default : echo "page not found";
		}
	}
}
?>