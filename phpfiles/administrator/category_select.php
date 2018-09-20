<?php

//include("../../class/config.php");
include("../../class/dbc_class.php");
$dbc=new Dbc;
$e2=$_POST['sub2'];
$page=$_POST['page'];
$se="select * from category where main_id='$e2'";
$x=$dbc->query($se);
?>


<?php
if($page<>"")
{?>
	<option value="">--Select--</option>
<?php
}
while($c=$dbc->fetch($x))
{
?>
<option value="<?php echo $c['id'];?>"><?php echo $c['name'];?></option>
<?php

}
?>

