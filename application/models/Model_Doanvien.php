<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Doanvien extends CI_Model {
	
	private $myTable = 'doanvien';

	function __construct() {
		parent::__construct();
	}

	public function existed($maDV) {
		if ($this->db->where('MADV', $maDV)->from($this->myTable)->count_all_results() > 0) return true;
		return false;
	}

	public function get($maDV = "") {
		if (!empty($maDV)) {
			$dcs = $this->db->where('MADV', $maDV)->get($this->myTable)->result_array();
			if (count($dcs) > 0) return $dcs[0];
			return null;
		} else {
			return $this->db->get($this->myTable)->result_array();
		}
	}

	public function insert($data = []) {
		if ($data) {
			return $this->db->insert($this->myTable, $data);
		}
		return false;
	}

	public function update($data = []) {
		if ($data) {
			return $this->db->where('MADV', $data['MADV'])->update($this->myTable, $data);
		}
		return false;
	}

	public function delete($maDV) {
		if ($maDV) {
			return $this->db->where('MADV', $maDV)->delete($this->myTable);
		}
		return false;
	}
}