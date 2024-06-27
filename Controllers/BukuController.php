<?php

namespace Controllers;

use Core\BaseController;

class BukuController extends BaseController
{
    protected string $Model = "Buku";

    public function index()
    {
        // Menentukan jumlah data per halaman
        $perPage = 10; // Misalnya, 10 data per halaman
        
        // Mengambil parameter halaman dari URL, default halaman 1
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        
        // Menghitung offset berdasarkan halaman saat ini
        $offset = ($currentPage - 1) * $perPage;
        
        // Mendapatkan data buku dengan menggunakan pagination
        $Buku = $this->Database->getAllPaginated($perPage, $offset);
        
        // Menghitung total data untuk pagination
        $totalBooks = $this->Database->countAllBooks(); // Metode ini bisa ditambahkan di database layer Anda
        
        // Menghitung jumlah halaman berdasarkan total data dan data per halaman
        $totalPages = ceil($totalBooks / $perPage);
        // Mengarahkan ke view dengan membawa data yang diperlukan
        view('buku/index', compact('Buku', 'currentPage', 'totalPages'));
    }

    public function create()
    {
        $Publishers = $this->Database->getPublishers();
        $Authors = $this->Database->getAuthors();
        // dd($Authors);
        // dd($Publishers);
        view('buku/create', compact('Publishers', 'Authors'));
    }

    public function store()
    {
        $name = $_POST['name'];
        $publisher_id = $_POST['publisher_id'];
        $author_id = $_POST['author_id'];
        $this->Database->create(compact('name', 'publisher_id', 'author_id'));
        redirect('/buku');
    }

    public function edit($id)
    {
        $Buku = $this->Database->getById($id);
        $Publishers = $this->Database->getPublishers();
        $Authors = $this->Database->getAuthors();
        view('buku/edit', compact('Buku', 'Publishers', 'Authors'));
    }

    public function update($id)
    {
        $name = $_POST['name'];
        $publisher_id = $_POST['publisher_id'];
        $author_id = $_POST['author_id'];
        $this->Database->update($id, compact('name', 'publisher_id', 'author_id'));
        redirect('/buku');
    }

    public function delete($id)
    {
        $this->Database->delete($id);
        redirect('/buku');
    }
}
