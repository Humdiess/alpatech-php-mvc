<?php

class WelcomeController extends Controller {
    public function index() {
        $data = [
            'title' => 'Halaman Utama',
        ];
        $this->view('welcome', $data);  
    }
}

