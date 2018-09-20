<?php
include_once ("class/dbc_class.php");
$dbc = new Dbc;
$id = $_REQUEST['id'];
$status = explode('-',$_REQUEST['status']);
//getting product table id
$s1 = "select * from product where id='$id' ";
$q1 = $dbc -> query($s1);
$row1 = $dbc -> fetch($q1);
$name = $row1['name'];
$price = $row1['price'];
//getting category_id
$cat_id = $row1['category_id'];
$sub_id = $row1['subcategory_id'];
$product_name = $row1['name'];
$purchase_amount = $row1['purchase_amount'];
$shipping = $row1['shipping_charge'];
$offer = $row1['offer_price'];
$description=$row1['description'];
$lang=$row1['language'];
$brand=$row1['brand'];
$page=$row1['pages'];
$quantity=$row1['quantity'];
$keyword=$row1['keywords']; 
$author=$row1['author'];
$product_code=$row1['product_code'];
$max = $row1['maximum_order'];


$s20 = "select * from sub_category where id='$sub_id'";
$q20 = $dbc -> query($s20);
$row20 = $dbc -> fetch($q20);

$s2 = "select * from category where id='$row20[category_id]'";
$q2 = $dbc -> query($s2);
$row2 = $dbc -> fetch($q2);

//displaying category
$s = "select * from main_category where id='$row2[main_id]'";
$q = $dbc -> query($s);
$r=$dbc->fetch($q);

$s22 = "select * from sub_category where id='$sub_id'";
$q22 = $dbc -> query($s22);
$row22 = $dbc -> fetch($q22);	


?>
<script>
	function back() {
		var status = document.getElementById('status').value;
		var val = document.getElementById('val').value;

		if (status == "") {
			window.location = "administrator.php?option=manage_product";
		} else{
			window.location = "administrator.php?option=manageproduct_search&"+status+ "=" + val;
		}
	}
</script>
<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/autoNumeric.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript">
	jQuery(function($) {
		$('#product_price').autoNumeric('init');
		$('#offer_price').autoNumeric('init');
		$('#product_shipping').autoNumeric('init');
		$('#purchase_amount').autoNumeric('init');
	}); 
</script>

<script type="text/javascript">
	function category() {
		
		
$('#sub')
    .find('option')
    .remove()
    .end()
    .append('<option value="">---Select---</option>')
    .val('')
;


		$('#sub option:not([value])').prop('selected', true)
		var s1 = $("#main_cat").val();
		var page ='product';
		$.post("phpfiles/administrator/category_select.php", {
			sub2 : s1,page : page
		}, function(data) {
			$("#cat_id").html(data);
		});
	}
</script>

 <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="#"><span class="d-icon"><i class="fi-home"></i></span></a>
		 	<a href="administrator.php?option=manage_product">Manage Products</a>
		 		<a class="current" href="#">Edit Product details</a>
		 </nav>
		         
      </div>
     </div>

