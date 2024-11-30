<?php

class Middleware
{
    public static function isLoggedIn()
    {
        if (!isset($_SESSION['session_login']) || $_SESSION['session_login'] !== 'sudah login') {
            header('location:' . base_url . '/admin/login');
            exit;
        }
    }

    public static function isGuest()
    {
        if (isset($_SESSION['session_login']) && $_SESSION['session_login'] === 'sudah login') {
            header('location:' . base_url . '/admin/dashboard');
            exit;
        }
    }
}
