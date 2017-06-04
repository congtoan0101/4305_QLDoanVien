<?php if(!defined('PATH_SYSTEM')) die('Bad request!');

class Config_Loader
{
	protected $config = array();

	public function load($fileConfig) {
        if (file_exists(PATH_APPLICATION . '/config/' . $fileConfig . '.php')){
            $_config = include_once(PATH_APPLICATION . '/config/' . $fileConfig . '.php');
            if (!empty($_config)) {
                foreach ($_config as $key => $item) {
                    $this->config[$key] = $item;
                }
            }
            return true;
        }
        return false;
    }

    public function item($key, $default_val = '') {
        return isset($this->config[$key]) ? $this->config[$key] : $default_val;
    }

    public function set_item($key, $val) {
        $this->config[$key] = $val;
    }
}