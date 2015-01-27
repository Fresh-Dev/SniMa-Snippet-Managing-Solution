/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var FormValidation = function () {    
    var handleValidation1 = function() {    
            var form1 = $('#newSnippetForm');
            var error1 = $('.alert-error', form1);
            var success1 = $('.alert-success', form1);
            
            form1.validate({
                lang: '{$lang}',
                errorElement: 'span',
                errorClass: 'help-inline',
                focusInvalid: true,
                ignore: "",
                rules: {
                    title: {minlength: 4,required: true},
                    language: {required: true},
                    description: {required: true},
                    sourcecode:{required: true}
                },
                invalidHandler: function (event, validator) {success1.hide();error1.show();FormValidation.scrollTo(error1, -200);},
                highlight: function (element) { $(element).closest('.help-inline').removeClass('ok'); $(element).closest('.form-group').removeClass('success').addClass('error'); },
                unhighlight: function (element) { $(element).closest('.form-group').removeClass('error');},
                success: function (label) { label.addClass('valid').addClass('help-inline ok').closest('.form-group').removeClass('error').addClass('success'); },
                submitHandler: function (form1) 
                { 
                    
  form1.submit();
//                    success1.removeClass("hide");success1.show();
//                    error1.removeClass("hide");error1.hide(); 
                }
            });
    }
    return {init: function () {handleValidation1();},scrollTo: function (el, offeset) {pos = el ? el.offset().top : 0;jQuery('html,body').animate({scrollTop: pos + (offeset ? offeset : 0)}, 'slow');}};
}();
function loadjscssfile(filename, filetype){
 if (filetype=="js"){ //if filename is a external JavaScript file
  var fileref=document.createElement('script')
  fileref.setAttribute("type","text/javascript")
  fileref.setAttribute("src", filename)
 }
 else if (filetype=="css"){ //if filename is an external CSS file
  var fileref=document.createElement("link")
  fileref.setAttribute("rel", "stylesheet")
  fileref.setAttribute("type", "text/css")
  fileref.setAttribute("href", filename)
 }
 if (typeof fileref!="undefined")
  document.getElementsByTagName("head")[0].appendChild(fileref)
}

var editor = ace.edit("editor");    
editor.getSession().setMode("ace/mode/javascript");


//EVENT: Code in Editor get changed
editor.getSession().on('change', function(e) {$('#sourcecode').val(editor.getSession().getValue());});





