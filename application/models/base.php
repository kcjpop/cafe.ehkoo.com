<?php
class MongoDB_Base
{
	protected $db;
	protected $collection;

	/**
	 * Create new connection and select database
	 */
	public function __construct()
	{
		// Connect to database
		$mongo = new MongoClient(Config::get('mongodb.connection_string'));

		$db_name = Config::get('mongodb.database');
		$db = $mongo->$db_name;
		$this->db = $db->{$this->collection};
	}

	public function __destruct()
	{
		$this->db = null;
	}

	public function insert($data)
	{
		return $this->db->insert($data, array('w' => 0));
	}
}