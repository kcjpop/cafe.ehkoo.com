$(function() {
    $('#btn_submit').on('click', function(e) {
		console.log('aga');
        $('#frm_new_language').submit();
        e.preventDefault();
    });

    // Set active tab based on URL hash tag
    var _hash = window.location.hash,
    	_a = $('#tab_settings').find('a[href='+_hash+']');
    _a.tab('show');
    _a.parent('li').addClass('active');
});