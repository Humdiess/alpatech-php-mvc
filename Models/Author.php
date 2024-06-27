<?php

namespace Models;

use Core\Model;

class Author extends Model
{
    public function getAll()
    {
        $Query = "SELECT * FROM author";
        return $this->SelectRow($Query);
    }

    public function getById($id)
    {
        $Query = "SELECT * FROM author WHERE id = ?";
        return $this->SelectRow($Query, [$id], true);
    }

    public function create($data)
    {
        $Query = "INSERT INTO author (name) VALUES (?)";
        return $this->InsertRow($Query, array_values($data));
    }

    public function update($id, $data)
    {
        $Query = "UPDATE author SET name = ? WHERE id = ?";
        return $this->UpdateRow($Query, array_merge(array_values($data), [$id]));
    }

    public function delete($id)
    {
        $Query = "DELETE FROM author WHERE id = ?";
        return $this->DeleteRow($Query, [$id]);
    }
}
