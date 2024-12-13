<?php

class Account extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['session_login'])) {
            header('Location: ' . base_url . '/admin/login');
            exit;
        }
    }

    public function index()
    {
        $data['logo'] = $this->model('LogoModel')->getAllLogoo();
        // Ambil data user dari sesi login
        $id = $_SESSION['id'];
        $data['title'] = 'Pengaturan Akun';
        $data['user'] = $this->model('UserModel')->getUserById($id);

        // Tampilkan halaman pengaturan
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/navbar', $data);
        $this->view('account/settings', $data);
        $this->view('templates/footer', $data);
    }

    public function updateAccount()
    {
        // Periksa apakah username sudah digunakan oleh pengguna lain
        $existingUser = $this->model('UserModel')->checkUniqueUsername($_POST['username'], $_POST['id']);
        if ($existingUser) {
            Flasher::setMessage('Username sudah digunakan oleh pengguna lain!', 'warning');
            header('location:' . base_url . '/admin/account' . $_POST['id']);
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
                header('location:' . base_url . '/admin/account' . $_POST['id']);
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
            Flasher::setMessage('Data telah berhasil diperbarui. Silakan logout terlebih dahulu untuk memperbarui nama pengguna.', 'success');
            header('location:' . base_url . '/admin/account');
            exit;
        } else {
            Flasher::setMessage('Tidak ada perubahan data.', 'danger');
            header('location:' . base_url . '/admin/account');
            exit;
        }
    }
}
