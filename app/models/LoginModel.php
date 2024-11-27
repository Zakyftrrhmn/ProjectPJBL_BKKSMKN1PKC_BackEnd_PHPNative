<?php

class LoginModel
{
    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function checkLogin($data)
    {
        $query = "SELECT * FROM $this->table WHERE username=:username";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $user = $this->db->single();

        // Cek apakah user ada dan verifikasi password
        if ($user && md5($data['password']) === $user['password']) {
            // Simpan data user ke session
            $_SESSION['username'] = $user['username'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['photo'] = $user['photo']; // Menyimpan nama file gambar profil
            $_SESSION['session_login'] = 'sudah login';
            return $user;
        }

        return false;
    }
}
