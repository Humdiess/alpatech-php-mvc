<?php 

// define('BASEURL', 'http://localhost/php-mvc-simple-php-framework/public');

$root = isset($_SERVER['HTTPS']) ? "https://" : "http://".$_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

define('BASEURL', $root."");
//db
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'book_management');