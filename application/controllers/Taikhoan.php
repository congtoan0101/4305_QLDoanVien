<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Taikhoan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Model_Taikhoan');
	}

	public function index() {
		$mdTK = $this->Model_Taikhoan;
		$listTK = $mdTK->get();

		$data = [
			'metaTitle' => 'Tài khoản',
			'mainContent' => 'taikhoan/home',
			'sb_page' => 'home',
			'listTK' => $listTK
		];	

		$this->load->view('mainLayout', $data);
	}
	
	public function xulyThemTK() {
		$params = $this->input->post();
		$mdTK = $this->Model_Taikhoan;

		if (!isset($params['TENDANGNHAP']) || empty($params['TENDANGNHAP'])) {
			$result = array(
				'status' => false,
				'message' => 'Chưa nhập tên đăng nhập'
			);
		} elseif (!isset($params['MATKHAU']) || empty($params['MATKHAU'])) {
			$result = array(
				'status' => false,
				'message' => 'Chưa nhập mật khẩu'
			);
		} elseif (!isset($params['NHAPLAIMATKHAU']) || empty($params['NHAPLAIMATKHAU'])) {
			$result = array(
				'status' => false,
				'message' => 'Chưa nhập lại mật khẩu'
			);
		} elseif (isset($params['NHAPLAIMATKHAU']) && isset($params['MATKHAU']) && $params['MATKHAU'] != $params['NHAPLAIMATKHAU']) {
			$result = array(
				'status' => false,
				'message' => 'Hai mật khẩu không khớp'
			);
		} else {
			if ($mdTK->get($params['TENDANGNHAP'])) {
				$result = array(
					'status' => false,
					'message' => 'Tên đăng nhập này đã được dùng. Hãy chọn tên đăng nhập khác'
				);
			} else {
				$data = [
					'TENDANGNHAP' => $params['TENDANGNHAP'],
					'MATKHAU' => password_hash($params['MATKHAU'], PASSWORD_DEFAULT),
					'QUYEN' => $params['QUYEN'],
					'TRANGTHAI' => $params['TRANGTHAI']
				];

				if ($mdTK->insert($data)) {
					$result = array(
						'status' => true,
						'message' => 'Thêm tài khoản thành công'
					);
				} else {
					$result = array(
						'status' => false,
						'message' => 'Lỗi khi thêm tài khoản'
					);
				}
			}
		}

		echo json_encode($result);
	}

	public function dangnhap() {
		$this->load->view('taikhoan/dangnhap');
	}

	public function xulyDangNhap() {
		$mdTK = $this->Model_Taikhoan;
		$params = $this->input->post();

		if (empty($params['TENDANGNHAP'])) {
			$result = ['status' => false, 'message' => 'Chưa nhập tên đăng nhập.'];
		} elseif (empty($params['MATKHAU'])) {
			$result = ['status' => false, 'message' => 'Chưa nhập mật khẩu.'];
		} else {
			if ($mdTK->existed($params['TENDANGNHAP'])) {
				$nv = $mdTK->get($params['TENDANGNHAP']);
				if (!password_verify($params['MATKHAU'], $nv['MATKHAU'])) {
					$result = ['status' => false, 'message' => 'Mật khẩu không đúng.'];
				} else {
					// Tạo session
					$this->session->set_userdata('TENDANGNHAP', $nv['TENDANGNHAP']);
					$this->session->set_userdata('QUYEN', $nv['QUYEN']);

					$result = ['status' => true, 'message' => 'Đăng nhập thành công.'];
				}
			} else {
				$result = ['status' => false, 'message' => 'Tên đăng nhập không tồn tại. Vui lòng kiểm tra lại.'];
			}
		}

		echo json_encode($result);
		die;
	}

	public function thoat() {
		$this->session->unset_userdata('TENDANGNHAP');
		$this->session->unset_userdata('QUYEN');
		@header("Location: " . base_url('taikhoan/dangnhap'));
		@die;
	}
}
