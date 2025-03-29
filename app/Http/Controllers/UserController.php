<?php

namespace App\Http\Controllers;

use App\Models\Userv2;

class UserController {

    /**
     * General Web Pages
    */
    public function index() {

        $user = new Userv2;
        dd($user->insert([
            'username' => 'Poke',
            'email' => 'poke@gmail.com',
            'password' => 'rawr123',
            'role' => 'Customer',
        ]));
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