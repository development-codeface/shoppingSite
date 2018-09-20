<?php
	include_once("class/dbc_class.php");
	$dbc=new Dbc;
$id=$_REQUEST['id'];
$s="select * from sub_category where id='$id'";
$q=$dbc->query($s);
$row=$dbc->fetch($q);
$cid=$row['category_id'];
// $s1="select * from category where id='$cid'";
// $q1=$dbc->query($s1);
// $row1=$dbc->fetch($q1);

 $s_cat="select * from category where id='$row[category_id]'";
$q_cat=$dbc->query($s_cat);
$r_cat=$dbc->fetch($q_cat);
 
$s_main="select * from main_category where id='$r_cat[main_id]'";
$q_main=$dbc->query($s_main);
$r_main=$dbc->fetch($q_main);

$s2="select * from category ";
$q2=$dbc->query($s2);
?>

<script type="text/javascript">
	function category() {
		var s1 = $("#main_cat").val();
		$.post("phpfiles/administrator/category.php", {
			sub2 : s1
		}, function(data) {
			$("#category_name").html(data);
		});
	}
</script>

 <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="administrator.php"><span class="d-icon"><i class="fi-home"></i></span></a>
		 	<a href="administrator.php?option=manage_subcategory">Manage Subcategory</a>
		 		<a class="current" href="#">Edit subcategory</a>
		 </nav>
		         
      </div>
     </div>

<div class="order_results">
      <div class="hd_con" style="float:left; width:100%;">
        <h3> Edit Subcategory</h3>
      </div>
     <div class="columns">
      	
       		<div class="small_wrap">
       			<div class="row">
<div class="form_bg_con">
          <div id="contact-area">
            <ul class="formBox">
              <li class="form_top_hed"> </li>
              <form action="administrator.php?option=update_subcategory" method="post"  id="create_category" name="create_category">
              	
              	
              	 <li class="form_cnt_con">
                 <label class="formLabels">Main Category<span class="redText">*</span></label>
                 <select style="width: 60%" name="main_cat" id="main_cat" class="formTextBox"  onchange="category()"/>
                	<option value="<?php echo $r_main['id'];?>"  ><?php echo $r_main['category'];?></option>
				 <?php
				 $s1 = "select * from main_category";
				$q1 = $dbc -> query($s1);
				 while($row1=$dbc->fetch($q1))
				 {
				 ?>
				<option value="<?php echo $row1['id']; ?>" ><?php echo $row1['category']; ?></option>
				 <?php } ?>
				 </select>
                  <div class="form_btm_line"></div>
                </li>
                
                
                <li class="form_cnt_con">
                  <label class="formLabels">Category<span class="redText">*</span></label>
				    <select  name="category_name" id="category_name" class="formTextBox" />
					<option value="<?php echo $r_cat['id'];?>"><?php echo $r_cat['name'];?></option>
				 
				  </select><span id="count"></span>
				  
                  <div class="form_btm_line"></div>
                </li>
                    <li class="form_cnt_con">
                  <label class="formLabels">Sub Category<span class="redText">*</span></label>
                  <input type="text" name="subcategory_name" id="subcategory_name" class="formTextBox" value="<?php echo $row['name'];?>" />
                  <div class="form_btm_line"></div>
                </li>
                 <li class="form_cnt_con">
                  <label class="formLabels"> Description<span class="redText">*</span></label>
                  <textarea  name="description" id="description" class="formTextBox" value=""><?php echo $row['description'];?></textarea>
                  <div class="form_btm_line"></div>
                </li>
                 
                 
               <input type="hidden" name="hid_id" value="<?php echo $id;?>">
                
                <li class="form_cnt_con">
                  <label class="formLabels">&nbsp;</label>
                  <input type="submit" value="Submit"  name="screate" id="submit-button" class="button tiny radius success right" onClick="return DoCustomValidation('create_category')"/>
          
                </li>
              </form>
            </ul>
          </div>
        </div> </div></div>
	
<script  language="javascript" type="text/javascript">
 var frmvalidator = new Validator("create_category");
 frmvalidator.addValidation("subcategory_name","req","Please enter subcategory name");
  var frmvalidator = new Validator("create_category");
 frmvalidator.addValidation("description","req","Please enter subcategory description");
  </script>
  
 