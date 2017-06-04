<?php if(!defined('PATH_SYSTEM')) die('Bad request!');

class Application
{
	static $controller = '';
	static $action = '';
	
	function __construct() {
		
	}

	public function run() {
		$_controller = $this->controller;
		$_action = $this->action;

		$_controller = ucfirst(strtolower($_controller));

		if(!file_exists(PATH_APPLICATION . '/controller/' . $_controller . '.php')) {
			die('Controller not existed!');
		}

		include_once(PATH_SYSTEM . '/core/QD_Controller.php');

		require(PATH_APPLICATION . '/controller/' . $_controller . '.php');

		if (!class_exists($_controller)) {
			die('Controller not existed!');
		}

		$controllerObject = new $_controller();

		if (!method_exists($controllerObject, $_action)) {
			die('Action not existed!');
		}

		$controllerObject->{$_action}();
	}
}
