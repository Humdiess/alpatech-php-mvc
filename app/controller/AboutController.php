<?php

class AboutController extends Controller {

    public function index() {

        $data = [
            'title' => 'About | AlpaTech',
        ];
        $this->view('about', $data);
    }
}