<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doanvien extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Model_Doanvien');
		$this->load->model('Model_Chidoan');
		$this->load->model('Model_Doancs');
	}

	public function index() {
		$mdCD = $this->Model_Chidoan;
		$listCD = $mdCD->get();
		$mdDCS = $this->Model_Doancs;
		$listDCS = $mdDCS->get();
		$mdDV = $this->Model_Doanvien;
		$listDV = $mdDV->get();

		$tempListDV = [];

		foreach ($listDV as $k => $item) {
			$tempListDV[$k]['MADV'] = $item['MADV'];
			$tempListDV[$k]['HODV'] = $item['HODV'];
			$tempListDV[$k]['TENDV'] = $item['TENDV'];
			$tempListDV[$k]['TENCD'] = $mdCD->get($item['MACD'])['TENCD'];
			$tempListDV[$k]['NGAYSINH'] = day_decode($item['NGAYSINH']);
			$tempListDV[$k]['GIOITINH'] = ($item['GIOITINH'] == 1) ? 'Nam' : 'Nữ';
			$tempListDV[$k]['NGAYVAODOAN'] = day_decode($item['NGAYVAODOAN']);
			$tempListDV[$k]['QUEQUAN'] = $item['QUEQUAN'];
			$tempListDV[$k]['CHUCVU'] = $item['CHUCVU'];
		}
		$listDV = $tempListDV;

		$data = [
			'metaTitle' => 'Đoàn viên',
			'mainContent' => 'doanvien/home',
			'sb_page' => 'doanvien',
			'listCD' => $listCD,
			'listDCS' => $listDCS,
			'listDV' => $listDV
		];	

		$this->load->view('mainLayout', $data);
	}

	// Xử lý ajax
	function xulyThemDV() {
		$mdDV = $this->Model_Doanvien;
		$params = $this->input->post();

		if (!isset($params['MADV']) || empty($params['MADV'])) {
			$result = array(
				'status' => false,
				'message' => 'Chưa nhập Mã Đoàn viên'
			);
		} elseif (!isset($params['HODV']) || empty($params['HODV'])) {
			$result = array(
				'status' => false,
				'message' => 'Chưa nhập Họ và tên đệm Đoàn viên'
			);
		} elseif (!isset($params['TENDV']) || empty($params['TENDV'])) {
			$result = array(
				'status' => false,
				'message' => 'Chưa nhập Tên Đoàn viên'
			);
		} elseif (!isset($params['NGAYSINH']) || empty($params['NGAYSINH'])) {
			$result = array(
				'status' => false,
				'message' => 'Chưa chọn Ngày sinh'
			);
		} elseif (!isset($params['GIOITINH']) || empty($params['GIOITINH'])) {
			$result = array(
				'status' => false,
				'message' => 'Chưa chọn Giới tính'
			);
		} elseif (!isset($params['QUEQUAN']) || empty($params['QUEQUAN'])) {
			$result = array(
				'status' => false,
				'message' => 'Chưa nhập Quê quán'
			);
		} elseif (!isset($params['NGAYVAODOAN']) || empty($params['NGAYVAODOAN'])) {
			$result = array(
				'status' => false,
				'message' => 'Chưa chọn Ngày vào Đoàn'
			);
		} elseif (!isset($params['MACD']) || empty($params['MACD'])) {
			$result = array(
				'status' => false,
				'message' => 'Chưa chọn Chi đoàn'
			);
		} elseif (!isset($params['CHUCVU']) || empty($params['CHUCVU'])) {
			$result = array(
				'status' => false,
				'message' => 'Chưa chọn Chức vụ'
			);
		} else {
			if ($mdDV->existed($params['MADV'])) {
				$result = array(
					'status' => false,
					'message' => 'Mã Đoàn viên này đã tồn tại. Hãy chọn một Mã Đoàn viên khác.'
				);
			} else {
				
				$params['NGAYSINH'] = day_encode($params['NGAYSINH']);
				$params['NGAYVAODOAN'] = day_encode($params['NGAYVAODOAN']);

				if ($mdDV->insert($params)) {
					$result = array(
						'status' => true,
						'message' => 'Thêm Đoàn viên thành công'
					);
				} else {
					$result = array(
						'status' => false,
						'message' => 'Lỗi khi thêm Đoàn viên'
					);
				}
			}
		}

		echo json_encode($result);
		die;
	}
}
