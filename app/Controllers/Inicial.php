<?php

namespace App\Controllers;

use App\Models\Task_Model;

class Inicial extends BaseController
{
    public function __construct()
    {
        
    }

    public function index()
    {
            
       return view('inicio/home');
    }
}