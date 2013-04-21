<?php
class Admin_Dashboard_Controller extends Admin_Base_Controller
{
	public function action_index()
	{
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

		$this->layout->nest('content', 'admin.dashboard', array(
			'languages' => $languages
		));
	}
}