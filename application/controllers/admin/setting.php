<?php
class Admin_Setting_Controller extends Admin_Base_Controller
{
	public function action_index()
	{
		// Get available languages
		$languages = array();

		$language = new Language();
		$cur = $language->find();
		
		if($cur->hasNext() === true)
		{
			foreach($cur as $obj)
			{
				$languages[] = $obj;
			}
		}

		$this->layout->nest('content', 'admin.setting', array(
			'languages' => $languages
		));
	}
}