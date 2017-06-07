<?php if (!defined('PATH_SYSTEM')) die('Bad request!');

class Taikhoan extends QD_Controller
{
	function __construct() {
		parent::__construct();
		$this->model->load('taikhoan');
	}

	function index() {
		$data['metaTitle'] = 'Tài khoản';
		$data['contentView'] = 'home';

		$data['data'] = array(
			'name' => 'Dat'
		);

		$this->view->load('main_layout', $data);
	}

	function dangnhap() {
		if (isset($_SESSION['EMAIL']) && !empty($_SESSION['EMAIL'])) {
			header('Location: '. BASE_URL);
			die;
		} elseif (isset($_COOKIE['EMAIL']) && !empty($_COOKIE['EMAIL'])) {
			$this->loginToSiteByCookie($_COOKIE['EMAIL']);
			header('Location: '. BASE_URL);
			die;
		}

		$data['metaTitle'] = 'Đăng nhập';
		$data['contentView'] = 'taikhoan/dangnhap';
		$data['data'] = array();

		$this->view->load('taikhoan_layout', $data);
	}

	function xulydangnhap() {
		$myModel = $this->model->taikhoan;

		if (!isset($_POST['Email']) || empty($_POST['Email'])) {
			$result = array(
				'status' => false,
				'message' => 'Bạn chưa nhập email'
			);
		} elseif (!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
			$result = array(
				'status' => false,
				'message' => 'Email không đúng định dạng'
			);
		} elseif (!isset($_POST['MatKhau']) || empty($_POST['MatKhau'])) {
			$result = array(
				'status' => false,
				'message' => 'Bạn chưa nhập mật khẩu'
			);
		} else {
			$tk = $myModel->getTaiKhoan($_POST['Email']);

			if ($tk) {
				$tk = $tk[0];
				if (!password_verify($_POST['MatKhau'], $tk['MATKHAU'])) {
					$result = array(
						'status' => false,
						'message' => 'Mật khẩu không đúng'
					);
				} else {
					// Tạo session
					$_SESSION['EMAIL'] = $_POST['Email'];
					$_SESSION['QUYEN'] = $tk['QUYEN'];

					if (isset($_POST['NhoMatKhau'])) {
						// Tạo COOKIE
						setcookie('EMAIL', $_POST['Email'], time() + 604800, '');
					}

					$result = array(
						'status' => true,
						'message' => 'Đăng nhập thành công'
					);
				}
				
			} else {
				$result = array(
					'status' => false,
					'message' => 'Email không tồn tại'
				);
			}
		}

		echo json_encode($result);
	}

	function loginToSiteByCookie($email) {
		$modelTaikhoan = $this->model->taikhoan;
		$tk = $modelTaikhoan->getTaiKhoan($email);
		if ($tk) {
			$tk = $tk[0];
			$_SESSION['EMAIL'] = $email;
			$_SESSION['QUYEN'] = $tk['QUYEN'];
			setcookie('EMAIL', $email, time() + 604800, '');
		} else {
			header('Location: '. BASE_URL .'taikhoan/dangnhap');
			die;
		}
	}
}