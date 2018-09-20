<?php
include_once("class/dbc_class.php");
$dbc=new Dbc;
$user=$_SESSION['adminusername'];


?>
<script type="text/javascript" src="js/gen_validatorv31.js"></script>
<script type="text/javascript">
 function DoCustomValidation(frmname)
{
	
  var frm = document.forms[frmname];
 
  if((frm.new_password.value != frm.confirm_password.value))
  {
    alert('The New Password and Confirm password do not match!');
	
	    return false;
  }
  else
  {
  
        return true; 
   }
}
</script>

<script src="js/jquery1.8.min.js"></script>
<script type="text/javascript">
     
		check=function()
		 {
		 	
	            var old_password= $("#old_password").val();	            				
			    $.post("phpfiles/administrator/check_password.php",{old_password:old_password},function(data)
	             {
	             	
		           $("#count").html(data);	
				
	             });
         }
</script>
<?php include("phpfiles/do/reset_password.php"); ?>
 <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="administrator.php"><span class="d-icon"><i class="fi-home"></i></span></a>
		 		<a class="current" href="#">change password</a>
		 </nav>
		         
      </div>
     </div>

  <div class="order_results">
      <div class="hd_con" style="float:left; width:100%;">
        <h3> Change Password</h3>
      </div>
     <div class="columns">
      	
       		<div class="small_wrap">
       			<div class="row">
<div class="form_bg_con">
          <div id="contact-area">
            <ul class="formBox">
              <li class="form_top_hed"> </li>
              <form action="" method="post"  id="password_change" name="password_change">
                <li class="form_cnt_con">
                  <label class="formLabels">User Name<span class="redText">*</span></label>
                  <input type="text" name="user_name" id="user_name" class="formTextBox" value="<?php echo $user;?>" readonly="readonly"/>
                  <div class="form_btm_line"></div>
                </li>
                    <li class="form_cnt_con">
                  <label class="formLabels">Current Password<span class="redText">*</span></label>
                  <input type="password" name="old_password" id="old_password" class="formTextBox" value="" onChange="check();"/><span id="count"></span>
                  <div class="form_btm_line"></div>
                </li>
                 <li class="form_cnt_con">
                  <label class="formLabels"> New Password<span class="redText">*</span></label>
                  <input type="password" name="new_password" id="new_password" class="formTextBox" value=""/>
                  <div class="form_btm_line"></div>
                </li>
                 <li class="form_cnt_con">
                  <label class="formLabels"> Confirm Password<span class="redText">*</span></label>
                   <input type="password" name="confirm_password" id="confirm_password" class="formTextBox" value=""/>
                  <div class="form_btm_line"></div>
                </li>
                <li class="form_cnt_con">
                  <div class="form_btm_line"></div>
                </li>
                
                <li class="form_cnt_con">
                  <label class="formLabels">&nbsp;</label>
                  <input type="submit" value="Submit"  name="create" id="submit-button"  class="button tiny radius success right" onClick="return DoCustomValidation('password_change')"/>
          
                </li>
              </form>
            </ul>
          </div>
        </div> </div></div>
                
          <script  language="javascript" type="text/javascript">
 var frmvalidator = new Validator("password_change");
 frmvalidator.addValidation("old_password","req","Please enter the old password");
  var frmvalidator = new Validator("password_change");
 frmvalidator.addValidation("new_password","req","Please enter the news password");
var frmvalidator = new Validator("password_change");
 frmvalidator.addValidation("confirm_password","req","Please enter the confirm password");

 
  </script>