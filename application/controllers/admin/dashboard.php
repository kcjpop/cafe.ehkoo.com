<?php
class Admin_Dashboard_Controller extends Admin_Base_Controller
{
	public function action_index()
	{
		$this->layout->nest('content', 'admin.dashboard');
	}
}