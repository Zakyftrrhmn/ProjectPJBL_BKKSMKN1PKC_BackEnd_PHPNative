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

    public function getGalleryById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahGallery($data)
    {
        $query = "INSERT INTO gallery (keterangan, gambar) values (:keterangan, :gambar)";
        $this->db->query($query);
        $this->db->bind('keterangan', $data['keterangan']);
        $this->db->bind('gambar', $data['gambar']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataGallery($data)
    {
        $query = "UPDATE gallery SET keterangan=:keterangan, gambar=:gambar WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('keterangan', $data['keterangan']);
        $this->db->bind('gambar', $data['gambar']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteGallery($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
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
