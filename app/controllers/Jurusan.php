<?php

class Kategori extends Controller
{
    public function index()
    {
        $data['title'] = 'Data Jurusan';
        $data['jurusan'] = $this->model('JurusanModel')->getAllJurusan();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('jurusan/index', $data);
        $this->view('templates/footer');
    }
}
