<?php

class Perusahaan extends Controller
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
        $data['title'] = 'Data Perusahaan';
        $data['perusahaan'] = $this->model('PerusahaanModel')->getAllPerusahaan();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('perusahaan/index', $data);
        $this->view('templates/footer', $data);
    }

    public function cari()
    {
        $data['logo'] = $this->model('LogoModel')->getAllLogoo();
        $this->cekAkses('Super Admin');
        $data['title'] = 'Data Perusahaan';
        $data['perusahaan'] = $this->model('PerusahaanModel')->cariPerusahaan();
        $data['key'] = $_POST['key'];

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('perusahaan/index', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah()
    {
        $data['logo'] = $this->model('LogoModel')->getAllLogoo();
        $this->cekAkses('Super Admin');
        $data['title'] = 'Tambah Data Perusahaan';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('perusahaan/create', $data);
        $this->view('templates/footer', $data);
    }

    public function simpanPerusahaan()
    {
        $this->cekAkses('Super Admin');
        // Proses upload file
        if (isset($_FILES['logo_perusahaan']) && $_FILES['logo_perusahaan']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['logo_perusahaan']['tmp_name'];
            $fileName = $_FILES['logo_perusahaan']['name'];
            $fileSize = $_FILES['logo_perusahaan']['size'];
            $fileType = $_FILES['logo_perusahaan']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $allowedFileExtensions = ['jpg', 'png', 'jpeg'];

            if (in_array($fileExtension, $allowedFileExtensions)) {
                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                $uploadFileDir = 'uploads/perusahaan/';
                $dest_path = $uploadFileDir . $newFileName;

                if (!is_dir($uploadFileDir)) {
                    mkdir($uploadFileDir, 0777, true);
                }

                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    $_POST['logo_perusahaan'] = $newFileName;
                } else {
                    Flasher::setMessage('Gagal', ' mengunggah logo perusahaan ', 'danger');
                    header('location:' . base_url . '/admin/perusahaan/tambah');
                    exit;
                }
            } else {
                Flasher::setMessage(' File tidak valid! Hanya gambar JPG, JPEG atau PNG yang diperbolehkan.', '', 'warning');
                header('location:' . base_url . '/admin/perusahaan/tambah');
                exit;
            }
        } else {
            $_POST['logo_perusahaan'] = '';
        }

        // Simpan data ke model
        if ($this->model('PerusahaanModel')->tambahPerusahaan($_POST) > 0) {
            Flasher::setMessage(' Data berhasil ditambahkan!', 'success');
            header('location:' . base_url . '/admin/perusahaan');
            exit;
        } else {
            Flasher::setMessage(' Tidak ada data yang diubah!', 'danger');
            header('location:' . base_url . '/admin/perusahaan');
            exit;
        }
    }

    public function edit($uuid)
    {
        $data['logo'] = $this->model('LogoModel')->getAllLogoo();
        $this->cekAkses('Super Admin');
        $data['title'] = 'Edit Data Perusahaan';
        $data['perusahaan'] = $this->model('PerusahaanModel')->getPerusahaanByUuid($uuid);


        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('perusahaan/edit', $data);
        $this->view('templates/footer', $data);
    }

    public function updatePerusahaan()
    {
        $this->cekAkses('Super Admin');
        // Proses upload file baru (jika ada)
        if (isset($_FILES['logo_perusahaan']) && $_FILES['logo_perusahaan']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['logo_perusahaan']['tmp_name'];
            $fileName = $_FILES['logo_perusahaan']['name'];
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $allowedFileExtensions = ['jpg', 'png', 'jpeg'];

            // Validasi MIME type untuk memastikan file adalah gambar
            $imageInfo = getimagesize($fileTmpPath);
            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg'];

            if ($imageInfo && in_array($fileExtension, $allowedFileExtensions) && in_array($imageInfo['mime'], $allowedMimeTypes)) {
                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                $uploadFileDir = 'uploads/perusahaan/';
                $dest_path = $uploadFileDir . $newFileName;

                if (!is_dir($uploadFileDir)) {
                    mkdir($uploadFileDir, 0777, true);
                }

                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    // Hapus logo lama jika ada logo baru
                    if (!empty($_POST['logo_perusahaan_lama']) && file_exists('uploads/perusahaan/' . $_POST['logo_perusahaan_lama'])) {
                        unlink('uploads/perusahaan/' . $_POST['logo_perusahaan_lama']);
                    }

                    $_POST['logo_perusahaan'] = $newFileName;
                }
            } else {
                Flasher::setMessage('File tidak valid! Hanya gambar JPG, JPEG, atau PNG yang diperbolehkan.', 'warning');
                header('location:' . base_url . '/admin/perusahaan/edit/' . $_POST['id']);
                exit;
            }
        } elseif (isset($_POST['hapus_logo']) && $_POST['hapus_logo'] === "1") {
            // Hapus logo jika checkbox dicentang
            if (!empty($_POST['logo_perusahaan_lama']) && file_exists('uploads/perusahaan/' . $_POST['logo_perusahaan_lama'])) {
                unlink('uploads/perusahaan/' . $_POST['logo_perusahaan_lama']);
            }
            $_POST['logo_perusahaan'] = ''; // Logo dihapus
        } else {
            // Pertahankan logo lama jika tidak ada perubahan
            $_POST['logo_perusahaan'] = $_POST['logo_perusahaan_lama'];
        }

        // Update data ke model
        if ($this->model('PerusahaanModel')->updatePerusahaan($_POST) > 0) {
            Flasher::setMessage('Data berhasil diperbarui!', 'success');
            header('location:' . base_url . '/admin/perusahaan');
            exit;
        } else {
            Flasher::setMessage('Tidak ada perubahan data.', 'danger');
            header('location:' . base_url . '/admin/perusahaan');
            exit;
        }
    }

    public function hapus($uuid)
    {
        $this->cekAkses('Super Admin');
        if ($this->model('PerusahaanModel')->deletePerusahaan($uuid) > 0) {
            Flasher::setMessage(' Data berhasil dihapus!', 'success');
            header('location:' . base_url . '/admin/perusahaan');
            exit;
        } else {
            Flasher::setMessage(' Data gagal dihapus', 'danger');
            header('location:' . base_url . '/admin/perusahaan');
            exit;
        }
    }
}
