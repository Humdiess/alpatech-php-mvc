<?php

require_once '../app/core/Controller.php';
require_once '../app/models/BookModel.php';
require_once '../app/models/PublisherModel.php';
require_once '../app/models/AuthorModel.php';
require_once '../app/core/Helper.php';

class BookController extends Controller
{
    private $bookModel;
    private $authorModel;
    private $publisherModel;

    public function __construct()
    {
        $this->bookModel = new BookModel();
    }

    public function index()
    {
        $this->view('books/index', [
            'title' => 'List of Books',
            'books' => $this->bookModel->getAllBooks()
        ]);
    }

    public function add()
    {
        $authorModel = new AuthorModel();
        $publisherModel = new PublisherModel();
    
        $this->view('books/add', [
            'title' => 'Add New Book',
            'authors' => $authorModel->getAllAuthors(),
            'publishers' => $publisherModel->getAllPublishers()
        ]);
    }

    public function save()
    {
        if ($this->bookModel->addBook($_POST) > 0) {
            Helper::redirect('/book');
            exit;
        }
    }

    public function detail($id)
    {
        $this->view('books/detail', [
            'title' => 'Book Details',
            'book' => $this->bookModel->getBookById($id)
        ]);
    }

    public function edit($id)
    {
        $authorModel = new AuthorModel();
        $publisherModel = new PublisherModel();
    
        $this->view('books/edit', [
            'title' => 'Edit Book',
            'book' => $this->bookModel->getBookById($id),
            'authors' => $authorModel->getAllAuthors(),
            'publishers' => $publisherModel->getAllPublishers()
        ]);
    }

    public function update()
    {
        if ($this->bookModel->updateBook($_POST) > 0) {
            Helper::redirect('/book/detail/' . $_POST['id']);
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->bookModel->deleteBook($id) > 0) {
            Helper::redirect('/book');
            exit;
        }
    }
}
