<?php
class Admin_Cafe_Controller extends Admin_Base_Controller
{
	public function action_create()
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

			return Redirect::to('admin/dashboard')
				->with('status', $status)
				->with('message', $message);
		}
	}
}