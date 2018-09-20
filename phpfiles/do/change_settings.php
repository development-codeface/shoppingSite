<?php
include_once("class/dbc_class.php");
$dbc=new Dbc;
if(isset($_POST['submit']))
{
				
	
	$facebook=trim($_POST['facebook']);
	
	$youtube=trim($_POST['youtube']);
	
	$twitter=trim($_POST['twitter']);
	
	$googlep=trim($_POST['google']);
	
	$linkedin=trim($_POST['linkedin']);
	
	$instagram=trim($_POST['instagram']);
		


	
     $dbc->query("update settings set value='$facebook' where name='facebook'");
	
	$dbc->query("update settings set value='$twitter' where name='twitter'");
	
	$dbc->query("update settings set value='$googlep' where name='google'");
	
	$dbc->query("update settings set value='$linkedin' where name='linkedin'");
	
	$dbc->query("update settings set value='$youtube' where name='youtube'");
	
	$dbc->query("update settings set value='$instagram' where name='instagram'");
	
                echo"<script>alert('URLs updated successfully')</script>";				
				
                echo"<script>window.location='administrator.php?option=social_links'</script>";
}
?>