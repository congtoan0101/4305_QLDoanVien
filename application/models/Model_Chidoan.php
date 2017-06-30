<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Chidoan extends CI_Model {
	
	private $myTable = 'chidoan';

	function __construct() {
		parent::__construct();
	}

	public function existed($maCD) {
		if ($this->db->where('MACD', $maCD)->from($this->myTable)->count_all_results() > 0) return true;
		return false;
	}

	public function get($maCD = "") {
		if (!empty($maCD)) {
			$dcs = $this->db->where('MACD', $maCD)->get($this->myTable)->result_array();
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
			return $this->db->where('MACD', $data['MACD'])->update($this->myTable, $data);
		}
		return false;
	}

	public function delete($maCD) {
		if ($maCD) {
			return $this->db->where('MACD', $maCD)->delete($this->myTable);
		}
		return false;
	}
}