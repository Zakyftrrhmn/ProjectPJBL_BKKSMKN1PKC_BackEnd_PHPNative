<?php

class LogoModel
{

    private $table = 'logo';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllLogo()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
    public function countData()
    {
        $this->db->query("SELECT COUNT(*) AS total FROM " . $this->table);
        return $this->db->single()['total'];
    }

    public function insertDataLogo($data)
    {
        $query = "INSERT INTO logo (logo_bkk, logo_sekolah, nama_sekolah , alamat_sekolah) 
                  VALUES (:logo_bkk, :logo_sekolah, :nama_sekolah, :alamat_sekolah)";
        $this->db->query($query);
        $this->db->bind('logo_bkk', $data['logo_bkk'] ?? null);
        $this->db->bind('logo_sekolah', $data['logo_sekolah'] ?? null);
        $this->db->bind('nama_sekolah', $data['nama_sekolah']);
        $this->db->bind('alamat_sekolah', $data['alamat_sekolah']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateDataLogo($data)
    {
        $query = "UPDATE logo SET 
                  logo_bkk = :logo_bkk, 
                  logo_sekolah = :logo_sekolah,
                  nama_sekolah = :nama_sekolah, 
                  alamat_sekolah = :alamat_sekolah
                  WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('logo_bkk', $data['logo_bkk'] ?? null);
        $this->db->bind('logo_sekolah', $data['logo_sekolah'] ?? null);
        $this->db->bind('nama_sekolah', $data['nama_sekolah']);
        $this->db->bind('alamat_sekolah', $data['alamat_sekolah']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
