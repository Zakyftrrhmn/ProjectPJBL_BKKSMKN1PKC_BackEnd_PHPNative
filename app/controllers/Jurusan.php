<?php

class Jurusan extends Controller
{
    public function index()
    {
        $data['title'] = 'Data Jurusan';
        $data['jurusan'] = $this->model('JurusanModel')->getAllJurusan();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('jurusan/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Data Jurusan';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('jurusan/create', $data);
        $this->view('templates/footer');
    }

    public function simpanJurusan()
    {
        if ($this->model('JurusanModel')->tambahJurusan($_POST) > 0) {
            Flasher::setMessage(' Data berhasil di Tambah!', 'success');
            header('location:' . base_url . '/jurusan');
            exit;
        } else {
            Flasher::setMessage(' Data gagal di Tambah!', 'danger');
            header('location:' . base_url . '/jurusan');
            exit;
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Jurusan';
        $data['jurusan'] = $this->model('JurusanModel')->getJurusanById($id);

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('jurusan/edit', $data);
        $this->view('templates/footer');
    }

    public function updateJurusan()
    {
        if ($this->model('JurusanModel')->updateDataJurusan($_POST) > 0) {
            Flasher::setMessage(' Data berhasil di Update!', 'success');
            header('location:' . base_url . '/jurusan');
            exit;
        } else {
            Flasher::setMessage(' Tidak ada data di Update!', 'danger');
            header('location:' . base_url . '/jurusan');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('JurusanModel')->deleteJurusan($id) > 0) {
            Flasher::setMessage(' Data berhasil di Hapus!', 'success');
            header('location:' . base_url . '/jurusan');
            exit;
        } else {
            Flasher::setMessage(' Data gagal di Hapus!', 'danger');
            header('location:' . base_url . '/jurusan');
            exit;
        }
    }

    public function cari()
    {
        $data['title'] = 'Data Jurusan';
        $data['jurusan'] = $this->model('JurusanModel')->cariJurusan();
        $data['key'] = $_POST['key'];

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('jurusan/index', $data);
        $this->view('templates/footer');
    }
}
