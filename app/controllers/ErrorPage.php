<?php

class ErrorPage extends Controller
{
    public function index()
    {
        $data['logo'] = $this->model('LogoModel')->getAllLogoo();
        http_response_code(404);
        $this->view('error/404pengguna');
    }
}
