<?php include_once('includes/header_links.php'); ?>	
	
	
<title>Forgot Password </title>
 <meta charset="UTF-8"> 
	
	<div class="container forgt_pwd_page">
	
	<?php include_once('includes/header_content.php'); ?>		
	<?php include_once('res_menu.php'); ?>	
	<section class="content_section_main login_page forgotpwd_page">
			<div class="row">
			<div class="large-9 columns">
				
		
		
        <div class="large-12 columns new_customer">
		<div id="content">  
          <div class="well">
            <h2>Forgot Your Password?</h2>
							<?php
							if(isset($_REQUEST['msg']))
							{
								
							$status = $_REQUEST['msg'];
							if($status == 'err')
							{
								echo "<div class='alert alert-warning'><p class='error_msg'>Sorry, this email id is not registered with us.</p></div>";
							}
							else if($status == 'suc')
							{
								echo "<div class='alert alert-success'><p class='succes_msg'>Account updated successfully, new password sent to your email id.</p></div>";
							}
							
							}
							?>
            <p class="log_cus_block_cus">Enter the e-mail address associated with your account. Click submit to have your password e-mailed to you.</p>
            <form method="post" id="forgot_form" action="phpfiles/user/forgot_pass.php">
			     <div class="form-group forgot_pwd">
                <label for="input-email" class="control-label large-3 columns">E-Mail ID</label>
                <input type="text" class="form-control  large-9 columns" id="input-email" placeholder="E-Mail Address" value="" name="email">
              </div>
            <input type="submit" class="btn btn-primary ctn_btn" value="Continue" name="continue"></div>
            </form>
        </div>
 
      </div>

		</div>
		<div class="large-3 columns">

	<?php include_once('includes/reg_accnt_sidebar.php'); ?>	
		</div>	
			

		</section>

	<?php include_once('includes/header_content.php'); ?>	
			
	</div>
	<?php include_once('includes/footer_module.php'); ?>	
	<?php include_once('includes/footer_content.php'); ?>	


<script src="js/jquery-2.1.0.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/validation.js"></script>
