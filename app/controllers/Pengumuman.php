<?php

class Pengumuman extends Controller
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
        $data['title'] = 'Data Pengumuman';
        $data['pengumuman'] = $this->model('PengumumanModel')->getAllPengumuman();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('pengumuman/index', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah()
    {
        $this->cekAkses('Super Admin');
        $data['title'] = 'Tambah Data Pengumuman';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('pengumuman/create', $data);
        $this->view('templates/footer', $data);
    }

    public function simpanPengumuman()
    {
        $this->cekAkses('Super Admin');
        // Validasi input
        if (isset($_POST['nama_pengumuman'], $_POST['tanggal_pengumuman'], $_FILES['file_pengumuman'])) {
            $nama_pengumuman = $_POST['nama_pengumuman'];
            $tanggal_pengumuman = $_POST['tanggal_pengumuman'];
            $file = $_FILES['file_pengumuman'];

            // Validasi ekstensi file
            $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            $allowedFileExtensions = ['pdf', 'docx', 'xlsx'];

            if (!in_array($fileExtension, $allowedFileExtensions)) {
                Flasher::setMessage('File tidak valid! Hanya file PDF, DOCX, atau XLSX yang diperbolehkan.', 'warning');
                header('Location: ' . base_url . '/pengumuman/tambah');
                exit;
            }

            // Proses upload file
            $uploadDir = 'uploads/pengumuman/';
            $fileName = time() . '_' . basename($file['name']);
            $targetFile = $uploadDir . $fileName;

            // Periksa apakah direktori upload ada, jika tidak buat
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // Cek dan pindahkan file
            if (move_uploaded_file($file['tmp_name'], $targetFile)) {
                // Jika berhasil upload, simpan data ke database
                $data = [
                    'nama_pengumuman' => $nama_pengumuman,
                    'tanggal_pengumuman' => $tanggal_pengumuman,
                    'file_pengumuman' => $fileName,
                ];

                if ($this->model('PengumumanModel')->tambahPengumuman($data) > 0) {
                    Flasher::setMessage('Data berhasil ditambah!', 'success');
                    header('Location: ' . base_url . '/pengumuman');
                    exit;
                } else {
                    Flasher::setMessage('Data gagal ditambah!', 'danger');
                    header('Location: ' . base_url . '/pengumuman');
                    exit;
                }
            } else {
                Flasher::setMessage('Gagal mengupload file!', 'danger');
                header('Location: ' . base_url . '/pengumuman');
                exit;
            }
        } else {
            Flasher::setMessage('Input tidak valid!', 'danger');
            header('Location: ' . base_url . '/pengumuman');
            exit;
        }
    }


    public function edit($id)
    {
        $this->cekAkses('Super Admin');
        $data['title'] = 'Edit Pengumuman';
        $data['pengumuman'] = $this->model('PengumumanModel')->getPengumumanById($id);

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('pengumuman/edit', $data);
        $this->view('templates/footer', $data);
    }

    public function updatePengumuman()
    {
        $this->cekAkses('Super Admin');
        // Cek apakah ada file baru yang diupload
        if (isset($_FILES['file_pengumuman']) && $_FILES['file_pengumuman']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['file_pengumuman']['tmp_name'];
            $fileName = $_FILES['file_pengumuman']['name'];
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $allowedFileExtensions = ['pdf', 'docx', 'xlsx'];

            if (in_array($fileExtension, $allowedFileExtensions)) {
                // Buat nama file baru untuk file yang diupload
                $newFileName = time() . '_' . basename($fileName);
                $uploadFileDir = 'uploads/pengumuman/';
                $destPath = $uploadFileDir . $newFileName;

                // Periksa apakah direktori upload ada, jika tidak buat
                if (!is_dir($uploadFileDir)) {
                    mkdir($uploadFileDir, 0777, true);
                }

                // Cek dan pindahkan file
                if (move_uploaded_file($fileTmpPath, $destPath)) {
                    $_POST['file_pengumuman'] = $newFileName; // Mengganti dengan file baru
                }
            } else {
                Flasher::setMessage('File tidak valid! Hanya file PDF, DOCX, atau XLSX yang diperbolehkan.', 'warning');
                header('location:' . base_url . '/pengumuman/edit/' . $_POST['id']);
                exit;
            }
        } else {
            // Jika tidak ada file baru, gunakan file lama
            $_POST['file_pengumuman'] = $_POST['file_lama'];
        }

        // Update data pengumuman di model
        if ($this->model('PengumumanModel')->updateDataPengumuman($_POST) > 0) {
            Flasher::setMessage('Data pengumuman berhasil diupdate!', 'success');
            header('location:' . base_url . '/pengumuman');
            exit;
        } else {
            Flasher::setMessage('Tidak ada perubahan data pengumuman.', 'danger');
            header('location:' . base_url . '/pengumuman');
            exit;
        }
    }

    public function hapus($id)
    {
        $this->cekAkses('Super Admin');
        if ($this->model('PengumumanModel')->deletePengumuman($id) > 0) {
            Flasher::setMessage(' Data berhasil di Hapus!', 'success');
            header('location:' . base_url . '/pengumuman');
            exit;
        } else {
            Flasher::setMessage(' Data gagal di Hapus!', 'danger');
            header('location:' . base_url . '/pengumuman');
            exit;
        }
    }

    public function cari()
    {
        $this->cekAkses('Super Admin');
        $data['title'] = 'Data Pengumuman';
        $data['pengumuman'] = $this->model('PengumumanModel')->cariPengumuman();
        $data['key'] = $_POST['key'];

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('pengumuman/index', $data);
        $this->view('templates/footer', $data);
    }
}
