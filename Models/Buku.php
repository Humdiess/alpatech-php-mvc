<?php

namespace Models;

use Core\Model;
use PDO;

class Buku extends Model
{
    protected $table = 'buku';

    /**
     * Mengambil semua data buku dengan informasi publisher dan author.
     *
     * @return array|null Data buku yang diperlukan
     */
    public function getAll()
    {
        $sql = "SELECT b.*, p.name as publisher_name, a.name as author_name
                FROM {$this->table} b
                LEFT JOIN publisher p ON b.publisher_id = p.id
                LEFT JOIN author a ON b.author_id = a.id";

        return $this->SelectRow($sql);
    }

    /**
     * Mengambil data buku dengan pagination.
     *
     * @param int $perPage Jumlah data per halaman
     * @param int $offset Offset untuk menentukan halaman
     * @return array|null Data buku yang diperlukan
     */
    public function getAllPaginated($perPage, $offset)
    {
        $sql = "SELECT b.*, p.name as publisher_name, a.name as author_name
                FROM {$this->table} b
                LEFT JOIN publisher p ON b.publisher_id = p.id
                LEFT JOIN author a ON b.author_id = a.id
                ORDER BY b.id
                LIMIT {$perPage} OFFSET {$offset}";

        return $this->SelectRow($sql);
    }

    /**
     * Mengambil data buku berdasarkan ID.
     *
     * @param int $id ID buku yang ingin diambil
     * @return array|null Data buku yang sesuai dengan ID
     */
    public function getById($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        return $this->SelectRow($sql, [$id], true);
    }

    /**
     * Menyimpan data buku baru ke dalam database.
     *
     * @param array $data Data buku yang akan disimpan
     * @return bool|string Hasil dari operasi penyimpanan
     */
    public function create($data)
    {
        $sql = "INSERT INTO {$this->table} (name, publisher_id, author_id) VALUES (?, ?, ?)";
        return $this->InsertRow($sql, array_values($data));
    }

    /**
     * Mengupdate data buku yang ada di dalam database.
     *
     * @param int $id ID buku yang akan diupdate
     * @param array $data Data buku baru yang akan disimpan
     * @return bool Hasil dari operasi update
     */
    public function update($id, $data)
    {
        $sql = "UPDATE {$this->table} SET name = ?, publisher_id = ?, author_id = ? WHERE id = ?";
        return $this->UpdateRow($sql, array_merge(array_values($data), [$id]));
    }

    /**
     * Menghapus data buku berdasarkan ID.
     *
     * @param int $id ID buku yang akan dihapus
     * @return bool Hasil dari operasi penghapusan
     */
    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        return $this->DeleteRow($sql, [$id]);
    }

    /**
     * Mengambil semua data publisher.
     *
     * @return array|null Data publisher yang diperlukan
     */
    public function getPublishers()
    {
        $sql = "SELECT * FROM publisher";
        return $this->SelectRow($sql);
    }

    /**
     * Mengambil semua data author.
     *
     * @return array|null Data author yang diperlukan
     */
    public function getAuthors()
    {
        $sql = "SELECT * FROM author";
        return $this->SelectRow($sql);
    }

/**
 * Menghitung total jumlah buku.
 *
 * @return int Jumlah total buku
 */
    public function countAllBooks()
    {
        $sql = "SELECT COUNT(*) as total FROM {$this->table}";
        
        $result = $this->SelectRow($sql);
        
        // Memeriksa apakah kunci 'total' ada dalam hasil query
        if (isset($result['total'])) {
            return $result['total'];
        } else {
            return 0; // Atau throw exception, tergantung pada kebutuhan aplikasi
        }
    }
}
