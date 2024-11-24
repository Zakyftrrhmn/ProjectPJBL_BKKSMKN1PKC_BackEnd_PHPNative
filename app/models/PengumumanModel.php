<?php

class PengumumanModel
{

    private $table = 'pengumuman';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPengumuman()
    {
        $this->db->query('SELECT * 
                          FROM ' . $this->table . ' 
                          ORDER BY id DESC');
        return $this->db->resultSet();
    }

    public function getPengumumanById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }


    public function tambahPengumuman($data)
    {
        $query = "INSERT INTO pengumuman (nama_pengumuman, tanggal_pengumuman, file_pengumuman) values (:nama_pengumuman, :tanggal_pengumuman, :file_pengumuman)";
        $this->db->query($query);
        $this->db->bind('nama_pengumuman', $data['nama_pengumuman']);
        $this->db->bind('tanggal_pengumuman', $data['tanggal_pengumuman']);
        $this->db->bind('file_pengumuman', $data['file_pengumuman']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataPengumuman($data)
    {
        $query = "UPDATE pengumuman SET nama_pengumuman=:nama_pengumuman, tanggal_pengumuman=:tanggal_pengumuman, file_pengumuman=:file_pengumuman WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_pengumuman', $data['nama_pengumuman']);
        $this->db->bind('tanggal_pengumuman', $data['tanggal_pengumuman']);
        $this->db->bind('file_pengumuman', $data['file_pengumuman']);
        $this->db->execute();

        return $this->db->rowCount();
    }



    public function deletePengumuman($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariPengumuman()
    {
        $key = $_POST['key'];
        $this->db->query("SELECT * FROM " . $this->table . "  WHERE nama_pengumuman LIKE :key OR tanggal_pengumuman LIKE :key");
        $this->db->bind('key', "%$key%");

        return $this->db->resultSet();
    }
}
