<?php

class AboutModel
{

    private $table = 'about';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllAbout()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
    public function countData()
    {
        $this->db->query("SELECT COUNT(*) AS total FROM " . $this->table);
        return $this->db->single()['total'];
    }

    public function insertDataAbout($data)
    {
        $query = "INSERT INTO about (penjelasan) 
                  VALUES (:penjelasan)";
        $this->db->query($query);
        $this->db->bind('penjelasan', $data['penjelasan']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function UpdateDataAbout($data)
    {
        $query = "UPDATE about SET penjelasan=:penjelasan WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('penjelasan', $data['penjelasan']);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
