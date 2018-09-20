<?php
session_start();
include_once("../../class/dbc_class.php");
$dbc=new Dbc;

$cat = $_POST['cat']; 
$select01 = "select * from category where main_id='$cat'";
$query01 = $dbc -> query($select01);
$count=$dbc->getNumRows($query01);
if($count > 0) {
?>
<select class="srch_txt" name="search_subcat">
<?php while($array01 = $dbc -> fetch($query01)) { ?>
<option value="<?php echo $array01['id']; ?>"><?php echo $array01['name']; ?></option>
<?php } ?>
</select>
<?php
}
?>