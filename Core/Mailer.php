<?php

namespace Core;

use Core\PHPMailer\src\PHPMailer;
use Core\PHPMailer\src\Exception;

class Mailer
{

    protected $host = "smtp.gmail.com";
    protected $username = 'nortecafe7@gmail.com';
    protected $password = 'dycrjlmzcquriwot';

    public $mail;

    protected function mailerSettings()
    {
        $this->mail = new PHPMailer(true);

        try {
            $this->mail->isSMTP();                                            //Send using SMTP
            $this->mail->Host       = $this->host;                     //Set the SMTP server to send through
            $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $this->mail->Username   = $this->username;                     //SMTP username
            $this->mail->Password   = $this->password;                               //SMTP password
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $this->mail->Port       = 465;
            // $this->mail->SMTPDebug = 2; // Set to 2 for detailed output
            // $this->mail->Debugoutput = 'html';                               //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }

    /**
     * Used for sending email to forgot password request
     * $recipient -  where the email will be sent
     * $url - will contain the link for the href and used for containing the
     *  token_validate and token_selector
     */
    public function forgotPassword($recipient, $url)
    {

        $this->mailerSettings();

        $this->mail->setFrom($this->username, 'Norte Cafe');
        $this->mail->addAddress($recipient);

        $this->mail->isHTML(true);                                  //Set email format to HTML
        $this->mail->Subject = 'Reset password request';
        $this->mail->Body    = '<p>We received a password reset request. The link to reset your password is below, if you did not make this request, you can ignore this email</p>';
        $this->mail->Body    .= "<a class='btn btn-primary' href='{$url}'>Reset Password</a>";

        return $this->mail->send() ?? false;
    }

    /**
     * Used for sending email to the norte_cafe if the customers
     * have conerns
     * &
     * For transaction cancellation
     */
    public function contactUs($sender_name, $sender_email, $subject, $message)
    {
        $this->mailerSettings();

        // Use SMTP-authenticated email for "From" address
        $this->mail->setFrom($this->username, $sender_name);  // Use SMTP-authenticated email
        $this->mail->addReplyTo($sender_email, $sender_name); // Set the sender's email as the reply-to address

        // Add recipient (your company's email)
        $this->mail->addAddress($this->username);

        $this->mail->isHTML(true);
        $this->mail->Subject = "{$subject}";
        $this->mail->Body    = "{$message}";

        return $this->mail->send() ?? false;
    }


    /**
     * Will contain the HTML and the <a> that
     * sends an email and redirect to Staff Registration
     */
    public function emailStaff($recipient, $role)
    {

        $mod_role = ucfirst($role); // caps the firt letter

        $this->mailerSettings();

        $this->mail->setFrom($this->username, 'Norte Cafe');
        $this->mail->addAddress($recipient);

        $this->mail->isHTML(true);                                  //Set email format to HTML
        $this->mail->Subject = "{$mod_role} Registration";
        $this->mail->Body    = '<p>Your application has been accepted. Please click the link below to register your account to our system</p>';
        $this->mail->Body    .= "<a class='btn btn-primary' href='http://localhost/PHP%202025/Norte%20Cafe/public/index.php/staff-create-{$role}'>{$mod_role} Registration</a>";

        return $this->mail->send() ?? false;
    }
}
