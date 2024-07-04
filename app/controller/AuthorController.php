<?php

require_once '../app/core/Controller.php';
require_once '../app/models/AuthorModel.php';
require_once '../app/core/Helper.php';

class AuthorController extends Controller
{
    private $authorModel;

    public function __construct()
    {
        $this->authorModel = new AuthorModel();
    }

    public function index()
    {
        $this->view('authors/index', [
            'title' => 'Daftar Penulis',
            'authors' => $this->authorModel->getAllAuthors()
        ]);
    }

    // public function test() {
    //     $this->view('authors/test');
    // }

    public function add()
    {
        $this->view('authors/add', [
            'title' => 'Tambah Penulis'
        ]);
    }

    public function save()
    {
        if ($this->authorModel->addAuthor($_POST) > 0) {
            Helper::redirect('/author');
            exit;
        }
    }

    public function detail($id)
    {
        $this->view('authors/detail', [
            'title' => 'Detail Penulis',
            'author' => $this->authorModel->getAuthorById($id)
        ]);
    }

    public function edit($id)
    {
        $this->view('authors/edit', [
            'title' => 'Edit Data Penulis',
            'author' => $this->authorModel->getAuthorById($id)
        ]);
    }

    public function update()
    {
        if ($this->authorModel->updateAuthor($_POST) > 0) {
            Helper::redirect('author/detail/' . $_POST['id']);
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->authorModel->deleteAuthor($id) > 0) {
            Helper::redirect('/author');
            exit;
        }
    }
}
