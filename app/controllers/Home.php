<?php

class Home extends Controller
{
    public function __construct()
    {
        if ($_SESSION['session_login'] != 'sudah login') {
            Flasher::setMessage('Anda Belum Login', 'danger');
            header('location:' . base_url . '/login');
            exit;
        }
    }

    public function index()
    {
        if ($_SESSION['role'] !== 'super admin') {
            echo "Akses ditolak!";
            exit;
        }
        $data['title'] = 'Halaman Home';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer', $data);
    }
}
