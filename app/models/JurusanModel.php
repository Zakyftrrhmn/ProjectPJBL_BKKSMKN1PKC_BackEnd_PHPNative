<?php

class JurusanModel
{

    private $table = 'jurusan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllJurusan()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getJurusanByUuid($uuid)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE uuid=:uuid');
        $this->db->bind('uuid', $uuid);
        return $this->db->single();
    }

    public function tambahJurusan($data)
    {
        $uuid = uniqid(); // Atau gunakan library UUID
        $query = "INSERT INTO jurusan (uuid, nama_jurusan) VALUES (:uuid, :nama_jurusan)";
        $this->db->query($query);
        $this->db->bind('uuid', $uuid);
        $this->db->bind('nama_jurusan', $data['nama_jurusan']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataJurusan($data)
    {
        $query = "UPDATE jurusan SET nama_jurusan=:nama_jurusan WHERE uuid=:uuid";
        $this->db->query($query);
        $this->db->bind('uuid', $data['uuid']);
        $this->db->bind('nama_jurusan', $data['nama_jurusan']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteJurusan($uuid)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE uuid=:uuid');
        $this->db->bind('uuid', $uuid);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariJurusan()
    {
        $key = $_POST['key'];
        $this->db->query("SELECT * FROM " . $this->table . "  WHERE nama_jurusan LIKE :key");
        $this->db->bind('key', "%$key%");

        return $this->db->resultSet();
    }
}
