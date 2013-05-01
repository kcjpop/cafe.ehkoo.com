<?php
class Search_Controller extends Site_Controller {

	/**
	 * Search cafe(s)
	 * 
	 * @return void
	 */
	public function action_index()
	{
		$cafes = array();
		$lang  = $this->settings['default_language'];

		$cafe = new Cafe();
		$result = $cafe->search(Input::get('q'), $lang);
		if($result->hasNext())
		{
			foreach($result as $obj)
			{
				$cafes[] = array(
					'name'     => $obj['name'][$lang],
					'address'  => $obj['address'][$lang],
					'review'   => $obj['review'][$lang],
					'views'    => $obj['views'],
					'pictures' => $obj['pictures'],
					'_id'      => $obj['_id']
				);
			}
		}

		$this->layout->nest('content', 'home.browse', array(
			'cafes' => $cafes,
			'pagination' => ''
		));
	}
}