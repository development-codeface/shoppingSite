<?php
error_reporting("E_ALL");
include_once("../../../class/dbc_class.php");
$dbc=new Dbc;
$se = $_REQUEST['search'];
$cat = $_REQUEST['category'];

    function xlsBOF()
    {
    echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
    return;
    }
    function xlsEOF()
    {
    echo pack("ss", 0x0A, 0x00);
    return;
    }
    function xlsWriteNumber($Row, $Col, $Value)
    {
    echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
    echo pack("d", $Value);
    return;
    }
    function xlsWriteLabel($Row, $Col, $Value )
    {
    $L = strlen($Value);
    echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
    echo $Value;
    return;
    }
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");;
    header("Content-Disposition: attachment;filename=report-by-product-$cat.xls");
    header("Content-Transfer-Encoding: binary ");
    xlsBOF();
	
	xlsWriteLabel(0,0,"Search Product");
	xlsWriteLabel(0,1,"Category");
	
	xlsWriteLabel(3,0,"Sl No.");
    xlsWriteLabel(3,1,"Product Name");
    xlsWriteLabel(3,2,"User");
	xlsWriteLabel(3,3,"Quantity");
	
	if($cat=="orders")
	{ xlsWriteLabel(3,4,"Ordered on"); }
	
	if($cat=="orders_process")
	{ xlsWriteLabel(3,4,"Processed on"); }
	
	if($cat=="orders_sales")
	{ xlsWriteLabel(3,4,"Sold on"); }
    
	xlsWriteLabel(1,0,"' $se '");
	
	if($cat=="orders")
	{
		xlsWriteLabel(1,1,"Orders");
		$sql2 = "select b.quantity, d.name as user,a.name, b.order_date from product a join order_products b join orders c join user_registration d on b.product_id = a.id and c.id = b.order_id and b.user_id = d.id where a.name like '%$se%'";
	}
	
	if($cat=="orders_process")
	{
		xlsWriteLabel(1,1,"Processed");
		$sql2 = "select b.order_date, d.name as user, c.quantity, a.name from product a join orders_process b join order_products c join user_registration d on a.id = b.product_id and c.id = b.order_products_id and d.id = b.user_id where a.name like '%$se%'";
	}
	
	if($cat=="orders_sales")
	{
		xlsWriteLabel(1,1,"Sold");
		$sql2 = "select e.order_date, d.name as user, c.quantity, a.name from product a join orders_process b join order_products c join user_registration d join orders_sales e on a.id = b.product_id and c.id = b.order_products_id and d.id = b.user_id and e.orders_process_id = b.id where a.name like '%$se%'";
	}
	
	$xlsRow = 4;
	
//$sql2="SELECT $cat.id, $cat.user_id, $cat.quantity, product.name, $cat.order_date FROM product JOIN $cat ON product.id = $cat.product_id WHERE product.name LIKE '%$name%'";
$res2=$dbc->query($sql2);
$i=1;
while($res3=$dbc->fetch($res2))
{
	xlsWriteLabel($xlsRow,0,$i);
	xlsWriteLabel($xlsRow,1,$res3['name']);
	xlsWriteLabel($xlsRow,2,$res3['user']);
	xlsWriteLabel($xlsRow,3,$res3['quantity']);
	xlsWriteLabel($xlsRow,4,$res3['order_date']);
	$i++;
	$xlsRow++;
}
xlsEOF();
?>