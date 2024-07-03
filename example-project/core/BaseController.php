<?php

namespace Core;

class BaseController
{
    protected $Database; // Properti untuk menyimpan instance model yang akan digunakan untuk berinteraksi dengan database
    protected string $Model; // Properti untuk menyimpan nama model yang terkait dengan controller

    public function __construct()
    {
        // Jika properti $Model sudah di-set, gunakan properti tersebut sebagai nama model
        if (isset($this->Model)) {
            $Model = 'Models\\' . $this->Model; // Menentukan namespace penuh dari model yang terkait
        } else {
            // Jika properti $Model tidak di-set, gunakan nama class controller untuk menentukan nama model
            $Controller = explode('\\', static::class);
            $Model = 'Models\\' . end($Controller); // Menentukan namespace penuh dari model yang terkait
        }

        // Memeriksa apakah file model ada
        if (file_exists(str_replace('\\', DIRECTORY_SEPARATOR, $Model) . ".php")) {
            $this->Database = new $Model(); // Membuat instance dari model yang terkait
        } else {
            die("Model Not Found"); // Menghentikan eksekusi dan menampilkan pesan jika model tidak ditemukan
        }
    }
}
