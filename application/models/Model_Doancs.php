<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Doancs extends CI_Model {
	
	private $myTable = 'doancs';

	function __construct() {
		parent::__construct();
	}

	public function existed($maDCS) {
		if ($this->db->where('MADCS', $maDCS)->from($this->myTable)->count_all_results() > 0) return true;
		return false;
	}

	public function get($maDCS = "") {
		if (!empty($maDCS)) {
			$dcs = $this->db->where('MADCS', $maDCS)->get($this->myTable)->result_array();
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
			return $this->db->where('MADCS', $data['MADCS'])->update($this->myTable, $data);
		}
		return false;
	}

	public function delete($maDCS) {
		if ($maDCS) {
			return $this->db->where('MADCS', $maDCS)->delete($this->myTable);
		}
		return false;
	}
}