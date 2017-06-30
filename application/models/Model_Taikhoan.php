<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Taikhoan extends CI_Model {
	
	private $myTable = 'taikhoan';

	function __construct() {
		parent::__construct();
	}

	public function existed($tnd) {
		if ($this->db->where('TENDANGNHAP', $tnd)->from($this->myTable)->count_all_results() > 0) return true;
		return false;
	}

	public function get($tnd = "") {
		if (!empty($tnd)) {
			$nv = $this->db->where('TENDANGNHAP', $tnd)->get($this->myTable)->result_array();
			if (count($nv) > 0) return $nv[0];
			return null;
		} else {
			return $this->db->get($this->myTable)->result_array();
		}
	}

	public function insert($data = []) {
		if ($data) {
			$data['MATKHAU'] = password_hash($data['MATKHAU'], PASSWORD_DEFAULT);
			return $this->db->insert($this->myTable, $data);
		}
		return false;
	}

	public function update($data = []) {
		if ($data) {
			if (empty($data['MATKHAU'])) {
				unset($data['MATKHAU']);
			} else {
				$data['MATKHAU'] = password_hash($data['MATKHAU'], PASSWORD_DEFAULT);
			}
			return $this->db->where('TENDANGNHAP', $data['TENDANGNHAP'])->update($this->myTable, $data);
		}
		return false;
	}

	public function delete($tnd) {
		if ($tnd) {
			return $this->db->where('TENDANGNHAP', $tnd)->delete($this->myTable);
		}
		return false;
	}
}