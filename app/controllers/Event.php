<?php

class Event extends Controller
{
    public function index()
    {
        $data['title'] = 'Data Event';
        $data['event'] = $this->model('EventModel')->getAllEvent();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('event/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Event Baru';
        $data['perusahaan'] = $this->model('PerusahaanModel')->getAllPerusahaan();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('event/create', $data);
        $this->view('templates/footer');
    }


    public function simpanEvent()
    {
        if ($this->model('EventModel')->tambahEvent($_POST) > 0) {
            Flasher::setMessage(' Event berhasil di Tambah!', 'success');
            header('location:' . base_url . '/event');
            exit;
        } else {
            Flasher::setMessage(' Event gagal di Tambah!', 'danger');
            header('location:' . base_url . '/event');
            exit;
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Data Event';
        $data['event'] = $this->model('EventModel')->getEventById($id);
        $data['perusahaan'] = $this->model('PerusahaanModel')->getAllPerusahaan();


        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('event/edit', $data);
        $this->view('templates/footer');
    }

    public function updateEvent()
    {
        if ($this->model('EventModel')->updateDataEvent($_POST) > 0) {
            Flasher::setMessage(' Event berhasil di Update!', 'success');
            header('location:' . base_url . '/event');
            exit;
        } else {
            Flasher::setMessage(' Tidak ada event di Update!', 'danger');
            header('location:' . base_url . '/event');
            exit;
        }
    }


    public function hapus($id)
    {
        if ($this->model('EventModel')->deleteEvent($id) > 0) {
            Flasher::setMessage(' Event berhasil dihapus!', 'success');
            header('location:' . base_url . '/event');
            exit;
        } else {
            Flasher::setMessage(' Event gagal dihapus', 'danger');
            header('location:' . base_url . '/event');
            exit;
        }
    }

    public function cari()
    {
        $data['title'] = 'Data Event';
        $data['event'] = $this->model('EventModel')->cariEvent();
        $data['key'] = $_POST['key'];

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('event/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Data Event';
        $data['event'] = $this->model('EventModel')->getEventById($id);
        $data['perusahaan'] = $this->model('PerusahaanModel')->getAllPerusahaan();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('event/detail', $data);
        $this->view('templates/footer');
    }
}
