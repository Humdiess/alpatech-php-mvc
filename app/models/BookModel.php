<?php

require_once __DIR__ . '/../core/Database.php';

class BookModel extends Database
{
    protected $table = 'buku'; // nama tabel buku
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllBooks()
    {
        $query = 'SELECT b.*, a.name AS author_name, p.name AS publisher_name FROM ' . $this->table . ' b ';
        $query .= 'LEFT JOIN author a ON b.author_id = a.id ';
        $query .= 'LEFT JOIN publisher p ON b.publisher_id = p.id ';
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getBookById($id)
    {
        $id = intval($id);

        $query = 'SELECT b.*, a.name AS author_name, p.name AS publisher_name FROM ' . $this->table . ' b ';
        $query .= 'LEFT JOIN author a ON b.author_id = a.id ';
        $query .= 'LEFT JOIN publisher p ON b.publisher_id = p.id ';
        $query .= 'WHERE b.id=:id';
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function addBook($data)
    {
        $query = "INSERT INTO " . $this->table . " (name, publisher_id, author_id) VALUES (:name, :publisher_id, :author_id)";
        $this->db->query($query);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':publisher_id', $data['publisher_id']);
        $this->db->bind(':author_id', $data['author_id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateBook($data)
    {
        $query = "UPDATE " . $this->table . " SET name = :name, publisher_id = :publisher_id, author_id = :author_id WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':publisher_id', $data['publisher_id']);
        $this->db->bind(':author_id', $data['author_id']);
        $this->db->bind(':id', $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteBook($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id=:id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
