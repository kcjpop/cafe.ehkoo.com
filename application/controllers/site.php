<?php
class Site_Controller extends Base_Controller
{
	public $layout = 'layouts.site';

	public function before()
	{
		// JavaScript
		Asset::add('bootstrap', 'js/bootstrap.min.js');
		Asset::add('admin', 'js/admin.js');

		// CSS
		Asset::add('bootstrap', 'css/bootstrap.min.css');
		Asset::add('bootstrap-responsive', 'css/bootstrap-responsive.css');
		Asset::add('font-awesome', 'css/font-awesome.min.css');
		Asset::add('admin', 'css/style.css');
	}
}