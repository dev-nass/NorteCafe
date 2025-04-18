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
            $this->mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }

    /**
     * Used for sending email to forgot password request
     * $recipient -  where the email will be sent
     * $url - will contain the link for the href and used for containing the
     *  token_valite and token_selector
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
    */
    public function contatUs($sender_name, $sender_email, $subject, $message)
    {

        $this->mailerSettings();

        $this->mail->setFrom($sender_email, $sender_name);
        $this->mail->addAddress($this->username);

        $this->mail->isHTML(true);
        $this->mail->Subject = "{$subject}";
        $this->mail->Body = "{$message}";

        return $this->mail->send() ?? false;
    }
}
