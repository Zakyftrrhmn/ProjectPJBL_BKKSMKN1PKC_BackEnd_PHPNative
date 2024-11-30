<?php

class Dashboard extends Controller
{
    public function __construct()
    {
        if ($_SESSION['session_login'] != 'sudah login') {
            Flasher::setMessage('Anda Belum Login', 'danger');
            header('location:' . base_url . '/admin/login');
            exit;
        }
    }

    function cekAkses($role)
    {
        if (!isset($_SESSION['session_login'])) {
            header('location:' . base_url . '/admin/login');
            exit;
        }

        // Cek apakah role sesuai
        if ($_SESSION['role'] !== $role) {
            Flasher::setMessage('Akses ditolak', 'danger');
            header('location:' . base_url . '/admin/error');
            exit;
        }
    }

    public function index()
    {


        $this->cekAkses('Super Admin');
        $data['title'] = 'Halaman Dashboard';


        // Mengambil data event
        $eventData = $this->model('EventModel')->getAllEvent();
        $totalEvent = count($eventData);
        $data['totalEvent'] = $totalEvent;

        // Mengambil data perusahaan
        $perusahaanData = $this->model('PerusahaanModel')->getAllPerusahaan();
        $totalPerusahaan = count($perusahaanData);
        $data['totalPerusahaan'] = $totalPerusahaan;

        // Mengambil data jurusan
        $jurusanData = $this->model('JurusanModel')->getAllJurusan();
        $totalJurusan = count($jurusanData);
        $data['totalJurusan'] = $totalJurusan;

        // Mengambil data alumni
        $alumniData = $this->model('AlumniModel')->getAllAlumni();

        $totalAlumni = count($alumniData);
        $bekerja = 0;
        $kuliah = 0;
        $unknown = 0;

        foreach ($alumniData as $alumni) {
            if ($alumni['status'] == 'Bekerja') {
                $bekerja++;
            } elseif ($alumni['status'] == 'Kuliah') {
                $kuliah++;
            } else {
                $unknown++;
            }
        }

        // Mencegah pembagian dengan nol di view
        $data['bekerja'] = $bekerja;
        $data['kuliah'] = $kuliah;
        $data['unknown'] = $unknown;
        $data['totalAlumni'] = $totalAlumni > 0 ? $totalAlumni : 1; // Hindari pembagian dengan nol


        // Menyertakan view
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('dashboard/dashboard', $data);
        $this->view('templates/footer', $data);
    }
}
