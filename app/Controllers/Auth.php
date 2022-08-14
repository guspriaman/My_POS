<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        echo view("registrasi");
     
    }

    public function login()
    {
        echo view("login");
    }
}
