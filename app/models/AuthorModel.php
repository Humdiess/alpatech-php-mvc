<?php

require_once __DIR__ . '/../core/Database.php';

class AuthorModel extends Database
{
    protected $table = 'author'; // Nama tabel diatur di sini

    public function getAllAuthors()
    {
        $this->query('SELECT * FROM ' . $this->table);
        return $this->resultSet();
    }

    public function getAuthorById($id)
    {
        $this->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->bind(':id', $id);
        return $this->single();
    }

    public function addAuthor($name)
    {
        $this->query('INSERT INTO ' . $this->table . ' (name) VALUES (:name)');
        $this->bind(':name', $name);

        return $this->execute();
    }

    public function updateAuthor($id, $name)
    {
        $this->query('UPDATE ' . $this->table . ' SET name = :name WHERE id = :id');
        $this->bind(':id', $id);
        $this->bind(':name', $name);

        return $this->execute();
    }

    public function deleteAuthor($id)
    {
        $this->query('DELETE FROM ' . $this->table . ' WHERE id = :id');
        $this->bind(':id', $id);

        return $this->execute();
    }
}
