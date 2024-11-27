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
                          ORDER BY id DESC'); // Mengurutkan berdasarkan id secara menurun
        return $this->db->resultSet();
    }


    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahUser($data)
    {
        $query = "INSERT INTO user (nama, username, email, password,role, photo ) values (:nama, :username, :email, :password, :role, :photo )";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', md5($data['password']));
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
        // Cek apakah password kosong atau tidak
        if (empty($data['password'])) {
            // Jika password kosong, tidak mengupdate field password
            $query = "UPDATE user SET nama=:nama, username=:username, email=:email, role=:role, photo=:photo WHERE id=:id";
            $this->db->query($query);
            $this->db->bind('id', $data['id']);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('username', $data['username']);
            $this->db->bind('email', $data['email']);
            $this->db->bind('role', $data['role']);
            $this->db->bind('photo', $data['photo'] ?? null);
        } else {
            // Jika password tidak kosong, field password juga ikut diupdate
            $query = "UPDATE user SET nama=:nama, username=:username, email=:email, password=:password, role=:role, photo=:photo WHERE id=:id";
            $this->db->query($query);
            $this->db->bind('id', $data['id']);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('username', $data['username']);
            $this->db->bind('email', $data['email']);
            $this->db->bind('password', md5($data['password']));
            $this->db->bind('role', $data['role']);
            $this->db->bind('photo', $data['photo'] ?? null);
        }

        $this->db->execute();
        return $this->db->rowCount();
    }


    public function deleteUser($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
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
