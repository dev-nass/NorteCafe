<?php

namespace App\Http\Controllers;

use Core\Authenticator;
use Core\Session;

class LoginController {

    public function create() {

        view('auth/login.view.php', [
            'errors' => [],
        ]);
    }

    public function store() {

        $auth = new Authenticator;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            // the login process is happening inside attempt() function
            if($auth->attempt($email, $password)) {

                redirect('index');
            }

            $errors['email'] = "Account does not exist";

            if($errors) {
                view('auth/login.view.php', [
                    'errors' => $errors,
                ]);
            }
        }
    }
}