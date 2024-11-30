<?php

class App
{
    protected $controller = 'Landing'; // Default ke landing page
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // Path dasar controller
        $controllerPath = '../app/controllers/';
        $errorController = 'ErrorPage'; // Controller untuk halaman error

        // Periksa apakah ada subfolder (misal: admin)
        if (isset($url[0]) && is_dir($controllerPath . $url[0])) {
            $controllerPath .= $url[0] . '/';
            array_shift($url); // Hapus subfolder dari URL
        }

        // Periksa apakah controller ada
        if (isset($url[0]) && file_exists($controllerPath . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        } else if (!empty($url)) {
            // Jika controller tidak ditemukan, gunakan controller error
            $this->controller = $errorController;
        }

        require_once $controllerPath . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Periksa apakah method ada
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // Ambil parameter
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
