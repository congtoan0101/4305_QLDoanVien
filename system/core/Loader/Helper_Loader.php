<?php if(!defined('PATH_SYSTEM')) die('Bad request!');

class Helper_Loader
{
	public function load($helper) {
        $helper = ucfirst($helper) . '_Helper';
        require_once(PATH_SYSTEM . '/helper/' . $helper . '.php');
    }
}