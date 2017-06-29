<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data = [
			'metaTitle' => 'Trang chủ',
			'mainContent' => 'home/home',
			'sb_page' => 'home'
		];	

		$this->load->view('mainLayout', $data);
	}
}
