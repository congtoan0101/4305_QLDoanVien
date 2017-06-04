<?php if(!defined('PATH_SYSTEM')) die('Bad request!');

include_once(PATH_SYSTEM . '/core/QD_Model.php');

class Model_Loader
{
	public function load($model) {
        if (empty($this->{$model})) {
            $_class = ucfirst($model) . '_Model';
            require_once(PATH_APPLICATION . '/model/' . $_class . '.php');
            $this->{$model} = new $_class();
        }
    }
}