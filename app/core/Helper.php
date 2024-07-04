<?php

class Helper {
    
    public static function redirect($uri) {
        header('Location: ' . base_url($uri));
        exit;
    }
    
}

function base_url($uri = '') {
    $base_url = "http://$_SERVER[HTTP_HOST]";

    $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

    return $base_url . ltrim($uri, '/');
}



