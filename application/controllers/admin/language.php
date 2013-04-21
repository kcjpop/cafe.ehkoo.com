<?php
class Admin_Language_Controller extends Admin_Base_Controller
{
	public $restful = true;

	/**
	 * Create new cafe
	 * 
	 * @return [type] [description]
	 */
	public function post_index()
	{
		$language = new Language();
		$result = $language->insert(array(
			'name' => Input::get('name'),
			'code' => Input::get('code')
		));

		$status  = 'success';
		$message = 'A new language has been added';
		if($result !== true)
		{
			$status  = 'error';
			$message = $result['errmsg'];
		}

		return Redirect::to('admin/setting#language')
			->with('status', $status)
			->with('message', $message);
	}
}