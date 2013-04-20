<?php
class Admin_Dashboard_Controller extends Base_Controller
{
	public $layout = 'layouts.admin';

	public function action_index()
	{
		$this->layout->nest('content', 'admin.dashboard');
	}
}