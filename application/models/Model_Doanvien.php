<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Doanvien extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function existed($maDV) {
		$sql = "SELECT * FROM QLDV.DOANVIEN WHERE MADV='".$maDV."'";
		
		if ($this->db->query($sql)->num_rows() > 0) return true;
		return false;
	}

	public function numTotal() {
		$sql = "SELECT * FROM QLDV.DOANVIEN";
		return $this->db->query($sql)->num_rows();
	}

	public function numByDCS($maDCS) {
		$sql = "SELECT * FROM QLDV.DOANVIEN as dv INNER JOIN QLDV.CHIDOAN as cd ON dv.MACD = cd.MACD WHERE cd.MADCS='".$maDCS."'";
		return $this->db->query($sql)->num_rows();
	}

	public function numBySearch($key = "") {
		if (!empty($key)) {
			$sql = "SELECT * FROM QLDV.DOANVIEN WHERE CONCAT(HODV,CONCAT(' ',TENDV)) LIKE '%".$key."%' OR MADV LIKE '%".$key."%'";
			
			return $this->db->query($sql)->num_rows();
		} else {
			return $this->numTotal();
		}
	}

	public function get($maDV = "", $perpage = 20, $offset = 0) {
		if (!empty($maDV)) {
			
			$sql = "SELECT * FROM QLDV.DOANVIEN WHERE MADV='".$maDV."' LIMIT ".$offset.",".$perpage;
			
			$cd = $this->db->query($sql)->result_array();
			if (count($cd) > 0) return $cd[0];
			return null;
		} else {
			
			$sql = "SELECT * FROM QLDV.DOANVIEN ORDER BY MADV ASC LIMIT ".$offset.",".$perpage;
			
			return $this->db->query($sql)->result_array();
		}
	}

	public function getBySearch($key = "", $perpage = 20, $offset = 0) {
		if (!empty($key)) {
			$sql = "SELECT * FROM QLDV.DOANVIEN WHERE CONCAT(HODV,CONCAT(' ',TENDV)) LIKE '%".$key."%' OR MADV LIKE '%".$key."%' LIMIT ".$offset.",".$perpage;
			
			return $this->db->query($sql)->result_array();
		} else {
			return $this->get("", $perpage, $offset);
		}
	}

	public function insert($data = []) {
		if ($data) {
			$sql = "INSERT INTO QLDV.DOANVIEN VALUES ('".$data['MADV']."', '".$data['HODV']."', '".$data['TENDV']."', '".$data['MACD']."', '".$data['NGAYSINH']."', ".$data['GIOITINH'].", '".$data['NGAYVAODOAN']."', '".$data['QUEQUAN']."', '".$data['CHUCVU']."')";
			
			return $this->db->query($sql);
		}
		return false;
	}

	public function update($data = []) {
		if ($data) {
			$sql = "UPDATE QLDV.DOANVIEN SET HODV='".$data['HODV']."', TENDV='".$data['TENDV']."', MACD='".$data['MACD']."', NGAYSINH='".$data['NGAYSINH']."', GIOITINH=".$data['GIOITINH'].", NGAYVAODOAN='".$data['NGAYVAODOAN']."', QUEQUAN='".$data['QUEQUAN']."', CHUCVU='".$data['CHUCVU']."' WHERE MADV='".$data['MADV']."'";
			
			return $this->db->query($sql);
		}
		return false;
	}

	public function delete($maDV) {
		if ($maDV) {
			$sql = "DELETE FROM QLDV.DOANVIEN WHERE MADV='".$maDV."'";
			
			return $this->db->query($sql);
		}
		return false;
	}
}