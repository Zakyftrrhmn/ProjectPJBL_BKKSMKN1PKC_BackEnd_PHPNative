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
            $_SESSION['username'] = $row['username'];
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['session_login'] = 'sudah login';

            // Redirect ke dashboard berdasarkan role
            if ($row['role'] === 'Super Admin') {
                header('location:' . base_url . '/dashboard');
            } else if ($row['role'] === 'Admin') {
                header('location:' . base_url . '/alumni');
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
