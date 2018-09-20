<?php
	include_once("class/dbc_class.php");
	$dbc=new Dbc;

	$query = $dbc -> query("select * from shipping_charge");
	$array = $dbc -> fetch($query);

?>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/autoNumeric.js"></script>
<script type="text/javascript">
	jQuery(function($) {
		$('#amt').autoNumeric('init');
		$('#ship').autoNumeric('init');
	});
</script>
 <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="administrator.php"><span class="d-icon"><i class="fi-home"></i></span></a>
		 		<a class="current" href="#">Shipping</a>
		 </nav>
		         
      </div>
     </div>

<div class="order_results">
      <div class="hd_con" style="float:left; width:100%;">
        <h3> Shipping</h3>
      </div>
     <div class="columns">
      	
       		<div class="small_wrap">
       			<div class="row">Enter shipping charge & the total amount below which it is to be added.
<div class="form_bg_con">
          <div id="contact-area">
            <ul class="formBox">
              <li class="form_top_hed"> </li>
              <form action="administrator.php?option=upd_ship" method="post"  id="update_ship" name="update_ship">

                 <li class="form_cnt_con">
                  <label class="formLabels"> Amount: </label>
                  <input type="text" value="<?php echo $array['amount']; ?>" name="amt" id="amt" class="formTextBox" data-d-group="2" data-a-sign="INR. " >
                  <div class="form_btm_line"></div>
                </li>
				
                 <li class="form_cnt_con">
                  <label class="formLabels"> Shipping Charge: </label>
                  <input type="text" value="<?php echo $array['shipping']; ?>" name="ship" id="ship" class="formTextBox" value="<?php ?>" data-d-group="2" data-a-sign="INR. " />
                  <div class="form_btm_line"></div>
                </li>
                 
                 
               <input type="hidden" name="hid_id" value="<?php echo $id;?>">
                
                <li class="form_cnt_con">
                  <label class="formLabels">&nbsp;</label>
                  <input type="submit" value="Submit"  name="upd_sub" id="submit-button" class="button tiny radius success right"/>
          
                </li>
              </form>
            </ul>
          </div>
        </div> </div></div>
  
 <script  language="javascript" type="text/javascript">
 var frmvalidator = new Validator("update_ship");
 frmvalidator.addValidation("amt","req","Please enter amount");
 var frmvalidator = new Validator("update_ship");
 frmvalidator.addValidation("ship","req","Please enter shipping charge");
  </script>