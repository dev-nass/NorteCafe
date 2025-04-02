<?php

namespace App\Http\Controllers;

use Core\Database;
use Core\Session;

class ProfileController
{

    /**
     * Load the view for the profiling page
     */
    public function index()
    {

        $current_user = Session::get('__currentUser', 'credentials');

        view('profiling/index.view.php', [
            "current_user" => $current_user,
            "error" => [],
        ]);
    }

    /**
     * Update a record on users table
     */
    public function update()
    {

        $db = new Database;
        $db->iniDB();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $current_user = Session::get('__currentUser', 'credentials');
            $error = [];

            $user_id = $_POST['user_id'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $contact_number = $_POST['contact_number'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];

            $chck_username = $db->query("SELECT username FROM users WHERE NOT user_id = :user_id", [
                "user_id" => $user_id,
            ])->find();

            if ($chck_username) {
                $error['username'] = "Username already exist";
            }

            $chck_email = $db->query("SELECT email FROM users WHERE NOT user_id = :user_id", [
                "user_id" => $user_id,
            ])->find();

            if ($chck_email) {
                $error['email'] = "Email already exist";
            }

            $chck_contact_num = $db->query("SELECT contact_number FROM users WHERE NOT user_id = :user_id", [
                "user_id" => $user_id,
            ])->find();

            if ($chck_contact_num) {
                $error['contact_number'] = "Contact number already exist";
            }

            if ($error) {
                view('profiling/index.view.php', [
                    "current_user" => $current_user,
                    "error" => $error,
                ]);
            }
        }
    }
}
