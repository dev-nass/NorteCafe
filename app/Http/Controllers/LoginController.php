<?php

namespace App\Http\Controllers;

use Core\Authenticator;
use Core\Session;
use App\Models\User;

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

                $userModel = new User;
                $userModel->setUser($email);
                $authUser = $userModel->getUser();
                Session::set('__currentUser', 'credentials', $authUser);

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