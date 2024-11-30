<?php

class Login extends Controller
{
    public function index()
    {
        // Periksa apakah pengguna sudah login
        if (isset($_SESSION['session_login']) && $_SESSION['session_login'] === 'sudah login') {
            // Redirect ke halaman dashboard sesuai role
            if ($_SESSION['role'] === 'Super Admin') {
                header('location:' . base_url . '/admin/dashboard');
                exit;
            } else if ($_SESSION['role'] === 'Admin') {
                header('location:' . base_url . '/admin/alumni');
                exit;
            }
        }

        $data['title'] = 'Halaman Login';
        $this->view('login/login', $data);
    }

    public function prosesLogin()
    {
        $row = $this->model('LoginModel')->checkLogin($_POST);

        if ($row) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['photo'] = $row['photo'];
            $_SESSION['session_login'] = 'sudah login';

            // Redirect ke dashboard berdasarkan role
            if ($row['role'] === 'Super Admin') {
                Flasher::setMessage('Halo! Selamat Anda Login Sebagai Super Admin', 'success');
                header('location:' . base_url . '/admin/dashboard');
                exit;
            } else if ($row['role'] === 'Admin') {
                Flasher::setMessage('Halo! Selamat Anda Login Sebagai Admin', 'success');
                header('location:' . base_url . '/admin/alumni');
                exit;
            }
        } else {
            // Jika login gagal
            Flasher::setMessage('Username/Password salah', 'danger');
            header('location:' . base_url . '/admin/login');
            exit;
        }
    }
}
