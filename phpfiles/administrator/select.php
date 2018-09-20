<?php
include("../../class/dbc_class.php");
$dbc=new Dbc;
$set=$_POST['sect'];
$sql="select * from category";
$res=$dbc->query($sql);
if($set=='Category')
{
	?>
	<select style="width :24%" name="cat" id="cat" class="formTextBox"><option value="">--Select--</option>
	<?php
	while($row=$dbc->fetch($res))
	{
		?>
		<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
		<?php 
	}
	?>
	</select>
	<?php 
}
if($set=='Product')
{
?>
<input type="text" name="product_name" id="product_name" class="formTextBox" />
<?php
}
?>