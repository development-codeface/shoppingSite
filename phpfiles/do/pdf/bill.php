<?php
error_reporting("E_ALL");
date_default_timezone_set('Asia/Kolkata');
require_once('tcpdf_include.php');
include_once("../../../class/dbc_class.php");
$dbc=new Dbc;
$id=$_REQUEST['id'];
$s="select a.name, price, offer_price, b.quantity, b.user_id from product a join order_products b on b.product_id = a.id where b.order_id = $id and b.status = 2";
$r=$dbc->query($s);

$s1 = "select name from user_registration a join orders b on b.user_id = a.id where b.id = $id";
$r1=$dbc->query($s1);
$rs1=$dbc->fetch($r1);

$s2 = "select ship from billing where order_id = $id";
$r2=$dbc->query($s2);
$rs2=$dbc->fetch($r2);


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

$html.='<table width="100%" ><tr><td></td><td align="center" style="font-size:12"><b>Cash Bill</b></td>
<td align="right" style="font-size:10"><br><br></td></tr></table>';


$html.='<table width="100%" ><tr><td></td><td align="center"><h1>Margin Free Market</h1></td>
<td align="right" style="font-size:10"><br><br><br><br><b>'.date('Y-m-d h:i:s').'</b></td></tr></table>';

$html.='<br><b>Name : '.$rs1['name'].'</b>';
$i=1;


$html.='<br><br><table width="100%" border="1" cellpadding="10">
<tr align="center" height="15">
<th width="12%"><b>Sl No.</b></th>
<th width="22%"><b>Particulars</b></th>
<th width="22%"><b>Quantity</b></th>
<th width="22%"><b>Unit Price</b></th>
<th width="22%"><b>Amount</b></th></tr>';
while($rs=$dbc->fetch($r))
{
	if(!empty($rs['offer_price']))
	{ $rs['price'] = $rs['offer_price']; }
	
	$html.='<tr align="center">
		<td>'.$i.'</td>
		<td>'.$rs['name'].'</td>
		<td>'.$rs['quantity'].'</td>
		<td>'.$rs['price'].'</td>
		<td>INR. '.number_format($rs['price'] * $rs['quantity'], 2).'</td></tr>';
		$i++;
		$amount+= $rs['price'] * $rs['quantity']; }
		
$ship = $rs2['ship'];
$html.='<tr><td colspan="4" align="center">Shipping</td><td align="center">'.$ship.'</td></tr>';


$amount = $amount + trim($ship, "INR., "); 
$html.='<tr><td colspan="4" align="center">Total Amount</td><td align="center">INR. '.number_format($amount,2).'</td></tr>';

	
$html.='</table>';

$pdf->writeHTML($html, true, 0, true, 0);

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdfname="Bill.pdf";
$pdf->Output($pdfname, 'I'); 
?>