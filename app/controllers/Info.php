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
        $data['info'] = $this->model('InfoModel')->getAllInfo();


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

        $inputs = ['link_facebook', 'link_instagram', 'link_youtube', 'email', 'telepon'];
        foreach ($inputs as $input) {
            if (empty(trim($_POST[$input]))) {
                Flasher::setMessage("$input tidak boleh kosong atau hanya berisi spasi!", 'danger');
                header('Location: ' . base_url . '/info');
                exit;
            }
        }

        if ($dataCount > 0) {
            // Update jika data sudah ada
            if ($this->model('InfoModel')->updateDataInfo($_POST) > 0) {
                Flasher::setMessage('Data berhasil diupdate!', 'success');
                header('Location: ' . base_url . '/info');
                exit;
            } else {
                Flasher::setMessage('Tidak ada perubahan data!', 'danger');
                header('Location: ' . base_url . '/info');
                exit;
            }
        } else {
            // Tambah data jika belum ada
            if ($this->model('InfoModel')->insertDataInfo($_POST) > 0) {
                Flasher::setMessage('Data berhasil ditambahkan!', 'success');
                header('Location: ' . base_url . '/info');
                exit;
            } else {
                Flasher::setMessage('Gagal menambahkan data!', 'danger');
                header('Location: ' . base_url . '/info');
                exit;
            }
        }
    }
}
