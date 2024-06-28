<?php
namespace Controllers;

use Core\BaseController;

class BukuController extends BaseController
{
    protected string $Model = "Buku";

    // Fungsi untuk menampilkan semua data buku dengan pagination
    public function index()
    {
        $perPage = 10; // Menentukan jumlah data per halaman, misalnya 10 data per halaman
        
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Mengambil parameter halaman dari URL, default halaman 1
        
        $offset = ($currentPage - 1) * $perPage; // Menghitung offset berdasarkan halaman saat ini
        
        $Buku = $this->Database->getAllPaginated($perPage, $offset); // Mendapatkan data buku dengan menggunakan pagination
        
        $totalBooks = $this->Database->countAllBooks(); // Menghitung total data untuk pagination, metode ini bisa ditambahkan di database layer Anda
        
        $totalPages = ceil($totalBooks / $perPage); // Menghitung jumlah halaman berdasarkan total data dan data per halaman
        
        view('buku/index', compact('Buku', 'currentPage', 'totalPages')); // Mengarahkan ke view dengan membawa data yang diperlukan
    }

    // Fungsi untuk menampilkan form tambah data buku
    public function create()
    {
        $Publishers = $this->Database->getPublishers(); // Mendapatkan data penerbit dari database
        $Authors = $this->Database->getAuthors(); // Mendapatkan data penulis dari database
        view('buku/create', compact('Publishers', 'Authors')); // Menampilkan form 'buku/create' dengan data penerbit dan penulis
    }

    // Fungsi untuk menyimpan data buku baru ke database
    public function store()
    {
        $name = $_POST['name']; // Mengambil data 'name' dari form
        $publisher_id = $_POST['publisher_id']; // Mengambil data 'publisher_id' dari form
        $author_id = $_POST['author_id']; // Mengambil data 'author_id' dari form
        $this->Database->create(compact('name', 'publisher_id', 'author_id')); // Menyimpan data buku ke database
        redirect('buku'); // Mengalihkan pengguna ke halaman daftar buku
    }

    // Fungsi untuk menampilkan form edit data buku
    public function edit($id)
    {
        $Buku = $this->Database->getById($id); // Mengambil data buku berdasarkan ID dari database
        $Publishers = $this->Database->getPublishers(); // Mendapatkan data penerbit dari database
        $Authors = $this->Database->getAuthors(); // Mendapatkan data penulis dari database
        view('buku/edit', compact('Buku', 'Publishers', 'Authors')); // Menampilkan data buku ke form 'buku/edit' dengan data penerbit dan penulis
    }

    // Fungsi untuk memperbarui data buku di database
    public function update($id)
    {
        $name = $_POST['name']; // Mengambil data 'name' dari form
        $publisher_id = $_POST['publisher_id']; // Mengambil data 'publisher_id' dari form
        $author_id = $_POST['author_id']; // Mengambil data 'author_id' dari form
        $this->Database->update($id, compact('name', 'publisher_id', 'author_id')); // Memperbarui data buku di database
        redirect('buku'); // Mengalihkan pengguna ke halaman daftar buku
    }

    // Fungsi untuk menghapus data buku dari database
    public function delete($id)
    {
        $this->Database->delete($id); // Menghapus data buku berdasarkan ID dari database
        redirect('buku'); // Mengalihkan pengguna ke halaman daftar buku
    }
}
