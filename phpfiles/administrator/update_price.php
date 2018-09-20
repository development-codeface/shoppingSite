<link href="../../css/admin.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="../../css/intervine.foundation.css" />

<script type="text/javascript" src="../../js/gen_validatorv31.js"></script>

<script src="../../js/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript" src="../../js/autoNumeric.js"></script>

<script type="text/javascript">
	jQuery(function($) {
		$('#old_password').autoNumeric('init');
	}); 
</script>

<?php
error_reporting(0);
include("../../class/dbc_class.php");
$dbc=new Dbc;
$id=$_REQUEST['id'];

$select01 = "select name,price from product where id='$id'";
$query01 = $dbc -> query($select01);
$array01 = $dbc -> fetch($query01);

?>

<div class="order_results">
      <div class="hd_con" style="float:left; width:100%;">
        <h3> <?php echo $array01['name']; ?></h3>
      </div>
     <div class="columns">
      	
       		<div class="small_wrap">
       			<div class="row">
<div class="form_bg_con">
          <div id="contact-area">
            <ul class="formBox">
              <li class="form_top_hed"> </li>
              <form action="" method="post" id="password_change" name="password_change">
                    <li class="form_cnt_con">
                  <label class="formLabels">Current Price<span class="redText">*</span></label>
                  <input type="text" name="old_pass" id="old_pass" class="formTextBox" value="<?php echo $array01['price']; ?>" readonly>
                  <div class="form_btm_line"></div>
                </li>
                    <li class="form_cnt_con">
                  <label class="formLabels">New Price<span class="redText">*</span></label>
                  <input type="text" name="old_password" id="old_password" class="formTextBox" value="" data-d-group="2" data-a-sign="INR. "><span id="count"></span>
                  <div class="form_btm_line"></div>
                </li>
                <li class="form_cnt_con">
                  <div class="form_btm_line"></div>
                </li>
                
                <li class="form_cnt_con">
                  <label class="formLabels">&nbsp;</label>
                  <input type="submit" value="Submit" name="create" id="submit-button" class="button tiny radius success right" onclick="return DoCustomValidation('password_change')">
          
                </li>
              </form>
            </ul>
          </div>
        </div> </div></div>
                
          <script language="javascript" type="text/javascript">
 var frmvalidator = new Validator("password_change");
 frmvalidator.addValidation("old_password","req","Please enter product price");
  </script></div></div>
 
 <?php
  if (isset($_POST['create']))
{
	$price=trim($_POST['old_password'], "INR., ");

							$update01 = "update product set price = '$price' where id = '$id'";
							$query02 = $dbc -> query($update01);
							
							$update02 = "update slider_image set price = '$price' where product_id = '$id'";
							$query03 = $dbc -> query($update02);

						echo"<script>alert('Price updated successfully');</script>"; ?>
				<script>
				window.onunload = refreshParent;
				function refreshParent() {
				window.close();
				window.opener.location.reload();
				}
				</script>";
						<?php
						echo"<script>window.location='update_price.php?id=$id'</script>";
									
							
}