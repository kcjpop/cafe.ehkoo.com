<?php

class Home_Controller extends Site_Controller
{
	
	public function action_index()
	{
		$this->layout->nest('content', 'home.index', array(
		));
	}

}