<?php

namespace App\Http\Controllers;

class UserController {

    /**
     * General Web Pages
    */
    public function index() {

        view('user/index.view.php');
    }

    public function contactUs() {

        view('user/contactUs.view.php');
    }

    public function aboutUsNorteCafe() {

        view('user/aboutUsNorteCafe.view.php');
    }

    public function aboutUsDevelopers() {

        view('user/aboutUsDevelopers.view.php');
    }

    public function faqs() {

        view('user/faqs.view.php');
    }

    public function deliveryDetails() {

        view('user/delivery-details.view.php');
    }
}