 <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="#"><span class="d-icon"><i class="fi-home"></i></span></a>
		 	<a href="administrator.php">Dashboard</a>
		 		<a class="current" href="#">Cancel Order</a>
		 </nav>
		         
      </div>
     </div>
<div class="order_results">
      <div class="hd_con" style="float:left; width:100%;">
        <h3>Cancel Order</h3>
      </div>

     <div class="columns">
      	
       		<div class="small_wrap">
       			<div class="row">
<div class="form_bg_con">
          <div id="contact-area">
            <ul class="formBox">
              <li class="form_top_hed"> </li>
              <form action="administrator.php?option=ins_cancel_order" method="post"  id="cancel_order" name="cancel_order">               
                  <li class="form_cnt_con">
                  <label class="formLabels">Give a reason<span class="redText">*</span></label>
                  <?php
                  if(isset($_GET['product']))
				  { $id = $_GET['product']; ?> <input type="hidden" name="product_id" id="product_id" value="<?php echo $id; ?>" /> <?php }
				  if(isset($_GET['id']))
				  { $product = $_GET['id']; ?> <input type="hidden" name="order_id" id="order_id" value="<?php echo $product; ?>" /> <?php }
                  ?>
                  <input type="text" name="cancel_reason" id="cancel_reason" class="formTextBox" value="" />
                  <div class="form_btm_line"></div>
                </li>
                                                
                <li class="form_cnt_con">
                  <label class="formLabels">&nbsp;</label>
                  <input type="submit" value="Submit"  name="reason" id="submit-button"  class="button tiny radius success right" onClick="return DoCustomValidation('create_category')"/>          
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
 var frmvalidator = new Validator("cancel_order");
 frmvalidator.addValidation("cancel_reason","req","Please enter the reason for cancelling");
 </script>  