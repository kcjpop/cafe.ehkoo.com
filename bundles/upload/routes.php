<?php
Route::get('(:bundle)', function()
{
	// Register assets
    Asset::container('upload')
    	->add('jquery.ui.widget', 'js/vendor/jquery.ui.widget.js')
    	->add('jquery.iframe.transport', 'js/jquery.iframe-transport.js')
    	->add('jquery.fileupload', 'js/jquery.fileupload.js')
    	->bundle('upload');
	
	// Return the upload form
	return View::make('upload::uploader');
});

Route::post('(:bundle)', function() {
	$result = array('status' => 'error');

	$file = Input::file('uploader');
	if($file !== null)
	{
		$filename = md5($file['name'] . uniqid()) .'.'. File::extension($file['name']);
		// return Response::json($filename);
		$relative_path = date('Y') . DS . date('m') . DS . date('d');
		$abs_path = path('public') . 'uploads' . DS . $relative_path;
		if( !file_exists($abs_path) )
		{
			mkdir($abs_path, 0755, true);
		}

		Input::upload('uploader', $abs_path, $filename);

		$response = Event::first('upload::uploaded', array(
			'file' => array(
				'name'          => $filename,
				'original_name' => $file['name'],
				'path'          => $abs_path . DS . $filename,
			)
		));

		$result['status'] = 'success';
		$result['files'][] = array(
			'filename' => $file['name'],
			'path'     => $relative_path . DS . $filename
		);
	}

	return Response::json($result);
});

Route::post('(:bundle)/delete', function() {
	$path = path('public') . 'uploads' . DS . Input::get('file');
	@unlink($path);
});