<?php if(!defined('PATH_SYSTEM')) die('Bad request!');

class Library_Loader
{
	public function load($library) {
        if (empty($this->{$library})) {
            $_class = ucfirst($library) . '_Library';
            require_once(PATH_SYSTEM . '/library/' . $_class . '.php');
            $this->{$library} = new $_class();
        }
    }
}