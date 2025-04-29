<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PasswordResetRequest;
use Core\Database;
use Core\Controller;
use Core\Session;
use Core\Mailer;


class ForgotPasswordController extends Controller
{

    /**
     * Used for loading a view on forgot-pass page
     */
    public function index()
    {

        view('auth/forgot-pass.view.php', [
            'title' => 'Forgot Password',
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
                'title' => 'Forgot Password',
                'message' => $message,
            ]);
        }
    }


    public function create() {}
    public function update() {}
    public function show() {}
    public function delete() {}
}
