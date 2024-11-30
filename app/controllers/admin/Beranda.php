<?php

class Beranda extends Controller
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
        $data['title'] = 'Halaman Beranda';
        $data['beranda'] = $this->model('BerandaModel')->getAllBeranda();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('beranda/index', $data);
        $this->view('templates/footer', $data);
    }

    public function updateBeranda()
    {
        $this->cekAkses('Super Admin');
        $dataCount = $this->model('BerandaModel')->countData();

        $inputs = ['video', 'title'];
        foreach ($inputs as $input) {
            if (empty(trim($_POST[$input]))) {
                Flasher::setMessage("$input tidak boleh kosong atau hanya berisi spasi!", 'danger');
                header('Location: ' . base_url . '/admin/beranda');
                exit;
            }
        }

        if ($dataCount > 0) {
            // ini untuk beranda gambar 
            if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
                // Proses upload
                $fileTmpPath = $_FILES['gambar']['tmp_name'];
                $fileName = $_FILES['gambar']['name'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));
                $allowedFileExtensions = ['jpg', 'jpeg', 'png'];

                if (in_array($fileExtension, $allowedFileExtensions)) {
                    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                    $uploadFileDir = "uploads/beranda/gambar/";
                    $dest_path = $uploadFileDir . $newFileName;

                    if (!is_dir($uploadFileDir)) {
                        mkdir($uploadFileDir, 0777, true);
                    }

                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        $_POST['gambar'] = $newFileName;
                    } else {
                        Flasher::setMessage('Gagal mengunggah file.', 'danger');
                        header('location:' . base_url . '/admin/beranda/' . $_POST['id']);
                        exit;
                    }
                } else {
                    Flasher::setMessage('File tidak valid! Hanya gambar JPG, JPEG atau PNG yang diperbolehkan.', 'warning');
                    header('location:' . base_url . '/admin/beranda/' . $_POST['id']);
                    exit;
                }
            } else {
                $_POST['gambar'] = $_POST['gambar_lama'];
            }

            // ini untuk beranda banner 
            if (isset($_FILES['banner']) && $_FILES['banner']['error'] === UPLOAD_ERR_OK) {
                // Proses upload
                $fileTmpPath = $_FILES['banner']['tmp_name'];
                $fileName = $_FILES['banner']['name'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));
                $allowedFileExtensions = ['jpg', 'jpeg', 'png'];

                if (in_array($fileExtension, $allowedFileExtensions)) {
                    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                    $uploadFileDir = "uploads/beranda/banner/";
                    $dest_path = $uploadFileDir . $newFileName;

                    if (!is_dir($uploadFileDir)) {
                        mkdir($uploadFileDir, 0777, true);
                    }

                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        $_POST['banner'] = $newFileName;
                    } else {
                        Flasher::setMessage('Gagal mengunggah file.', 'danger');
                        header('location:' . base_url . '/admin/beranda/' . $_POST['id']);
                        exit;
                    }
                } else {
                    Flasher::setMessage('File tidak valid! Hanya Format JPG, JPEG atau PNG yang diperbolehkan.', 'warning');
                    header('location:' . base_url . '/admin/beranda/' . $_POST['id']);
                    exit;
                }
            } else {
                $_POST['banner'] = $_POST['banner_lama'];
            }

            // Update data ke model
            if ($this->model('BerandaModel')->updateDataBeranda($_POST) > 0) {
                Flasher::setMessage('Data berhasil diperbarui!', 'success');
                header('location:' . base_url . '/admin/beranda');
                exit;
            } else {
                Flasher::setMessage('Tidak ada perubahan data.', 'danger');
                header('location:' . base_url . '/admin/beranda');
                exit;
            }
        } else {
            // ini untuk beranda gambar 
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
                    $uploadFileDir = 'uploads/beranda/gambar/';
                    $dest_path = $uploadFileDir . $newFileName;

                    if (!is_dir($uploadFileDir)) {
                        mkdir($uploadFileDir, 0777, true);
                    }

                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        $_POST['gambar'] = $newFileName;
                    } else {
                        Flasher::setMessage('Gagal', ' mengunggah logo perusahaan ', 'danger');
                        header('location:' . base_url . '/admin/beranda');
                        exit;
                    }
                } else {
                    Flasher::setMessage(' File tidak valid! Hanya gambar JPG, JPEG atau PNG yang diperbolehkan.', '', 'warning');
                    header('location:' . base_url . '/admin/beranda');
                    exit;
                }
            } else {
                $_POST['gambar'] = '';
            }

            // ini untuk beranda banner
            if (isset($_FILES['banner']) && $_FILES['banner']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['banner']['tmp_name'];
                $fileName = $_FILES['banner']['name'];
                $fileSize = $_FILES['banner']['size'];
                $fileType = $_FILES['banner']['type'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));
                $allowedFileExtensions = ['jpg', 'png', 'jpeg'];

                if (in_array($fileExtension, $allowedFileExtensions)) {
                    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                    $uploadFileDir = 'uploads/beranda/banner/';
                    $dest_path = $uploadFileDir . $newFileName;

                    if (!is_dir($uploadFileDir)) {
                        mkdir($uploadFileDir, 0777, true);
                    }

                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        $_POST['banner'] = $newFileName;
                    } else {
                        Flasher::setMessage('Gagal', ' mengunggah logo perusahaan ', 'danger');
                        header('location:' . base_url . '/admin/beranda');
                        exit;
                    }
                } else {
                    Flasher::setMessage(' File tidak valid! Hanya format JPG, JPEG atau PNG yang diperbolehkan.', '', 'warning');
                    header('location:' . base_url . '/admin/beranda');
                    exit;
                }
            } else {
                $_POST['banner'] = '';
            }

            if ($this->model('BerandaModel')->insertDataBeranda($_POST) > 0) {
                Flasher::setMessage(' Data berhasil ditambahkan!', 'success');
                header('location:' . base_url . '/admin/beranda');
                exit;
            } else {
                Flasher::setMessage(' Gagal Menambahkan Data', 'danger');
                header('location:' . base_url . '/admin/beranda');
                exit;
            }
        }
    }
}
