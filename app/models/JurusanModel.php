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

    public function getJurusanById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahJurusan($data)
    {
        $query = "INSERT INTO jurusan (nama_jurusan) values (:nama_jurusan)";
        $this->db->query($query);
        $this->db->bind('nama_jurusan', $data['nama_jurusan']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataJurusan($data)
    {
        $query = "UPDATE jurusan SET nama_jurusan=:nama_jurusan WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_jurusan', $data['nama_jurusan']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteJurusan($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
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
