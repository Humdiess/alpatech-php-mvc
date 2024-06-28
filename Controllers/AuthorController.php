<?php
namespace Controllers;

use Core\BaseController;

class AuthorController extends BaseController
{
    protected string $Model = "Author";

    // Fungsi untuk menampilkan semua data penulis
    public function index()
    {
        $Authors = $this->Database->getAll(); // Mengambil semua data penulis dari database
        view('author/index', compact('Authors')); // Menampilkan data penulis ke tampilan 'author/index'
    }

    // Fungsi untuk menampilkan form tambah data penulis
    public function create()
    {
        view('author/create'); // Menampilkan form 'author/create'
    }

    // Fungsi untuk menyimpan data penulis baru ke database
    public function store()
    {
        $name = $_POST['name']; // Mengambil data 'name' dari form
        $this->Database->create(compact('name')); // Menyimpan data penulis ke database
        redirect('/author'); // Mengalihkan pengguna ke halaman daftar penulis
    }

    // Fungsi untuk menampilkan form edit data penulis
    public function edit($id)
    {
        $Author = $this->Database->getById($id); // Mengambil data penulis berdasarkan ID dari database
        view('author/edit', compact('Author')); // Menampilkan data penulis ke form 'author/edit'
    }

    // Fungsi untuk memperbarui data penulis di database
    public function update($id)
    {
        $name = $_POST['name']; // Mengambil data 'name' dari form
        $this->Database->update($id, compact('name')); // Memperbarui data penulis di database
        redirect('/author'); // Mengalihkan pengguna ke halaman daftar penulis
    }

    // Fungsi untuk menghapus data penulis dari database
    public function delete($id)
    {
        $this->Database->delete($id); // Menghapus data penulis berdasarkan ID dari database
        redirect('/author'); // Mengalihkan pengguna ke halaman daftar penulis
    }
}
