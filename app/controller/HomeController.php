<?php

class HomeController extends Controller {
    public function index() {

        $data = [
            'title' => 'Home | AlpaTech',
        ];
        $this->view('welcome', $data);
    }
}

