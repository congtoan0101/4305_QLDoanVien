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

	public function numTotal() {
		return $this->db->get($this->myTable)->num_rows();
	}

	public function numByDCS($maDCS) {
		$sql = "SELECT * FROM doanvien as dv INNER JOIN chidoan as cd ON dv.MACD = cd.MACD WHERE cd.MADCS='".$maDCS."'";
		return $this->db->query($sql)->num_rows();
	}

	public function numBySearch($key = "") {
		if (!empty($key)) {
			$sql = "SELECT * FROM doanvien WHERE CONCAT(HODV,' ',TENDV) LIKE '%".$key."%' OR MADV LIKE '%".$key."%'";
			
			return $this->db->query($sql)->num_rows();
		} else {
			return $this->numTotal();
		}
	}

	public function get($maDV = "", $perpage = 20, $offset = 0) {
		if (!empty($maDV)) {
			$dcs = $this->db->where('MADV', $maDV)->get($this->myTable)->limit($offset,$perpage)->result_array();
			if (count($dcs) > 0) return $dcs[0];
			return null;
		} else {
			return $this->db->get($this->myTable)->result_array();
		}
	}

	public function getBySearch($key = "", $perpage = 20, $offset = 0) {
		if (!empty($key)) {
			$sql = "SELECT * FROM doanvien WHERE CONCAT(HODV,' ',TENDV) LIKE '%".$key."%' OR MADV LIKE '%".$key."%' LIMIT ".$offset.",".$perpage;
			
			return $this->db->query($sql)->result_array();
		} else {
			return $this->get("", $perpage, $offset);
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