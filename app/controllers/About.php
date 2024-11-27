<?php

class About extends Controller
{
    public function index()
    {
        $data['title'] = 'Halaman Apa itu BKK?';

        // Cek apakah data sudah ada di database
        $dataCount = $this->model('AboutModel')->countData();

        if ($dataCount > 0) {
            $data['about'] = $this->model('AboutModel')->getAllAbout();
        } else {
            // Data default jika belum ada di database
            $data['about'] = [[
                'id' => '',
                'penjelasan' => 'Bursa Kerja Khusus (BKK) adalah platform yang disediakan oleh SMKN 1 Pangkalan Kerinci untuk membantu siswa dan alumni dalam mendapatkan informasi seputar lowongan kerja, pelatihan, serta penyaluran tenaga kerja. Sebagai mitra Dinas Tenaga Kerja dan Transmigrasi, BKK berperan sebagai penghubung antara sekolah dengan dunia industri, mendukung siswa siap kerja dan memperluas peluang karir mereka.',
            ]];
        }

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

    public function updateAbout()
    {
        $dataCount = $this->model('AboutModel')->countData();

        if ($dataCount > 0) {
            // Update jika data sudah ada
            if ($this->model('AboutModel')->updateDataAbout($_POST) > 0) {
                Flasher::setMessage('Data berhasil diupdate!', 'success');
            } else {
                Flasher::setMessage('Tidak ada perubahan data!', 'danger');
            }
        } else {
            // Tambah data jika belum ada
            if ($this->model('AboutModel')->insertDataAbout($_POST) > 0) {
                Flasher::setMessage('Data berhasil ditambahkan!', 'success');
            } else {
                Flasher::setMessage('Gagal menambahkan data!', 'danger');
            }
        }

        header('Location: ' . base_url . '/about');
        exit;
    }
}
