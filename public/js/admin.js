$(function() {
    $('#btn_submit').on('click', function(e) {
		console.log('aga');
        $('#frm_new_language').submit();
        e.preventDefault();
    });
});