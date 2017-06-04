<?php if (!defined('PATH_SYSTEM')) die('Bad request!');

class QD_Controller
{	
	protected $config = NULL;
	protected $library = NULL;
	protected $model = NULL;
	protected $view = NULL;
	protected $helper = NULL;
	protected $params = NULL;
	
	function __construct() {
		// Config_Loader
		require_once(PATH_SYSTEM . '/core/Loader/Config_Loader.php');
	    $this->config = new Config_Loader();
	    $this->config->load('config');
	    // Library_Loader
	    require_once(PATH_SYSTEM . '/core/Loader/Library_Loader.php');
	    $this->library = new Library_Loader();
	    // Model_Loader
	    require_once(PATH_SYSTEM . '/core/Loader/Model_Loader.php');
	    $this->model = new Model_Loader();
	    // View_Loader
	    require_once(PATH_SYSTEM . '/core/Loader/View_Loader.php');
	    $this->view = new View_Loader();
	    // Helper_Loader
	    require_once(PATH_SYSTEM . '/core/Loader/Helper_Loader.php');
	    $this->helper = new Helper_Loader();
	    // Get Parameters from $_SERVER['QUERY_STRING']
		$this->params = $this->getParameters();
	}

	protected function getParameters() {
		if(isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING'])) {
			$_strQuery = $_SERVER['QUERY_STRING'];
			$_strQuery = explode('&', $_strQuery);
			$_params = array();
			foreach ($_strQuery as $value) {
				$value = explode('=', $value);
				$_params[$value[0]] = $value[1];
			}
			return $_params;
		}
	}
}