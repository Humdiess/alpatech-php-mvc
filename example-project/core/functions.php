<?php

// Fungsi untuk menampilkan debug informasi dan menghentikan eksekusi
function dd($v)
{
    var_dump($v); // Menampilkan struktur dan isi dari variabel yang diberikan
    exit(); // Menghentikan eksekusi skrip
}

// Fungsi untuk memuat dan menampilkan view dengan data yang diberikan
function view($Name, $Data = [])
{
    extract($Data); // Mengekstrak elemen dari array $Data menjadi variabel
    if (file_exists(__DIR__ . "/../Views/$Name.php")): // Memeriksa apakah file view ada
        require_once __DIR__ . "/../Views/$Name.php"; // Memuat file view
    else:
        echo "<h1 style='color: red;text-align: center'>View [$Name] Not found</h1>"; // Menampilkan pesan jika view tidak ditemukan
        exit(); // Menghentikan eksekusi skrip
    endif;
}

// Fungsi untuk mendapatkan nilai konfigurasi berdasarkan kunci yang diberikan
function config($Key)
{
    $Config = require __DIR__ . '/config.php'; // Memuat file konfigurasi

    if (array_key_exists($Key, $Config)): // Memeriksa apakah kunci ada dalam konfigurasi
        return $Config[$Key]; // Mengembalikan nilai konfigurasi
    else:
        echo "<h1 style='color: red;text-align: center'>[$Key] not found in config.php file</h1>"; // Menampilkan pesan jika kunci tidak ditemukan
        exit(); // Menghentikan eksekusi skrip
    endif;
}

// Fungsi untuk menghasilkan URL berdasarkan nama rute dan data yang diberikan
function route($RouteName, $Data = []): string
{
    return config('app_url') . (new Core\Router)->GetRouteByName($RouteName, $Data); // Menghasilkan URL berdasarkan rute
}

// Fungsi untuk mengarahkan ke URL yang diberikan
function redirect($RouteName, $Data = [])
{
    header('Location: ' . route($RouteName, $Data)); // Mengirim header pengalihan
    exit(); // Menghentikan eksekusi skrip
}

// Fungsi untuk mendapatkan URL ke file publik berdasarkan jalur yang diberikan
function public_dir(string $File): string
{
    if (strpos($File, '/') === 0): // Memeriksa apakah jalur dimulai dengan '/'
        $File = substr($File, 1); // Menghapus karakter '/' dari awal jalur
    endif;

    return config('public_url') . $File; // Menghasilkan URL ke file publik
}

// Fungsi untuk mengatur kode respons HTTP dan menampilkan halaman error
function abort($Code = 404)
{
    http_response_code($Code); // Mengatur kode respons HTTP

    if (file_exists(__DIR__ . "/../Views/errors/$Code.php")) { // Memeriksa apakah file error ada
        view("errors/$Code"); // Menampilkan halaman error
    } else {
        echo "Error $Code"; // Menampilkan pesan error jika file tidak ditemukan
    }

    exit(); // Menghentikan eksekusi skrip
}
