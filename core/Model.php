<?php

namespace Core;

use PDO;
use PDOException;

class Model
{
    /**
     * Menghubungkan ke database dan membuatnya jika belum ada
     *
     * @return PDO|null
     */
    public function Connect(): ?PDO
    {
        $conn = NULL;
        try {
            // Membuat koneksi ke server database
            $conn = new PDO("mysql:host=" . config('host') . ";charset=utf8", config('user'), config('pass'));
            // Mengatur mode error PDO ke mode exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Membuat database jika belum ada
            $sql = "CREATE DATABASE IF NOT EXISTS " . config('db_name');
            // Menggunakan exec() karena tidak ada hasil yang dikembalikan
            $conn->exec($sql);
            // Menggunakan database yang baru dibuat atau sudah ada
            $conn->exec("USE " . config('db_name'));
        } catch (PDOException $e) {
            dd($e->getMessage());
        }
        return $conn;
    }

    /**
     * Memutuskan koneksi ke database
     *
     * @param $conn
     */
    private function disconnect($conn)
    {
        unset($conn); // Memutuskan koneksi dengan menghapus referensi PDO
    }

    /**
     * Menyisipkan baris data ke dalam tabel
     *
     * @param string $sql
     * @param array $value
     * @param bool $LastID
     * @return bool|string
     */
    public function InsertRow(string $sql, array $value = [], bool $LastID = false)
    {
        $result = null;
        $conn = $this->Connect();
        // Menyisipkan data ke dalam database
        $stmt = $conn->prepare($sql);
        if (!empty($value)) {
            foreach ($value as $Key => $Value) {
                $stmt->bindValue($Key + 1, $Value);
            }
        }
        if ($stmt->execute()) {
            $result = true;
            if ($LastID) {
                $result = $conn->lastInsertId(); // Mengambil ID terakhir yang disisipkan
            }
        } else {
            $result = false;
            $this->disconnect($conn);
        }
        return $result;
    }

    /**
     * Memilih baris data dari tabel
     *
     * @param string $sql
     * @param array $value
     * @param bool $fetch
     * @return mixed
     */
    public function SelectRow(string $sql, array $value = [], bool $fetch = false)
    {
        $result = null;
        $conn = $this->Connect();
        // Memilih data dari database
        $stmt = $conn->prepare($sql);
        if (!empty($value)) {
            foreach ($value as $key => $Value) {
                $stmt->bindValue($key + 1, $Value);
            }
        }
        if ($stmt->execute()) {
            if ($fetch) {
                $result = $stmt->fetch(); // Mengambil satu baris data
            } else {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Mengambil semua baris data
            }
        } else {
            $result = false;
            $this->disconnect($conn);
        }
        return $result;
    }

    /**
     * Memperbarui baris data di tabel
     *
     * @param string $sql
     * @param array $value
     * @return bool
     */
    public function UpdateRow(string $sql, array $value): bool
    {
        $conn = $this->Connect();
        // Memperbarui data di database
        $stmt = $conn->prepare($sql);
        if (!empty($value)) {
            foreach ($value as $Key => $Value) {
                $stmt->bindValue($Key + 1, $Value);
            }
        }

        if ($stmt->execute()) {
            $result = true;
        } else {
            $result = false;
            $this->disconnect($conn);
        }
        return $result;
    }

    /**
     * Menghapus baris data dari tabel
     *
     * @param string $sql
     * @param array $value
     * @return bool
     */
    public function DeleteRow(string $sql, array $value = []): bool
    {
        $conn = $this->Connect();
        // Menghapus data dari database
        $stmt = $conn->prepare($sql);
        if (!empty($value)) {
            foreach ($value as $Key => $Value) {
                $stmt->bindValue($Key + 1, $Value);
            }
        }

        if ($stmt->execute()) {
            $result = true;
        } else {
            $result = false;
            $this->disconnect($conn);
        }
        return $result;
    }
}