<div class="order_results">
      <div class="hd_con" style="float:left; width:100%;">
      <h3>Edit Product Details</h3>
      </div>
     <div class="columns">
      	
       		<div class="large_wrap">
       			<div class="row">
		<div class="form_bg_con" style="margin-right:10px;">
          <div id="contact-area">
            <ul class="formBox">
              <li class="form_top_hed">&nbsp;</li>
              <form action="administrator.php?option=update_product" method="post"  id="create_product" name="create_product" enctype="multipart/form-data">
			  <input type="hidden" value="<?php echo $status[0]; ?>" name="status" id="status">
			   <input type="hidden" value="<?php echo $status[1]; ?>" name="val" id="val">
			  <input type="hidden" value="<?php echo $name; ?>" name="name" id="name">
			  
			  <li class="form_cnt_con">
                  <label class="formLabels">Product code<span class="redText">*</span></label>
                  <input type="text" name="product_code" id="product_code" class="formTextBox" onchange="pr_code();" value="<?php echo $product_code; ?>" /><?php echo $errorString1; ?><span id="count"></span>
                  <div class="form_btm_line"></div>
                </li>
                
                
                  <li class="form_cnt_con">
                 <label class="formLabels">Main Category<span class="redText">*</span></label>
                 <select style="width: 60%" name="main_cat" id="main_cat" class="formTextBox" value="" onchange="category(); latest_image();"/>
                 <option value="" >--Select--</option>
				 <?php
				 $s1 = "select * from main_category ";
				$q1 = $dbc -> query($s1);
				 while($row1=$dbc->fetch($q1))
				 {
				 ?>
				<option value="<?php echo $row1['id']; ?>" <?php if($row1['id'] == $r['id']) { echo 'selected'; } ?> ><?php echo $row1['category']; ?></option>
				 <?php } ?>
				 </select>
                  <div class="form_btm_line"></div>
                </li>
                
                
			  <li class="form_cnt_con">
                  <label class="formLabels">Category<span class="redText">*</span></label>
                 <select style="width: 60%" name="cat_id" id="cat_id" class="formTextBox" value="" onchange="subcat()" />
				 <option value="<?php echo $row2['id'];?>"><?php echo $row2['name'];?></option>
				 </select>
                  <div class="form_btm_line"></div>
                </li>
				<li class="form_cnt_con">
                  <label class="formLabels">Subcategory<span class="redText">*</span></label>
                 <select style="width: 60%" name="sub" id="sub" value="<?php echo $row22['id']; ?>" class="formTextBox"><option  value="<?php echo $row22['id']; ?>"><?php echo $row22['name']; ?></option></select>
                  <div class="form_btm_line"></div>
                </li>
                
                    <!-- <li class="form_cnt_con">
                  <label class="formLabels">Language<span class="redText">*</span></label>
                 <select style="width: 60%" name="language" id="language" class="formTextBox" value="" />
                 <option value="">--Select--</option>
                  	<option value="English" <?php if($lang==English) echo 'selected'?>>English</option>
                  	<option value="Hindi" <?php if($lang==Hindi) echo 'selected'?>>Hindi</option>
                  	<option value="Malayalam" <?php if($lang==Malayalam) echo 'selected'?>>Malayalam</option>
				 </select>
                  <?php echo $errorString1; ?><span id="count"></span>
                  <div class="form_btm_line"></div>
                </li> -->
                
                    <li class="form_cnt_con">
                  <label class="formLabels">Product name<span class="redText">*</span></label>
                  <input type="text" name="product_name" id="product_name" class="formTextBox" value="<?php echo $product_name; ?>" onchange="pro_name(this.value);" /><?php echo $errorString1; ?><span id="count"></span>
				  <input type="hidden" name="product" id="product" class="" value="<?php echo $product_name; ?>"/>
                  <div class="form_btm_line"></div>
                </li>
                
                  <!-- <li class="form_cnt_con">
                  <label class="formLabels">Author</label>
                  <input type="text" name="author" id="author" class="formTextBox" value="<?php echo $author;?>" />
                  <div class="form_btm_line"></div>
                </li> -->
                
                    <li class="form_cnt_con">
                  <label class="formLabels">Brand</label>
                  <input type="text" name="product_brand" id="product_brand" class="formTextBox" value="<?php echo $brand; ?>" onchange="brand_name(this.value);"  /><span id="count"></span>
				  <input type="hidden" name="brand" id="brand" class="" value="<?php echo $brand; ?>"/>
                  <div class="form_btm_line"></div>
                </li>
                 <li class="form_cnt_con">
                  <label class="formLabels">Description<span class="redText">*</span></label>
                                    <div style="margin-left: 129px;">
                   <textarea name="desc" id="desc" class="textareafield ckeditor"><?php echo $description; ?></textarea> 
                   </div><?php echo $errorString2; ?>
                  <div class="form_btm_line"></div>
                </li>
               
			<li class="form_cnt_con">
                  
                 <!-- <input type="hidden" name="status" id="status" class="formTextBox" value="<?php echo '1'; ?>" onChange="check();"/> -->
                  <div class="form_btm_line"></div>
                </li>
				
			 <li class="form_cnt_con">
                  <div class="form_btm_line"></div>
                </li>
				<input type="hidden" name="hid_id" value="<?php echo $id; ?>">
                
                <li class="form_cnt_con">
                  <label class="formLabels">&nbsp;</label>
                  <input type="submit" value="Submit"  name="create" id="submit-button"  class="button tiny radius success " onclick="return get_val()"/>
          			<input type="button" value="Cancel" class="button tiny radius right" name="cancel" id="cancel" onclick="back();"/>
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
                  <input type="number" name="pages" id="pages" min="1" class="formTextBox" value="<?php echo $page; ?>" /><span id="count"></span>
                  <div class="form_btm_line"></div>
                </li> -->
				
                <li class="form_cnt_con">
                  <label class="formLabels">Purchase Amount<span class="redText">*</span></label>
                 <input type="text" name="purchase_amount" id="purchase_amount" class="formTextBox" value="<?php echo $purchase_amount; ?>" data-d-group="2" data-a-sign="INR. "/>
                  <div class="form_btm_line"></div>
                </li>
                
               <li class="form_cnt_con">
                  <label class="formLabels">Price<span class="redText">*</span></label>
                 <input type="text" name="product_price" id="product_price" class="formTextBox" value="<?php echo $price; ?>" data-d-group="2" data-a-sign="INR. "/>
                  <div class="form_btm_line"></div>
                </li>
				<li class="form_cnt_con">
                  <label class="formLabels">Offer Price</label>
                 <input type="text" name="offer_price" id="offer_price" class="formTextBox" value="<?php echo $offer; ?>" data-d-group="2" data-a-sign="INR. "/>
                  <div class="form_btm_line"></div>
                </li>
				<!--<li class="form_cnt_con">
                  <label class="formLabels">Shipping charge</label>
                 <input type="text" name="product_shipping" id="product_shipping" class="formTextBox" value="<?php echo $shipping; ?>" data-d-group="2" data-a-sign="INR. "/>
                  <div class="form_btm_line"></div>
                </li>--->
				
				<li class="form_cnt_con">
                  <label class="formLabels">Quantity<span class="redText">*</span></label>
                 <input type="number" name="product_quantity" id="product_quantity" min="1" class="formTextBox" value="<?php echo $quantity;?>" />
                  <div class="form_btm_line"></div>
                </li>
                
                	<li class="form_cnt_con">
                  <label class="formLabels">Maximum Order Quantity<span class="redText">*</span></label>
                 <input type="number" name="max_order" id="max_order" min="1" class="formTextBox" value="<?php echo $max;?>" />
                  <div class="form_btm_line"></div>
                </li>
				
				
				<li class="form_cnt_con">
                  <label class="formLabels">Keywords<span class="redText">*</span></label>
                 <textarea name="product_kwords" id="product_kwords" class="formTextBox" rows="10"><?php echo $keyword; ?></textarea><?php echo $errorString2; ?>
                  <div class="form_btm_line"></div>
                </li>
                
                
                <?php
					$s3="select * from slider_image where product_id='$id'";
					$q3=$dbc->query($s3);
					$r3=$dbc->fetch($q3);
					 $slider_count=$dbc->getNumRows($q3);
                
					$sql_slider="select * from slider_image where main_category_id='$r[id]'";
					$result_slider=$dbc->query($sql_slider);
					 $count_slider=$dbc->getNumRows($result_slider);
                ?>
                <span id="latest_slider">
                 <li class="form_cnt_con">
                  <label class="formLabels">
                  	<?php
                  	if($count_slider<='5' && $slider_count<>"")
					{ 
						?>
	                  	<input type="checkbox" name="latest"  id="latest" value="latest" onchange="slider()" <?php if($slider_count<>'0'){?> checked="checked" <?php }?>/>
	                  
						<?php
						
					}else if($count_slider=='5' && $slider_count=='0')
					{ ?>
						<input type="checkbox" name="latest"  id="latest" value="latest" onchange="slider()" disabled="disabled"/>
						<?php
						}
						else if($count_slider<'5' && $slider_count=='0')
						{ 
							?>
							<input type="checkbox" name="latest"  id="latest" value="latest" onchange="slider()" />
							<?php
						}?>
					
				
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
	
		
<script  language="javascript" type="text/javascript">
	function get_val() {
		var flag = true;
		var m_cat = document.getElementById('main_cat').value;
		var category = document.getElementById('cat_id').value;
		var s_cat = document.getElementById('sub').value;
		var name = document.getElementById('product_name').value;
		var code = document.getElementById('product_code').value;
		// var lang = document.getElementById('language').value;
		var desc = CKEDITOR.instances['desc'].getData();
		// var pgs = document.getElementById('pages').value;
		var pu_amount = document.getElementById('purchase_amount').value;
		var p_price = document.getElementById('product_price').value;
		var quant = document.getElementById('product_quantity').value;
		var max_order = document.getElementById('max_order').value;
		var key = document.getElementById('product_kwords').value;
		var num = /^[0-9]+$/;
		var num1 = /^[0-9]+$/;
		if (m_cat == "") {
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
		} else if (name == "") {
			alert("Please enter product name");
			document.getElementById('product_name').focus();
			flag = false;
		} else if (code == "") {
			alert("Please enter product code");
			document.getElementById('product_code').focus();
			flag = false;
		} 
		// else if (lang == "") {
			// alert("Please enter language");
			// document.getElementById('language').focus();
			// flag = false;
		// } 
		else if (desc == "") {
			alert("Please enter description");
			flag = false;
		}
		// else if (pgs == "") {
			// alert("Please enter total no. of pages");
			// document.getElementById('pages').focus();
			// flag = false;
		// } 
		// else if(!document.getElementById('pages').value.match(num1))
		// {
			// alert("total pages must be a number");
			// flag = false;
		// }
		else if (pu_amount == "") {
			alert("Please enter purchase amount");
			document.getElementById('purchase_amount').focus();
			flag = false;
		}
		else if (p_price == "") {
			alert("Please enter product price");
			document.getElementById('product_price').focus();
			flag = false;
		} else if (quant == "") {
			alert("Please enter quantity");
			document.getElementById('product_quantity').focus();
			flag = false;
		}
		else if (max_order == "") {
			alert("Please enter max. order quantity");
			document.getElementById('max_order').focus();
			flag = false;
		} 
		else if (!document.getElementById('product_quantity').value.match(num)) {
			
			alert("Quantity fields must be a number");
			flag = false;
		}
		else if (key == "") {
			alert("Please enter some keywords");
			document.getElementById('product_kwords').focus();
			flag = false;
		} 
		return flag;
	}
</script>
 <script src="js/jquery1.8.min.js"></script>
 
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
	function subcat() {
		var s1 = $("#cat_id").val();
		$.post("phpfiles/administrator/subcategory_select.php", {
			sub2 : s1
		}, function(data) {
			$("#sub").html(data);
		});

	}
	
	function slider()
	{
		var data_type = $("#latest").attr("name");
		//alert(data_type);
		document.getElementById("slider").value=data_type;
	}
	
	
		function latest_image() {
		var s1 = $("#main_cat").val();
		
		$.post("phpfiles/administrator/slider_images.php", {
			sub2 : s1
		}, function(data) {
			$("#latest_slider").html(data);
			//$("#latest_count").html(data);
		});
	}
	
</script>
  
  