<?php

require_once __DIR__ . '/../core/Database.php';

class PublisherModel extends Database
{
    protected $table = 'publisher';
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllPublishers()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPublisherById($id)
    {
        $id = intval($id);

        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function addPublisher($data)
    {
        $query = "INSERT INTO " . $this->table . " (name) VALUES (:name)";
        $this->db->query($query);
        $this->db->bind(':name', $data['name']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updatePublisher($data)
    {
        $query = "UPDATE " . $this->table . " SET name = :name WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':id', $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deletePublisher($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id=:id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
