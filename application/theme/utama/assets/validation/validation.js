$(document).ready(function () {
    
// Bisa diubah bhs lain    
    jQuery.extend(jQuery.validator.messages, {
    required: "This field is required.",
    remote: "Please fix this field.",
    email: "Please enter a valid email address.",
    url: "Please enter a valid URL.",
    date: "Please enter a valid date.",
    dateISO: "Please enter a valid date (ISO).",
    number: "Please enter a valid number.",
    digits: "Please enter only digits.",
    creditcard: "Please enter a valid credit card number.",
    equalTo: "Please enter the same value again.",
    accept: "Please enter a value with a valid extension.",
    maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
    minlength: jQuery.validator.format("Please enter at least {0} characters."),
    rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
    range: jQuery.validator.format("Please enter a value between {0} and {1}."),
    max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
    min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
});

    if($('.form-validate').length > 0)
	{
	$('.form-validate').each(function(){
    var id = $(this).attr('id');
    $("#"+id).validate({
        errorElement: 'span',
        errorClass: 'help-block',
        rules: {
            password: "required",
            confPassword: {
              equalTo: "#password"
            },
            email: {
                maxlength: 100,
                email: true,
                remote: {
                    url : "user/isEmailAvailable",
                    type : "post"
                }
            },
            username: {
                remote: {
                    url : "user/isUsernameAvailable",
                    type : "post"
                }
            }
            },
  
        messages: {
        email: {
            required: "Enter a Email",
//            minlength: jQuery.format("Enter at least {0} characters"),
            remote: jQuery.format("{0} is already in use")
            },
        username: {
            required: "Enter a Username",
//            minlength: jQuery.format("Enter at least {0} characters"),
            remote: jQuery.format("{0} is already in use")
            }    
        },
    
        highlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error has-success').addClass('has-error');
   
        },
        success: function (element) {
            element.addClass('valid').closest('.form-group').removeClass('has-error has-success').addClass('has-success');
	}
    });
    });
    }
});