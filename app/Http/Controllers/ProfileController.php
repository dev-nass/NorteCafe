<?php

namespace App\Http\Controllers;

use Core\Database;

class ProfileController 
{

    public function index() 
    {

        view('profiling/index.view.php');
    }
}