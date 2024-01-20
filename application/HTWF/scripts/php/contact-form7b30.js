/*
--------------------------------
Ajax Contact Form
--------------------------------
+ https://github.com/pinceladasdaweb/Ajax-Contact-Form
+ A Simple Ajax Contact Form developed in PHP with HTML5 Form validation.
+ Has a fallback in jQuery for browsers that do not support HTML5 form validation.
+ version 1.0.1
+ Copyright 2014 Pedro Rogerio
+ Licensed under the MIT license
+ https://github.com/pinceladasdaweb/Ajax-Contact-Form
*/

(function ($, window, document, undefined) {
    'use strict';

    $(document).ready(function () {
	var valid_selector=$("[valid]");
	valid_selector.change(function() {
		$(this).parent().find(".popover").remove();
		$(this).removeAttr("aria-describedby");
		$(this).removeAttr("title");
		$(this).removeAttr("data-original-title");
		$(this).removeAttr("data-content");
		$(this).popover("hide");
	    });
    function validateForm(form_object,a){
        $("[valid]").popover();
        var b = !0;
        return $(form_object).find("input[valid]").each(function() {
            if ("-1" != $(this).attr("valid").indexOf("require")) {
                var a = $(this).val();
                "" == a && (b = !1, $(this).focus().attr("data-content", "Please fill in this field").popover("show"))
            }
        }), $(form_object).find("textarea[valid]").each(function() {
            if ("-1" != $(this).attr("valid").indexOf("require")) {
                var a = $(this).val();
                "" == a && (b = !1, $(this).focus().attr("data-content", "Please fill in this field").popover("show"))
            }
        }), $(form_object).find("select[valid]").each(function() {
            if ("-1" != $(this).attr("valid").indexOf("require")) {
                var a = $(this).val();
                ("" == a || null==a) && (b = !1, $(this).is(":visible")?$(this).focus().attr("data-content", "Please fill in this field").popover("show"):$(this).next().attr("tabindex","1").focus().attr("data-content", "Please fill in this field").popover("show"))
            }
        }), b ? ($(form_object).find("input[valid],textarea[valid]").each(function() {
            var a = $(this).val();
            if ("-1" != $(this).attr("valid").indexOf("datetime")) {
                var c = /^(0[1-9]|[12][0-9]|3[01])[\/](0[1-9]|1[012])[\/](19|20)\d\d - ((0[0\d])|(1\d)|(2[0-3])):((00)|(0[1-9])|([12345]\d))$/i;
                if (!c.test(a)) {
                    b = !1;
                    var d = "Invalid date and time";
                    $(this).attr("data-content", d).popover("show")
                }
            }
            if ("-1" != $(this).attr("valid").indexOf("name")) {
                var c = /^[a-z]+\s[a-z]+\s?[a-z]*$/i,
                    e = /^[a-z]{2,}\s[a-z]{2,}\s?[a-z]{2,}$/i;
                if (c.test(a)) {
                    if (!c.test(a)) {
                        b = !1;
                        var d = "first and last name must be at least two characters";
                        $(this).attr("data-content", d).popover("show")
                    }
                } else {
                    b = !1;
                    var d = "Contains must be first and last name";
                    $(this).attr("data-content", d).popover("show")
                }
            }
            if ("-1" != $(this).attr("valid").indexOf("description") && $(this).val()!="") {
                var c = /^[a-z\d-@\s.,]+$/gi;
                if (!c.test(a)) {
                    b = !1;
                    var d = "Invalid(Allowed only characters,digit,'@','.','-',',')";
                    $(this).attr("data-content", d).popover("show")
                }
            }
            if ("-1" != $(this).attr("valid").indexOf("string")) {
                var c = /^[a-z][a-z\d.-@ ]+/i,
                    e = /^[a-z\d.-@ ]+$/i;
                if (c.test(a)) {
                    if (!e.test(a)) {
                        b = !1;
                        var d = "Contains one or more invalid characters";
                        $(this).attr("data-content", d).popover("show")
                    }
                } else {
                    b = !1;
                    var d = "Contains must be start with characters( space,digit or any special characters invaild )";
                    $(this).attr("data-content", d).popover("show")
                }
            }
            if ("-1" != $(this).attr("valid").indexOf("email")) {
                var f = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                if (!f.test($.trim(a))) {
                    b = !1;
                    var d = "Invaild Email Address";
                    $(this).attr("data-content", d).popover("show")
                }
            }
            if ("-1" != $(this).attr("valid").indexOf("number") && isNaN(a)) {
                b = !1;
                var d = "Invaild Number";
                $(this).attr("data-content", d).popover("show")
            }
            if ("-1" != $(this).attr("valid").indexOf("int"))
                if (isNaN(a)) {
                    b = !1;
                    var d = "Invaild Number";
                    $(this).attr("data-content", d).popover("show")
                } else if (Math.floor(a) != a) {
                b = !1;
                var d = "Invaild Number";
                $(this).attr("data-content", d).popover("show")
            }
            if ("-1" != $(this).attr("valid").indexOf("mobile"))
                if (!a.match(/^\+?(?:[0-9] ?){6,15}[0-9]$/)) {
                    b = !1;
                    var d = "Invaild Mobile Number";
                    $(this).attr("data-content", d).popover("show")
                }
        }), b ? ($(form_object).find("input[valid],textarea[valid]").each(function() {
            if ("-1" != $(this).attr("valid").indexOf("lboth")) {
                var a = $(this).attr("min"),
                    c = $(this).attr("max"),
                    d = $(this).val();
                if (!(d.length >= a && d.length <= c)) {
                    b = !1;
                    var e = "At least " + a + " and maximum " + c + " characters required";
                    $(this).attr("data-content", e).popover("show")
                }
            } else if ("-1" != $(this).attr("valid").indexOf("min")) {
                var a = $(this).attr("min"),
                    d = $(this).val();
                if (!(d.length >= a)) {
                    b = !1;
                    var e = "At least " + a + " characters required";
                    $(this).attr("data-content", e).popover("show")
                }
            } else if ("-1" != $(this).attr("valid").indexOf("max")) {
                var c = $(this).attr("max"),
                    d = $(this).val();
                if (!(d.length <= c)) {
                    b = !1;
                    var e = "Maximum " + c + " characters allowed";
                    $(this).attr("data-content", e).popover("show")
                }
            }
            if ("-1" != $(this).attr("valid").indexOf("pwd-1") && $(this).val() != $("input[valid='pwd-2']").val()) {
                b = !1;
                var e = "Must be match password";
                $(this).attr("data-content", e).popover("show")
            }
        }), b ? void 0 : (a.preventDefault(), a.stopImmediatePropagation(), !1)) : (a.preventDefault(), a.stopImmediatePropagation(), !1)) : (a.preventDefault(), a.stopImmediatePropagation(), !1)
    }

	$("form").submit(function(a) {
        return validateForm(this,a);
    });
    $(".validate-tab-form").click(function(e){
       if(validateForm($(this).closest(".panel.active"),e)==undefined || validateForm($(this).closest(".panel.active"),e)==true){
         eval($(this).attr("data-onclick"));  
       } 
    });
        $('.form-ajax').each(function (index) {
            var form = this;
            var sendToEmail = $(this).attr("data-email");
            if (isEmpty(sendToEmail)) sendToEmail = '';
            var subject = $(this).attr("data-subject");
            if (isEmpty(subject)) subject = '';
	    var tempForm=$(form).closest("div").find(".form-temp-msg").length==1?true:false;


            $(form).submit(function (e) {
		if($(form).attr("status")==undefined || $(form).attr("status")=="submited"){
			$(form).attr("status","sending");
		        // remove the error class
		        $('.form-group').removeClass('has-error');
		        $('.help-block').remove();

		        // Google reCaptcha
		        if ((typeof grecaptcha !== 'undefined') && $(this).find(".g-recaptcha").length) {
		            if (grecaptcha.getResponse().length === 0) {
		                e.preventDefault;
		                return false;
		            }
		        }

		        $(form).find(".cf-loader").show();
			$(form).find(".send-btn-text").hide();
		        // get the form data
		       // var formData = new FormData(this);
			var formData={
		            'values': {},
		            'domain': window.location.hostname.replace("www.", "")
		        };
			var file_flag=false;
		        $(form).find(".form-value").each(function () {
		            var val = $(this).val();
				if($(this).attr("name")=="product"){
					if($("input[name='"+$(this).attr("name")+"']:checked").length)
						val=$("input[name='"+$(this).attr("name")+"']:checked").val();
					else val="";
				}
			    if($(this).attr("name")=="tap"){
					if($("input[name='"+$(this).attr("name")+"']:checked").length)
						val=$("input[name='"+$(this).attr("name")+"']:checked").val();
					else val="";
				}
			    if($(this).attr("type")==undefined || $(this).attr("type")!="file"){ 
				    if (!isEmpty(val)) {
				        var name = $(this).attr("data-name");
				        if (isEmpty(name)) name = $(this).attr("name");
				        if (isEmpty(name)) name = $(this).attr("id");
				        var error_msg = $(this).attr("data-error");
				        if (isEmpty(error_msg)) error_msg = "";
				        formData['values'][name] = [val, error_msg];
				    }
			    }else{
				file_flag=true;
			   }
		        });
			if(!file_flag){
				// process the form
				if($(form).attr("data-action")=="app/enquiry"){
				    try{
			//	        console.log("Send Sumbit event to google");
				        window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('event', 'Submit', {'event_category': 'Click'});
          //              console.log("Success Sumbit event to google");
				    }catch(error2){
				        console.log(error2);
				    }
				    
				}
				
				$.ajax({
				    type: 'POST',
				    url: $(form).attr("data-action"),
				    data: formData,
				    dataType: 'json',
				    encode: true
				}).done(function (data) {
				    if (!data.success) {
				        // Error
					if(tempForm){
						$(form).closest("div").find(".form-temp-msg").find(".error-box").show();
					}else{
				        	$(form).find(".error-box").show();
					}
				    } else {
				        // Success
					if(tempForm){
						$(form).closest("div").find(".form-temp-msg").find(".success-box").show();
						$(form).html("");
					}else{
				        	$(form).html($(form).find(".success-box").html());
					}
				    }
				    $(form).find(".cf-loader").hide();
				    $(form).find(".send-btn-text").show();
				    $(form).attr("status","submited");
				}).fail(function (data) {
				    // Error
				    $(form).closest("div").find(".form-temp-msg").find(".error-box").show();
				    $(form).find(".error-box").show();
				    $(form).find(".cf-loader").hide();
				    $(form).find(".send-btn-text").show();
				    $(form).attr("status","submited");
				});
			}else{
				var f_data=new FormData(form);
				f_data.append("post_name",$("#careerForm").children("option:selected").text());
				$.ajax({
					url: "app/career",
					type: "POST",
					data: f_data,
					processData: false,
					contentType: false,
					dataType: 'json',
				    	encode: true,
					success: function(data) {
					    if (!data.success) {
						// Error
						console.log(data);
						$(form).find(".error-box").show();
					    } else {
						// Success
						$(form).html($(form).find(".success-box").html());
					    }
					    $(form).find(".cf-loader").hide();
					    $(form).find(".send-btn-text").show();
					    $(form).attr("status","submited");
					},
					error: function(data) {
					   // Error
					    console.log(data);
					    $(form).find(".error-box").show();
					    $(form).find(".cf-loader").hide();
					    $(form).find(".send-btn-text").show();
					    $(form).attr("status","submited");
					}
				    });
			}
		}
                e.preventDefault();
            });
        });
    });

}(jQuery, window, document));

function livedemo(page){
    var form = document.createElement("form");
    var element1 = document.createElement("input"); 
    
    form.method = "POST";
    form.action = "livedemo";   

    element1.value=page;
    element1.name="product";
    form.appendChild(element1);  

    document.body.appendChild(form);

    form.submit();
}
