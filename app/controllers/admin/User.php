<?php

class User extends Controller
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
        $data['title'] = 'Data Users';
        $data['user'] = $this->model('UserModel')->getAllUser();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('user/index', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah()
    {
        $data['logo'] = $this->model('LogoModel')->getAllLogoo();
        $this->cekAkses('Super Admin');
        $data['title'] = 'Tambah Data User';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('user/create', $data);
        $this->view('templates/footer', $data);
    }

    public function simpanUser()
    {
        $this->cekAkses('Super Admin');
        session_start(); // Memulai sesi untuk menyimpan data input

        // Menyimpan data input ke session
        $_SESSION['old_data'] = $_POST;

        // Validasi password
        if ($_POST['password'] === $_POST['ulangi_password']) {
            // Cek username di database
            $row = $this->model('UserModel')->cekUsername();
            if ($row && $row['username'] === $_POST['username']) {
                Flasher::setMessage(' Gagal, Username yang anda masukan sudah pernah digunakan!', 'warning');
                header('location:' . base_url . '/admin/user/tambah');
                exit;
            } else {
                // Proses upload file
                if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                    $fileTmpPath = $_FILES['photo']['tmp_name'];
                    $fileName = $_FILES['photo']['name'];
                    $fileSize = $_FILES['photo']['size'];
                    $fileType = $_FILES['photo']['type'];
                    $fileNameCmps = explode(".", $fileName);
                    $fileExtension = strtolower(end($fileNameCmps));
                    $allowedFileExtensions = ['jpg', 'png', 'jpeg'];

                    if (in_array($fileExtension, $allowedFileExtensions)) {
                        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                        $uploadFileDir = 'uploads/user/';
                        $dest_path = $uploadFileDir . $newFileName;

                        if (!is_dir($uploadFileDir)) {
                            mkdir($uploadFileDir, 0777, true);
                        }

                        if (move_uploaded_file($fileTmpPath, $dest_path)) {
                            $_POST['photo'] = $newFileName;
                        } else {
                            Flasher::setMessage('Gagal mengunggah foto', 'danger');
                            header('location:' . base_url . '/admin/user/tambah');
                            exit;
                        }
                    } else {
                        Flasher::setMessage('File tidak valid! Hanya gambar JPG, JPEG atau PNG yang diperbolehkan.', 'warning');
                        header('location:' . base_url . '/admin/user/tambah');
                        exit;
                    }
                } else {
                    $_POST['photo'] = '';
                }

                if ($this->model('UserModel')->tambahUser($_POST) > 0) {
                    // Hapus data lama dari session setelah berhasil disimpan
                    unset($_SESSION['old_data']);
                    Flasher::setMessage('Data berhasil ditambahkan!', 'success');
                    header('location: ' . base_url . '/admin/user');
                    exit;
                } else {
                    Flasher::setMessage('Data gagal ditambahkan!', 'danger');
                    header('location: ' . base_url . '/admin/user');
                    exit;
                }
            }
        } else {
            Flasher::setMessage('Gagal, Password tidak sama.', 'warning');
            header('location: ' . base_url . '/admin/user/tambah');
            exit;
        }
    }



    public function edit($uuid)
    {
        $data['logo'] = $this->model('LogoModel')->getAllLogoo();
        $this->cekAkses('Super Admin');
        $data['title'] = 'Edit User';
        $data['user'] = $this->model('UserModel')->getUserByUuid($uuid);

        if ($uuid == FIXED_SUPERADMIN_ID) {
            Flasher::setMessage('Akun ini tidak dapat diubah!', 'danger');
            header('location:' . base_url . '/admin/user');
            exit;
        }

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('user/edit', $data);
        $this->view('templates/footer', $data);
    }

    public function updateUser()
    {
        $this->cekAkses('Super Admin');
        if ($_POST['id'] == FIXED_SUPERADMIN_ID) {
            Flasher::setMessage('Akun ini tidak dapat diubah!', 'danger');
            header('location:' . base_url . '/admin/user');
            exit;
        }
        // Periksa apakah username sudah digunakan oleh pengguna lain
        $existingUser = $this->model('UserModel')->checkUniqueUsername($_POST['username'], $_POST['id']);
        if ($existingUser) {
            Flasher::setMessage('Username sudah digunakan oleh pengguna lain!', 'warning');
            header('location:' . base_url . '/admin/user/edit/' . $_POST['id']);
            exit;
        }

        // Check if a new photo is uploaded
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['photo']['tmp_name'];
            $fileName = $_FILES['photo']['name'];
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $allowedFileExtensions = ['jpg', 'png', 'jpeg'];

            // Validasi MIME type untuk memastikan file adalah gambar
            $imageInfo = getimagesize($fileTmpPath);
            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg'];

            if ($imageInfo && in_array($fileExtension, $allowedFileExtensions) && in_array($imageInfo['mime'], $allowedMimeTypes)) {
                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                $uploadFileDir = 'uploads/user/';
                $dest_path = $uploadFileDir . $newFileName;

                if (!is_dir($uploadFileDir)) {
                    mkdir($uploadFileDir, 0777, true);
                }

                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    // Hapus photo lama jika ada logo baru
                    if (!empty($_POST['photo_lama']) && file_exists('uploads/user/' . $_POST['photo_lama'])) {
                        unlink('uploads/user/' . $_POST['photo_lama']);
                    }

                    $_POST['photo'] = $newFileName;
                }
            } else {
                Flasher::setMessage('File tidak valid! Hanya gambar JPG, JPEG, atau PNG yang diperbolehkan.', 'warning');
                header('location:' . base_url . '/admin/user/edit/' . $_POST['id']);
                exit;
            }
        } elseif (isset($_POST['hapus_photo']) && $_POST['hapus_photo'] === "1") {
            // Hapus logo jika checkbox dicentang
            if (!empty($_POST['photo_lama']) && file_exists('uploads/user/' . $_POST['photo_lama'])) {
                unlink('uploads/user/' . $_POST['photo_lama']);
            }
            $_POST['photo'] = ''; // Logo dihapus
        } else {
            // Pertahankan photo lama jika tidak ada perubahan
            $_POST['photo'] = $_POST['photo_lama'];
        }

        // Update user data in the model
        if ($this->model('UserModel')->updateUser($_POST) > 0) {
            Flasher::setMessage('Data berhasil diupdate!', 'success');
            header('location:' . base_url . '/admin/user');
            exit;
        } else {
            Flasher::setMessage('Tidak ada perubahan data.', 'danger');
            header('location:' . base_url . '/admin/user');
            exit;
        }
    }


    public function hapus($uuid)
    {

        $this->cekAkses('Super Admin');
        if ($uuid == FIXED_SUPERADMIN_ID) {
            Flasher::setMessage('Akun ini tidak dapat dihapus!', 'danger');
            header('location:' . base_url . '/admin/user');
            exit;
        }

        if ($this->model('UserModel')->deleteUser($uuid) > 0) {
            Flasher::setMessage(' Data berhasil di Hapus!', 'success');
            header('location:' . base_url . '/admin/user');
            exit;
        } else {
            Flasher::setMessage(' Data gagal di Hapus!', 'danger');
            header('location:' . base_url . '/admin/user');
            exit;
        }
    }

    public function cari()
    {
        $data['logo'] = $this->model('LogoModel')->getAllLogoo();
        $this->cekAkses('Super Admin');
        $data['title'] = 'Data User';
        $data['user'] = $this->model('UserModel')->cariUser();
        $data['key'] = $_POST['key'];

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('user/index', $data);
        $this->view('templates/footer', $data);
    }
}
