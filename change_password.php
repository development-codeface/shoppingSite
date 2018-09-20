<?php include_once('includes/header_links.php');
if($_SESSION['onlineuser'] == '')
	{
		echo "<script>window.location = 'index.php'</script>";
	}

 ?>	
	
	
<title>Change Password </title>
 <meta charset="UTF-8"> 
	
	<div class="container change_pasword">
	
	<?php include_once('includes/header_content.php'); ?>	
	<?php include_once('res_menu.php'); ?>	
	<section class="content_section_main login_page">
			<div class="row">
			<div class="large-9 columns">
				
		<div id="content">  
		

        <div class="large-12 columns returning_customer">
          <div class="well">
            <h2>Change Password</h2>						<?php
							if(isset($_REQUEST['msg']))
							{
								
							$status = $_REQUEST['msg'];
							if($status == 'err')
							{
								echo "<div class='alert alert-warning'><p class='error_msg'>ERROR : Please try again.</p></div>";
							}
							else if($status == 'suc')
							{
								echo "<div class='alert alert-success'><p class='succes_msg'>Password updated successfully.</p></div>";
							}
							
							}
							?>

            <p><strong></strong></p>
            <form id="password_form" method="post" action="phpfiles/user/update_pass.php" onsubmit="return cpass()">
              <div class="form-group">
                <label for="input-email" class="control-label large-3 columns">Current Password</label>
                <input type="password" class="form-control  large-9 columns" id="input-current" placeholder="Password" value="" name="current_password" required="" onblur="ch_pass()">
                <label id="error1"></label>
              </div>
              <div class="form-group">
                <label for="input-email" class="control-label large-3 columns">New Password</label>
                <input type="password" class="form-control  large-9 columns" id="input-new" placeholder="Password" value="" required="" name="new_password">
              </div>
              <div class="form-group">
                <label for="input-password" class="control-label large-3 columns">Confirm Password</label>
                <input type="password" class="form-control large-9 columns" id="input-confirm" placeholder="Password" value="" required="" name="confirm_password">
               </div>
                <label id="error2"></label>
	
			     <div class="form-group login_block_cus_1">
			   
              <input type="submit" class="btn btn-primary ctn_btn" value="Change" name="update_pass">
			  </div>
			 
			  
                          </form>
          </div>
        </div>
     
      </div>

		</div>
		<div class="large-3 columns">
	<?php include_once('includes/myaccount_sidebar.php'); ?>	
		</div>	
			

		</section>

	<?php include_once('includes/header_content.php'); ?>	
			
	</div>
	<?php include_once('includes/footer_module.php'); ?>	
	<?php include_once('includes/footer_content.php'); ?>	

 <script src="js/jquery-2.1.0.min.js"></script>   
<script src="js/change_pass.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/validation.js"></script>

