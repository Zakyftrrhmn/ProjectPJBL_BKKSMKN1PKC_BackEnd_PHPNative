<?php

class UserModel
{

    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllUser()
    {
        $this->db->query('SELECT * 
                          FROM ' . $this->table . ' 
                          ORDER BY role DESC'); // Mengurutkan berdasarkan id secara menurun
        return $this->db->resultSet();
    }


    public function getUserByUuid($uuid)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE uuid=:uuid');
        $this->db->bind('uuid', $uuid);
        return $this->db->single();
    }

    public function tambahUser($data)
    {
        $uuid = uniqid(); // Atau gunakan library UUID
        $query = "INSERT INTO user (uuid, nama, username, email, password, role, photo) values (:uuid, :nama, :username, :email, :password, :role, :photo)";
        $this->db->query($query);
        $this->db->bind('uuid', $uuid);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', password_hash($data['password'], PASSWORD_DEFAULT)); // Menggunakan password_hash
        $this->db->bind('role', $data['role']);
        $this->db->bind('photo', $data['photo'] ?? null);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cekUsername()
    {
        $username = $_POST['username'];
        $this->db->query("SELECT * FROM user WHERE username = :username");
        $this->db->bind('username', $username);
        return $this->db->single();
    }

    public function checkUniqueUsername($username, $userId)
    {
        $query = "SELECT id FROM user WHERE username = :username AND id != :id";
        $this->db->query($query);
        $this->db->bind('username', $username);
        $this->db->bind('id', $userId);

        $this->db->execute();
        return $this->db->rowCount() > 0; // Return true jika username sudah ada
    }



    public function updateUser($data)
    {
        if (empty($data['password'])) {
            $query = "UPDATE user SET nama=:nama, username=:username, email=:email, role=:role, photo=:photo WHERE uuid=:uuid";
            $this->db->query($query);
            $this->db->bind('uuid', $data['uuid']);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('username', $data['username']);
            $this->db->bind('email', $data['email']);
            $this->db->bind('role', $data['role']);
            $this->db->bind('photo', $data['photo'] ?? null);
        } else {
            $query = "UPDATE user SET nama=:nama, username=:username, email=:email, password=:password, role=:role, photo=:photo WHERE uuid=:uuid";
            $this->db->query($query);
            $this->db->bind('uuid', $data['uuid']);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('username', $data['username']);
            $this->db->bind('email', $data['email']);
            $this->db->bind('password', password_hash($data['password'], PASSWORD_DEFAULT)); // Menggunakan password_hash
            $this->db->bind('role', $data['role']);
            $this->db->bind('photo', $data['photo'] ?? null);
        }

        $this->db->execute();
        return $this->db->rowCount();
    }


    public function deleteUser($uuid)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE uuid=:uuid');
        $this->db->bind('uuid', $uuid);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariUser()
    {
        $key = $_POST['key'];
        $this->db->query("SELECT * FROM " . $this->table . "  WHERE 
        nama LIKE :key
        OR username LIKE :key
        OR role LIKE :key");
        $this->db->bind('key', "%$key%");

        return $this->db->resultSet();
    }
}
