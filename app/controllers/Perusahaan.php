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

    public function cari()
    {
        $data['title'] = 'Data Perusahaan';
        $data['perusahaan'] = $this->model('PerusahaanModel')->cariPerusahaan();
        $data['key'] = $_POST['key'];

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
                    header('location:' . base_url . '/perusahaan/tambah');
                    exit;
                }
            } else {
                Flasher::setMessage(' File tidak valid! Hanya gambar JPG, JPEG atau PNG yang diperbolehkan.', '', 'warning');
                header('location:' . base_url . '/perusahaan/tambah');
                exit;
            }
        } else {
            $_POST['logo_perusahaan'] = '';
        }

        // Simpan data ke model
        if ($this->model('PerusahaanModel')->tambahPerusahaan($_POST) > 0) {
            Flasher::setMessage(' Data berhasil ditambahkan!', 'success');
            header('location:' . base_url . '/perusahaan');
            exit;
        } else {
            Flasher::setMessage(' Tidak ada data yang diubah!', 'danger');
            header('location:' . base_url . '/perusahaan');
            exit;
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Data Perusahaan';
        $data['perusahaan'] = $this->model('PerusahaanModel')->getPerusahaanById($id);


        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('perusahaan/edit', $data);
        $this->view('templates/footer');
    }

    public function updatePerusahaan()
    {
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
                header('location:' . base_url . '/perusahaan/edit/' . $_POST['id']);
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
            header('location:' . base_url . '/perusahaan');
            exit;
        } else {
            Flasher::setMessage('Tidak ada perubahan data.', 'danger');
            header('location:' . base_url . '/perusahaan');
            exit;
        }
    }


    public function hapus($id)
    {
        if ($this->model('PerusahaanModel')->deletePerusahaan($id) > 0) {
            Flasher::setMessage(' Data berhasil dihapus!', 'success');
            header('location:' . base_url . '/perusahaan');
            exit;
        } else {
            Flasher::setMessage(' Data gagal dihapus', 'danger');
            header('location:' . base_url . '/perusahaan');
            exit;
        }
    }
}
