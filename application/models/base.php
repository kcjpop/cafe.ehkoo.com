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

	public function find($query = array())
	{
		return $this->db->find($query);
	}

	public function findOne($query)
	{
		return $this->db->findOne($query);
	}

	public function count($query = array(), $limit = 0, $skip = 0)
	{
		return $this->db->count($query, $limit, $skip);
	}

	public function save($document, $options = array())
	{
		return $this->db->save($document, $options);
	}

	public function delete($id)
	{
		return $this->db->remove(array(
			'_id' => new MongoId($id)
		));
	}
}