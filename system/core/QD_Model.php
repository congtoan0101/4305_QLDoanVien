<?php if(!defined('PATH_SYSTEM')) die('Bad request!');

require_once(PATH_SYSTEM . '/library/DB_Library.php');

class QD_Model
{
	static $db = NULL;

	function __construct() {
		$this->db = new DB_Library();
		$this->db->connect();
	}

	function __destruct(){
		$this->db->disconnect();
	}
}