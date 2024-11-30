<?php

class ErrorPage extends Controller
{
    public function index()
    {
        http_response_code(404);
        $this->view('error/404pengguna');
    }
}
