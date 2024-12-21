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

    public function getTujuanByUuid($uuid)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE uuid=:uuid');
        $this->db->bind('uuid', $uuid);
        return $this->db->single();
    }

    public function tambahTujuan($data)
    {
        $uuid = uniqid();
        $query = "INSERT INTO tujuan (uuid, tujuan) values (:uuid, :tujuan)";
        $this->db->query($query);
        $this->db->bind('uuid', $uuid);
        $this->db->bind('tujuan', $data['tujuan']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataTujuan($data)
    {
        $query = "UPDATE tujuan SET tujuan=:tujuan WHERE uuid=:uuid";
        $this->db->query($query);
        $this->db->bind('uuid', $data['uuid']);
        $this->db->bind('tujuan', $data['tujuan']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteTujuan($uuid)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE uuid=:uuid');
        $this->db->bind('uuid', $uuid);
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
