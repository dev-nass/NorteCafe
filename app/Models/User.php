<?php

namespace App\Models;

use Core\Database;

class User {
    
    protected $userAttribute = [];
    protected $currentUser = [];

    public function setUser($emailOrUsername) {
        $this->userAttribute = [
            'emailOrUsername' => $emailOrUsername
        ];
    }

    public function getUser() {
        $db = new Database;
        $db->iniDB();

        $this->currentUser = $db->query("SELECT * FROM users WHERE email = :email OR username = :username", [
            'email' => $this->userAttribute['emailOrUsername'],
            'username' => $this->userAttribute['emailOrUsername'],
        ])->find();

        return $this->currentUser;
    }
}