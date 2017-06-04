<?php
define('PATH_SYSTEM', __DIR__ . '/system');
define('PATH_APPLICATION', __DIR__ . '/admin');
$config = include_once(PATH_SYSTEM . '/config/config.php');

define('BASE_URL', $config['base_url']);

error_reporting(($config['show_error_reporting']) ? E_ERROR | E_WARNING | E_PARSE | E_NOTICE : 0);

require_once(PATH_SYSTEM . '/core/Application.php');

$app = new Application();

$app->controller = (empty($_GET['c'])) ? $config['default_controller'] : $_GET['c'];
$app->action = (empty($_GET['a'])) ? $config['default_action'] : $_GET['a'];
$app->run();