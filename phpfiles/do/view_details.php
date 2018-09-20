<?php
include("../../class/dbc_class.php");
$dbc = new Dbc;
if(isset($_REQUEST['id']))
{
$id = $_REQUEST['id'];
$select01 = "SELECT * FROM product where id = $id";
$query01 = $dbc -> query($select01);
?>
<table  style="border: 1px solid rgb(221, 221, 221); width: 429px;" align="center">
	<?php 
while($array01 = $dbc -> fetch($query01))
{?>
	<tr style="width: 428px; float: left; padding-bottom: 4px; padding-top: 4px; margin-bottom: 3px; border-bottom: 1px solid rgb(221, 221, 221);"> 
    <td width="170" style="color: rgb(85, 85, 85); font-family: arial; font-weight: normal; font-size: 13px;"><strong></strong></td>
    <td width="171" style="color: rgb(85, 85, 85); font-family: arial; font-size: 13px;">
    	<?php
    	$select03 = "SELECT thumb_image FROM product_image where product_id = $array01[id]";
    	$query03 = $dbc -> query($select03);
    	$array03 = $dbc -> fetch($query03);
    	?><img src="../../<?php echo $array03['thumb_image']; ?>" /></td>
</tr>
<tr style="width: 428px; float: left; padding-bottom: 4px; padding-top: 4px; margin-bottom: 3px; border-bottom: 1px solid rgb(221, 221, 221);"> 
    <td width="170" style="color: rgb(85, 85, 85); font-family: arial; font-weight: normal; font-size: 13px;"><strong>Name</strong></td>
    <td width="171" style="color: rgb(85, 85, 85); font-family: arial; font-size: 13px;"><?php echo $array01['name']; ?></td>
</tr>
<tr style="width: 428px; float: left; padding-bottom: 4px; padding-top: 4px; margin-bottom: 3px; border-bottom: 1px solid rgb(221, 221, 221);"> 
    <td width="170" style="color: rgb(85, 85, 85); font-family: arial; font-weight: normal; font-size: 13px;"><strong>Sub category</strong></td>
    <td width="171" style="color: rgb(85, 85, 85); font-family: arial; font-size: 13px;">
    	<?php
    	$select02 = "SELECT name from sub_category where id='$array01[subcategory_id]'";
    	$query02 = $dbc -> query($select02);
    	$array02 = $dbc -> fetch($query02);
		echo $array02['name'];
    	?></td>
</tr>
<tr style="width: 428px; float: left; padding-bottom: 4px; padding-top: 4px; margin-bottom: 3px; border-bottom: 1px solid rgb(221, 221, 221);"> 
    <td width="170" style="color: rgb(85, 85, 85); font-family: arial; font-weight: normal; font-size: 13px;"><strong>Code</strong></td>
    <td width="171" style="color: rgb(85, 85, 85); font-family: arial; font-size: 13px;"><?php echo $array01['product_code']; ?></td>
</tr>
<tr style="width: 428px; float: left; padding-bottom: 4px; padding-top: 4px; margin-bottom: 3px; border-bottom: 1px solid rgb(221, 221, 221);"> 
    <td width="170" style="color: rgb(85, 85, 85); font-family: arial; font-weight: normal; font-size: 13px;"><strong>Description</strong></td>
    <td width="171" style="color: rgb(85, 85, 85); font-family: arial; font-size: 13px;"><?php echo $array01['description']; ?></td>
</tr>
<tr style="width: 428px; float: left; padding-bottom: 4px; padding-top: 4px; margin-bottom: 3px; border-bottom: 1px solid rgb(221, 221, 221);"> 
    <td width="170" style="color: rgb(85, 85, 85); font-family: arial; font-weight: normal; font-size: 13px;"><strong>Price</strong></td>
    <td width="171" style="color: rgb(85, 85, 85); font-family: arial; font-size: 13px;">INR. <?php echo $array01['price']; ?></td>
</tr>
<?php if(!empty($array01['offer_price'])) {?>
<tr style="width: 428px; float: left; padding-bottom: 4px; padding-top: 4px; margin-bottom: 3px; border-bottom: 1px solid rgb(221, 221, 221);"> 
    <td width="170" style="color: rgb(85, 85, 85); font-family: arial; font-weight: normal; font-size: 13px;"><strong>Offer Price</strong></td>
    <td width="171" style="color: rgb(85, 85, 85); font-family: arial; font-size: 13px;">INR. <?php echo $array01['offer_price']; ?></td>
</tr><?php } ?>
<tr style="width: 428px; float: left; padding-bottom: 4px; padding-top: 4px; margin-bottom: 3px; border-bottom: 1px solid rgb(221, 221, 221);"> 
    <td width="170" style="color: rgb(85, 85, 85); font-family: arial; font-weight: normal; font-size: 13px;"><strong>Stocks left</strong></td>
    <td width="171" style="color: rgb(85, 85, 85); font-family: arial; font-size: 13px;"><?php echo $array01['quantity']; ?> pieces</td>
</tr>
<tr style="width: 428px; float: left; padding-bottom: 4px; padding-top: 4px; margin-bottom: 3px"> 
    <td width="170" style="color: rgb(85, 85, 85); font-family: arial; font-weight: normal; font-size: 13px;"><strong>Added on</strong></td>
    <td width="171" style="color: rgb(85, 85, 85); font-family: arial; font-size: 13px;"><?php echo $array01['added_date']; ?></td>
</tr>
	<?php
}
?>
</table>
<?php } ?>