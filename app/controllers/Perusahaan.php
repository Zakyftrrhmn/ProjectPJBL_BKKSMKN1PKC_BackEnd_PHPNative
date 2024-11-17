<?php
class Perusahaan extends Controller
{
    public function index()
    {
        $data['title'] = 'Data Perusahaan';
        $data['perusahaan'] = $this->model('PerusahaanModel')->getAllPerusahaan();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('perusahaan/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Data Perusahaan';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('perusahaan/create', $data);
        $this->view('templates/footer');
    }

    public function simpanPerusahaan()
    {
        // Cek apakah ada file yang diunggah
        if (!empty($_FILES['logo_perusahaan']['name'])) {
            $targetDir = "uploads/perusahaan/"; // Direktori tujuan
            $fileName = basename($_FILES['logo_perusahaan']['name']);
            $targetFilePath = $targetDir . $fileName;

            // Validasi ukuran file (maksimal 2MB)
            if ($_FILES['logo_perusahaan']['size'] > 1 * 1024 * 1024) {
                Flasher::setMessage('Gagal', 'Ukuran file terlalu besar! Maksimal 1MB.', 'danger');
                header('location:' . base_url . '/perusahaan/tambah');
                exit;
            }

            // Validasi format file (hanya JPG, PNG, JPEG)
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            if (!in_array($fileExtension, $allowedExtensions)) {
                Flasher::setMessage('Gagal', 'Format Logo tidak valid! Harus JPG, JPEG, atau PNG.', 'danger');
                header('location:' . base_url . '/perusahaan/tambah');
                exit;
            }

            // Pindahkan file ke direktori target
            if (move_uploaded_file($_FILES['logo_perusahaan']['tmp_name'], $targetFilePath)) {
                $_POST['logo_perusahaan'] = $fileName;
            } else {
                Flasher::setMessage('Gagal', 'mengunggah logo', 'danger');
                header('location:' . base_url . '/perusahaan/tambah');
                exit;
            }
        } else {
            $_POST['logo_perusahaan'] = null;
        }

        // Simpan data perusahaan
        if ($this->model('PerusahaanModel')->tambahPerusahaan($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location:' . base_url . '/perusahaan');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location:' . base_url . '/perusahaan');
            exit;
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Perusahaan';
        $data['perusahaan'] = $this->model('PerusahaanModel')->getPerusahaanById($id);

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('perusahaan/edit', $data);
        $this->view('templates/footer');
    }

    public function updatePerusahaan()
    {
        // Cek apakah ada file logo yang diunggah
        if (!empty($_FILES['logo_perusahaan']['name'])) {
            $targetDir = "uploads/perusahaan/";
            $fileName = basename($_FILES['logo_perusahaan']['name']);
            $targetFilePath = $targetDir . $fileName;

            // Validasi ukuran file (maksimal 1MB)
            if ($_FILES['logo_perusahaan']['size'] > 1 * 1024 * 1024) {
                Flasher::setMessage('Gagal', 'Ukuran file terlalu besar! Maksimal 1MB.', 'danger');
                header('location:' . base_url . '/perusahaan/edit/' . $_POST['id']);
                exit;
            }

            // Validasi format file (hanya JPG, PNG, JPEG)
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            if (!in_array($fileExtension, $allowedExtensions)) {
                Flasher::setMessage('Gagal', 'Format Logo tidak valid! Harus JPG, JPEG, atau PNG.', 'danger');
                header('location:' . base_url . '/perusahaan/edit/' . $_POST['id']);
                exit;
            }

            // Pindahkan file ke direktori target
            if (move_uploaded_file($_FILES['logo_perusahaan']['tmp_name'], $targetFilePath)) {
                $_POST['logo_perusahaan'] = $fileName;
            } else {
                Flasher::setMessage('Gagal', 'mengunggah logo', 'danger');
                header('location:' . base_url . '/perusahaan/edit/' . $_POST['id']);
                exit;
            }
        } else {
            $_POST['logo_perusahaan'] = $_POST['logo_lama']; // Gunakan logo lama jika tidak ada file yang diunggah
        }

        // Update data perusahaan
        if ($this->model('PerusahaanModel')->updateDataPerusahaan($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location:' . base_url . '/perusahaan');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location:' . base_url . '/perusahaan');
            exit;
        }
    }
    public function hapus($id)
    {
        if ($this->model('PerusahaanModel')->deletePerusahaan($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location:' . base_url . '/perusahaan');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location:' . base_url . '/perusahaan');
            exit;
        }
    }

    public function cari()
    {
        // Memeriksa apakah ada input pencarian
        $key = isset($_POST['key']) ? $_POST['key'] : '';

        // Mengambil data perusahaan berdasarkan pencarian
        $data['title'] = 'Data Perusahaan';
        $data['perusahaan'] = $this->model('PerusahaanModel')->cariPerusahaan($key);
        $data['key'] = $key;

        // Memuat tampilan
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('perusahaan/index', $data);
        $this->view('templates/footer');
    }
}
