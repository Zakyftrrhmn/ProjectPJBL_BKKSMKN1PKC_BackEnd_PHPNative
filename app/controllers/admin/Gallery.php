<?php

class Gallery extends Controller
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
        $data['logo'] = $this->model('LogoModel')->getAllLogoo();
        $this->cekAkses('Super Admin');
        $data['title'] = 'Gallery    BKK';
        $data['gallery'] = $this->model('GalleryModel')->getAllGallery();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('gallery/index', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah()
    {
        $data['logo'] = $this->model('LogoModel')->getAllLogoo();
        $this->cekAkses('Super Admin');
        $data['title'] = 'Tambah Gallery';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('gallery/create', $data);
        $this->view('templates/footer', $data);
    }

    public function simpanGallery()
    {
        $this->cekAkses('Super Admin');
        // Proses upload file
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['gambar']['tmp_name'];
            $fileName = $_FILES['gambar']['name'];
            $fileSize = $_FILES['gambar']['size'];
            $fileType = $_FILES['gambar']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $allowedFileExtensions = ['jpg', 'png', 'jpeg'];

            if (in_array($fileExtension, $allowedFileExtensions)) {
                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                $uploadFileDir = 'uploads/gallery/';
                $dest_path = $uploadFileDir . $newFileName;

                if (!is_dir($uploadFileDir)) {
                    mkdir($uploadFileDir, 0777, true);
                }

                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    $_POST['gambar'] = $newFileName;
                } else {
                    Flasher::setMessage('Gagal', ' mengunggah photo ', 'danger');
                    header('location:' . base_url . '/admin/gallery/tambah');
                    exit;
                }
            } else {
                Flasher::setMessage(' File tidak valid! Hanya gambar JPG, JPEG atau PNG yang diperbolehkan.', '', 'warning');
                header('location:' . base_url . '/admin/gallery/tambah');
                exit;
            }
        } else {
            $_POST['gambar'] = '';
        }

        // 
        if ($this->model('GalleryModel')->tambahGallery($_POST) > 0) {
            Flasher::setMessage(' Data berhasil di Tambah!', 'success');
            header('location:' . base_url . '/admin/gallery');
            exit;
        } else {
            Flasher::setMessage(' Data gagal di Tambah!', 'danger');
            header('location:' . base_url . '/admin/gallery');
            exit;
        }
    }

    public function edit($uuid)
    {
        $data['logo'] = $this->model('LogoModel')->getAllLogoo();
        $this->cekAkses('Super Admin');
        $data['title'] = 'Edit Gallery';
        $data['gallery'] = $this->model('GalleryModel')->getGalleryByUuid($uuid);

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('gallery/edit', $data);
        $this->view('templates/footer', $data);
    }

    public function updateGallery()
    {
        $this->cekAkses('Super Admin');
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
            // Proses upload
            $fileTmpPath = $_FILES['gambar']['tmp_name'];
            $fileName = $_FILES['gambar']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $allowedFileExtensions = ['jpg', 'jpeg', 'png'];

            if (in_array($fileExtension, $allowedFileExtensions)) {
                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                $uploadFileDir = "uploads/gallery/";
                $dest_path = $uploadFileDir . $newFileName;

                if (!is_dir($uploadFileDir)) {
                    mkdir($uploadFileDir, 0777, true);
                }

                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    $_POST['gambar'] = $newFileName;
                } else {
                    Flasher::setMessage('Gagal mengunggah file.', 'danger');
                    header('location:' . base_url . '/admin/gallery/edit/' . $_POST['id']);
                    exit;
                }
            } else {
                Flasher::setMessage('File tidak valid! Hanya gambar JPG, JPEG atau PNG yang diperbolehkan.', 'warning');
                header('location:' . base_url . '/admin/gallery/edit/' . $_POST['id']);
                exit;
            }
        } else {
            $_POST['gambar'] = $_POST['gambar_lama'];
        }

        // Update ke database
        if ($this->model('GalleryModel')->updateDataGallery($_POST) > 0) {
            Flasher::setMessage('Data berhasil diupdate.', 'success');

            header('location:' . base_url . '/admin/gallery');
            exit;
        } else {
            Flasher::setMessage('Tidak ada perubahan data.', 'danger');

            header('location:' . base_url . '/admin/gallery');
            exit;
        }
    }


    public function hapus($uuid)
    {
        $this->cekAkses('Super Admin');
        if ($this->model('GalleryModel')->deleteGallery($uuid) > 0) {
            Flasher::setMessage(' Data berhasil di Hapus!', 'success');
            header('location:' . base_url . '/admin/gallery');
            exit;
        } else {
            Flasher::setMessage(' Data gagal di Hapus!', 'danger');
            header('location:' . base_url . '/admin/gallery');
            exit;
        }
    }

    public function cari()
    {
        $data['logo'] = $this->model('LogoModel')->getAllLogoo();
        $this->cekAkses('Super Admin');
        $data['title'] = 'Gallery Website BKK';
        $data['gallery'] = $this->model('GalleryModel')->cariGallery();
        $data['key'] = $_POST['key'];

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('gallery/index', $data);
        $this->view('templates/footer', $data);
    }
}
