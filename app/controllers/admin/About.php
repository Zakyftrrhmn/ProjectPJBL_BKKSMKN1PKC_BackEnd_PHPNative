<?php

class About extends Controller
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

        $data['title'] = 'Apa itu BKK?';
        $data['about'] = $this->model('AboutModel')->getAllAbout();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer', $data);
    }


    public function updateAbout()
    {
        $this->cekAkses('Super Admin');

        $inputs = ['penjelasan'];
        foreach ($inputs as $input) {
            if (empty(trim($_POST[$input]))) {
                Flasher::setMessage("$input tidak boleh kosong atau hanya berisi spasi!", 'danger');
                header('Location: ' . base_url . '/admin/about');
                exit;
            }
        }

        $dataCount = $this->model('AboutModel')->countData();

        if ($dataCount > 0) {
            // Update jika data sudah ada
            if ($this->model('AboutModel')->updateDataAbout($_POST) > 0) {
                Flasher::setMessage('Data berhasil diupdate!', 'success');
                header('Location: ' . base_url . '/admin/about');
                exit;
            } else {
                Flasher::setMessage('Tidak ada perubahan data!', 'danger');
                header('Location: ' . base_url . '/admin/about');
                exit;
            }
        } else {
            // Tambah data jika belum ada
            if ($this->model('AboutModel')->insertDataAbout($_POST) > 0) {
                Flasher::setMessage('Data berhasil ditambahkan!', 'success');
                header('Location: ' . base_url . '/admin/about');
                exit;
            } else {
                Flasher::setMessage('Gagal menambahkan data!', 'danger');
                header('Location: ' . base_url . '/admin/about');
                exit;
            }
        }
    }
}
