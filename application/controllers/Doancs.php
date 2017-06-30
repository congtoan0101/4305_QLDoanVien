<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doancs extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Model_Doancs');
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
}
