
function pro_name(name){
		
		var product = name;
		$('#product').val(product);
		var brand = $('#brand').val();
		var key = brand + ' ' + product;
		$('#product_kwords').val(key);
	
	}
function brand_name(val){
	
	$('#brand').val(val);
	var product = $('#product').val();
	var brand = $('#brand').val();
	var key = brand + ' ' + product;
	$('#product_kwords').val(key);
}
