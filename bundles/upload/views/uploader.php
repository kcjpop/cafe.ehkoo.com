<span class="btn file-input-area text-right">
	<i class="icon-upload"></i> <span>Select files...</span>
	<input id="file_upload" type="file" name="uploader" data-url="<?php echo URL::to_action('upload') ?>" multiple>
</span>
<div id="file_list"></div>
<div class="progress progress-striped active" id="progress">
    <div class="bar"></div>
</div>
<?php echo Asset::container('upload')->scripts() ?>
<script type="text/javascript">
$(function() {
	$('#file_upload').fileupload({
		dataType: 'json',
		progress: function (e, data) {
	        var progress = parseInt(data.loaded / data.total * 100, 10);
	        data.context.find('span').text(progress + '%');
	        // console.log(data);
	    },
        add: function (e, data) {
        	for(var i in data.files) {
            	data.context = $('<code/>')
            		.text(data.files[i].name)
            		.append('<span class="pull-right">0%</span>')
            		.appendTo('#file_list');
        		data.submit();
        	}
        },
        done: function (e, data) {
        	if(data.result.status === 'success') {
        		var _elm = $('<input>')
	            	.attr('name', 'files[]')
	            	.attr('type', 'checkbox')
	            	.attr('checked', 'checked')
	            	.val(data.result.files[0].path);
            	data.context.html($('<label/>').text(' ' + data.result.files[0].filename).prepend(_elm));
        	}
        }
	});
});
</script>
