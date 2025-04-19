<?php

namespace App\Http\Controllers;

use Core\Database;
use Core\Controller;
use Core\Validator;

class RegistrationController extends Controller
{

    public function index() {}

    public function show() {}

    /**
     * Loads the view for the
     * Registration View
    */
    public function create()
    {

        $this->view('auth/registration.view.php', [
            'title' => 'Registration',
            'errors' => [],
        ]);
    }

    /**
     * Handle the submit of the
     * Registration Form
    */
    public function store()
    {

        $db = new Database;
        $db->iniDB();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                "username" => $this->getInput('username'),
                "email" => $this->getInput("email"),
                "password" => $this->getInput("password"),
                "password_confirmation" => $this->getInput("password_confirmation")
            ];

            // validate
            $errors = $this->validate($data, [
                "username" => "required|min:5|max:255|unique:users,username,0",
                "email" => "required|email|unique:users,email,0",
                "password" => "required|min:8|confirmed",
            ]);

            // redirect if there's errors
            if ($errors) {
                return $this->view('auth/registration.view.php', [
                    'errors' => $errors,
                ]);
            }

            // Store
            $db->query("INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)", [
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => password_hash($data['password'], PASSWORD_BCRYPT),
                'role' => "Customer",
            ]);

            return $this->redirect('login');
        }
    }

    public function update() {}

    public function delete() {}
}
