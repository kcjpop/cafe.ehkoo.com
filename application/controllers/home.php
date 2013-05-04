<?php

class Home_Controller extends Site_Controller
{
	public function action_index()
	{
		Asset::add('jquery.masonry', 'js/jquery.masonry.min.js');
		
		// Get hottest cafe
		$hottest = array();
		$cafe = new Cafe();
		$result = $cafe->get_hottest();
		if($result->hasNext())
		{
			foreach($result as $item)
			{
				foreach(array('name', 'address') as $field)
				{
					$item[$field] = $item[$field][$this->settings['default_language']];
				}

				$item['pictures'] = (array) $item['pictures'];
				$hottest[] = $item;
			}
		}

		$this->layout->nest('content', 'home.index', array(
			'hottest' => $hottest
		));
	}

}