<?php

//ini_set('default_charset', 'utf-8');

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

define('CFG_MYSQL_HOST', 'localhost');
define('CFG_MYSQL_USER', 'root');
define('CFG_MYSQL_PASS', '');
define('CFG_MYSQL_DATABASE', 'rabota_test');

/* Initialize Core */
define('CFG_PATH_DOCUMENT_ROOT', dirname(dirname(dirname(dirname(__FILE__)))) . '/');
define('CFG_PATH_CLASS', 'classes/');

require_once 'vendor/autoload.php';
