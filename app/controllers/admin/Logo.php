<?php

class Logo extends Controller
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
        $data['title'] = 'Logo';
        $data['logoo'] = $this->model('LogoModel')->getAllLogo();
        $data['logo'] = $this->model('LogoModel')->getAllLogoo();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('logo/index', $data);
        $this->view('templates/footer', $data);
    }

    public function updateLogo()
    {
        $this->cekAkses('Super Admin');
        $dataCount = $this->model('LogoModel')->countData();

        $inputs = ['nama_sekolah', 'alamat_sekolah'];
        foreach ($inputs as $input) {
            if (empty(trim($_POST[$input]))) {
                Flasher::setMessage("$input tidak boleh kosong atau hanya berisi spasi!", 'danger');
                header('Location: ' . base_url . '/admin/logo');
                exit;
            }
        }

        if ($dataCount > 0) {
            // ini untuk logo_bkk 
            if (isset($_FILES['logo_bkk']) && $_FILES['logo_bkk']['error'] === UPLOAD_ERR_OK) {
                // Proses upload
                $fileTmpPath = $_FILES['logo_bkk']['tmp_name'];
                $fileName = $_FILES['logo_bkk']['name'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));
                $allowedFileExtensions = ['jpg', 'jpeg', 'png'];

                if (in_array($fileExtension, $allowedFileExtensions)) {
                    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                    $uploadFileDir = "uploads/logo/logobkk/";
                    $dest_path = $uploadFileDir . $newFileName;

                    if (!is_dir($uploadFileDir)) {
                        mkdir($uploadFileDir, 0777, true);
                    }

                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        $_POST['logo_bkk'] = $newFileName;
                    } else {
                        Flasher::setMessage('Gagal mengunggah file.', 'danger');
                        header('location:' . base_url . '/admin/logo/' . $_POST['id']);
                        exit;
                    }
                } else {
                    Flasher::setMessage('File tidak valid! Hanya gambar JPG, JPEG atau PNG yang diperbolehkan.', 'warning');
                    header('location:' . base_url . '/admin/logo/' . $_POST['id']);
                    exit;
                }
            } else {
                $_POST['logo_bkk'] = $_POST['logo_bkk_lama'];
            }

            // ini untuk logo sekolah
            if (isset($_FILES['logo_sekolah']) && $_FILES['logo_sekolah']['error'] === UPLOAD_ERR_OK) {
                // Proses upload
                $fileTmpPath = $_FILES['logo_sekolah']['tmp_name'];
                $fileName = $_FILES['logo_sekolah']['name'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));
                $allowedFileExtensions = ['jpg', 'jpeg', 'png'];

                if (in_array($fileExtension, $allowedFileExtensions)) {
                    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                    $uploadFileDir = "uploads/logo/logosekolah/";
                    $dest_path = $uploadFileDir . $newFileName;

                    if (!is_dir($uploadFileDir)) {
                        mkdir($uploadFileDir, 0777, true);
                    }

                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        $_POST['logo_sekolah'] = $newFileName;
                    } else {
                        Flasher::setMessage('Gagal mengunggah file.', 'danger');
                        header('location:' . base_url . '/admin/logo/' . $_POST['id']);
                        exit;
                    }
                } else {
                    Flasher::setMessage('File tidak valid! Hanya Format JPG, JPEG atau PNG yang diperbolehkan.', 'warning');
                    header('location:' . base_url . '/admin/logo/' . $_POST['id']);
                    exit;
                }
            } else {
                $_POST['logo_sekolah'] = $_POST['logo_sekolah_lama'];
            }

            // Update data ke model
            if ($this->model('LogoModel')->updateDataLogo($_POST) > 0) {
                Flasher::setMessage('Data berhasil diperbarui!', 'success');
                header('location:' . base_url . '/admin/logo');
                exit;
            } else {
                Flasher::setMessage('Tidak ada perubahan data.', 'danger');
                header('location:' . base_url . '/admin/logo');
                exit;
            }
        } else {
            // ini untuk logo bkk 
            if (isset($_FILES['logo_bkk']) && $_FILES['logo_bkk']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['logo_bkk']['tmp_name'];
                $fileName = $_FILES['logo_bkk']['name'];
                $fileSize = $_FILES['logo_bkk']['size'];
                $fileType = $_FILES['logo_bkk']['type'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));
                $allowedFileExtensions = ['jpg', 'png', 'jpeg'];

                if (in_array($fileExtension, $allowedFileExtensions)) {
                    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                    $uploadFileDir = 'uploads/logo/logobkk/';
                    $dest_path = $uploadFileDir . $newFileName;

                    if (!is_dir($uploadFileDir)) {
                        mkdir($uploadFileDir, 0777, true);
                    }

                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        $_POST['logo_bkk'] = $newFileName;
                    } else {
                        Flasher::setMessage('Gagal', ' mengunggah Logo ', 'danger');
                        header('location:' . base_url . '/admin/logo');
                        exit;
                    }
                } else {
                    Flasher::setMessage(' File tidak valid! Hanya gambar JPG, JPEG atau PNG yang diperbolehkan.', '', 'warning');
                    header('location:' . base_url . '/admin/logo');
                    exit;
                }
            } else {
                $_POST['logo_bkk'] = '';
            }

            // ini untuk logo sekoklah
            if (isset($_FILES['logo_sekolah']) && $_FILES['logo_sekolah']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['logo_sekolah']['tmp_name'];
                $fileName = $_FILES['logo_sekolah']['name'];
                $fileSize = $_FILES['logo_sekolah']['size'];
                $fileType = $_FILES['logo_sekolah']['type'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));
                $allowedFileExtensions = ['jpg', 'png', 'jpeg'];

                if (in_array($fileExtension, $allowedFileExtensions)) {
                    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                    $uploadFileDir = 'uploads/logo/logosekolah/';
                    $dest_path = $uploadFileDir . $newFileName;

                    if (!is_dir($uploadFileDir)) {
                        mkdir($uploadFileDir, 0777, true);
                    }

                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        $_POST['logo_sekolah'] = $newFileName;
                    } else {
                        Flasher::setMessage('Gagal', ' mengunggah logo', 'danger');
                        header('location:' . base_url . '/admin/logo');
                        exit;
                    }
                } else {
                    Flasher::setMessage(' File tidak valid! Hanya format JPG, JPEG atau PNG yang diperbolehkan.', '', 'warning');
                    header('location:' . base_url . '/admin/logo');
                    exit;
                }
            } else {
                $_POST['logo_sekolah'] = '';
            }

            if ($this->model('LogoModel')->insertDataLogo($_POST) > 0) {
                Flasher::setMessage(' Data berhasil ditambahkan!', 'success');
                header('location:' . base_url . '/admin/logo');
                exit;
            } else {
                Flasher::setMessage(' Gagal Menambahkan Data', 'danger');
                header('location:' . base_url . '/admin/logo');
                exit;
            }
        }
    }
}
