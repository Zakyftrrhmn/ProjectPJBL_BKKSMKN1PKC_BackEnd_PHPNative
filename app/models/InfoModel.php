<?php

class InfoModel
{

    private $table = 'info';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllInfoo()
    {
        $this->db->query("SELECT * FROM " . $this->table . " LIMIT 1");
        return $this->db->single();
    }

    public function getAllInfo()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
    public function countData()
    {
        $this->db->query("SELECT COUNT(*) AS total FROM " . $this->table);
        return $this->db->single()['total'];
    }

    public function insertDataInfo($data)
    {
        $query = "INSERT INTO info (link_facebook, link_instagram, link_youtube, email, telepon) 
                  VALUES (:link_facebook, :link_instagram, :link_youtube, :email, :telepon)";
        $this->db->query($query);
        $this->db->bind('link_facebook', $data['link_facebook']);
        $this->db->bind('link_instagram', $data['link_instagram']);
        $this->db->bind('link_youtube', $data['link_youtube']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('telepon', $data['telepon']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function UpdateDataInfo($data)
    {
        $query = "UPDATE info SET link_facebook=:link_facebook, link_instagram=:link_instagram, link_youtube=:link_youtube, email=:email, telepon=:telepon WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('link_facebook', $data['link_facebook']);
        $this->db->bind('link_instagram', $data['link_instagram']);
        $this->db->bind('link_youtube', $data['link_youtube']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('telepon', $data['telepon']);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
