//login validation

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#login_form").validate({
                rules: {
				email: {
					required: true,
					email: true
				},
				
				password: {
					required: true
				},
                },
                messages: {
                 email: "Please enter a valid email address",
				
				 password: {
					required: "Please enter your password"
				},
                },

                submitHandler: function(form) {
                	form.submit();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);


//registration validation

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#register_form").validate({
                rules: {
				name: {
					required: true
				},
				email: {
					required: true,
					email: true
				},
				password: {
					required: true
				},
				telephone: {
					required: true
				},
                },
                messages: {
				 name: {
					required: "Please enter your name"
				},            	
                	
                 email: "Please enter a valid email address",
				
				 password: {
					required: "Please enter your password"
				},
				 
				 telephone: {
					required: "Please enter your contact no."
				},		 
                },

                submitHandler: function(form) {
                	form.submit();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);


//forgot validation

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#forgot_form").validate({
                rules: {
				email: {
					required: true,
					email: true
				}
                },
                messages: {
                 email: "Please enter a valid email address",	 
                },

                submitHandler: function(form) {
                	form.submit();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);



//change pass validation

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#password_form").validate({
                rules: {
				current_password: {
					required: true,
				}
                },
                messages: {
				current_password: {
					required: "Please enter your current password"
				}
                },
                submitHandler: function(form) {
                	//form.submit();
                	cpass();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);


//contact validation

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#contact_form").validate({
                rules: {
				name: {
					required: true,
				},
				mail: {
					required: true,
					email: true
				},
				telephone: {
					required: true,
				},
				comments: {
					required: true,
				},
                },
                messages: {
				name: {
					required: "Please enter your name"
				},
                mail: "Please enter a valid email address",	 
				telephone: {
					required: "Please enter your contact no."
				},
				comments: {
					required: "Please enter your message"
				},				
                },
                submitHandler: function(form) {
                	form.submit();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);


//checkout validation

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#checkout_form").validate({
                rules: {
				name: {
					required: true
					
				},
				email: {
					required: true,
					email: true
				},
				telephone: {
					required: true,
				},
				address: {
					required: true,
				},
				city: {
					required: true,
				},
				postcode: {
					required: true
				},
				state: {
					required: true,
				},
				password: {
					required: "#show_pass_field:checked"
				},
				confirm: {
					required: "#show_pass_field:checked"
				}
                },
                messages: {
				name: {
					required: "Please enter your name"
				},
				email: {
					required: "Please enter your email",
					email: "Please enter a valid email"
				},
				telephone: {
					required: "Please enter your phone no."
				},
				address: {
					required: "Please enter your address"
				},
				city: {
					required: "Please enter your city"
				},
				postcode: {
					required: "Please choose your location"
				},
				state: {
					required: "Please select your state"
				},
				password: {
					required: "Please enter password"
				},
				confirm: {
					required: "Please confirm password"
				}
                },
                submitHandler: function(form) {
                	form.submit();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);




//subscribe_form validation

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#subscribe_form").validate({
                rules: {
				sub_email: {
					required: true,
					email: true
				},
				
				
                },
                messages: {
				sub_email: {	
				 required: "Please enter your email",
                 email: "Please enter a valid email address"
				},
                },

                submitHandler: function(form) {
                	//form.submit();
					subscribe();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);