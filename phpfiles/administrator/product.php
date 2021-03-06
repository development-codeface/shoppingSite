<?php
include_once ("class/dbc_class.php");
$dbc = new Dbc;
//include("js/jquery1.8.min.js");
?>
<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/autoNumeric.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript">
	jQuery(function($) {
		$('#product_price').autoNumeric('init');
		$('#offer_price').autoNumeric('init');
		$('#product_shipping').autoNumeric('init');
		$('#purchse_amount').autoNumeric('init');
	});
</script>

<script type="text/javascript">
	function category() {
		var s1 = $("#main_cat").val();
		var page = 'product';
		$.post("phpfiles/administrator/category_select.php", {
			sub2 : s1,
			page : page
		}, function(data) {
			$("#cat_id").html(data);
		});
	}
</script>

 <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="administrator.php"><span class="d-icon"><i class="fi-home"></i></span></a>
		 		<a class="current" href="#">add product</a>
		 </nav>
		         
      </div>
     </div>
   
      <div class="order_results">
      <div class="hd_con" style="float:left; width:100%;">
      <h3>Add Product</h3>
      </div>
     <div class="columns">
      	
       		<div class="large_wrap">
       			<div class="row">
		<div class="form_bg_con" style="margin-right:10px;">
          <div id="contact-area">
            <ul class="formBox">
              <li class="form_top_hed">&nbsp;</li>
              <form action="administrator.php?option=ins_product" method="post"  id="create_product" name="create_product" enctype="multipart/form-data">
			  
			  
			  
			    <li class="form_cnt_con">
                  <label class="formLabels">Product code<span class="redText">*</span></label>
                  <input type="text" name="product_code" id="product_code" class="formTextBox" value="" onchange="pr_code();" />
                  <div class="form_btm_line"></div>
                </li>
                
                <li class="form_cnt_con">
                 <label class="formLabels">Main Category<span class="redText">*</span></label>
                 <select style="width: 60%" name="main_cat" id="main_cat" class="formTextBox" value="" onchange="category(); latest_image();"/>
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
                 <select style="width: 60%" name="cat_id" id="cat_id" class="formTextBox" value="" onchange="subcat()"/>
                 <option value="">--Select--</option>
				 </select>
                  <div class="form_btm_line"></div>
                </li>
				 <li class="form_cnt_con">
                  <label class="formLabels">Subcategory<span class="redText">*</span></label>
                  <select style="width: 60%" name="sub" id="sub" class="formTextBox" ><option value="">--Select--</option></select>
                  <div class="form_btm_line"></div>
                </li>
                
                 <!-- <li class="form_cnt_con">
                  <label class="formLabels">Language<span class="redText">*</span></label>
                  <select style="width: 60%" name="language" id="language" class="formTextBox"><option value="">--Select--</option>
                  	<option value="English">English</option>
                  	<option value="Hindi">Hindi</option>
                  	<option value="Malayalam">Malayalam</option>
                  </select>
                  <div class="form_btm_line"></div>
                </li> -->
                    <li class="form_cnt_con">
                  <label class="formLabels">Product name<span class="redText">*</span></label>
                  <input type="text" name="product_name" id="product_name" class="formTextBox" value="" onchange="pro_name(this.value);"/>
				   <input type="hidden" name="product" id="product" class=""/>
                  <div class="form_btm_line"></div>
                </li>
               
                     <!-- <li class="form_cnt_con">
                  <label class="formLabels">Author</label>
                  <input type="text" name="author" id="author" class="formTextBox" value="" />
                  <div class="form_btm_line"></div>
                </li> -->
                    <li class="form_cnt_con">
                  <label class="formLabels">Brand</label>
                  <input type="text" name="product_brand" id="product_brand" class="formTextBox" value="" onchange="brand_name(this.value);" />
				  <input type="hidden" name="brand" id="brand" class=""/>
                  <div class="form_btm_line"></div>
                </li>
                 <li class="form_cnt_con">
                  <label class="formLabels">Description<span class="redText">*</span></label>
                                    <div style="margin-left: 129px;">
                   <textarea name="desc" id="desc" class="textareafield ckeditor"></textarea> 
                   </div>
                  <div class="form_btm_line"></div>
                </li>
             
				
			
			<li class="form_cnt_con">
                 <input type="hidden" name="status" id="status" class="formTextBox" value="<?php echo '1'; ?>" />
                  <div class="form_btm_line"></div>
                </li>
				
				<li class="form_cnt_con">
                  <label class="formLabels">&nbsp;</label>
                  <input type="submit" value="Submit"  name="create" id="submit-button" class="button tiny radius success right" onClick="return get_val()"/>
          
                </li>
				</ul>
          </div>
        </div>
        
        
        
        <!-- 2nd form-->
        <div class="form_bg_con">
          <div id="contact-area">
            <ul class="formBox">
              <li class="form_top_hed">&nbsp;</li>
				
				    <!-- <li class="form_cnt_con">
                  <label class="formLabels">Total pages<span class="redText">*</span></label>
                  <input type="number" name="pages" id="pages" min="1" class="formTextBox" value="" />
                  <div class="form_btm_line"></div>
                </li> -->
               
               <li class="form_cnt_con">
                  <label class="formLabels">Product Image<span class="redText">*</span></label>
                 <input type="file" name="product_image[]" id="product_image" class="formTextBox" value="" onChange="img_count()" multiple/>
                  <div class="form_btm_line"></div>
                </li>
				<li class="form_cnt_con">
                   <label class="formLabels" style="font-size: 15px; width: 370px; text-align: center; color: rgb(255, 0, 0);margin-left:12%"></label>
                  <div class="form_btm_line"></div>
                </li>
                
				<li class="form_cnt_con">
                  <label class="formLabels">Purchase Amount<span class="redText">*</span></label>
                 <input type="text" name="purchse_amount" id="purchse_amount" class="formTextBox" value="" data-d-group="2" data-a-sign="INR. "/>
                  <div class="form_btm_line"></div>
                </li>
               
               	<li class="form_cnt_con">
                  <label class="formLabels">Price<span class="redText">*</span></label>
                 <input type="text" name="product_price" id="product_price" class="formTextBox" value="" data-d-group="2" data-a-sign="INR. "/>
                  <div class="form_btm_line"></div>
                </li>
				<li class="form_cnt_con">
                  <label class="formLabels">Offer Price</label>
                 <input type="text" name="offer_price" id="offer_price" class="formTextBox" value="" data-d-group="2" data-a-sign="INR. "/>
                  <div class="form_btm_line"></div>
                </li>
				<li class="form_cnt_con" style="display:none;">
                  <label class="formLabels">Shipping charge</label>
                 <input type="text" name="product_shipping" id="product_shipping" class="formTextBox" value="" data-d-group="2" data-a-sign="INR. "/>
                  <div class="form_btm_line"></div>
                </li>
				
				<li class="form_cnt_con">
                  <label class="formLabels">Quantity<span class="redText">*</span></label>
                 <input type="number" name="product_quantity" id="product_quantity" min="1" class="formTextBox" value="" />
                  <div class="form_btm_line"></div>
                </li>
                
                	<li class="form_cnt_con">
                  <label class="formLabels">Maximum Order Quantity<span class="redText">*</span></label>
                 <input type="number" name="max_order" id="max_order" min="1" class="formTextBox" value="" />
                  <div class="form_btm_line"></div>
                </li>
                
                
				<li class="form_cnt_con">
                  <label class="formLabels">Keywords<span class="redText">*</span></label>
                 <textarea name="product_kwords" id="product_kwords" class="formTextBox" rows="10" ></textarea>
                  <div class="form_btm_line"></div>
                </li><span id="latest_slider">
                 <li class="form_cnt_con">
                  <label class="formLabels">
                  
                  	<input type="checkbox" name="latest"  id="latest" value="latest"  onchange="slider();"/>
                  		
                  	</label> 
                  	<p style="color:#555555; font-size:14px; padding:5px;">Hot Deals</p>
               
                  <div class="form_btm_line"></div>
                </li></span>
                
                
                <input type="hidden" name="slider" id="slider" value="" />
               <li class="form_cnt_con">
                      <div class="form_btm_line"></div>
                    </li>
                
            
            </ul>
          </div>
        </div>
         </form>
        
        
        
        </div></div>
