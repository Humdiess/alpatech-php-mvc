<?php

class Helper {
    public static function redirect($uri) {
        header('Location: ' . base_url($uri));
        exit;
    }
}

function base_url($uri = '') {
    return BASE_URL . ltrim($uri, '/');
}
