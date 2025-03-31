<?php

namespace App\Http\Controllers;

use App\Models\User;
use Core\Database;
use Core\PHPMailer\src\PHPMailer;
use Core\PHPMailer\src\Exception;


class ForgotPasswordController
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
            $token_selector = bin2hex(random_bytes(8)); // used for changing the email later on
            $token_validate = random_bytes(32); // will be use for cross matching (similar to password)
            $exp_date = date("U") + 1800; // approx 30mins

            $url = "http://localhost/PHP%202025/Norte%20Cafe/public/index.php/reset-pass?selector=" . $token_selector . "&validator=" . bin2hex($token_validate);

            // Each user can only have password reset request once, so we delete extras (1:1)
            $db->query("DELETE FROM password_reset_requests WHERE email = :email", [
                ":email" => $email,
            ]);

            $user = new User;
            $exist = $user->findUser(['email' => $email]);

            if ($exist) {
                // We insert a new user that sends a request for password reset
                $newRequest = $db->query("INSERT INTO password_reset_requests (email, token_selector, token_validate, exp_date) VALUES (:email, :token_selector, :token_validate, :exp_date)", [
                    "email" => $email,
                    "token_selector" => $token_selector,
                    "token_validate" => password_hash($token_validate, PASSWORD_BCRYPT),
                    "exp_date" => $exp_date,
                ]);

                if (! $newRequest) {
                    dd("Failed to send request");
                }

                $this->email($email, $url);
            }


            $message = "If an account associated with this email address is in our records, a password reset link will be sent to your email. Please check your inbox.";



            view("auth/forgot-pass.view.php", [
                'message' => $message,
            ]);
        }
    }

    /**
     * Contains the email body
     */
    public function email($recipient, $url)
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'nortecafe7@gmail.com';                     //SMTP username
            $mail->Password   = 'dycrjlmzcquriwot';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('nortecafe7@gmail.com', 'Mailer');
            $mail->addAddress($recipient);               //Name is optional

            //Attachments

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Reset password request';
            $mail->Body    = '<p>We received a password reset request. The link to reset your password is below, if you did not make this request, you can ignore this email</p>';
            $mail->Body    .= "<a class='btn btn-primary' href='{$url}'>Reset Password</a>";

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    /**
     * Used for showing reset-password page
     */
    public function show()
    {

        view("auth/reset-pass.view.php", [
            "message" => "",
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
            $selector = $_GET['selector'];
            $validator = $_GET['validator'];
            $new_password = $_POST['new_password'];
            $password_confirmed = $_POST['password_confirmed'];
            $currentDate = date("U");

            if ($new_password !== $password_confirmed) {
                $message = "Passwords doesn't  match";
            }

            if ($message !== "") {
                view("auth/reset-pass.view.php", [
                    "message" => $message,
                    "token_selector" => $_GET['selector'],
                    "token_reset" => $_GET['validator'],
                ]);
            }

            $user_who_request = $db->query("SELECT * FROM password_reset_requests WHERE token_selector = :selector AND exp_date >= CAST(:current_date AS UNSIGNED)", [
                "selector" => $selector,
                "current_date" => $currentDate,
            ])->find();


            $tokenBin = hex2bin($validator);
            $validatorTokenCheck = password_verify($tokenBin, $user_who_request['token_reset']);

            if ($validatorTokenCheck !== false) {
                $message = "You need to re-submit your reset request";
            }

            if ($message !== "") {
                view("auth/reset-pass.view.php", [
                    "message" => $message,
                    "token_selector" => $_GET['selector'],
                    "token_reset" => $_GET['validator'],
                ]);
            }

            $user_to_update = $db->query("SELECT * FROM users WHERE email = :email", [
                "email" => $user_who_request['email'],
            ])->find();

            $db->query("UPDATE users SET password = :password WHERE email = :email", [
                "password" => password_hash($new_password, PASSWORD_BCRYPT),
                "email" => $user_to_update['email'],
            ]);

            // Every after a successful update we delete the token on the database
            $db->query("DELETE FROM password_reset_requests WHERE email = :email", [
                ":email" => $user_to_update['email'],
            ]);

            redirect('index');
        }
    }
}
