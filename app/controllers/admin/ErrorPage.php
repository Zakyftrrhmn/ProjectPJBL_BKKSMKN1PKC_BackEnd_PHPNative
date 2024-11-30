<?php

class ErrorPage extends Controller
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
        $data['title'] = 'Not Found';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('home/error', $data);
        $this->view('templates/footer', $data);
    }
}
