<?php
class Cafe extends MongoDB_Base
{
	protected $collection = 'cafe';

	/**
	 * Search cafe(s) based on name, address
	 * 
	 * @param  string      $query
	 * @param  string      $language The language to search
	 * @return MongoCursor
	 */
	public function search($query, $language)
	{
		return $this->db->find(array(
			'$or' => array(
				array(
					'name.'.$language => array(
						'$regex' => new MongoRegex("/$query/i")
					)
				),
				array(
					'address'.$language => array(
						'$regex' => new MongoRegex("/$query/i")
					),
				)
			)		
		));
	}
}