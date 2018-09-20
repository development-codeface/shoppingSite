 <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="administrator.php"><span class="d-icon"><i class="fi-home"></i></span></a>
		 		<a class="current" href="#">Add Location</a>
		 </nav>
		         
      </div>
     </div>
<div class="order_results">
      <div class="hd_con" style="float:left; width:100%;">
        <h3>Add Locations</h3>
      </div>

     <div class="columns">
      	
       		<div class="small_wrap">
       			<div class="row">
<div class="form_bg_con">
          <div id="contact-area">
            <ul class="formBox">
              <li class="form_top_hed"> </li>
              <form action="administrator.php?option=ins_location" method="post"  id="add_pcode" name="add_pcode">               
                  <li class="form_cnt_con">
                  <label class="formLabels">Location<span class="redText">*</span></label>
                  <input type="text" name="location" id="location" class="formTextBox" value="" />
                  <div class="form_btm_line"></div>
                </li>
                                                
                <li class="form_cnt_con">
                  <label class="formLabels">&nbsp;</label>
                  <input type="submit" value="Submit"  name="create" id="submit-button"  class="button tiny radius success right" >          
                </li>
              </form>
            </ul>
          </div>
        </div> 
        </div>
        </div>
		        </div>
        </div>
				
<script  language="javascript" type="text/javascript">
var frmvalidator = new Validator("add_pcode");
frmvalidator.addValidation("location","req","Please enter a location name");
</script>  