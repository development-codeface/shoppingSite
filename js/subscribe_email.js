function cnfrm_email() {
	var email = $('#sub_email').val();
	if (email != "") {
		$.post("phpfiles/user/check_email.php", {
			email : email
		}, function(data) {
				$("#error3").html(data);
			if (data) {
				$("#subscribe_form").click(function(e) {
					$("#error3").html(data);
					e.preventDefault();
				});
			} else {
				$("#subscribe_form").unbind('click');
				$("#error3").html('');
			}
		});
	} else {
		$("#error3").html('');
	}
}
function subscribe(){
	
	var email = $('#sub_email').val();
	
	$.ajax({
		method: "post",
		url: "phpfiles/user/subscribe.php",
		data: {email:email},
		success: function(res){
			$("#succ").html(res).show().delay(5000).fadeOut();
			$('#sub_email').val('');
		}
		});
	}


		
	