<?php

class WelcomeController extends Controller {
    public function index() {
        $data = [
            'title' => 'Halaman Utama',
        ];
        $this->view('welcome', $data);  
    }

    public function about() {
        $this->view('about');
    }
}

