<?php

namespace App\Http\Controllers;

class ForgotPasswordController 
{
    
    /**
     * Used for loading a view on forgot-pass page
    */
    public function index() {

        view('auth/forgot-pass.view.php');
    }

    /**
     * Storing new record within `password_rest_request` table
    */
    public function store()
    {

    }
}
