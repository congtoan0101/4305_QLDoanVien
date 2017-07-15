<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chidoan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Model_Chidoan');
		$this->load->model('Model_Doancs');
	}

	public function index() {
		$mdCD = $this->Model_Chidoan;
		$listCD = $mdCD->get();
		$mdDCS = $this->Model_Doancs;
		$listDCS = $mdDCS->get();

		$tempListCD = [];

		foreach ($listCD as $k => $item) {
			$tempListCD[$k]['MACD'] = $item['MACD'];
			$tempListCD[$k]['TENCD'] = $item['TENCD'];
			$tempListCD[$k]['TENDCS'] = $mdDCS->get($item['MADCS'])['TENDCS'];
		}
		$listCD = $tempListCD;

		$data = [
			'metaTitle' => 'Chi đoàn',
			'mainContent' => 'chidoan/home',
			'sb_page' => 'chidoan',
			'listCD' => $listCD,
			'listDCS' => $listDCS
		];	

		$this->load->view('mainLayout', $data);
	}

	public function sua($maCD = "") {
		if (!empty($maCD)) {
			$mdCD = $this->Model_Chidoan;
			$mdDCS = $this->Model_Doancs;
			$listDCS = $mdDCS->get();
			$maCD = urldecode($maCD);
			$chidoan = $mdCD->get($maCD);
			if ($chidoan == null) {
				@header("Location: " . base_url('chidoan'));
				@die;
			}
			
			$data = [
				'metaTitle' => 'Sửa thông tin | Chi đoàn',
				'mainContent' => 'chidoan/sua',
				'sb_page' => 'chidoan',
				'listDCS' => $listDCS,
				'chidoan' => $chidoan
			];	

			$this->load->view('mainLayout', $data);
		} else {
			@header("Location: " . base_url('chidoan'));
			@die;
		}
	}

	public function xoa($maCD = "") {
		if (!empty($maCD)) {
			$mdCD = $this->Model_Chidoan;
			$mdDCS = $this->Model_Doancs;
			$maCD = urldecode($maCD);
			$chidoan = $mdCD->get($maCD);
			if ($chidoan == null) {
				@header("Location: " . base_url('chidoan'));
				@die;
			}
			$data = [
				'metaTitle' => 'Xóa | Đoàn viên',
				'mainContent' => 'chidoan/xoa',
				'sb_page' => 'chidoan',
				'chidoan' => $chidoan
			];	

			$this->load->view('mainLayout', $data);
		} else {
			@header("Location: " . base_url('chidoan'));
			@die;
		}
	}

	// Xử lý ajax
	function xulyThemCD() {
		$mdCD = $this->Model_Chidoan;
		$params = $this->input->post();

		if (!isset($params['MACD']) || empty($params['MACD'])) {
			$result = array(
				'status' => false,
				'message' => 'Chưa nhập Mã Chi đoàn'
			);
		} elseif (!isset($params['TENCD']) || empty($params['TENCD'])) {
			$result = array(
				'status' => false,
				'message' => 'Chưa nhập Tên Chi đoàn'
			);
		} elseif (!isset($params['MADCS']) || empty($params['MADCS'])) {
			$result = array(
				'status' => false,
				'message' => 'Chưa chọn Đoàn cơ sở'
			);
		} else {
			if ($mdCD->existed($params['MACD'])) {
				$result = array(
					'status' => false,
					'message' => 'Mã Chi đoàn này đã tồn tại. Hãy chọn một Mã Chi đoàn khác.'
				);
			} else {
				if ($mdCD->insert($params)) {
					$result = array(
						'status' => true,
						'message' => 'Thêm Chi đoàn thành công'
					);
				} else {
					$result = array(
						'status' => false,
						'message' => 'Lỗi khi thêm Chi đoàn'
					);
				}
			}
		}

		echo json_encode($result);
	}

	function xulySuaCD() {
		$mdCD = $this->Model_Chidoan;
		$params = $this->input->post();

		if (!isset($params['MACD']) || empty($params['MACD'])) {
			$result = array(
				'status' => false,
				'message' => 'Chưa nhập Mã Chi đoàn'
			);
		} elseif (!isset($params['TENCD']) || empty($params['TENCD'])) {
			$result = array(
				'status' => false,
				'message' => 'Chưa nhập Tên Chi đoàn'
			);
		} elseif (!isset($params['MADCS']) || empty($params['MADCS'])) {
			$result = array(
				'status' => false,
				'message' => 'Chưa chọn Đoàn cơ sở'
			);
		} else {
			if (!$mdCD->existed($params['MACD'])) {
				$result = array(
					'status' => false,
					'message' => 'Mã Chi đoàn này không tồn tại. Vui lòng kiểm tra lại.'
				);
			} else {
				if ($mdCD->update($params)) {
					$result = array(
						'status' => true,
						'message' => 'Cập nhật Chi đoàn thành công'
					);
				} else {
					$result = array(
						'status' => false,
						'message' => 'Lỗi khi cập nhật Chi đoàn'
					);
				}
			}
		}

		echo json_encode($result);
		die;
	}

	function xulyXoaCD() {
		$mdCD = $this->Model_Chidoan;
		$maCD = $this->input->post('MACD');
		
		if (!$mdCD->existed($maCD)) {
			$result = array(
				'status' => false,
				'message' => 'Mã Chi đoàn này không tồn tại. Vui lòng kiểm tra lại.'
			);
		} else {
			if ($mdCD->delete($maCD)) {
				$result = array(
					'status' => true,
					'message' => 'Xóa Chi đoàn thành công'
				);
			} else {
				$result = array(
					'status' => false,
					'message' => 'Lỗi khi xóa Chi đoàn'
				);
			}
		}

		echo json_encode($result);
		die;
	}
	
	function xulyGetDSByDCS() {
		$mdCD = $this->Model_Chidoan;
		$maDCS = $this->input->post('MADCS');
		
		$listCD = $mdCD->getByDCS($maDCS);
		//
		//
		if (!$mdCD->existed($maCD)) {
			$result = array(
				'status' => false,
				'message' => 'Mã Chi đoàn này không tồn tại. Vui lòng kiểm tra lại.'
			);
		} else {
			if ($mdCD->delete($maCD)) {
				$result = array(
					'status' => true,
					'message' => 'Xóa Chi đoàn thành công'
				);
			} else {
				$result = array(
					'status' => false,
					'message' => 'Lỗi khi xóa Chi đoàn'
				);
			}
		}

		echo json_encode($result);
		die;
	}

}
