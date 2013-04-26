<?php
class Admin_Cafe_Controller extends Admin_Base_Controller
{
	public function action_index()
	{
		// Get all languages
		$language = new Language();
		$languages = $language->find();
		
		// Get file uploader
		$uploader = Router::route('GET', 'upload')
			->call();

		$this->layout->nest('content', 'admin.cafe', array(
			'languages' => $languages,
			'uploader' => $uploader
		));
	}

	public function action_do_create()
	{
		if(Request::method() === 'POST')
		{
			$status = 'success';
			$message = 'A new cafe has been added.';

			$rules = array(
				'name' => 'required|array|array_at_least_not_empty'
			);

			$validation = Validator::make(Input::all(), $rules);
			if($validation->fails())
			{
				$status = 'error';
				$message = implode('', $validation->errors->all(':message<br>'));
			}
			else
			{			
				$cafe = new Cafe();
				$result = $cafe->insert(array(
					'name'     => Input::get('name'),
					'address'  => Input::get('address'),
					'review'   => Input::get('review'),
					'pictures' => Input::get('files', array()),
					'views'    => 0
				));

				if($result !== true)
				{
					$status = 'error';
					$message = $result['errmsg'];
				}
			}

			return Redirect::to('admin/cafe')
				->with('status', $status)
				->with('message', $message);
		}


	}
}