<?php

class Helper {
    
    public static function redirect($uri) {
        header('Location: ' . base_url($uri));
        exit;
    }
    
}

function base_url($uri = '') {
    $base_url = "http://$_SERVER[HTTP_HOST]/alpatech-php-mvc/public/";
    return $base_url . ltrim($uri, '/');
}



