<?php

class SambutanModel
{

    private $table = 'sambutan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllSambutann()
    {
        $this->db->query("SELECT * FROM " . $this->table . " LIMIT 1");
        return $this->db->single();
    }

    public function getAllSambutan()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function countData()
    {
        $this->db->query("SELECT COUNT(*) AS total FROM " . $this->table);
        return $this->db->single()['total'];
    }

    public function insertDataSambutan($data)
    {
        $query = "INSERT INTO sambutan (nama_kepsek, sambutan_kepsek , foto_kepsek) 
                  VALUES (:nama_kepsek, :sambutan_kepsek, :foto_kepsek)";
        $this->db->query($query);
        $this->db->bind('nama_kepsek', $data['nama_kepsek']);
        $this->db->bind('sambutan_kepsek', $data['sambutan_kepsek']);
        $this->db->bind('foto_kepsek', $data['foto_kepsek'] ?? null);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateDataSambutan($data)
    {
        $query = "UPDATE sambutan SET 
                  nama_kepsek = :nama_kepsek, 
                  sambutan_kepsek = :sambutan_kepsek, 
                  foto_kepsek = :foto_kepsek
                  WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_kepsek', $data['nama_kepsek']);
        $this->db->bind('sambutan_kepsek', $data['sambutan_kepsek']);
        $this->db->bind('foto_kepsek', $data['foto_kepsek'] ?? null);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
