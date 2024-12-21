<?php

class AlumniModel
{

    private $table = 'alumni';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllAlumni()
    {
        $this->db->query('SELECT alumni.*, jurusan.nama_jurusan 
                          FROM ' . $this->table . ' 
                          JOIN jurusan ON jurusan.id = alumni.id_jurusan 
                          ORDER BY alumni.id DESC'); // Mengurutkan berdasarkan id secara menurun
        return $this->db->resultSet();
    }


    public function getAlumniByUuid($uuid)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE uuid=:uuid');
        $this->db->bind('uuid', $uuid);
        return $this->db->single();
    }

    public function tambahAlumni($data)
    {
        // Cek apakah NISN sudah ada
        $queryCheckNISN = "SELECT * FROM alumni WHERE nisn = :nisn";
        $this->db->query($queryCheckNISN);

        $this->db->bind('nisn', $data['nisn']);
        $this->db->execute();

        // Jika NISN sudah terdaftar
        if ($this->db->rowCount() > 0) {
            return false; // NISN sudah ada, kembalikan false
        }

        // Cek apakah NIS sudah ada
        $queryCheckNIS = "SELECT * FROM alumni WHERE nis = :nis";
        $this->db->query($queryCheckNIS);
        $this->db->bind('nis', $data['nis']);
        $this->db->execute();

        // Jika NISN sudah terdaftar
        if ($this->db->rowCount() > 0) {
            return false; // NIS sudah ada, kembalikan false
        }
        $uuid = uniqid(); // Atau gunakan library UUID
        // Jika NISN belum terdaftar, lanjutkan insert data
        $query = "INSERT INTO alumni (uuid,nisn, nis, nama, id_jurusan, kelamin, tempat_lahir, tanggal_lahir, tahun_lulus, status) 
                  VALUES (:uuid ,:nisn, :nis, :nama, :id_jurusan, :kelamin, :tempat_lahir, :tanggal_lahir, :tahun_lulus, :status)";
        $this->db->query($query);
        $this->db->bind('uuid', $uuid);
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('id_jurusan', $data['id_jurusan']);
        $this->db->bind('kelamin', $data['kelamin']);
        $this->db->bind('tempat_lahir', $data['tempat_lahir']);
        $this->db->bind('tanggal_lahir', $data['tanggal_lahir']);
        $this->db->bind('tahun_lulus', $data['tahun_lulus']);
        $this->db->bind('status', $data['status']);
        $this->db->execute();

        return $this->db->rowCount(); // Kembalikan jumlah baris yang terpengaruh (harus > 0 jika berhasil)
    }


    public function updateDataAlumni($data)
    {
        // Cek apakah NISN baru sudah ada pada alumni lain (kecuali alumni dengan ID yang sedang diupdate)
        $queryCheck = "SELECT * FROM alumni WHERE nisn = :nisn AND id != :id";
        $this->db->query($queryCheck);
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();

        // Jika NISN sudah digunakan oleh alumni lain
        if ($this->db->rowCount() > 0) {
            return false; // Konflik NISN
        }

        // Cek apakah NIS baru sudah ada pada alumni lain (kecuali alumni dengan ID yang sedang diupdate)
        $queryCheck = "SELECT * FROM alumni WHERE nis = :nis AND id != :id";
        $this->db->query($queryCheck);
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();

        // Jika NISN sudah digunakan oleh alumni lain
        if ($this->db->rowCount() > 0) {
            return false; // Konflik NISN
        }
        // Jika tidak ada konflik NISN, lanjutkan update data
        $query = "UPDATE alumni SET 
                    nisn = :nisn,
                    nis = :nis,
                    nama = :nama,
                    id_jurusan = :id_jurusan,
                    kelamin = :kelamin,
                    tempat_lahir = :tempat_lahir,
                    tanggal_lahir = :tanggal_lahir,
                    tahun_lulus = :tahun_lulus,
                    status = :status
                  WHERE uuid = :uuid";

        $this->db->query($query);

        // Binding parameter
        $this->db->bind('uuid', $data['uuid']);
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('id_jurusan', $data['id_jurusan']);
        $this->db->bind('kelamin', $data['kelamin']);
        $this->db->bind('tempat_lahir', $data['tempat_lahir']);
        $this->db->bind('tanggal_lahir', $data['tanggal_lahir']);
        $this->db->bind('tahun_lulus', $data['tahun_lulus']);
        $this->db->bind('status', $data['status']);

        // Eksekusi query
        $this->db->execute();

        // Kembalikan jumlah baris yang diperbarui
        return $this->db->rowCount();
    }


    public function deleteAlumni($Uuid)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE uuid=:uuid');
        $this->db->bind('uuid', $Uuid);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariAlumni()
    {
        $key = $_POST['key'];

        $this->db->query("SELECT alumni.*, jurusan.nama_jurusan, alumni.tahun_lulus 
                          FROM " . $this->table . " 
                          JOIN jurusan ON jurusan.id = alumni.id_jurusan 
                          WHERE alumni.nama LIKE :key 
                          OR alumni.tahun_lulus LIKE :key
                          OR jurusan.nama_jurusan LIKE :key
                          OR alumni.status LIKE :key
                          OR alumni.nisn LIKE :key");

        $this->db->bind(':key', "%$key%");
        return $this->db->resultSet();
    }
}
