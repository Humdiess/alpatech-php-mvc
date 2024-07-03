<?php

// Mengatur zona waktu default ke Asia/Jakarta
date_default_timezone_set('Asia/Jakarta');

// Memulai sesi PHP
session_start();

// Memuat fungsi-fungsi yang diperlukan dari file functions.php
require_once(__DIR__ . '/Core/functions.php');

// Registrasi autoloader untuk memuat kelas secara otomatis
spl_autoload_register(function ($Name) {
    // Mengubah namespace menjadi path file dan memuat file kelas
    require_once(__DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $Name) . '.php');
});

// Membuat instance dari Router untuk menangani rute permintaan
$Router = new Core\Router();
$Router->GetRoute();
