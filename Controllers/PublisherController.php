<?php

namespace Controllers;

use Core\BaseController;

class PublisherController extends BaseController
{
    protected string $Model = "Publisher";

    public function index()
    {
        $Publishers = $this->Database->getAll();
        view('publisher/index', compact('Publishers'));
    }

    public function create()
    {
        view('publisher/create');
    }

    public function store()
    {
        $name = $_POST['name'];
        $this->Database->create(compact('name'));
        redirect('/publisher');
    }

    public function edit($id)
    {
        $Publisher = $this->Database->getById($id);
        view('publisher/edit', compact('Publisher'));
    }

    public function update($id)
    {
        $name = $_POST['name'];
        $this->Database->update($id, compact('name'));
        redirect('/publisher');
    }

    public function delete($id)
    {
        $this->Database->delete($id);
        redirect('/publisher');
    }
}
