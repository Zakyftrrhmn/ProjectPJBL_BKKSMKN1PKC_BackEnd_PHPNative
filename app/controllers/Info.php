<?php

class Info extends Controller
{
    public function __construct()
    {
        if ($_SESSION['session_login'] != 'sudah login') {
            Flasher::setMessage('Anda Belum Login', 'danger');
            header('location:' . base_url . '/login');
            exit;
        }
    }

    function cekAkses($role)
    {
        if (!isset($_SESSION['session_login'])) {
            header('location:' . base_url . '/login');
            exit;
        }

        // Cek apakah role sesuai
        if ($_SESSION['role'] !== $role) {
            Flasher::setMessage('Akses ditolak', 'danger');
            header('location:' . base_url . '/error');
            exit;
        }
    }


    public function index()
    {
        $this->cekAkses('Super Admin');
        $data['title'] = 'Info Contact';

        // Cek apakah data sudah ada di database
        $dataCount = $this->model('InfoModel')->countData();

        if ($dataCount > 0) {
            $data['info'] = $this->model('InfoModel')->getAllInfo();
        } else {
            // Data default jika belum ada di database
            $data['info'] = [[
                'id' => '',
                'link_facebook' => 'https://www.facebook.com/',
                'link_instagram' => 'https://www.instagram.com/',
                'link_youtube' => 'https://www.youtube.com/',
                'email' => 'SMKN@gmail.com',
                'telepon' => '+62 812-3213-3212'
            ]];
        }

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('info/index', $data);
        $this->view('templates/footer', $data);
    }

    public function updateInfo()
    {
        $this->cekAkses('Super Admin');
        $dataCount = $this->model('InfoModel')->countData();

        if ($dataCount > 0) {
            // Update jika data sudah ada
            if ($this->model('InfoModel')->updateDataInfo($_POST) > 0) {
                Flasher::setMessage('Data berhasil diupdate!', 'success');
            } else {
                Flasher::setMessage('Tidak ada perubahan data!', 'danger');
            }
        } else {
            // Tambah data jika belum ada
            if ($this->model('InfoModel')->insertDataInfo($_POST) > 0) {
                Flasher::setMessage('Data berhasil ditambahkan!', 'success');
            } else {
                Flasher::setMessage('Gagal menambahkan data!', 'danger');
            }
        }

        header('Location: ' . base_url . '/info');
        exit;
    }
}
