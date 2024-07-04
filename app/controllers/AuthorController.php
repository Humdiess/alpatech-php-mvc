<?php

require_once '../app/core/Controller.php';
require_once '../app/models/AuthorModel.php'; // Sesuaikan dengan nama model yang benar
require_once '../app/core/Helpers.php';

class AuthorController extends Controller
{
    private $authorModel;


    public function __construct()
    {
        $this->authorModel = new AuthorModel();
        error_log('AuthorController terbaca');
    }

    public function index()
    {
        $this->view('authors/index', [
            'title' => 'Daftar Penulis',
            'authors' => $this->authorModel->getAllAuthors()
        ]);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->authorModel->addAuthor($_POST['name'])) {
                Helper::redirect('authors/index');
                exit;
            } else {
                die('Gagal menambahkan penulis');
            }
        } else {
            $this->view('authors/add', [
                'title' => 'Tambah Penulis Baru'
            ]);
        }
    }

    public function edit($id)
    {
        $author = $this->authorModel->getAuthorById($id);

        if ($author) {
            $this->view('authors/edit', [
                'title' => 'Edit Penulis',
                'author' => $author
            ]);
        } else {
            die('Penulis tidak ditemukan');
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            
            if ($this->authorModel->updateAuthor($id, $name)) {
                Helper::redirect('authors/index');
                exit;
            } else {
                die('Gagal memperbarui penulis');
            }
        } else {
            die('Akses tidak valid');
        }
    }

    public function delete($id)
    {
        if ($this->authorModel->deleteAuthor($id)) {
            Helper::redirect('authors/index');
            exit;
        } else {
            die('Gagal menghapus penulis');
        }
    }
}

