<?php if(!defined('PATH_SYSTEM')) die('Bad request!');

class DB_Library
{
	protected $connection;
	protected $strQuery = NULL;

	function connect(){
		if(!file_exists(PATH_SYSTEM . '/config/database.php')) die('Can\'t find: '. PATH_SYSTEM . '/config/database.php');
		else{
			$db_config = require_once(PATH_SYSTEM . '/config/database.php');
			
			$this->connection = new mysqli($db_config['db_host'], $db_config['db_user'], $db_config['db_pass'], $db_config['db_name']);
		}
	}

	function query($strQ){
		$this->strQuery = $strQ;
	}

	function exec(){
		return $this->connection->query($this->strQuery);
	}

	function result_array(){
		$arr = array();
		$result = $this->exec();
		while ($row = $result->fetch_assoc()) {
			$arr[] = $row;
		}
		return $arr;
	}

	function disconnect(){
		$this->connection->close();
	}
}