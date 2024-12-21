<?php
class PerusahaanModel
{
    private $table = 'perusahaan';
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }


    public function getAllPerusahaan()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPerusahaanByUuid($uuid)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE uuid=:uuid');
        $this->db->bind('uuid', $uuid);
        return $this->db->single();
    }

    public function tambahPerusahaan($data)
    {
        $uuid = uniqid(); // Atau gunakan library UUID
        $query = "INSERT INTO perusahaan (uuid, nama_perusahaan, alamat_perusahaan, email_perusahaan, telepon_perusahaan, logo_perusahaan, industry_perusahaan)
        VALUES (:uuid, :nama_perusahaan, :alamat_perusahaan, :email_perusahaan, :telepon_perusahaan, :logo_perusahaan, :industry_perusahaan)";
        $this->db->query($query);
        $this->db->bind('uuid', $uuid);
        $this->db->bind('nama_perusahaan', $data['nama_perusahaan']);
        $this->db->bind('alamat_perusahaan', $data['alamat_perusahaan']);
        $this->db->bind('email_perusahaan', $data['email_perusahaan']);
        $this->db->bind('telepon_perusahaan', $data['telepon_perusahaan']);
        $this->db->bind('logo_perusahaan', $data['logo_perusahaan'] ?? null); // Gunakan null jika tidak ada file
        $this->db->bind('industry_perusahaan', $data['industry_perusahaan']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updatePerusahaan($data)
    {
        $query = "UPDATE perusahaan SET 
                    nama_perusahaan = :nama_perusahaan,
                    email_perusahaan = :email_perusahaan,
                    alamat_perusahaan = :alamat_perusahaan,
                    telepon_perusahaan = :telepon_perusahaan,
                    logo_perusahaan = :logo_perusahaan,
                    industry_perusahaan = :industry_perusahaan
                  WHERE uuid = :uuid";

        $this->db->query($query);
        $this->db->bind('nama_perusahaan', $data['nama_perusahaan']);
        $this->db->bind('email_perusahaan', $data['email_perusahaan']);
        $this->db->bind('alamat_perusahaan', $data['alamat_perusahaan']);
        $this->db->bind('telepon_perusahaan', $data['telepon_perusahaan']);
        $this->db->bind('logo_perusahaan', $data['logo_perusahaan'] ?? null);
        $this->db->bind('industry_perusahaan', $data['industry_perusahaan']);
        $this->db->bind('uuid', $data['uuid']);

        $this->db->execute();
        return $this->db->rowCount();
    }


    public function deletePerusahaan($uuid)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE uuid=:uuid');
        $this->db->bind('uuid', $uuid);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariPerusahaan()
    {
        $key = $_POST['key'];
        $this->db->query("SELECT * FROM " . $this->table . "  WHERE nama_perusahaan LIKE :key OR industry_perusahaan LIKE :key");
        $this->db->bind('key', "%$key%");

        return $this->db->resultSet();
    }
}
