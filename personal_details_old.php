<?php include_once('includes/header_links.php'); ?>	
	
	
<title>Personal Details</title>
 <meta charset="UTF-8"> 
	
	<div class="container personal_detls">
		
	<?php include_once('includes/header_content.php'); 
	<?php include_once('res_menu.pphp'); 

	if(isset($_SESSION['onlineuser']))
	{
	$session = $_SESSION['onlineuser'];
 $select01 = "SELECT * FROM user_registration WHERE email = '$session'";
 $query01 = $dbc -> query($select01);
 $array01 = $dbc -> fetch($query01);
 
 			$select02 = "select * from pincode order by pincode";
			$query02 = $dbc -> query($select02);
 ?>	

	<section class="content_section_main">
			<div class="row">
			<div class="large-9 columns">
			<div id="content">
				<h2 class="page_title">Personal Information </h2>
		<?php
		
	
							if(isset($_REQUEST['msg']))
							{
								
							$status = $_REQUEST['msg'];
							if($status == 'err')
							{
								echo "<div class='alert alert-warning'><p class='error_msg'>Error : Please try again.</p></div>";
							}
							else if($status == 'suc')
							{
								echo "<div class='alert alert-success'><p class='succes_msg'>Account details updated successfully!</p></div>";
							}
							
							}
		?>
				<form class="form-horizontal reg_accnt"  method="post" action="phpfiles/user/update_account.php">
        <fieldset id="account">
          <legend>Your Personal Details</legend>
     
          <div class="form-group required">
            <label for="input-firstname" class="large-2 columns control-label">Name</label>
            <div class="large-10 columns">
              <input type="text" class="form-control" id="input-firstname" placeholder="First Name" value="<?php echo $array01['name']; ?>" name="username">
                          </div>
          </div>
       
          <div class="form-group required">
            <label for="input-email" class="large-2 columns control-label">E-Mail</label>
            <div class="large-10 columns">
              <input type="email" class="form-control" id="input-email" placeholder="E-Mail" value="<?php echo $array01['email']; ?>" name="email" readonly>
                          </div>
          </div>
          <div class="form-group required">
            <label for="input-telephone" class="large-2 columns control-label">Telephone</label>
            <div class="large-10 columns">
              <input type="tel" class="form-control" id="input-telephone" placeholder="Telephone" value="<?php echo $array01['phone']; ?>" name="telephone">
                          </div>
          </div>
      
                  </fieldset>
        <fieldset id="address">
          <legend>Your Address</legend>

          <div class="form-group">
            <label for="input-address-2" class="large-2 columns control-label">Address </label>
            <div class="large-10 columns">
              <input type="text" class="form-control" id="input-address-2" placeholder="Address" value="<?php echo $array01['address']; ?>" name="address">
            </div>
          </div>
          <div class="form-group required">
            <label for="input-city" class="large-2 columns control-label">City</label>
            <div class="large-10 columns">
              <input type="text" class="form-control" id="input-city" placeholder="City" value="<?php echo $array01['city']; ?>" name="city">
                          </div>
          </div>
          <div class="form-group required">
            <label for="input-city" class="large-2 columns control-label">District</label>
            <div class="large-10 columns">
              <input type="text" class="form-control" id="input-district" placeholder="District" value="<?php echo $array01['district']; ?>" name="district">
                          </div>
          </div>
          <div class="form-group required">
            <label for="input-postcode" class="large-2 columns control-label">Location</label>
            <div class="large-10 columns">
              <!-- <input type="text" class="form-control" id="input-postcode" placeholder="Post Code" value="<?php echo $array01['pincode']; ?>" name="pin"> -->
          <select name="pin" id="input-postcode" class="form-control">
              	<option value="">--Select--</option>
              	<?php while($array02 = $dbc -> fetch($query02)) { ?>
              		<option value="<?php echo $array02['pincode']; ?>" <?php if($array02['pincode'] == $array01['pincode']) echo 'selected'; ?>><?php echo $array02['pincode']; ?></option>
              	<?php } ?>
              	</select>
                          </div>
          </div>
		          
 
                    
        </fieldset>


        <div class="form-group required">
    <div class=" large-10 columns">
    <div ><div><div style="width: 304px; height: 78px;">
   
    	</div>
    	<textarea style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none;  display: none; " class="g-recaptcha-response" name="g-recaptcha-response" id="g-recaptcha-response"></textarea>
    	</div>
    	</div>
      </div>
  </div>
                <div class="buttons reg_form">
          <div class="pull-right">

            <input type="submit" class="btn btn-primary" value="Update Account" name="up_account">
          </div>
        </div>
              </form>




		</div>
		</div>

				<div class="large-3 columns">	
	<?php include_once('includes/myaccount_sidebar.php'); ?>	
		</div>	
		</section>

	<?php } include_once('includes/header_content.php'); ?>	
			
	</div>
		<?php include_once('includes/footer_module.php'); ?>
	<?php include_once('includes/footer_content.php'); ?>	



<script src="js/jquery-2.1.0.min.js"></script>


	
	
 
