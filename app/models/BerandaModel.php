<?php

class BerandaModel
{

    private $table = 'beranda';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllBerandaa()
    {
        $this->db->query("SELECT * FROM " . $this->table . " LIMIT 1");
        return $this->db->single();
    }

    public function getAllBeranda()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
    public function countData()
    {
        $this->db->query("SELECT COUNT(*) AS total FROM " . $this->table);
        return $this->db->single()['total'];
    }

    public function insertDataBeranda($data)
    {
        $query = "INSERT INTO beranda (video, title , gambar, banner) 
                  VALUES (:video, :title, :gambar, :banner)";
        $this->db->query($query);
        $this->db->bind('video', $data['video']);
        $this->db->bind('title', $data['title']);
        $this->db->bind('gambar', $data['gambar'] ?? null);
        $this->db->bind('banner', $data['banner'] ?? null);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateDataBeranda($data)
    {
        $query = "UPDATE beranda SET 
                  video = :video, 
                  title = :title, 
                  gambar = :gambar, 
                  banner = :banner
                  WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('video', $data['video']);
        $this->db->bind('title', $data['title']);
        $this->db->bind('gambar', $data['gambar'] ?? null);
        $this->db->bind('banner', $data['banner'] ?? null);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
