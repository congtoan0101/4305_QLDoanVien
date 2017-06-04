<?php if(!defined('PATH_SYSTEM')) die('Bad request!');

class View_Loader
{
	public static $view;

	public function load($_view, $data = array()) {
        extract($data);
        ob_start();
        include(PATH_APPLICATION . '/view/' . $_view . '.php');
        $html = ob_get_contents();
        ob_end_clean();
        $this->view = new View_Loader();
        echo $html;
    }
}