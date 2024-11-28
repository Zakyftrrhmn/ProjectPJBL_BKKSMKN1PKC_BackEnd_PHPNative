<?php

class Login extends Controller
{
    public function index()
    {
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
                header('location:' . base_url . '/dashboard');
                exit;
            } else if ($row['role'] === 'Admin') {
                Flasher::setMessage('Halo! Selamat Anda Login Sebagai Admin', 'success');
                header('location:' . base_url . '/alumni');
                exit;
            }
            exit;
        } else {
            // Jika login gagal
            Flasher::setMessage('Username/Password salah', 'danger');
            header('location:' . base_url . '/login');
            exit;
        }
    }
}
