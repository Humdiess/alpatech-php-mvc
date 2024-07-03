<?php

namespace Models;

use Core\Model;

class Publisher extends Model
{
    /**
     * Mendapatkan semua data penerbit dari tabel publisher.
     * 
     * @return array Daftar penerbit
     */
    public function getAll()
    {
        $Query = "SELECT * FROM publisher";
        return $this->SelectRow($Query);
    }

    /**
     * Mendapatkan data penerbit berdasarkan ID.
     * 
     * @param int $id ID penerbit
     * @return array|null Data penerbit
     */
    public function getById($id)
    {
        $Query = "SELECT * FROM publisher WHERE id = ?";
        return $this->SelectRow($Query, [$id], true);
    }

    /**
     * Menambahkan penerbit baru ke dalam tabel publisher.
     * 
     * @param array $data Data penerbit yang akan ditambahkan
     * @return bool|string ID dari penerbit yang baru ditambahkan
     */
    public function create($data)
    {
        $Query = "INSERT INTO publisher (name) VALUES (?)";
        return $this->InsertRow($Query, array_values($data));
    }

    /**
     * Memperbarui data penerbit berdasarkan ID.
     * 
     * @param int $id ID penerbit yang akan diperbarui
     * @param array $data Data baru untuk penerbit
     * @return bool Status keberhasilan pembaruan
     */
    public function update($id, $data)
    {
        $Query = "UPDATE publisher SET name = ? WHERE id = ?";
        return $this->UpdateRow($Query, array_merge(array_values($data), [$id]));
    }

    /**
     * Menghapus penerbit berdasarkan ID.
     * 
     * @param int $id ID penerbit yang akan dihapus
     * @return bool Status keberhasilan penghapusan
     */
    public function delete($id)
    {
        $Query = "DELETE FROM publisher WHERE id = ?";
        return $this->DeleteRow($Query, [$id]);
    }
}
