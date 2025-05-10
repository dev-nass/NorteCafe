<?php

namespace Core;

use Core\Database;
use App\Models\User;

class Authenticator
{

    /**
     * Used for trying to login
     * the user
     */
    public function attempt($emailOrUsername, $password)
    {

        $userObj = new User;
        $user = $userObj->findUserOr([
            "email" => $emailOrUsername,
            "username" => $emailOrUsername,
        ]);

        if ($user && $user['status'] === 1) {
            if (password_verify($password, $user['password'])) {

                $this->login($user);

                return $user;
            }
        }

        return false;
    }

    public function login($credentials)
    {
        $_SESSION['__currentUser']['credentials'] = $credentials;

        session_regenerate_id(true);
    }

    public function logout()
    {
        unset($_SESSION['__currentUser']);
        unset($_SESSION['__currentUserCarts']);
        unset($_SESSION['__currentUserTransactions']);
    }
}
