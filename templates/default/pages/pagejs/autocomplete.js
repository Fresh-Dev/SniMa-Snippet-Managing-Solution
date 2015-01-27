/**
 * LIVE SEARCHES AND AUTOCOMPLETES
 */


/*  NEW MESSAGE MODAL USERNAMES */
var autocomInput = $('#msg_target');
autocomInput.autocomplete({
serviceUrl: 'index.php?ajax=autocomplete&mode=usernames',
onSelect: 
        function (suggestion) {
            $("#toUserId").val(suggestion.data);
            $("#newMsgSubmitBtn").removeAttr("disabled");
        }
});


var navigationSearchInput = $("#navsearch");
navigationSearchInput.autocomplete({
    serviceUrl: 'index.php?ajax=autocomplete&mode=navsearch',
    onSelect: function (suggestion) {$(location).attr('href',window.location.protocol+"//"+window.location.host+"/"+"index.php?page=snippet&snippet="+suggestion.data);}
});
