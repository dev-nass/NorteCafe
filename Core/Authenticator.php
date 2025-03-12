<?php

namespace Core;

use Core\Database;

class Authenticator
{

    /**
     * Used for trying to login
     * the user
     */
    public function attempt($emailOrUsername, $password)
    {

        $db = new Database;
        $db->iniDB();

        $user = $db->query("SELECT * FROM users WHERE email = :email OR username = :username", [
            'email' => $emailOrUsername,
            'username' => $emailOrUsername,
        ])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {

                $this->login($emailOrUsername);

                return true;
            }
        }



        return false;
    }

    public function login($email)
    {
        $_SESSION['user'] = [
            'email' => $email,
        ];

        session_regenerate_id(true);
    }

    public function logout()
    {
        session_destroy();
    }
}
