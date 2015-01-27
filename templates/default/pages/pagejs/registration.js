/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



var FormValidation = function () {
    var handleValidation1 = function() {
            var form1 = $('#form_registration');
            var error1 = $('.alert-error', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                lang: '{$lang}',
                errorElement: 'span',errorClass: 'help-inline',focusInvalid: true,
                ignore: "",
                rules: {
                    username: {minlength: 4,required: true},
                    email: {required: true,email: true},
                    password: {required: true,minlength:6},
                    password_repeat: {required: true,minlength:6}
                },
                invalidHandler: function (event, validator) {success1.hide();error1.show();FormValidation.scrollTo(error1, -200);},
                highlight: function (element) { $(element).closest('.help-inline').removeClass('ok'); $(element).closest('.form-group').removeClass('success').addClass('error'); },
                unhighlight: function (element) { $(element).closest('.form-group').removeClass('error');},
                success: function (label) { label.addClass('valid').addClass('help-inline ok').closest('.form-group').removeClass('error').addClass('success'); },
                submitHandler: function (form) { form.submit();success1.show(); error1.hide(); }
            });
    }
    return {init: function () {handleValidation1();},scrollTo: function (el, offeset) {pos = el ? el.offset().top : 0;jQuery('html,body').animate({scrollTop: pos + (offeset ? offeset : 0)}, 'slow');}};
}();
	