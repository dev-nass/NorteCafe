<?php

namespace App\Http\Controllers\Customer;

use App\Models\Customer;
use App\Models\User;
use Core\Controller;

class UserController extends Controller
{

    public function show() {}
    public function create() {}
    public function store() {}
    public function update() {}
    public function delete() {}

    /**
     * General Web Pages
     */
    public function index()
    {
        return $this->view('Customer/index.view.php');
    }

    public function contactUs()
    {
        return $this->view('Customer/contactUs.view.php');
    }

    public function aboutUsNorteCafe()
    {
        return $this->view('Customer/aboutUsNorteCafe.view.php');
    }

    public function aboutUsDevelopers()
    {
        return $this->view('Customer/aboutUsDevelopers.view.php');
    }

    public function faqs()
    {
        return $this->view('Customer/faqs.view.php');
    }

    public function deliveryDetails()
    {
        return $this->view('Customer/delivery-details.view.php');
    }
}
