<?php

namespace Models;

use Core\Model;

class Author extends Model
{
    /**
     * Mendapatkan semua data penulis dari tabel author.
     * 
     * @return array Daftar penulis
     */
    public function getAll()
    {
        $Query = "SELECT * FROM author";
        return $this->SelectRow($Query);
    }

    /**
     * Mendapatkan data penulis berdasarkan ID.
     * 
     * @param int $id ID penulis
     * @return array|null Data penulis
     */
    public function getById($id)
    {
        $Query = "SELECT * FROM author WHERE id = ?";
        return $this->SelectRow($Query, [$id], true);
    }

    /**
     * Menambahkan penulis baru ke dalam tabel author.
     * 
     * @param array $data Data penulis yang akan ditambahkan
     * @return bool|string ID dari penulis yang baru ditambahkan
     */
    public function create($data)
    {
        $Query = "INSERT INTO author (name) VALUES (?)";
        return $this->InsertRow($Query, array_values($data));
    }

    /**
     * Memperbarui data penulis berdasarkan ID.
     * 
     * @param int $id ID penulis yang akan diperbarui
     * @param array $data Data baru untuk penulis
     * @return bool Status keberhasilan pembaruan
     */
    public function update($id, $data)
    {
        $Query = "UPDATE author SET name = ? WHERE id = ?";
        return $this->UpdateRow($Query, array_merge(array_values($data), [$id]));
    }

    /**
     * Menghapus penulis berdasarkan ID.
     * 
     * @param int $id ID penulis yang akan dihapus
     * @return bool Status keberhasilan penghapusan
     */
    public function delete($id)
    {
        $Query = "DELETE FROM author WHERE id = ?";
        return $this->DeleteRow($Query, [$id]);
    }
}
