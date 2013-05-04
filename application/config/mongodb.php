<?php
foreach(array('OPENSHIFT_MONGODB_DB_HOST',
	'OPENSHIFT_MONGODB_DB_PORT',
	'OPENSHIFT_MONGODB_DB_USERNAME',
	'OPENSHIFT_MONGODB_DB_PASSWORD') as $env_field)
{
	// Local environment
	if(!isset($_ENV[$env_field]))
	{
		return array(
			'connection_string' => 'mongodb://localhost:27017',
			'database'          => 'cafevn'
		);		
	}
}

return array(
	'connection_string' => sprintf('mongodb://%s:%s@%s:%s',
							$_ENV['OPENSHIFT_MONGODB_DB_USERNAME'],
							$_ENV['OPENSHIFT_MONGODB_DB_PASSWORD'],
							$_ENV['OPENSHIFT_MONGODB_DB_HOST'],
							$_ENV['OPENSHIFT_MONGODB_DB_PORT']),
	'database'          => 'cafevn'
);