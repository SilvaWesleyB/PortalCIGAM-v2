<?php

namespace App\Controllers;

class Inicial extends BaseController
{
    public function index()
    {
        return view('inicio/home');
    }
}