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

    public function getPendaftaranByUuid($uuid)
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
            WHERE pelamar.uuid = :uuid
        ');

        $this->db->bind('uuid', $uuid);

        return $this->db->single();
    }

    // Di model PelamarModel
    public function getPelamarByEvent($id_event)
    {
        // Query untuk mengambil data pelamar berdasarkan id_event
        $query = "SELECT pelamar.* 
                  FROM pelamar 
                  JOIN event ON pelamar.id_event = event.id
                  WHERE event.id = :id_event";

        // Siapkan query
        $this->db->query($query);

        // Binding id_event ke query
        $this->db->bind(':id_event', $id_event);

        // Mengembalikan hasil query sebagai array hasil
        return $this->db->resultSet();
    }



    public function tambahPendaftaran($data)
    {
        $uuidPelamar = uniqid();
        $query = "INSERT INTO pelamar (
            uuid, nama_lengkap, nomor_ktp, tanggal_lahir, tempat_lahir, usia, jenis_kelamin, no_handphone, email, 
            agama, tinggi_badan, berat_badan, alamat_sekarang, asal_sekolah, jurusan, tahun_lulus, 
            foto_kk, foto_ktp, file_cv, id_event, sertifikat
        ) VALUES (
            :uuid, :nama_lengkap, :nomor_ktp, :tanggal_lahir, :tempat_lahir, :usia, :jenis_kelamin, :no_handphone, :email, 
            :agama, :tinggi_badan, :berat_badan, :alamat_sekarang, :asal_sekolah, :jurusan, :tahun_lulus, 
            :foto_kk, :foto_ktp, :file_cv, :id_event, :sertifikat
        )";

        $this->db->query($query);
        $this->db->bind('uuid', $uuidPelamar);
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


        // Mengembalikan UUID yang baru dibuat
        return $uuidPelamar;
    }
}
