<?php
class MongoDB_Base
{
	protected $db;

	/**
	 * Create new connection and select database
	 */
	public function __construct()
	{
		// Connect to database
		$this->db = new MongoClient(Config::get('mongodb.connection_string'));
		$this->db->selectDB(Config::get('mongodb.database'));
	}

	public function __destruct()
	{
		$this->db = null;
	}
}