<?php
class PendaftaranModel
{
    private $table = 'pelamar';
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }


    public function getAllPendaftaran()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPendaftaranById($id)
    {
        // Query untuk mengambil data pelamar beserta data event dan perusahaan
        $this->db->query('
            SELECT 
                pelamar.*, 
                event.tipe AS tipe,
                event.lokasi AS lokasi,
                event.posisi AS posisi,
                perusahaan.nama_perusahaan
            FROM pelamar
            JOIN event ON pelamar.id_event = event.id
            JOIN perusahaan ON event.id_perusahaan = perusahaan.id
            WHERE pelamar.id = :id
        ');

        $this->db->bind('id', $id);

        return $this->db->single();
    }


    public function tambahPendaftaran($data)
    {
        $query = "INSERT INTO pelamar (
            nama_lengkap, nomor_ktp, tanggal_lahir, tempat_lahir, usia, jenis_kelamin, no_handphone, email, 
            agama, tinggi_badan, berat_badan, alamat_sekarang, asal_sekolah, jurusan, tahun_lulus, 
            foto_kk, foto_ktp, file_cv, id_event, sertifikat
        ) VALUES (
            :nama_lengkap, :nomor_ktp, :tanggal_lahir, :tempat_lahir, :usia, :jenis_kelamin, :no_handphone, :email, 
            :agama, :tinggi_badan, :berat_badan, :alamat_sekarang, :asal_sekolah, :jurusan, :tahun_lulus, 
            :foto_kk, :foto_ktp, :file_cv, :id_event, :sertifikat
        )";

        $this->db->query($query);
        $this->db->bind('nama_lengkap', $data['nama_lengkap']);
        $this->db->bind('nomor_ktp', $data['nomor_ktp']);
        $this->db->bind('tanggal_lahir', $data['tanggal_lahir']);
        $this->db->bind('tempat_lahir', $data['tempat_lahir']);
        $this->db->bind('usia', $data['usia']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('no_handphone', $data['no_handphone']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('agama', $data['agama']);
        $this->db->bind('tinggi_badan', $data['tinggi_badan']);
        $this->db->bind('berat_badan', $data['berat_badan']);
        $this->db->bind('alamat_sekarang', $data['alamat_sekarang']);
        $this->db->bind('asal_sekolah', $data['asal_sekolah']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('tahun_lulus', $data['tahun_lulus']);
        $this->db->bind('foto_kk', $data['foto_kk']);
        $this->db->bind('foto_ktp', $data['foto_ktp']);
        $this->db->bind('file_cv', $data['file_cv']);
        $this->db->bind('id_event', $data['id_event']);
        $this->db->bind('sertifikat', $data['sertifikat'] ?? null);

        $this->db->execute();

        // Mengambil ID terakhir yang dimasukkan
        $lastIdQuery = "SELECT LAST_INSERT_ID() AS last_id";
        $this->db->query($lastIdQuery);
        $result = $this->db->single();
        return $result['last_id'];  // Mengembalikan ID terakhir
    }
}
