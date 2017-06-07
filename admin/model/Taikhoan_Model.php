<?php if(!defined('PATH_SYSTEM')) die('Bad request!');

class Taikhoan_Model extends QD_Model
{
	
	function __construct() {
		parent::__construct();
	}

	function getTaiKhoan($email = NULL) {
		if ($email) {
			$sql = "SELECT * FROM taikhoan WHERE EMAIL='".$email."'";
		} else {
			$sql = "SELECT * FROM taikhoan";
		}
		$this->db->query($sql);
		return $this->db->result_array();
	}
}