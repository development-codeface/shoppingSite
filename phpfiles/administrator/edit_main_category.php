<?php
include_once("class/dbc_class.php");
	$dbc=new Dbc;
$id=$_REQUEST['id'];
$s="select * from main_category where id='$id' ";
$q=$dbc->query($s);
$row=$dbc->fetch($q);
?>

 <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="administrator.php"><span class="d-icon"><i class="fi-home"></i></span></a>
		 	<a href="administrator.php?option=manage_main_category">Manage main category</a>
		 		<a class="current" href="#">Edit Main Category</a>
		 </nav>
		         
      </div>
     </div>

<div class="order_results">
      <div class="hd_con" style="float:left; width:100%;">
        <h3> Edit Main Category</h3>
      </div>

     <div class="columns">
      	
       		<div class="small_wrap">
       			<div class="row">
<div class="form_bg_con">
          <div id="contact-area">
            <ul class="formBox">
              <li class="form_top_hed"> </li>
              <form action="administrator.php?option=update_main_category" method="post"  id="create_main_category" name="create_main_category">
               
                    <li class="form_cnt_con">
                  <label class="formLabels">Category name<span class="redText">*</span></label>
                  <input type="text" name="category_name" id="category_name" class="formTextBox" value="<?php echo $row['category'];?>" />
                  <div class="form_btm_line"></div>
                </li>
                
				<input type="hidden" name="hid_id" value="<?php echo $id;?>">
                
                <li class="form_cnt_con">
                  <label class="formLabels">&nbsp;</label>
                  <input type="submit" value="Submit"  name="create" id="submit-button"  class="button tiny radius success right" onClick="return DoCustomValidation('create_category')"/>
          
                </li>
              </form>
            </ul>
          </div>
        </div> </div></div>
		
		
	
				
 <script  language="javascript" type="text/javascript">
 var frmvalidator = new Validator("create_main_category");
 frmvalidator.addValidation("category_name","req","Please enter category name");

 
  </script>
 
  
  