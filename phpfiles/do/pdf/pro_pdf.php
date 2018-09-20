<?php
error_reporting("E_ALL");
date_default_timezone_set('Asia/Kolkata');
require_once('tcpdf_include.php');
include_once("../../../class/dbc_class.php");
$dbc=new Dbc;
$name=$_REQUEST['search'];
$cat=$_REQUEST['category'];

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetTitle('Sales Search Report');
$pdf->SetSubject('By Product');

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font

// add a page
$pdf->AddPage( 'L', 'LETTER' );
$pdf->SetMargins(10, 10, 10, true);
// Set some content to print


// create some HTML content
$pdf->SetFont('helvetica', '', 10);
$html.='<table width="100%" ><tr><td align="center"><h1>Sales Search Report - By Product</h1></td>
<td align="right" style="font-size:10"><br><br><br><br><b>'.date('Y-m-d h:i:s').'</b></td></tr></table>';

$html.='<br><b>Search Product: '.$name.'</b>';

if($cat=="orders")
{
	 $html.='<br><b>Category: Orders</b>';
}
else if($cat=="orders_process")
{
	 $html.='<br><b>Category: Processed</b>';
}
else if($cat=="orders_sales")
{
	 $html.='<br><b>Category: Sold</b>';
}

$html.='<br><br><table width="100%" border="1">
<tr align="center">
<th width="12%"><b>Sl No.</b></th>
<th width="22%"><b>Product Name</b></th>
<th width="22%"><b>User</b></th>
<th width="22%"><b>Quantity</b></th>';

if($cat=="orders")
{ $html.='<th width="22%"><b>Ordered on</b></th>';
$sql2 = "select b.quantity, d.name as user,a.name, b.order_date from product a join order_products b join orders c join user_registration d on b.product_id = a.id and c.id = b.order_id and b.user_id = d.id where a.name like '%$name%'";}
else if($cat=="orders_process")
{ $html.='<th width="22%"><b>Processed on</b></th>';
$sql2 = "select b.order_date, d.name as user, c.quantity, a.name from product a join orders_process b join order_products c join user_registration d on a.id = b.product_id and c.id = b.order_products_id and d.id = b.user_id where a.name like '%$name%'";}
else if($cat=="orders_sales")
{ $html.='<th width="22%"><b>Sold on</b></th>';
$sql2 = "select e.order_date, d.name as user, c.quantity, a.name from product a join orders_process b join order_products c join user_registration d join orders_sales e on a.id = b.product_id and c.id = b.order_products_id and d.id = b.user_id and e.orders_process_id = b.id where a.name like '%$name%'";}

$html.='</tr>';

//$sql2="SELECT $cat.id, $cat.user_id, $cat.quantity, product.name, $cat.order_date FROM product JOIN $cat ON product.id = $cat.product_id WHERE product.name LIKE '%$name%'";
$res2=$dbc->query($sql2);
$i=1;
while($res3=$dbc->fetch($res2))
{
	$html.='<tr align="center">
		<td>'.$i.'</td>
		<td>'.$res3['name'].'</td>
		<td>'.$res3['user'].'</td>
		<td>'.$res3['quantity'].'</td>
		<td>'.$res3['order_date'].'</td></tr>';
		$i++;
	}
$html.='</table>';

$pdf->writeHTML($html, true, 0, true, 0);

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdfname="report-by-product-$cat.pdf";
$pdf->Output($pdfname, 'I'); 
?>