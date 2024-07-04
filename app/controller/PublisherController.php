<?php

require_once '../app/core/Controller.php';
require_once '../app/models/PublisherModel.php';
require_once '../app/core/Helper.php';

class PublisherController extends Controller
{
    private $publisherModel;

    public function __construct()
    {
        $this->publisherModel = new PublisherModel();
    }

    public function index()
    {
        $this->view('publishers/index', [
            'title' => 'List of Publishers',
            'publishers' => $this->publisherModel->getAllPublishers()
        ]);
    }

    public function add()
    {
        $this->view('publishers/add', [
            'title' => 'Add New Publisher'
        ]);
    }

    public function save()
    {
        if ($this->publisherModel->addPublisher($_POST) > 0) {
            Helper::redirect('/publisher');
            exit;
        }
    }

    public function detail($id)
    {
        $this->view('publishers/detail', [
            'title' => 'Publisher Details',
            'publisher' => $this->publisherModel->getPublisherById($id)
        ]);
    }

    public function edit($id)
    {
        $this->view('publishers/edit', [
            'title' => 'Edit Publisher',
            'publisher' => $this->publisherModel->getPublisherById($id)
        ]);
    }

    public function update()
    {
        if ($this->publisherModel->updatePublisher($_POST) > 0) {
            Helper::redirect('/publisher/detail/' . $_POST['id']);
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->publisherModel->deletePublisher($id) > 0) {
            Helper::redirect('/publisher');
            exit;
        }
    }
}
