<?php
error_reporting("E_ALL");
date_default_timezone_set('Asia/Kolkata');
require_once('tcpdf_include.php');
include_once("../../../class/dbc_class.php");
$dbc=new Dbc;
$mon=$_REQUEST['month'];
$cat=$_REQUEST['category'];
$yr=$_REQUEST['year'];

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetTitle('Sales Search Report');
$pdf->SetSubject('By Day');

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
$html.='<table width="100%" ><tr><td align="center"><h1>Sales Search Report - By Month</h1></td>
<td align="right" style="font-size:10"><br><br><br><br><b>'.date('Y-m-d h:i:s').'</b></td></tr></table>';

$html.='<br><b>Search Month: '.$mon.' / '.$yr.'</b>';

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
<tr align="center" height="15">
<th width="12%"><b>Sl No.</b></th>
<th width="22%"><b>Product Name</b></th>
<th width="22%"><b>User</b></th>
<th width="22%"><b>Quantity</b></th>';

if($cat=="orders")
{ $html.='<th width="22%"><b>Ordered on</b></th>';
$sql2 = "select b.quantity,b.order_date,c.name,a.user_id from orders a join order_products b join product c on b.order_id = a.id and c.id = b.product_id where month(a.order_date) = '$mon'  and year(a.order_date) = '$yr'";}
else if($cat=="orders_process")
{ $html.='<th width="22%"><b>Processed on</b></th>';
$sql2 = "select c.quantity,a.user_id,b.name, a.order_date from orders_process a join product b join order_products c on b.id = a.product_id and c.id = a.order_products_id where month(a.order_date) = '$mon' and year(a.order_date) = '$yr'";}
else if($cat=="orders_sales")
{ $html.='<th width="22%"><b>Sold on</b></th>';
$sql2 = "select c.quantity,d.name, a.order_date, a.user_id from orders_sales a join orders_process b join order_products c join product d on a.orders_process_id = b.id and c.id = b.order_products_id and d.id = a.product_id where month(a.order_date) = '$mon' and year(a.order_date) = '$yr'";}

$html.='</tr>';

$res2=$dbc->query($sql2);
$i=1;
while($res3=$dbc->fetch($res2))
{	
	$sql3="select name from user_registration where id=$res3[user_id]";
	$res4=$dbc->query($sql3);
	$res5=$dbc->fetch($res4);
	
	$html.='<tr align="center">
		<td>'.$i.'</td>
		<td>'.$res3['name'].'</td>
		<td>'.$res5['name'].'</td>
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
$pdfname="report-$mon-$yr-$cat.pdf";
$pdf->Output($pdfname, 'I'); 
?>