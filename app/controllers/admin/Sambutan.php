<?php

class Sambutan extends Controller
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
        $data['title'] = 'Halaman Sambutan';
        $data['sambutan'] = $this->model('SambutanModel')->getAllSambutan();
        $data['logo'] = $this->model('LogoModel')->getAllLogoo();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('sambutan/index', $data);
        $this->view('templates/footer', $data);
    }

    public function updateSambutan()
    {
        $data['logo'] = $this->model('LogoModel')->getAllLogoo();
        $this->cekAkses('Super Admin');
        $dataCount = $this->model('SambutanModel')->countData();

        $inputs = ['nama_kepsek', 'sambutan_kepsek'];
        foreach ($inputs as $input) {
            if (empty(trim($_POST[$input]))) {
                Flasher::setMessage("$input tidak boleh kosong atau hanya berisi spasi!", 'danger');
                header('Location: ' . base_url . '/admin/sambutan');
                exit;
            }
        }

        if ($dataCount > 0) {
            // ini untuk sambutan Foto Kepala Sekolah 
            if (isset($_FILES['foto_kepsek']) && $_FILES['foto_kepsek']['error'] === UPLOAD_ERR_OK) {
                // Proses upload
                $fileTmpPath = $_FILES['foto_kepsek']['tmp_name'];
                $fileName = $_FILES['foto_kepsek']['name'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));
                $allowedFileExtensions = ['jpg', 'jpeg', 'png'];

                if (in_array($fileExtension, $allowedFileExtensions)) {
                    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                    $uploadFileDir = "uploads/sambutan/";
                    $dest_path = $uploadFileDir . $newFileName;

                    if (!is_dir($uploadFileDir)) {
                        mkdir($uploadFileDir, 0777, true);
                    }

                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        $_POST['foto_kepsek'] = $newFileName;
                    } else {
                        Flasher::setMessage('Gagal mengunggah file.', 'danger');
                        header('location:' . base_url . '/admin/sambutan/' . $_POST['id']);
                        exit;
                    }
                } else {
                    Flasher::setMessage('File tidak valid! Hanya Format JPG, JPEG atau PNG yang diperbolehkan.', 'warning');
                    header('location:' . base_url . '/admin/sambutan/' . $_POST['id']);
                    exit;
                }
            } else {
                $_POST['foto_kepsek'] = $_POST['foto_kepsek_lama'];
            }

            // Update data ke model
            if ($this->model('SambutanModel')->updateDataSambutan($_POST) > 0) {
                Flasher::setMessage('Data berhasil diperbarui!', 'success');
                header('location:' . base_url . '/admin/sambutan');
                exit;
            } else {
                Flasher::setMessage('Tidak ada perubahan data.', 'danger');
                header('location:' . base_url . '/admin/sambutan');
                exit;
            }
        } else {
            // ini untuk Foto Kepala Sekolah  
            if (isset($_FILES['foto_kepsek']) && $_FILES['foto_kepsek']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['foto_kepsek']['tmp_name'];
                $fileName = $_FILES['foto_kepsek']['name'];
                $fileSize = $_FILES['foto_kepsek']['size'];
                $fileType = $_FILES['foto_kepsek']['type'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));
                $allowedFileExtensions = ['jpg', 'png', 'jpeg'];

                if (in_array($fileExtension, $allowedFileExtensions)) {
                    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                    $uploadFileDir = 'uploads/sambutan/';
                    $dest_path = $uploadFileDir . $newFileName;

                    if (!is_dir($uploadFileDir)) {
                        mkdir($uploadFileDir, 0777, true);
                    }

                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        $_POST['foto_kepsek'] = $newFileName;
                    } else {
                        Flasher::setMessage('Gagal', ' mengunggah logo perusahaan ', 'danger');
                        header('location:' . base_url . '/admin/sambutan');
                        exit;
                    }
                } else {
                    Flasher::setMessage(' File tidak valid! Hanya gambar JPG, JPEG atau PNG yang diperbolehkan.', '', 'warning');
                    header('location:' . base_url . '/admin/sambutan');
                    exit;
                }
            } else {
                $_POST['foto_kepsek'] = '';
            }

            if ($this->model('SambutanModel')->insertDataSambutan($_POST) > 0) {
                Flasher::setMessage(' Data berhasil ditambahkan!', 'success');
                header('location:' . base_url . '/admin/sambutan');
                exit;
            } else {
                Flasher::setMessage(' Gagal Menambahkan Data', 'danger');
                header('location:' . base_url . '/admin/sambutan');
                exit;
            }
        }
    }
}
