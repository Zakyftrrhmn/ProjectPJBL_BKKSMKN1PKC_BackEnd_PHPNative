<?php

class Jurusan extends Controller
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
        $data['logo'] = $this->model('LogoModel')->getAllLogoo();
        $this->cekAkses('Super Admin');
        $data['title'] = 'Data Jurusan';
        $data['jurusan'] = $this->model('JurusanModel')->getAllJurusan();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('jurusan/index', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah()
    {
        $data['logo'] = $this->model('LogoModel')->getAllLogoo();
        $this->cekAkses('Super Admin');
        $data['title'] = 'Tambah Data Jurusan';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('jurusan/create', $data);
        $this->view('templates/footer', $data);
    }

    public function simpanJurusan()
    {
        $this->cekAkses('Super Admin');
        if ($this->model('JurusanModel')->tambahJurusan($_POST) > 0) {
            Flasher::setMessage(' Data berhasil di Tambah!', 'success');
            header('location:' . base_url . '/admin/jurusan');
            exit;
        } else {
            Flasher::setMessage(' Data gagal di Tambah!', 'danger');
            header('location:' . base_url . '/admin/jurusan');
            exit;
        }
    }

    public function edit($id)
    {
        $data['logo'] = $this->model('LogoModel')->getAllLogoo();
        $this->cekAkses('Super Admin');
        $data['title'] = 'Edit Jurusan';
        $data['jurusan'] = $this->model('JurusanModel')->getJurusanById($id);

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('jurusan/edit', $data);
        $this->view('templates/footer', $data);
    }

    public function updateJurusan()
    {
        $this->cekAkses('Super Admin');
        if ($this->model('JurusanModel')->updateDataJurusan($_POST) > 0) {
            Flasher::setMessage(' Data berhasil di Update!', 'success');
            header('location:' . base_url . '/admin/jurusan');
            exit;
        } else {
            Flasher::setMessage(' Tidak ada data di Update!', 'danger');
            header('location:' . base_url . '/admin/jurusan');
            exit;
        }
    }

    public function hapus($id)
    {
        $this->cekAkses('Super Admin');
        if ($this->model('JurusanModel')->deleteJurusan($id) > 0) {
            Flasher::setMessage(' Data berhasil di Hapus!', 'success');
            header('location:' . base_url . '/admin/jurusan');
            exit;
        } else {
            Flasher::setMessage(' Data gagal di Hapus!', 'danger');
            header('location:' . base_url . '/admin/jurusan');
            exit;
        }
    }

    public function cari()
    {
        $data['logo'] = $this->model('LogoModel')->getAllLogoo();
        $this->cekAkses('Super Admin');
        $data['title'] = 'Data Jurusan';
        $data['jurusan'] = $this->model('JurusanModel')->cariJurusan();
        $data['key'] = $_POST['key'];

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('jurusan/index', $data);
        $this->view('templates/footer', $data);
    }
}
