<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PasswordResetRequest;
use Core\Database;
use Core\Controller;
use Core\Mailer;


class ForgotPasswordController extends Controller
{

    /**
     * Used for loading a view on forgot-pass page
     */
    public function index()
    {

        view('auth/forgot-pass.view.php', [
            "message" => "",
        ]);
    }

    /**
     * Storing new record within `password_rest_request` table
     */
    public function store()
    {

        $db = new Database;
        $db->iniDB();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $message = ""; // used for informing the user abt the request status
            $email = $_POST['email-address'];
            $token_selector = bin2hex(random_bytes(8)); // used for fetching the record who requested
            $token_validate = random_bytes(32); // will be use for cross matching (ensure its the same user)
            $exp_date = date("U") + 1800; // approx 30mins

            $url = "http://localhost/PHP%202025/Norte%20Cafe/public/index.php/reset-pass?selector=" . $token_selector . "&validator=" . bin2hex($token_validate);

            // Each user can only have password reset request once, so we delete extras (1:1)
            $db->query("DELETE FROM password_reset_requests WHERE email = :email", [
                ":email" => $email,
            ]);

            $user = new User;
            $exist = $user->firstWhere(['email' => $email]);

            if ($exist) {
                // We insert a new user that sends a request for password reset
                $pwResetObj = new PasswordResetRequest;
                $newRequest = $pwResetObj->insert([
                    "email" => $email,
                    "token_selector" => $token_selector,
                    "token_validate" => password_hash($token_validate, PASSWORD_BCRYPT),
                    "exp_date" => $exp_date
                ]);
                
                if (! $newRequest) {
                    dd("Failed to send request");
                }

                $mailerObj = new Mailer;
                $mailerObj->forgotPassword($email, $url);
            }

            $message = "If an account associated with this email address is in our records, a password reset link will be sent to your email. Please check your inbox.";

            view("auth/forgot-pass.view.php", [
                'message' => $message,
            ]);
        }
    }


    /**
     * Used for showing reset-password form page
     */
    public function create()
    {

        view("auth/reset-pass.view.php", [
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

            $user_who_request = $db->query("SELECT * FROM password_reset_requests WHERE token_selector = :selector AND exp_date >= CAST(:current_date AS UNSIGNED)", [
                "selector" => $data["selector"],
                "current_date" => $currentDate,
            ])->find();

            // converting back (bcz above we use bin2hex)
            $tokenBin = hex2bin($data["validator"]);
            // we check if the token_validate on URL is the some as the one on the table
            $validatorTokenCheck = password_verify($tokenBin, $user_who_request['token_validate']);

            if (! $validatorTokenCheck) {
                $errors['request_error'][] = "You need to re-submit your reset request";
            }

            if ($errors) {
                return $this->view("auth/reset-pass.view.php", [
                    "errors" => $errors,
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

    public function show() {}
    public function delete() {}
}
