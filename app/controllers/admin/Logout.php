<?php

class Logout
{
    public function index()
    {
        session_start();
        session_destroy();
        Flasher::setMessage('Selamat Anda Berhasil Logout!', 'success');
        header('location:' . base_url . '/admin/login');
        exit;
    }
}

