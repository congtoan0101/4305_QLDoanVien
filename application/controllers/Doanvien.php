<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doanvien extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Model_Doanvien');
		$this->load->model('Model_Chidoan');
		$this->load->model('Model_Doancs');
		$this->load->model('Model_Doanphi');
		$this->load->model('Model_Renluyen');
	}

	public function index() {
		$this->load->library('pagination');
		$perpage = 20;
		$offset  =  ($this->uri->segment(2) == '') ? 0 : $this->uri->segment(2);

		$search = '';
		$mdCD = $this->Model_Chidoan;
		$listCD = $mdCD->get();
		$mdDCS = $this->Model_Doancs;
		$listDCS = $mdDCS->get();
		$mdDV = $this->Model_Doanvien;
		if (!empty($this->input->get('search'))) {
			$search = $this->input->get('search');
			$total = $mdDV->numBySearch($search);
			
			$listDV = $mdDV->getBySearch($search, $perpage, $offset);
		} else {
			$total = $mdDV->numTotal($search);

			$listDV = $mdDV->get("", $perpage, $offset);
		}
		$config['total_rows']  =  $total;
		$config['per_page']  =  $perpage;
		$config['next_link'] =  '»';
		$config['prev_link'] =  '«';
		$config['first_link'] =  'Đầu';
		$config['last_link'] =  'Cuối';
		$config['first_tag_open'] =  '<li>';
		$config['first_tag_close'] =  '</li>';
		$config['last_tag_open'] =  '<li>';
		$config['last_tag_close'] =  '</li>';
		$config['prev_tag_open'] =  '<li>';
		$config['prev_tag_close'] =  '</li>';
		$config['next_tag_open'] =  '<li>';
		$config['next_tag_close'] =  '</li>';
		$config['num_tag_open'] =  '<li>';
		$config['num_tag_close'] =  '</li>';
		$config['num_links']	=  5;
		$config['cur_tag_open'] =  '<li class="active"><a>';
		$config['cur_tag_close'] =  '</a></li>';
		$config['base_url'] =  base_url('doanvien');
		$config['uri_segment']	 =  2;

		$this->pagination->initialize($config);

		$pagination =  $this->pagination->create_links();

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
			'listDV' => $listDV,
			'search' => $search,
			'pagination' => $pagination
		];	

		$this->load->view('mainLayout', $data);
	}

	public function sua($maDV = "") {
		if (!empty($maDV)) {
			$mdCD = $this->Model_Chidoan;
			$listCD = $mdCD->get();
			$mdDCS = $this->Model_Doancs;
			$listDCS = $mdDCS->get();
			$maDV = urldecode($maDV);
			$mdDV = $this->Model_Doanvien;
			$doanvien = $mdDV->get($maDV);
			if ($doanvien == null) {
				@header("Location: " . base_url('doanvien'));
				@die;
			}
			$data = [
				'metaTitle' => 'Sửa thông tin | Đoàn viên',
				'mainContent' => 'doanvien/sua',
				'sb_page' => 'doanvien',
				'listCD' => $listCD,
				'listDCS' => $listDCS,
				'doanvien' => $doanvien
			];	

			$this->load->view('mainLayout', $data);
		} else {
			@header("Location: " . base_url('doanvien'));
			@die;
		}
	}

	public function xoa($maDV = "") {
		if (!empty($maDV)) {
			$mdCD = $this->Model_Chidoan;
			$mdDCS = $this->Model_Doancs;
			$maDV = urldecode($maDV);
			$mdDV = $this->Model_Doanvien;
			$doanvien = $mdDV->get($maDV);
			if ($doanvien == null) {
				@header("Location: " . base_url('doanvien'));
				@die;
			}
			$data = [
				'metaTitle' => 'Xóa | Đoàn viên',
				'mainContent' => 'doanvien/xoa',
				'sb_page' => 'doanvien',
				'doanvien' => $doanvien
			];	

			$this->load->view('mainLayout', $data);
		} else {
			@header("Location: " . base_url('doanvien'));
			@die;
		}
	}

	public function themDS() {
		die;
		$mdDV = $this->Model_Doanvien;
		$mdDP = $this->Model_Doanphi;
		$mdRL = $this->Model_Renluyen;
		$file = FCPATH . 'upload/ds2b.xlsx';
		if (file_exists($file)) {
			$data = readExcel($file);
			$dataDS = [];
			foreach ($data as $k => $item) {
				$dataDS[$k]['MADV'] 		= $item[0][0];
				$dataDS[$k]['HODV'] 		= mb_convert_case($item[0][1], MB_CASE_TITLE, "UTF-8");
				$dataDS[$k]['TENDV'] 		= mb_convert_case($item[0][2], MB_CASE_TITLE, "UTF-8");
				$dataDS[$k]['MACD'] 		= $item[0][3];
				$dataDS[$k]['NGAYSINH'] 	= day_encode(gmdate("d/m/Y", ($item[0][4] - 25569) * 86400));
				$dataDS[$k]['GIOITINH'] 	= $item[0][5];
				$dataDS[$k]['NGAYVAODOAN'] 	= day_encode($item[0][6]);
				$dataDS[$k]['QUEQUAN'] 		= $item[0][7];
				$dataDS[$k]['CHUCVU'] 		= $item[0][8];
			}
			//print_r($dataDS);
			foreach ($dataDS as $item) {
				$mdDV->insert($item);
				$mdDP->insert($item['MADV']);
				$mdRL->insert($item['MADV']);
			}
		} else {
			echo "not";
		}
	}

	// Xử lý ajax
	function xulyThemDV() {
		$mdDV = $this->Model_Doanvien;
		$mdDP = $this->Model_Doanphi;
		$mdRL = $this->Model_Renluyen;
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
		} elseif (!isset($params['GIOITINH'])) {
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
					$mdDP->insert($params['MADV']);
					$mdRL->insert($params['MADV']);
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

	function xulySuaDV() {
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
		} elseif (!isset($params['GIOITINH'])) {
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
			if (!$mdDV->existed($params['MADV'])) {
				$result = array(
					'status' => false,
					'message' => 'Mã Đoàn viên này không tồn tại. Vui lòng kiểm tra lại.'
				);
			} else {
				
				$params['NGAYSINH'] = day_encode($params['NGAYSINH']);
				$params['NGAYVAODOAN'] = day_encode($params['NGAYVAODOAN']);

				if ($mdDV->update($params)) {
					$result = array(
						'status' => true,
						'message' => 'Cập nhật Đoàn viên thành công'
					);
				} else {
					$result = array(
						'status' => false,
						'message' => 'Lỗi khi cập nhật Đoàn viên'
					);
				}
			}
		}

		echo json_encode($result);
		die;
	}

	function xulyXoaDV() {
		$mdDV = $this->Model_Doanvien;
		$mdRL = $this->Model_Renluyen;
		$mdDP = $this->Model_Doanphi;
		$maDV = $this->input->post('MADV');
		
		if (!$mdDV->existed($maDV)) {
			$result = array(
				'status' => false,
				'message' => 'Mã Đoàn viên này không tồn tại. Vui lòng kiểm tra lại.'
			);
		} else {
			if ($mdDV->delete($maDV)) {
				$mdDP->delete($maDV);
				$mdRL->delete($maDV);
				$result = array(
					'status' => true,
					'message' => 'Xóa Đoàn viên thành công'
				);
			} else {
				$result = array(
					'status' => false,
					'message' => 'Lỗi khi xóa Đoàn viên'
				);
			}
		}

		echo json_encode($result);
		die;
	}
}
