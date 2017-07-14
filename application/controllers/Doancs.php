<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doancs extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Model_Doancs');
		if ($this->session->userdata('QUYEN') < 1) {
			@header("Location: " . base_url());
			@die;
		}
	}

	public function index() {
		$mdDCS = $this->Model_Doancs;
		$listDCS = $mdDCS->get();

		$data = [
			'metaTitle' => 'Đoàn cơ sở',
			'mainContent' => 'doancs/home',
			'sb_page' => 'doancs',
			'listDCS' => $listDCS
		];	

		$this->load->view('mainLayout', $data);
	}

	public function sua($maDCS = "") {
		if (!empty($maDCS)) {
			$mdDCS = $this->Model_Doancs;
			$doancs = $mdDCS->get($maDCS);
			if ($doancs == null) {
				@header("Location: " . base_url('doancs'));
				@die;
			}
			$data = [
				'metaTitle' => 'Sửa thông tin | Đoàn cơ sở',
				'mainContent' => 'doancs/sua',
				'sb_page' => 'doancs',
				'doancs' => $doancs
			];	

			$this->load->view('mainLayout', $data);
		} else {
			@header("Location: " . base_url('doancs'));
			@die;
		}
	}

	public function xoa($maDCS = "") {
		if (!empty($maDCS)) {
			$mdDCS = $this->Model_Doancs;
			$doancs = $mdDCS->get($maDCS);
			if ($doancs == null) {
				@header("Location: " . base_url('doancs'));
				@die;
			}
			$data = [
				'metaTitle' => 'Xóa | Đoàn cơ sở',
				'mainContent' => 'doancs/xoa',
				'sb_page' => 'doancs',
				'doancs' => $doancs
			];	

			$this->load->view('mainLayout', $data);
		} else {
			@header("Location: " . base_url('doancs'));
			@die;
		}
	}

	// Xử lý ajax
	function xulyThemDCS() {
		$mdDCS = $this->Model_Doancs;
		$params = $this->input->post();

		if (!isset($params['MADCS']) || empty($params['MADCS'])) {
			$result = array(
				'status' => false,
				'message' => 'Chưa nhập Mã Đoàn cơ sở'
			);
		} elseif (!isset($params['TENDCS']) || empty($params['TENDCS'])) {
			$result = array(
				'status' => false,
				'message' => 'Chưa nhập Tên Đoàn cơ sở'
			);
		} else {
			if ($mdDCS->existed($params['MADCS'])) {
				$result = array(
					'status' => false,
					'message' => 'Mã Đoàn cơ sở này đã tồn tại. Hãy chọn một Mã Đoàn cơ sở khác.'
				);
			} else {
				if ($mdDCS->insert($params)) {
					$result = array(
						'status' => true,
						'message' => 'Thêm Đoàn cơ sở thành công'
					);
				} else {
					$result = array(
						'status' => false,
						'message' => 'Lỗi khi thêm Đoàn cơ sở'
					);
				}
			}
		}

		echo json_encode($result);
	}

	function xulySuaDCS() {
		$mdDCS = $this->Model_Doancs;
		$params = $this->input->post();

		if (!isset($params['MADCS']) || empty($params['MADCS'])) {
			$result = array(
				'status' => false,
				'message' => 'Chưa nhập Mã Đoàn cơ sở'
			);
		} elseif (!isset($params['TENDCS']) || empty($params['TENDCS'])) {
			$result = array(
				'status' => false,
				'message' => 'Chưa nhập Tên Đoàn cơ sở'
			);
		} else {
			if (!$mdDCS->existed($params['MADCS'])) {
				$result = array(
					'status' => false,
					'message' => 'Mã Đoàn cơ sở này không tồn tại. Vui lòng kiểm tra lại.'
				);
			} else {
				if ($mdDCS->update($params)) {
					$result = array(
						'status' => true,
						'message' => 'Cập nhật Đoàn cơ sở thành công'
					);
				} else {
					$result = array(
						'status' => false,
						'message' => 'Lỗi khi cập nhật Đoàn cơ sở'
					);
				}
			}
		}

		echo json_encode($result);
	}

	function xulyXoaDCS() {
		$mdDCS = $this->Model_Doancs;
		$maDCS = $this->input->post('MADCS');
		
		if (!$mdDCS->existed($maDCS)) {
			$result = array(
				'status' => false,
				'message' => 'Mã Đoàn cơ sở này không tồn tại. Vui lòng kiểm tra lại.'
			);
		} else {
			if ($mdDCS->delete($maDCS)) {
				$result = array(
					'status' => true,
					'message' => 'Xóa Đoàn cơ sở thành công'
				);
			} else {
				$result = array(
					'status' => false,
					'message' => 'Lỗi khi xóa Đoàn cơ sở'
				);
			}
		}

		echo json_encode($result);
		die;
	}
}
