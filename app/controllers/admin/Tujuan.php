<?php

class Tujuan extends Controller
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
        $data['title'] = 'Setting Halaman Tujuan';
        $data['tujuan'] = $this->model('TujuanModel')->getAllTujuan();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('tujuan/index', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah()
    {
        $this->cekAkses('Super Admin');
        $data['title'] = 'Tambah Data Tujuan';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('tujuan/create', $data);
        $this->view('templates/footer', $data);
    }

    public function simpanTujuan()
    {
        $this->cekAkses('Super Admin');
        if ($this->model('TujuanModel')->tambahTujuan($_POST) > 0) {
            Flasher::setMessage(' Data berhasil di Tambah!', 'success');
            header('location:' . base_url . '/admin/tujuan');
            exit;
        } else {
            Flasher::setMessage(' Data gagal di Tambah!', 'danger');
            header('location:' . base_url . '/admin/tujuan');
            exit;
        }
    }

    public function edit($id)
    {
        $this->cekAkses('Super Admin');
        $data['title'] = 'Edit Tujuan';
        $data['tujuan'] = $this->model('TujuanModel')->getTujuanById($id);

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('tujuan/edit', $data);
        $this->view('templates/footer', $data);
    }

    public function updateTujuan()
    {
        $this->cekAkses('Super Admin');
        if ($this->model('TujuanModel')->updateDataTujuan($_POST) > 0) {
            Flasher::setMessage(' Data berhasil di Update!', 'success');
            header('location:' . base_url . '/admin/tujuan');
            exit;
        } else {
            Flasher::setMessage(' Tidak ada data di Update!', 'danger');
            header('location:' . base_url . '/admin/tujuan');
            exit;
        }
    }

    public function hapus($id)
    {
        $this->cekAkses('Super Admin');
        if ($this->model('TujuanModel')->deleteTujuan($id) > 0) {
            Flasher::setMessage(' Data berhasil di Hapus!', 'success');
            header('location:' . base_url . '/admin/tujuan');
            exit;
        } else {
            Flasher::setMessage(' Data gagal di Hapus!', 'danger');
            header('location:' . base_url . '/admin/tujuan');
            exit;
        }
    }

    public function cari()
    {
        $this->cekAkses('Super Admin');
        $data['title'] = 'Setting Halaman Tujuan';
        $data['tujuan'] = $this->model('TujuanModel')->cariTujuan();
        $data['key'] = $_POST['key'];

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('tujuan/index', $data);
        $this->view('templates/footer', $data);
    }
}
