<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;

class UserController
{

    /**
     * General Web Pages
     */
    public function index()
    {
        view('Customer/index.view.php');
    }

    public function contactUs()
    {
        dd($_SESSION);
        view('Customer/contactUs.view.php');
    }

    public function aboutUsNorteCafe()
    {
        view('Customer/aboutUsNorteCafe.view.php');
    }

    public function aboutUsDevelopers()
    {
        view('Customer/aboutUsDevelopers.view.php');
    }

    public function faqs()
    {
        view('Customer/faqs.view.php');
    }

    public function deliveryDetails()
    {
        view('Customer/delivery-details.view.php');
    }
}
