<?php
include_once("class/dbc_class.php");
	$dbc=new Dbc;
$id=$_REQUEST['id'];
$s="select * from category where id='$id' ";
$q=$dbc->query($s);
$row=$dbc->fetch($q);
?>

 <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="administrator.php"><span class="d-icon"><i class="fi-home"></i></span></a>
		 	<a href="administrator.php?option=manage_category">Manage Category</a>
		 		<a class="current" href="#">Edit Category</a>
		 </nav>
		         
      </div>
     </div>

<div class="order_results">
      <div class="hd_con" style="float:left; width:100%;">
        <h3> Edit Category</h3>
      </div>

     <div class="columns">
      	
       		<div class="small_wrap">
       			<div class="row">
<div class="form_bg_con">
          <div id="contact-area">
            <ul class="formBox">
              <li class="form_top_hed"> </li>
              <form action="administrator.php?option=update_category" method="post"  id="create_category" name="create_category">
               
               
               <li class="form_cnt_con">
                  <label class="formLabels">Main Category<span class="redText">*</span></label>
				    <select  name="main_category" id="main_category" class="formTextBox" />
					
				 <?php
				 $s2="select * from main_category ";
				$q2=$dbc->query($s2);
				 while($row2=$dbc->fetch($q2))
				 {
					?>
					 <option value="<?php echo $row2['id'];?>" <?php if($row['main_id']==$row2['id']){ ?> selected <?php } ?> ><?php echo $row2['category'];?></option>
				 <?php
				 }
				 ?>
				  </select><span id="count"></span>
				  
                  <div class="form_btm_line"></div>
                </li>
                    <li class="form_cnt_con">
                  <label class="formLabels">Category name<span class="redText">*</span></label>
                  <input type="text" name="category_name" id="category_name" class="formTextBox" value="<?php echo $row['name'];?>" />
                  <div class="form_btm_line"></div>
                </li>
                 <li class="form_cnt_con">
                  <label class="formLabels">Description<span class="redText">*</span></label>
                  <textarea style="height:100px" name="description" id="description" class="formTextBox" value="<?php echo $row['description'];?>"><?php echo $row['description'];?></textarea>
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
 var frmvalidator = new Validator("create_category");
 frmvalidator.addValidation("category_name","req","Please enter category name");
  var frmvalidator = new Validator("create_category");
 frmvalidator.addValidation("description","req","Please enter category description");

 
  </script>
 
  
  