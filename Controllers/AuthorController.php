<?php

namespace Controllers;

use Core\BaseController;

class AuthorController extends BaseController
{
    protected string $Model = "Author";

    public function index()
    {
        $Authors = $this->Database->getAll();
        view('author/index', compact('Authors'));
    }

    public function create()
    {
        view('author/create');
    }

    public function store()
    {
        $name = $_POST['name'];
        $this->Database->create(compact('name'));
        redirect('/author');
    }

    public function edit($id)
    {
        $Author = $this->Database->getById($id);
        view('author/edit', compact('Author'));
    }

    public function update($id)
    {
        $name = $_POST['name'];
        $this->Database->update($id, compact('name'));
        redirect('/author');
    }

    public function delete($id)
    {
        $this->Database->delete($id);
        redirect('/author');
    }
}