<script src="js/jquery1.8.min.js"></script>
<script  language="javascript" type="text/javascript">
	function get_val() {
		var flag = true;
		var m_cat = document.getElementById('main_cat').value;
		var category = document.getElementById('cat_id').value;
		var s_cat = document.getElementById('sub').value;
		var name = document.getElementById('product_name').value;
		// var author = document.getElementById('author').value;
		var code = document.getElementById('product_code').value;
		// var lang = document.getElementById('language').value;
		var desc = CKEDITOR.instances['desc'].getData();
		// var pgs = document.getElementById('pages').value;
		var pu_amount = document.getElementById('purchse_amount').value;
		var p_price = document.getElementById('product_price').value;
		var quant = document.getElementById('product_quantity').value;
		var max_order = document.getElementById('max_order').value;
		var key = document.getElementById('product_kwords').value;
		var num = /^[0-9]+$/;
		var num1 = /^[0-9]+$/;
		var img = document.getElementById('product_image').value;
		if (code == "") {
			alert("Please enter product code");
			document.getElementById('product_code').focus();
			flag = false;
		} else if (m_cat == "") {
			alert("Please select main category");
			document.getElementById('main_cat').focus();
			flag = false;
		} else if (category == "") {
			alert("Please select category");
			document.getElementById('cat_id').focus();
			flag = false;
		} else if (s_cat == "") {
			alert("Please select subcategory");
			document.getElementById('sub').focus();
			flag = false;
		} 
		// else if (lang == "") {
			// alert("Please select language");
			// document.getElementById('language').focus();
			// flag = false;
		// } 
		else if (name == "") {
			alert("Please enter product name");
			document.getElementById('product_name').focus();
			flag = false;
		} else if (desc == "") {
			alert("Please enter description");
			flag = false;
		} else if (img == "") {
			alert("Please upload product image");
			document.getElementById('product_image').focus();
			flag = false;
		} 
		// else if (pgs == "") {
			// alert("Please enter total no. of pages");
			// document.getElementById('pages').focus();
			// flag = false;
		// } 
		// else if (!document.getElementById('pages').value.match(num1)) {
// 
			// alert("Total page field must be a number");
			// flag = false;
// 
		// } 
		else if (pu_amount == "") {
			alert("Please enter purchase amount");
			document.getElementById('purchse_amount').focus();
			flag = false;
		}else if (p_price == "") {
			alert("Please enter product price");
			document.getElementById('product_price').focus();
			flag = false;
		} else if (quant == "") {
			alert("Please enter quantity");
			document.getElementById('product_quantity').focus();
			flag = false;
		} else if (max_order == "") {
			alert("Please enter max. order quantity");
			document.getElementById('max_order').focus();
			flag = false;
		} else if (!document.getElementById('product_quantity').value.match(num)) {

			alert("Quantity field must be a number");
			flag = false;
		} else if (key == "") {
			alert("Please enter some keywords");
			document.getElementById('product_kwords').focus();
			flag = false;
		}
		return flag;
	}
</script>		
 <script type="text/javascript">
	function img_count() {
		var files = document.getElementById('product_image').files;
		if (files.length > 1) {
			alert("Max. 1 image only");
			document.getElementById('product_image').value = "";
		}
	}
</script>

<script type="text/javascript">
	function subcat() {
		var s1 = $("#cat_id").val();
		$.post("phpfiles/administrator/subcategory_select.php", {
			sub2 : s1
		}, function(data) {
			$("#sub").html(data);
		});
	}
</script>

<script type="text/javascript">
	function pr_code() {
		var pc = $("#product_code").val();
		$.post("phpfiles/administrator/p_code.php", {
			p_code : pc
		}, function(data) {
			if(data) { alert(data); $("#product_code").focus(); }
		});
	}
</script>

<script type="text/javascript">
	function latest_image() {
		var s1 = $("#main_cat").val();

		$.post("phpfiles/administrator/slider_images.php", {
			sub2 : s1
		}, function(data) {
			$("#latest_slider").html(data);
		});
	}

	function slider() {
		var data_type = $("#latest").attr("name");
		document.getElementById("slider").value = data_type;
	}
</script>

