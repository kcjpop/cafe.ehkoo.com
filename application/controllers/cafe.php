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
			foreach($cursor as $obj)
			{
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
}