<?php if (!defined('PATH_SYSTEM')) die('Bad request!');

class Home extends QD_Controller
{
	function index() {
		$data['metaTitle'] = 'Trang chủ';
		$data['contentView'] = 'home';

		$data['data'] = array(
			'name' => 'Dat'
		);

		$this->view->load('main_layout', $data);
	}
}