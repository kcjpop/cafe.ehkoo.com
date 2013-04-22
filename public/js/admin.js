$(function() {
    $('#btn_submit').on('click', function(e) {
		console.log('aga');
        $('#frm_new_language').submit();
        e.preventDefault();
    });

    var getParameterByName = function(name) {
        name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
        var regexS = "[\\?&]" + name + "=([^&#]*)";
        var regex = new RegExp(regexS);
        var results = regex.exec(window.location.search);
        if(results == null)
            return "";
        else
            return decodeURIComponent(results[1].replace(/\+/g, " "));
    };

    // Set active tab based on URL hash tag
    var _tab = getParameterByName('tab'),
    	_a = $('#tab_settings').find('a[href=#'+_tab+']');
    _a.tab('show');
    _a.parent('li').addClass('active');
});