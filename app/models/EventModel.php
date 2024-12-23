<?php
class EventModel
{
    private $table = 'event';
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllEvent()
    {
        $this->db->query('SELECT event.*, perusahaan.nama_perusahaan, perusahaan.logo_perusahaan 
                          FROM ' . $this->table . ' 
                          JOIN perusahaan ON perusahaan.id = event.id_perusahaan 
                          ORDER BY event.tanggal_terakhir   '); // Mengurutkan berdasarkan id secara menurun
        return $this->db->resultSet();
    }


    public function getEventByUuid($uuid)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE uuid=:uuid');
        $this->db->bind('uuid', $uuid);
        return $this->db->single();
    }

    // Di model
    public function getActiveEvents()
    {
        $today = date('Y-m-d'); // Tanggal hari ini
        $query = ('SELECT event.*, perusahaan.nama_perusahaan, perusahaan.logo_perusahaan 
                          FROM ' . $this->table . ' 
                          JOIN perusahaan ON perusahaan.id = event.id_perusahaan 
                          WHERE event.tanggal_terakhir >= :today 
                          ORDER BY event.tanggal_terakhir ASC');
        $this->db->query($query); // Memastikan query di-*prepare*
        $this->db->bind(':today', $today);
        return $this->db->resultSet();
    }


    public function tambahEvent($data)
    {
        $uuid = uniqid();
        $query = "INSERT INTO event (uuid, id_perusahaan, posisi, lokasi, tipe, gaji, tanggal_terakhir, job_description, kualifikasi )
        VALUES (:uuid, :id_perusahaan, :posisi, :lokasi, :tipe, :gaji, :tanggal_terakhir, :job_description, :kualifikasi )";
        $this->db->query($query);
        $this->db->bind('uuid', $uuid);
        $this->db->bind('id_perusahaan', $data['id_perusahaan']);
        $this->db->bind('posisi', $data['posisi']);
        $this->db->bind('lokasi', $data['lokasi']);
        $this->db->bind('tipe', $data['tipe']);
        $this->db->bind('gaji', $data['gaji']);
        $this->db->bind('tanggal_terakhir', $data['tanggal_terakhir']);
        $this->db->bind('job_description', $data['job_description']);
        $this->db->bind('kualifikasi', $data['kualifikasi']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataEvent($data)
    {
        $query = "UPDATE event SET id_perusahaan=:id_perusahaan, posisi=:posisi, lokasi=:lokasi, tipe=:tipe, gaji=:gaji, tanggal_terakhir=:tanggal_terakhir, job_description=:job_description, kualifikasi=:kualifikasi  WHERE uuid=:uuid";
        $this->db->query($query);
        $this->db->bind('uuid', $data['uuid']);
        $this->db->bind('id_perusahaan', $data['id_perusahaan']);
        $this->db->bind('posisi', $data['posisi']);
        $this->db->bind('lokasi', $data['lokasi']);
        $this->db->bind('tipe', $data['tipe']);
        $this->db->bind('gaji', $data['gaji']);
        $this->db->bind('tanggal_terakhir', $data['tanggal_terakhir']);
        $this->db->bind('job_description', $data['job_description']);
        $this->db->bind('kualifikasi', $data['kualifikasi']);
        $this->db->execute();

        return $this->db->rowCount();
    }



    public function deleteEvent($uuid)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE uuid=:uuid');
        $this->db->bind('uuid', $uuid);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariEvent()
    {
        $key = $_POST['key'];

        $this->db->query("SELECT event.*, perusahaan.nama_perusahaan
                          FROM " . $this->table . " 
                          JOIN perusahaan ON perusahaan.id = event.id_perusahaan 
                          WHERE event.posisi LIKE :key 
                          OR perusahaan.nama_perusahaan LIKE :key
                          OR event.tipe LIKE :key
                          OR event.tanggal_terakhir LIKE :key");

        $this->db->bind(':key', "%$key%");
        return $this->db->resultSet();
    }
}
