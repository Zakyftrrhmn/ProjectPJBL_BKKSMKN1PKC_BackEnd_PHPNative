<?php

class Tujuan extends Controller
{
    public function index()
    {
        $data['title'] = 'Setting Halaman Tujuan';
        $data['tujuan'] = $this->model('TujuanModel')->getAllTujuan();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('tujuan/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Data Tujuan';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('tujuan/create', $data);
        $this->view('templates/footer');
    }

    public function simpanTujuan()
    {
        if ($this->model('TujuanModel')->tambahTujuan($_POST) > 0) {
            Flasher::setMessage(' Data berhasil di Tambah!', 'success');
            header('location:' . base_url . '/tujuan');
            exit;
        } else {
            Flasher::setMessage(' Data gagal di Tambah!', 'danger');
            header('location:' . base_url . '/tujuan');
            exit;
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Tujuan';
        $data['tujuan'] = $this->model('TujuanModel')->getTujuanById($id);

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('tujuan/edit', $data);
        $this->view('templates/footer');
    }

    public function updateTujuan()
    {
        if ($this->model('TujuanModel')->updateDataTujuan($_POST) > 0) {
            Flasher::setMessage(' Data berhasil di Update!', 'success');
            header('location:' . base_url . '/tujuan');
            exit;
        } else {
            Flasher::setMessage(' Tidak ada data di Update!', 'danger');
            header('location:' . base_url . '/tujuan');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('TujuanModel')->deleteTujuan($id) > 0) {
            Flasher::setMessage(' Data berhasil di Hapus!', 'success');
            header('location:' . base_url . '/tujuan');
            exit;
        } else {
            Flasher::setMessage(' Data gagal di Hapus!', 'danger');
            header('location:' . base_url . '/tujuan');
            exit;
        }
    }

    public function cari()
    {
        $data['title'] = 'Setting Halaman Tujuan';
        $data['tujuan'] = $this->model('TujuanModel')->cariTujuan();
        $data['key'] = $_POST['key'];

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('tujuan/index', $data);
        $this->view('templates/footer');
    }
}
