<?php
class Cafe_Controller extends Site_Controller
{
	public function action_index()
	{
		$per_page = Config::get('cafe.per_page');
		$current_page = Input::get('page') !== null ? Input::get('page') : 1;

		// Get all cafe
		$cafe = new Cafe();
		$cafes = array();
		$cursor = $cafe->find()
			->sort(array(
				'_id' => -1
			))
			->skip($per_page * ($current_page - 1))
			->limit($per_page);
		if($cursor->hasNext())
		{
			$default_language = $this->settings['default_language'];

			foreach($cursor as $obj)
			{
				foreach(array('name', 'address', 'reviews') as $field)
				{
					$obj[$field] = isset($obj[$field][$default_language]) ? $obj[$field][$default_language] : '';
				}

				$pictures = array();
				if(isset($obj['pictures']) && !empty($obj['pictures']))
				{
					shuffle($obj['pictures']);
					foreach($obj['pictures'] as $pic)
					{
						// Check if a thumbnail exists
						$path = path('public').'uploads'.DS.$pic;
						$ext = '.'.File::extension($path);
						$pic = str_replace($ext, '_100'.$ext, $pic);
						$path = path('public').'uploads'.DS.$pic;
						if(file_exists($path))
						{
							$pictures[] = URL::to_asset('uploads'.DS.$pic);
						}
					}

					$obj['pictures'] = array_slice($pictures, 0, 3);
				}

				$obj['views'] = (int) $obj['views'];

				$cafes[] = $obj;
			}
		}

		$total = $cafe->count();
		$pagination = Paginator::make($cafes, $total, $per_page);

		$this->layout->nest('content', 'home.browse', array(
			'cafes'      => $cafes,
			'pagination' => $pagination->links()
		));
	}

	/**
	 * Display information of a cafe
	 * 
	 * @param  MongoId $id
	 * @return void
	 */
	public function action_view($id)
	{
		// Add jQuery Mansonry to arrange picutures
		Asset::add('jquery.masonry', 'js/jquery.masonry.min.js');
		
		// Add ColorBox
		Asset::add('jquery.colorbox', 'js/jquery.colorbox.min.js');
		Asset::add('css.colorbox', 'css/colorbox/colorbox.css');

		// Get cafe information
		$cafe = new Cafe();
		$cafe = $cafe->findOne(array(
			'_id' => new MongoId($id)
		));

		// If not found, raise a 404
		if($cafe === null)
		{
			return Response::error('404');
		}

		// Get content based on current language
		foreach( array('name', 'address', 'review') as $field )
		{
			$cafe[$field] = isset($cafe[$field][$this->settings['default_language']]) ? $cafe[$field][$this->settings['default_language']] : '';
		}

		// Display the view
		$this->layout->nest('content', 'home.cafe', array(
			'cafe' => $cafe
		));
	}
}