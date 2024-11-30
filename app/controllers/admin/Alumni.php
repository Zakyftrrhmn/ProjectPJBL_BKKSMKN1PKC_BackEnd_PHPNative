<?php

class Alumni extends Controller
{
    public function __construct()
    {
        if ($_SESSION['session_login'] != 'sudah login') {
            Flasher::setMessage('Anda Belum Login', 'danger');
            header('location:' . base_url . '/admin/login');
            exit;
        }
    }


    public function index()
    {

        $data['title'] = 'Data Alumni';
        $data['alumni'] = $this->model('AlumniModel')->getAllAlumni();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('alumni/index', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Data Alumni';
        $data['jurusan'] = $this->model('JurusanModel')->getAllJurusan();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('alumni/create', $data);
        $this->view('templates/footer', $data);
    }

    public function simpanAlumni()
    {
        $result = $this->model('AlumniModel')->tambahAlumni($_POST);

        if ($result > 0) {
            Flasher::setMessage('Data berhasil ditambahkan!', 'success');
            header('Location: ' . base_url . '/admin/alumni');
            exit;
        } elseif ($result === false) {
            Flasher::setMessage('NISN/NIS sudah terdaftar!', 'warning');
            header('Location: ' . base_url . '/admin/alumni/tambah');
            exit;
        } else {
            Flasher::setMessage('Data gagal ditambahkan!', 'danger');
            header('Location: ' . base_url . '/admin/alumni');
            exit;
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Data Alumni';
        $data['alumni'] = $this->model('AlumniModel')->getAlumniById($id);
        $data['jurusan'] = $this->model('JurusanModel')->getAllJurusan();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('alumni/edit', $data);
        $this->view('templates/footer', $data);
    }

    public function updateAlumni()
    {
        // Memanggil model untuk memperbarui data alumni dengan data dari $_POST
        $result = $this->model('AlumniModel')->updateDataAlumni($_POST);

        // Cek hasil pembaruan
        if ($result > 0) {
            // Jika berhasil diperbarui
            Flasher::setMessage('Data berhasil diperbarui!', 'success');
            header('Location: ' . base_url . '/admin/alumni');
            exit;
        } elseif ($result === false) {
            // Jika ada konflik, misalnya NISN sudah digunakan
            Flasher::setMessage('NISN/NIS sudah terdaftar!', 'warning');
            header('Location: ' . base_url . '/admin/alumni/edit/' . $_POST['id']);
            exit;
        } else {
            // Jika gagal diperbarui karena alasan lain
            Flasher::setMessage(' Tidak ada data diperbarui!', 'danger');
            header('Location: ' . base_url . '/admin/alumni');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('AlumniModel')->deleteAlumni($id) > 0) {
            Flasher::setMessage(' Data berhasil di Hapus!', 'success');
            header('location:' . base_url . '/admin/alumni');
            exit;
        } else {
            Flasher::setMessage(' Data gagal di Hapus!', 'danger');
            header('location:' . base_url . '/admin/alumni');
            exit;
        }
    }

    public function cari()
    {
        $data['title'] = 'Data Alumni';
        $data['alumni'] = $this->model('AlumniModel')->cariAlumni();
        $data['key'] = $_POST['key'];

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('alumni/index', $data);
        $this->view('templates/footer', $data);
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Data Alumni';
        $data['alumni'] = $this->model('AlumniModel')->getAlumniById($id);
        $data['jurusan'] = $this->model('JurusanModel')->getAllJurusan();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('alumni/detail', $data);
        $this->view('templates/footer', $data);
    }
}
