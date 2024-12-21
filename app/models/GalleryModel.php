<?php

class GalleryModel
{

    private $table = 'gallery';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllGallery()
    {
        $this->db->query('SELECT * 
        FROM ' . $this->table . ' 
        ORDER BY id DESC');
        return $this->db->resultSet();
    }

    public function getGalleryByUuid($uuid)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE uuid=:uuid');
        $this->db->bind('uuid', $uuid);
        return $this->db->single();
    }

    public function tambahGallery($data)
    {
        $uuid = uniqid();
        $query = "INSERT INTO gallery (uuid, keterangan, gambar) values (:uuid, :keterangan, :gambar)";
        $this->db->query($query);
        $this->db->bind('uuid', $uuid);
        $this->db->bind('keterangan', $data['keterangan']);
        $this->db->bind('gambar', $data['gambar']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataGallery($data)
    {
        $query = "UPDATE gallery SET keterangan=:keterangan, gambar=:gambar WHERE uuid=:uuid";
        $this->db->query($query);
        $this->db->bind('uuid', $data['uuid']);
        $this->db->bind('keterangan', $data['keterangan']);
        $this->db->bind('gambar', $data['gambar']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteGallery($uuid)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE uuid=:uuid');
        $this->db->bind('uuid', $uuid);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariGallery()
    {
        $key = $_POST['key'];
        $this->db->query("SELECT * FROM " . $this->table . "  WHERE keterangan LIKE :key");
        $this->db->bind('key', "%$key%");

        return $this->db->resultSet();
    }
}
