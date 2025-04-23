<?php

namespace App\Http\Controllers\Admin;

use Core\Controller;

class Admin_AdminController extends Controller
{

    /**
     * Loads the view for admin dashboard
    */
    public function index()
    {

        return $this->view('Admin/index.view.php');
    }

    public function show() {}
    public function create() {}
    public function store() {}
    public function update() {}
    public function delete() {}
}