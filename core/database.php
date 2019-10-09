<?php
namespace Core;

class Database
{
	protected $DBConfig;

	protected $DBInstance;

	public function __construct()
	{
		$this->databaseConfig = require(__DIR__.'../../config/database.php');

		$this->DBInstance = $this->connect();
	}

	private function connect()
	{
		$credentials = $this->databaseConfig[$this->databaseConfig['database']];
		$connection = mysqli_connect(
			$credentials['host'],
			$credentials['username'],
			$credentials['password'],
			$credentials['database']
		);

		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			exit;
		}

		return $connection;
	}
}
