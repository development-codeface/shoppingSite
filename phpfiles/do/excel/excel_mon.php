<?php
error_reporting("E_ALL");
include_once("../../../class/dbc_class.php");
$dbc=new Dbc;
$mon=$_REQUEST['month'];
$cat=$_REQUEST['category'];
$yr=$_REQUEST['year'];

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
    header("Content-Disposition: attachment;filename=report-$mon-$yr-$cat.xls");
    header("Content-Transfer-Encoding: binary ");
    xlsBOF();
	
	xlsWriteLabel(0,0,"Search Month");
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
    
	xlsWriteLabel(1,0,"' $mon / $yr '");
	
	if($cat=="orders")
	{ xlsWriteLabel(1,1,"Orders");
	$sql2 = "select b.quantity,b.order_date,c.name,a.user_id from orders a join order_products b join product c on b.order_id = a.id and c.id = b.product_id where month(a.order_date) = '$mon'  and year(a.order_date) = '$yr'"; }
	
	if($cat=="orders_process")
	{ xlsWriteLabel(1,1,"Processed");
	$sql2 = "select c.quantity,a.user_id,b.name, a.order_date from orders_process a join product b join order_products c on b.id = a.product_id and c.id = a.order_products_id where month(a.order_date) = '$mon' and year(a.order_date) = '$yr'"; }
	
	if($cat=="orders_sales")
	{ xlsWriteLabel(1,1,"Sold");
	$sql2 = "select c.quantity,d.name, a.order_date, a.user_id from orders_sales a join orders_process b join order_products c join product d on a.orders_process_id = b.id and c.id = b.order_products_id and d.id = a.product_id where month(a.order_date) = '$mon' and year(a.order_date) = '$yr'"; }
	
	$xlsRow = 4;
	
$res2=$dbc->query($sql2);
$i=1;
while($res3=$dbc->fetch($res2))
{		
	$sql3="select name from user_registration where id=$res3[user_id]";
	$res4=$dbc->query($sql3);
	$res5=$dbc->fetch($res4);
	
	xlsWriteLabel($xlsRow,0,$i);
	xlsWriteLabel($xlsRow,1,$res3['name']);
	xlsWriteLabel($xlsRow,2,$res5['name']);
	xlsWriteLabel($xlsRow,3,$res3['quantity']);
	xlsWriteLabel($xlsRow,4,$res3['order_date']);
	$i++;
	$xlsRow++;
}
xlsEOF();
?>