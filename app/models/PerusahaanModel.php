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

    public function getPerusahaanById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahPerusahaan($data)
    {
        $query = "INSERT INTO perusahaan (nama_perusahaan, alamat_perusahaan, email_perusahaan, telepon_perusahaan, logo_perusahaan, industry_perusahaan) values (:nama_perusahaan, :alamat_perusahaan, :email_perusahaan, :telepon_perusahaan, :logo_perusahaan, :industry_perusahaan)";
        $this->db->query($query);
        $this->db->bind('nama_perusahaan', $data['nama_perusahaan']);
        $this->db->bind('alamat_perusahaan', $data['alamat_perusahaan']);
        $this->db->bind('email_perusahaan', $data['email_perusahaan']);
        $this->db->bind('telepon_perusahaan', $data['telepon_perusahaan']);
        $this->db->bind('logo_perusahaan', $data['logo_perusahaan']);
        $this->db->bind('industry_perusahaan', $data['industry_perusahaan']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataPerusahaan($data)
    {
        // Periksa apakah logo ada (dalam kasus file logo baru di-upload)
        if (isset($data['logo_perusahaan']) && !empty($data['logo_perusahaan'])) {
            $query = "UPDATE perusahaan SET 
                        nama_perusahaan=:nama_perusahaan, 
                        alamat_perusahaan=:alamat_perusahaan, 
                        email_perusahaan=:email_perusahaan, 
                        telepon_perusahaan=:telepon_perusahaan, 
                        industry_perusahaan=:industry_perusahaan, 
                        logo_perusahaan=:logo_perusahaan 
                      WHERE id=:id";

            $this->db->query($query);
            $this->db->bind('logo_perusahaan', $data['logo_perusahaan']);
        } else {
            // Jika tidak ada logo baru, tetap gunakan query tanpa perubahan logo
            $query = "UPDATE perusahaan SET 
                        nama_perusahaan=:nama_perusahaan, 
                        alamat_perusahaan=:alamat_perusahaan, 
                        email_perusahaan=:email_perusahaan, 
                        telepon_perusahaan=:telepon_perusahaan, 
                        industry_perusahaan=:industry_perusahaan 
                      WHERE id=:id";

            $this->db->query($query);
        }

        // Bind data lainnya
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_perusahaan', $data['nama_perusahaan']);
        $this->db->bind('alamat_perusahaan', $data['alamat_perusahaan']);
        $this->db->bind('email_perusahaan', $data['email_perusahaan']);
        $this->db->bind('telepon_perusahaan', $data['telepon_perusahaan']);
        $this->db->bind('industry_perusahaan', $data['industry_perusahaan']);

        // Eksekusi query
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deletePerusahaan($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariPerusahaan($key)
    {
        // Query mencari perusahaan berdasarkan nama atau industri
        $this->db->query("SELECT * FROM " . $this->table . " WHERE nama_perusahaan LIKE :key OR industry_perusahaan LIKE :key");

        // Binding parameter :key dengan nilai yang dicari
        $this->db->bind('key', "%$key%");

        // Mengembalikan hasil pencarian
        return $this->db->resultSet();
    }
}
