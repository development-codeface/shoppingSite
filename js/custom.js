$(document).ready(function(){
	
	
	
	$(".owl-wrapper .owl-item ").click(function(){
    //slide up all the link lists
   
    $(".owl-wrapper .owl-item").removeClass('highlight');
    
   
    //slide down the link list below the h3 clicked - only if its closed
    if(!$(this).next().is(":visible"))
    {
      
       $(this).addClass('highlight');
    
       
    }
});
	
	
	
	
	
$('#cssmenu li').on('mouseover', function() {
    var li$ = $(this);
    li$.parent('ul').find('li').removeClass('active');
    li$.addClass('active');
})
.on('mouseout', function() {
    var li$ = $(this);
    li$.removeClass('active');
    li$.parent('ul').find('li.current').addClass('active');
});



});

//Quick Contact Form Submit
$('#quick_btn').on('click', function() {
	var name = $('#quick_name').val();
	var email = $('#quick_email').val();
	var phone = $('#quick_phone').val();
	var comment = $('#quick_text').val();
	$.ajax({
		type:"post",
		url:"ajax/quick_contact.php",
		data:{
			name:name, email:email, phone:phone, comment:comment
		},
		success:function(res) {
			$('#quick_notify').html(res);
			if(res == 'Thank you!')
			{
				$('#quick_name').val('');
				$('#quick_email').val('');
				$('#quick_phone').val('');
				$('#quick_text').val('');
			}
		}
	})
});


function ch_email() {
		var em = $("#input-email").val();
		$.post("phpfiles/user/email.php", {
			eml : em
		}, function(data) {
			$("#m_error").html(data);
		});
	}
	
	
//check delivery
function check_pin()
{
	$('#pin_msg').empty();
	var pin = document.getElementById('pin').value;
	if(pin)
	{
		$.ajax({
			type : "post",
			url : "ajax/check_pin.php",
			data : {
				pin : pin
			}
				}).done(function(res){$('#pin_msg').text(res);	
		});
	}
}

function isInArray(value, array) {
	return array.indexOf(value) > -1;
}

function addcart(id)
{
	var existingItems = JSON.parse(localStorage.getItem("allItems"));
	if (existingItems == null)
		existingItems = [];

	var c_count = document.getElementById('c_count').innerHTML;
	
	var new_pro = "[" + existingItems + "]";
	var check = isInArray(id, new_pro);

	var item = id;
	if (check == false) {
		existingItems.push(item);
	}
	localStorage.setItem("allItems", JSON.stringify(existingItems));

	if (check == false) {
		if ( typeof (Storage) !== "undefined") {
			if (localStorage.total) {
				localStorage.total = Number(localStorage.total) + 1;
			} else {
				localStorage.total = 1;
			}
			var totals = localStorage.total;
		}
	}
	
	var totals = localStorage.total;
	
	$("#select_loader").fadeIn();
	$.ajax({
		type : "post",
		url : "ajax/add_cart.php",
		data : {
			pro_ids : existingItems,
			count : totals
		}
	}).done(function(res) {
		$("#select_loader").fadeOut();
		$('#c_count').text(res);
		$('#add' + id).attr('onclick', 'return false').html('Already added');

	});
}


function detail_addcart(id)
{
	var c_count = document.getElementById('cart_count').value;;
	var qty = document.getElementById('spinner').value;
	var existingItems = JSON.parse(localStorage.getItem("allItems"));
	if (existingItems == null)
		existingItems = [];
		
	var new_pro = "[" + existingItems + "]";
	var check = isInArray(id, new_pro);
	
	var item = id;
	if (check == false) {
		existingItems.push(item);
	}
	localStorage.setItem("allItems", JSON.stringify(existingItems));

	if (check == false) {
		if ( typeof (Storage) !== "undefined") {
			if (localStorage.total) {
				localStorage.total = Number(localStorage.total) + 1;
			} else {
				localStorage.total = 1;
			}
			var totals = localStorage.total;
		}
	}
	var totals = localStorage.total;
	$("#select_loader").fadeIn();
	$.ajax({
		type : "post",
		url : "ajax/detail_addcart.php",
		data : {
			pro_id : id,
			count : c_count,
			click : totals,
			quant : qty
		}
	}).done(function(res) {
		var res_arr = res.split("|");
		$("#select_loader").fadeOut();
		$('#c_count').text(res_arr[0]);
		if(res_arr[2])
		{ alert('Sorry, max. order quantity is '+res_arr[2]); }

	});
}

