<?php
	include_once("class/dbc_class.php");
	$dbc=new Dbc;
$id=$_REQUEST['id'];

$select01 = "select * from product where id = '$id'";
$query01 = $dbc -> query($select01);
$array01 = $dbc -> fetch($query01);

?>

 <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="administrator.php"><span class="d-icon"><i class="fi-home"></i></span></a>
		 	<a href="administrator.php?option=manage_products">MANAGE PRODUCTS</a>
		 		<a class="current" href="#">Update Stock</a>
		 </nav>
		         
      </div>
     </div>

<div class="order_results">
      <div class="hd_con" style="float:left; width:100%;">
        <h3> <?php echo $array01['name'] ?></h3>
      </div>
     <div class="columns">
      	
       		<div class="small_wrap">
       			<div class="row">
<div class="form_bg_con">
          <div id="contact-area">
            <ul class="formBox">
              <li class="form_top_hed"> </li>
              <form action="administrator.php?option=upd_stock" method="post"  id="update_stock" name="update_stock">

                 <li class="form_cnt_con">
                  <label class="formLabels"> Stock left: </label>
                  <input type="text" name="cur_stock" id="cur_stock" class="formTextBox" value="<?php echo $array01['quantity']; ?>" readonly/>
                  <div class="form_btm_line"></div>
                </li>
				
                 <li class="form_cnt_con">
                  <label class="formLabels"> New Stock Count: </label>
                  <input type="text" name="new_stock" id="new_stock" class="formTextBox" value="<?php ?>" />
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
 var frmvalidator = new Validator("update_stock");
 frmvalidator.addValidation("new_stock","req","Please enter new stock");
 frmvalidator.addValidation("new_stock","num","Please enter numbers only");
  </script>