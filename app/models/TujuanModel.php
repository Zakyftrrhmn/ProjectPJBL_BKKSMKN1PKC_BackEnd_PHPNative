<?php

class TujuanModel
{

    private $table = 'tujuan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllTujuan()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getTujuanById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahTujuan($data)
    {
        $query = "INSERT INTO tujuan (tujuan) values (:tujuan)";
        $this->db->query($query);
        $this->db->bind('tujuan', $data['tujuan']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataTujuan($data)
    {
        $query = "UPDATE tujuan SET tujuan=:tujuan WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('tujuan', $data['tujuan']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteTujuan($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariTujuan()
    {
        $key = $_POST['key'];
        $this->db->query("SELECT * FROM " . $this->table . "  WHERE tujuan LIKE :key");
        $this->db->bind('key', "%$key%");

        return $this->db->resultSet();
    }
}
