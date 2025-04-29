<?php

namespace App\Http\Controllers;

use Core\Database;
use Core\Controller;
use Core\Session;

class ResetPasswordController extends Controller
{

    public function index() {}

    public function show() {}

    /**
     * Used for showing reset-password form page
     * (Page send from GMAIL)
     */
    public function create()
    {

        return $this->view("auth/reset-pass.view.php", [
            "title" => "Reset Password",
            "errors" => [],
            "token_selector" => $_GET['selector'],
            "token_reset" => $_GET['validator'],
        ]);
    }

    /**
     * Used for updating a record on `users` table password
     */
    public function update()
    {

        $db = new Database;
        $db->iniDB();

        // ctype_xdigit - checks whether the two token as hexadecimal
        if (
            $_SERVER['REQUEST_METHOD'] === 'POST' &&
            (ctype_xdigit($_GET['selector']) !== false &&
                ctype_xdigit($_GET['validator'])) !== false
        ) {

            $message = "";
            $data = [
                "selector" => $this->getInput("selector"),
                "validator" => $this->getInput("validator"),
                "new_password" => $this->getInput("new_password"),
                "new_password_confirmation" => $this->getInput("new_password_confirmation")
            ];
            $currentDate = date("U");
            
            $errors = $this->validate($data, [
                "new_password" => "required|min:8|max:255|confirmed"
            ]);

            // redirect if there's error
            if($errors) {
                return $this->view("auth/reset-pass.view.php", [
                    "title" => "Reset Password",
                    "token_selector" => $_GET['selector'],
                    "token_reset" => $_GET['validator'],
                ]);
            }

            $user_who_request = $db->query("SELECT * FROM password_reset_requests WHERE token_selector = :selector AND exp_date >= CAST(:current_date AS UNSIGNED)", [
                "selector" => $data["selector"],
                "current_date" => $currentDate,
            ])->find();

            // converting back (bcz above we use bin2hex)
            $tokenBin = hex2bin($data["validator"]);
            // we check if the token_validate on URL is the some as the one on the table
            $validatorTokenCheck = password_verify($tokenBin, $user_who_request['token_validate']);

            if (! $validatorTokenCheck) {
                $errors['request_error'] = ["You need to re-submit your reset request"];
                $flashData = [
                    'errors' => $errors,
                ];
                Session::set('__flash', 'data', $flashData);
            }

            if ($errors) {
                return $this->view("auth/reset-pass.view.php", [
                    "title" => "Reset Password",
                    "token_selector" => $_GET['selector'],
                    "token_reset" => $_GET['validator'],
                ]);
            }

            $user_to_update = $db->query("SELECT * FROM users WHERE email = :email", [
                "email" => $user_who_request['email'],
            ])->find();

            $db->query("UPDATE users SET password = :password WHERE email = :email", [
                "password" => password_hash($data["new_password"], PASSWORD_BCRYPT),
                "email" => $user_to_update['email'],
            ]);

            // Every after a successful update we delete the token on the database
            $db->query("DELETE FROM password_reset_requests WHERE email = :email", [
                ":email" => $user_to_update['email'],
            ]);

            return $this->redirect('index');
        }
    }

    public function store() {}

    public function delete() {}


}