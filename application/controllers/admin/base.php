<?php
class Admin_Base_Controller extends Base_Controller
{
	public $layout = 'layouts.admin';

	public function before()
	{
		// JavaScript
		Asset::add('bootstrap', 'js/bootstrap.min.js');

		// CSS
		Asset::add('bootstrap', 'css/bootstrap.min.css');
		Asset::add('bootstrap-responsive', 'css/bootstrap-responsive.css');
		Asset::add('font-awesome', 'css/font-awesome.min.css');
		Asset::add('admin', 'css/admin.style.css');
	}
}