<?php include_once('includes/header_links.php'); 

if(empty($_SESSION['onlineuser']))
{?>	
	
<title>Login </title>
 <meta charset="UTF-8"> 
	
	<div class="container logn_page">
	
	<?php include_once('includes/header_content.php'); ?>	
	<?php include_once('res_menu.php'); ?>	
	<section class="content_section_main login_page">
			<div class="row">
			<div class="large-9 columns">
				
		<div id="content">  
		
        <div class="large-6 columns new_customer">
          <div class="well">
            <h2>New Customer</h2>
            <p><strong>Register Account</strong></p>
            <p class="log_cus_block_cus">By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
            <a class="btn btn-primary ctn_btn" href="registration.php">Continue</a></div>
        </div>
        <div class="large-6 columns returning_customer">
          <div class="well">
            <h2>Returning Customer</h2>
            <p><strong>I am a returning customer</strong></p>
            							<?php
							if(isset($_REQUEST['msg']))
							{
								
							$status = $_REQUEST['msg'];
							if($status == 'log_err')
							{
								echo "<div class='alert alert-success'><p class='error_msg'>Error : Please try again.</p></div>";
							}
							
							}
							?>
            <form id="login_form" method="post" action="phpfiles/user/login.php">
              <div class="form-group">
                <label for="input-email" class="control-label large-3 columns">E-Mail ID</label>
                <input type="text" class="form-control  large-9 columns" id="input-email" placeholder="E-Mail Address" name="email" >
              </div>
              <div class="form-group">
                <label for="input-password" class="control-label large-3 columns">Password</label>
                <input type="password" class="form-control large-9 columns" id="input-password" placeholder="Password" name="password" >
               </div>
			         <div class="form-group frgt_pwd">
			    <a href="forgot_pwd.php" class="ctn_btn2">Forgotten Password ?</a>
            
			  </div>
			     <div class="form-group login_block_cus_1">
			  
			     <input type="submit" class="btn btn-primary ctn_btn" value="Login" name="login"></div>
           
			  </div>
			 
			  
                          </form>
          </div>
        </div>
     
      </div>
		<div class="large-3 columns">

	<?php include_once('includes/reg_accnt_sidebar.php'); ?>	
		</div>	
			

		</div>

		</section>

	<?php include_once('includes/header_content.php'); ?>	
			
	</div>
	<?php include_once('includes/footer_module.php'); ?>	
	<?php include_once('includes/footer_content.php'); } else { echo '<script>window.location = "personal_details.php"</script>'; } ?>	



<script src="js/jquery-2.1.0.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/validation.js"></script>
