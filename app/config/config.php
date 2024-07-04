<?php 

$base_url = "http://$_SERVER[HTTP_HOST]";

if (dirname($_SERVER['SCRIPT_NAME']) != '/') {
    $base_url .= dirname($_SERVER['SCRIPT_NAME']);
}

define('BASEURL', $base_url);

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'book_management');