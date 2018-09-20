<?php include_once('includes/header_links.php');

if(empty($_SESSION['onlineuser']))
{?>	
	
	
<title>Registration</title>
 <meta charset="UTF-8"> 
	
	<div class="container reg-strn">
	
	<?php include_once('includes/header_content.php'); ?>	
	<?php include_once('res_menu.php'); ?>	
	<section class="content_section_main reg_form">
			<div class="row">
			<div class="large-9 columns">
			<div id="content">
				<h2 class="page_title">Register Account</h2>
							<?php
							if(isset($_REQUEST['msg']))
							{
								
							$status = $_REQUEST['msg'];
							if($status == 'err')
							{
								echo "<div class='alert alert-success '><p class='error_msg'>Email id you provided has already been taken. Please use another one.</p></div>";
							}
							else if($status == 'suc')
							{
								echo "<div class='alert alert-warning'><p class='succes_msg'>Account created successfully, activation link send to your email.</p></div>";
							}
							
							}
							?>
				<form class="form-horizontal reg_accnt" id="register_form" method="post" action="phpfiles/user/registration.php">
        <fieldset id="account">
          <legend>Enter your details.</legend>
     
          <div class="form-group required">
            <label for="input-firstname" class="large-2 small-3 medium-2 columns control-label">Name :</label>
            <div class="large-10 small-10 medium-10 columns">
              <input type="text" class="form-control" id="input-firstname" name="name" >
                          </div>
          </div>
       
          <div class="form-group required">
            <label for="input-email" class="large-2 small-3 medium-2 columns control-label">E-Mail :</label>
            <div class="large-10 small-10 medium-10 columns">
              <input type="email" class="form-control" id="input-email" name="email" onchange="ch_email()" >
                          </div>
          </div>
		            <div class="form-group required">
            <label for="input-password" class="large-2 small-3 medium-2 columns control-label">Password :</label>
            <div class="large-10 small-10 medium-10 columns">
              <input type="password" class="form-control" id="input-password" name="password">
                          </div>
          </div>
          <div class="form-group required">
            <label for="input-telephone" class="large-2 small-3 medium-2 columns control-label">Telephone :</label>
            <div class="large-10 small-10 medium-10 columns">
              <input type="tel" class="form-control" id="input-telephone" name="telephone" >
                          </div>
          </div>
		  
                <div class="buttons reg_form">
          <div class="pull-right large-12 columns right  "><!-- I have read and agree to the <a class="agree" href=""><b>Privacy Policy</b> --></a>                      
		  <!-- <input type="checkbox" value="1" name="agree"> -->
                       
            <input type="submit" class="btn btn-primary" value="Continue" name="create">
          </div>
        </div>
		  
      
                  </fieldset>



              </form>




		</div>
		</div>
		<div class="large-3 columns">

	<?php include_once('includes/reg_accnt_sidebar.php'); ?>	
		</div>	
			

		</section>

	<?php include_once('includes/header_content.php'); ?>	
			
	</div>
		<?php include_once('includes/footer_module.php'); ?>
	<?php include_once('includes/footer_content.php'); } else { echo '<script>window.location = "personal_details.php"</script>'; } ?>	


<script src="js/jquery-2.1.0.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/validation.js"></script>


