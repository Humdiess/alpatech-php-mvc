<?php
namespace Controllers;

use Core\BaseController;

class PublisherController extends BaseController
{
    protected string $Model = "Publisher";

    // Fungsi untuk menampilkan semua data penerbit
    public function index()
    {
        $Publishers = $this->Database->getAll(); // Mengambil semua data penerbit dari database
        view('publisher/index', compact('Publishers')); // Menampilkan data penerbit ke tampilan 'publisher/index'
    }

    // Fungsi untuk menampilkan form tambah data penerbit
    public function create()
    {
        view('publisher/create'); // Menampilkan form 'publisher/create'
    }

    // Fungsi untuk menyimpan data penerbit baru ke database
    public function store()
    {
        $name = $_POST['name']; // Mengambil data 'name' dari form
        $this->Database->create(compact('name')); // Menyimpan data penerbit ke database
        redirect('publisher'); // Mengalihkan pengguna ke halaman daftar penerbit
    }

    // Fungsi untuk menampilkan form edit data penerbit
    public function edit($id)
    {
        $Publisher = $this->Database->getById($id); // Mengambil data penerbit berdasarkan ID dari database
        view('publisher/edit', compact('Publisher')); // Menampilkan data penerbit ke form 'publisher/edit'
    }

    // Fungsi untuk memperbarui data penerbit di database
    public function update($id)
    {
        $name = $_POST['name']; // Mengambil data 'name' dari form
        $this->Database->update($id, compact('name')); // Memperbarui data penerbit di database
        redirect('publisher'); // Mengalihkan pengguna ke halaman daftar penerbit
    }

    public function show($id) {
        $Publisher = $this->Database->getById($id); // Mengambil data penerbit berdasarkan ID dari database
        view('publisher/detail', compact('Publisher')); // Menampilkan data penerbit ke tampilan 'publisher/show'
    }

    // Fungsi untuk menghapus data penerbit dari database
    public function delete($id)
    {
        $this->Database->delete($id); // Menghapus data penerbit berdasarkan ID dari database
        redirect('publisher'); // Mengalihkan pengguna ke halaman daftar penerbit
    }
}
