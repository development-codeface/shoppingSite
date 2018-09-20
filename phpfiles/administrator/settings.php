<?php
include_once("class/dbc_class.php");
$dbc=new Dbc;

function loadsettings($name)
{

$resultssettings=mysql_query("select value from settings where name='$name'");

$settingsrow=mysql_fetch_row($resultssettings);
return $settingsrow[0];
}


?>

   <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="administrator.php"><span class="d-icon"><i class="fi-home"></i></span></a>
		 		<a class="current" href="#">settings</a>
		 </nav>
		         
      </div>

    </div>
    

  <div class="order_results">
  	
      <div class="hd_con" style="float:left; width:100%;">
        <h3>Basic Settings</h3>
      </div>
      
      
      <div class="columns">
      
	       <div class="small_wrap">
	       	
	       		<div class="row">
	       	
					<div class="form_bg_con">
				          <div id="contact-area">
				            <ul class="formBox">
				              <li class="form_top_hed">&nbsp;</li>
				              <form action="administrator.php?option=change_settings" method="post" id="project" name="project" enctype="multipart/form-data">
				               
				              
				          		 <li class="form_cnt_con">
				                  <label class="formLabels">Facebook <span class="redText">*</span></label>
				                   <input type="text" name="facebook"  id="facebook"  class="textareafield" value="<?php echo loadsettings(facebook); ?>"/>
				                  <div class="form_btm_line"></div>
				                </li> 
								
								 <li class="form_cnt_con">
				                  <label class="formLabels">Twitter <span class="redText">*</span></label>
				                   <input type="text" name="twitter"  id="twitter"  class="textareafield" value="<?php echo loadsettings(twitter); ?>"/>
				                  <div class="form_btm_line"></div>
				                </li> 
								
								 <!-- <li class="form_cnt_con">
				                  <label class="formLabels">Linkedin <span class="redText">*</span></label>
				                   <input type="text" name="linkedin"  id="linkedin"  class="textareafield" value="<?php echo loadsettings(linkedin); ?>"/>
				                  <div class="form_btm_line"></div>
				                </li>
								
								 <li class="form_cnt_con">
				                  <label class="formLabels">YouTube <span class="redText">*</span></label>
				                   <input type="text" name="youtube"  id="youtube"  class="textareafield" value="<?php echo loadsettings(youtube); ?>"/>
				                  <div class="form_btm_line"></div>
				                </li>  -->
								
								<li class="form_cnt_con">
				                  <label class="formLabels">Google Plus <span class="redText">*</span></label>
				                   <input type="text" name="google"  id="google"  class="textareafield" value="<?php echo loadsettings(google); ?>"/>
				                  <div class="form_btm_line"></div>
				                </li> 
				                
				                 <!-- <li class="form_cnt_con">
				                  <label class="formLabels">Instagram<span class="redText">*</span></label>
				                   <input type="text" name="instagram"  id="instagram"  class="textareafield" value="<?php echo loadsettings(instagram); ?>"/>
				                  <div class="form_btm_line"></div>
				                </li>  -->
				                
				               <li class="form_cnt_con">
				                      <div class="form_btm_line"></div>
				                    </li>
				                <li class="form_cnt_con">
				                  <label class="formLabels">&nbsp;</label>
				                  
				                  <input type="submit" value="Submit"  name="submit" id="submit-button"  class="button tiny radius success right" />
				          
				                </li>
				              </form>
				            </ul>
				          </div>
		         	</div>
		         
		         
		         </div>
		         
	        </div>
        
        </div>
        
        
    </div>

 