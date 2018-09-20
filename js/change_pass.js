function ch_pass() {
	var cur_pass = $('#input-current').val();
	if (cur_pass) {
		$.post("phpfiles/user/check_pass.php", {
			curr_pass : cur_pass
		}, function(data) {
			$("#error1").html(data);
			if (data) {
				$("#password_form").submit(function(e) {
					e.preventDefault();
				});
			} else {
				$("#password_form").unbind('submit');
				$("#error1").html('');
			}
		});
	} else {
		$("#error1").html('');
	}
}

function cpass() {
	var flag = true;
	var new_pass = $('#input-new').val();
	var con_pass = $('#input-confirm').val();
	if (new_pass != con_pass) {
		flag = false;
		$("#error2").html('Both new & confirm password fields should match.<img src="images/error.png" />');
	} else {
		$("#error2").html('');
	}
	return flag;
}