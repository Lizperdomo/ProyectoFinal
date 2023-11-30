<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        
        return view('home/home'); //muestra el inicio de sesiòn
    }

}

