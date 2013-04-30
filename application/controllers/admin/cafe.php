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
	/**
	 * Display the form to edit a cafe
	 * 
	 * @param  MongoId $id
	 * @return void
	 */
	public function action_edit($id)
	{
		// Get cafe information
		$model = new Cafe();
		$cafe = $model->findOne(array(
			'_id' => new MongoId($id)
		));

		if($cafe === null) {
			return Redirect::to('admin.dashboard')
				->with('status', 'error')
				->with('message', 'Could not find the requesting cafe');
		}

		// Get all languages
		$language = new Language();
		$languages = $language->find();

		// Get file loader
		$uploader = Router::route('GET', 'upload')
			->call();

		$this->layout->nest('content', 'admin.cafe', array(
			'cafe'      => $cafe,
			'languages' => $languages,
			'uploader'  => $uploader
		));
	}

	/**
	 * Handle POST data and update/create based on the present of ID
	 * 
	 * @return void
	 */
	public function action_do_post()
	{
		if(Request::method() === 'POST')
		{
			$status = 'success';
			$message = 'A new cafe has been added.';

			$rules = array(
				'name' => 'required|array|array_at_least_not_empty'
			);

			$id = Input::get('_id', false);

			$validation = Validator::make(Input::all(), $rules);
			if($validation->fails())
			{
				$status = 'error';
				$message = implode('', $validation->errors->all(':message<br>'));
			}
			else
			{			
				$cafe = new Cafe();
				$data = array(
					'name'     => Input::get('name'),
					'address'  => Input::get('address'),
					'review'   => Input::get('review'),
					'pictures' => Input::get('files', array()),
					'views'    => Input::get('views')
				);

				// Determine this is update or create
				if(!empty($id))
				{
					$data['_id'] = new MongoId($id);
					$message = 'Information has been updated.';
				}

				$result = $cafe->save($data);

				if((int) $result['ok'] !== 1)
				{
					$status = 'error';
					$message = 'An error has occurred. Please try again.';
				}
			}

			return Redirect::to(Request::referrer())
				->with('status', $status)
				->with('message', $message);
		}
	}
}