<?php
class Admin_Dashboard_Controller extends Admin_Base_Controller
{
	public function action_index()
	{
		// Get all languages
		$language = new Language();
		$languages = array();
		$cursor = $language->find();
		if($cursor->hasNext())
		{
			foreach($cursor as $obj)
			{
				$languages[] = $obj;
			}
		}

		// Get all cafe
		$cafe = new Cafe();
		$cafes = array();
		$cursor = $cafe->find();
		if($cursor->hasNext())
		{
			foreach($cursor as $obj)
			{
				$cafes[] = $obj;
			}
		}

		$this->layout->nest('content', 'admin.dashboard', array(
			'languages' => $languages,
			'cafes'     => $cafes
		));
	}
}