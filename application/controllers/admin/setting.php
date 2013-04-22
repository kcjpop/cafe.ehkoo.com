<?php
class Admin_Setting_Controller extends Admin_Base_Controller
{
	public $restful = true;

	/**
	 * Display the setting form
	 * 
	 * @return [type] [description]
	 */
	public function get_index()
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

	/**
	 * Handle submitted data
	 * 
	 * @return [type] [description]
	 */
	public function post_index()
	{
		$setting = new Setting();
		$keys = Input::get('key');
		foreach($keys as $key => $value)
		{
			$setting->save(array(
				'_id' => $key,
				'value' => $value
			));
		}

		return Redirect::to(Request::referrer())
			->with('status', 'success')
			->with('message', 'Settings updated.');

	}
}