function addquantity(a, b) {
	
	var delivery = document.getElementById('del_charge').value;
	var delivery_fee = document.getElementById('del_fee').value;
	var id = a;
	var array_index = b;
	var current_quant = document.getElementById('current_qunt' + a).value;
	var quant = document.getElementById('quant' + a).value;
	var product_price = document.getElementById('product_price' + a).innerHTML;
	$.ajax({
		type : "post",
		url : "ajax/addcart_quant.php",
		data : {
			item_price : product_price,
			count : quant,
			id : a,
			current_quantity : current_quant,
			array_index : array_index
		}
	}).done(function(res) {

		var res_arr = res.split("|");

		if(parseFloat(res_arr[1]) < delivery)
		{
			$('#delivery_fee').text(' ' +delivery_fee);
			$('#grand_total').text( Number(res_arr[1])+Number(delivery_fee));
		} 
		else
		{
			$('#delivery_fee').text(' 0');
			$('#grand_total').text( res_arr[1]);
		}
		$('#ca_price' + a).text(res_arr[0]);
		$('#sub_total').text(res_arr[1]);
		document.getElementById('quant' + a).value = res_arr[2];
		document.getElementById('current_qunt' + a).value = res_arr[2];

		if (res_arr[3] != '') {
			$("#reg_err").html((res_arr[3]));
		}

	});
}


function deletecart(a, b) {

var con = confirm('Are you sure ?');
if (con == true) {
	
	var delivery = document.getElementById('del_charge').value;
	var delivery_fee = document.getElementById('del_fee').value;
	
	var existingItems = JSON.parse(localStorage.getItem("allItems"));
	var id = a;
	var array_index = b;
	var current_quant = $('#c_count').text();
	var click = localStorage.total;
	var total = $('#ca_price' + id).text();
	var sub_total = $('#sub_total').text();
	var new_sub_total = sub_total - total;

	var cart_minus = Number(click) - 1;

	if (localStorage.total) {
		localStorage.total = cart_minus;
	}

	for (var i = 0; i < existingItems.length; i++) {
		if (existingItems[i] == id) {
			existingItems.splice(i, 1);
		}
	}
	localStorage["allItems"] = JSON.stringify(existingItems);
	$.ajax({
		type : "post",
		url : "ajax/delete_cart.php",
		data : {
			id : a,
			current_quantity : current_quant,
			array_index : array_index,
			click : cart_minus,

		}
	}).done(function(res) {
		
		if(new_sub_total <= delivery)
		{
			$('#delivery_fee').text(' ' +delivery_fee);
			$('#grand_total').text( Number(new_sub_total)+Number(delivery_fee));
		} 
		else
		{
			$('#delivery_fee').text(' 0');
			$('#grand_total').text( new_sub_total);
		}
		
		$("#cart_items" + a).remove();
		$('#sub_total').text(new_sub_total);
		$('#c_count').text(res);
		if (res == 0) {
			$('#cart_checkout').empty();
			location.reload();

		}
 
	});
}
}

function clear_cart() {
	var con = confirm('Are you sure ?');
if (con == true) {
	var clear = 'clear';
	localStorage.total = 0;
	localStorage.removeItem('allItems');

	$.ajax({
		type : "post",
		url : "ajax/clear_cart.php",
		data : {
			clear : clear,
			click : localStorage.total
		}
	}).done(function(res) {
		$('#cart_checkout').empty();
		location.reload();
	});
}
}


//My orders

function delete_order(order_id)
{
	var con = confirm('Are you sure ?');
if (con == true) {
	$.ajax({
		type : "post",
		url : "ajax/delete_order.php",
		data : {
			order_id : order_id,
			
		}
	}).done(function(res) {

		
		$("#order_data" + order_id).remove();
	});
	}
}