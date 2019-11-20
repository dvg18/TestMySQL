<?php

//ini_set('default_charset', 'ISO-8859-1');

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

define('CFG_MYSQL_HOST', 'localhost');
define('CFG_MYSQL_USER', 'root');
define('CFG_MYSQL_PASS', '');
define('CFG_MYSQL_DATABASE', 'test');

/* Initialize Core */
define('CFG_PATH_DOCUMENT_ROOT', dirname(dirname(dirname(dirname(__FILE__)))) . '/');

define('CFG_PATH_CLASS', 'classes/');


require_once 'vendor/autoload.php';

/* Set other settings */
define('CFG_FOLDER_UPLOADED_TMP', CFG_PATH_DOCUMENT_ROOT . 'tmp/uploaded/');
define('CFG_FOLDER_UPLOADED_PDF', CFG_PATH_DOCUMENT_ROOT . 'tmp/uploaded/pdf/');
