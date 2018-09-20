<?php
include_once("class/dbc_class.php");
	$dbc=new Dbc;

?>

<script type="text/javascript">
	function category() {
		var s1 = $("#main_cat").val();
		if(s1) {
		$.post("phpfiles/administrator/category_select.php", {
			sub2 : s1
		}, function(data) {
			$("#category_name").html(data);
		});
		}
	}
</script>
 <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="administrator.php"><span class="d-icon"><i class="fi-home"></i></span></a>
		 		<a class="current" href="#">Add Subcategory</a>
		 </nav>
		         
      </div>
     </div>
<div class="order_results">
      <div class="hd_con" style="float:left; width:100%;">
        <h3>Add Subcategory</h3>
      </div>
     <div class="columns">
      	
       		<div class="small_wrap">
       			<div class="row">
<div class="form_bg_con">
          <div id="contact-area">
            <ul class="formBox">
              <li class="form_top_hed"> </li>
              <form action="administrator.php?option=ins_subcategory" method="post"  id="create_category" name="create_category">
              	
              	 	 <li class="form_cnt_con">
                 <label class="formLabels">Main Category<span class="redText">*</span></label>
                 <select style="width: 60%" name="main_cat" id="main_cat" class="formTextBox"  onchange="category()"/>
                 <option value="">--Select--</option>
				 <?php
				 $s1 = "select * from main_category ";
				$q1 = $dbc -> query($s1);
				 while($row1=$dbc->fetch($q1))
				 {
				 ?>
				<option value="<?php echo $row1['id']; ?>"><?php echo $row1['category']; ?></option>
				 <?php } ?>
				 </select>
                  <div class="form_btm_line"></div>
                </li>
                        
                        
                <li class="form_cnt_con">
                  <label class="formLabels">Category<span class="redText">*</span></label>
				   
				  
                  <select  name="category_name" id="category_name" class="formTextBox" value="" />
                  <option value="">--Select--</option>
				  
				  </select>
				  
                  <div class="form_btm_line"></div>
                </li>
                    <li class="form_cnt_con">
                  <label class="formLabels">Sub Category<span class="redText">*</span></label>
                  <input type="text" name="subcategory_name" id="subcategory_name" class="formTextBox" value="" />
                  <div class="form_btm_line"></div>
                </li>
                 <li class="form_cnt_con">
                  <label class="formLabels"> Description<span class="redText">*</span></label>
                  <textarea  name="description" id="description" class="formTextBox" value=""></textarea>
                  <div class="form_btm_line"></div>
                </li>
                 
           
                
                <li class="form_cnt_con">
                  <label class="formLabels">&nbsp;</label>
                  <input type="submit" value="Submit"  name="screate" id="submit-button"  class="button tiny radius success right" onClick="return DoCustomValidation('create_category')"/>
          
                </li>
              </form>
            </ul>
          </div>
        </div> </div></div></div></div>

  <script  language="javascript" type="text/javascript">
  var frmvalidator = new Validator("create_category");
 frmvalidator.addValidation("main_cat","req","Please select main category");	
	var frmvalidator = new Validator("create_category");
 frmvalidator.addValidation("category_name","req","Please select category");	  
 var frmvalidator = new Validator("create_category");
 frmvalidator.addValidation("subcategory_name","req","Please enter subcategory name");
  var frmvalidator = new Validator("create_category");
 frmvalidator.addValidation("description","req","Please enter subcategory description");

 
  </script>
  
 