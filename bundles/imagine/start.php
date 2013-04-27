<?php
Autoloader::directories(array(
	Bundle::path('imagine') . 'lib'
));

Event::listen('upload::uploaded', function($file) {
	// Create a thumbnail if this is an image
	if(File::is('jpg', $file['path'])
		|| File::is('gif', $file['path'])
		|| File::is('png', $file['path']))
	{
		$imagine = new Imagine\Gd\Imagine();
		$size = new Imagine\Image\Box(100, 100);
		$mode = Imagine\Image\ImageInterface::THUMBNAIL_OUTBOUND;

		$file_ext = '.' . File::extension($file['name']);
		$new_file = str_replace($file_ext, '_100_thumb'.$file_ext, $file['path']);
		return $imagine->open($file['path'])
			->thumbnail($size, $mode)
			->save($new_file);
	}
});