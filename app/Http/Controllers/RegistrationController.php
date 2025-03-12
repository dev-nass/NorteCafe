<?php

namespace App\Http\Controllers;

use Core\Database;
use Core\Validator;

class RegistrationController {

    public function create() {

        view('auth/registration.view.php', [
            'errors' => [],
        ]);
    }

    public function store() {
        
        $db = new Database;
        $db->iniDB();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_confirm = $_POST['confirm-password'];

            $errors = [];

            // validate
            if(! Validator::string($username, 5, 255)) {
                $errors['username'] = "Username is either too long or short";
            }

            $user = $db->query("SELECT * FROM users WHERE email = :email", [
                'email' => $email,
            ])->find();

            if($user) {
                $errors['email'] = "Email already exists";
            }

            if($password !== $password_confirm) {
                $errors['password'] = "Passwords doesnt Match";
            }

            if($errors) {
                return view('auth/registration.view.php', [
                    'errors' => $errors,
                ]);
            }

            // Store
            $db->query("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)", [
                'username' => $username,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_BCRYPT),
            ]);

            redirect('index');
        }

    }
}