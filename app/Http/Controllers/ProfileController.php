<?php

namespace App\Http\Controllers;

use Core\Database;
use Core\Session;
use App\Models\User;
use App\Models\Transaction;

class ProfileController
{

    /**
     * Load the view for the profiling page
     */
    public function index()
    {

        // We are using $_SESSION for profiling details
        // Session::get('__currentUser', 'credentials');

        // current user transactions count
        $currentUserId = Session::get('__currentUser', 'credentials')['user_id'];
        $transactionObj = new Transaction;
        $transactionCount = $transactionObj->countWhere('user_id',  [
            "user_id" => $currentUserId,
        ]);
        Session::set('__currentUserTransactions', 'transaction_count', $transactionCount);

        $db = new Database;
        $db->iniDB();
        $recentTransaction = $db->query("SELECT * FROM transactions WHERE user_id = :user_id AND (status = :pending_status OR status = :approved_status) ORDER BY transaction_id DESC LIMIT 1", [
            "user_id" => $currentUserId,
            "pending_status" => "Pending",
            "approved_status" => "Approved",
        ])->find();

        $previousTransaction = $db->query("SELECT * FROM transactions WHERE user_id = :user_id AND (status = :rejected_status OR status = :cancelled_status OR status = :delivered_status)  ORDER BY transaction_id DESC LIMIT 1", [
            "user_id" => $currentUserId,
            "rejected_status" => "Rejected",
            "cancelled_status" => "Cancelled",
            "delivered_status" => "Delivered",
        ])->find();

        view('profiling/index.view.php', [
            "error" => [],
            "recentTransaction" => $recentTransaction,
            "previousTransaction" => $previousTransaction,
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
            $error = [];
            $current_date = date("Y-m-d H:i:s");

            $image_dir = $_FILES['user-profile-img'];
            $user_id = $_POST['user_id'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $contact_number = $_POST['contact_number'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $house_number = $_POST["house_number"];
            $street = $_POST["street"];
            $barangay = $_POST["barangay"];
            $city = $_POST["city"];
            $provience = $_POST["provience"];
            $region = $_POST["region"];
            $postal_code = $_POST["postal_code"];

            $chck_username = $db->query("SELECT username FROM users WHERE username = :username AND NOT user_id = :user_id", [
                "username" => $username,
                "user_id" => $user_id,
            ])->find();

            if ($chck_username) {
                $error['username'] = "Username already exist";
            }

            $chck_email = $db->query("SELECT email FROM users WHERE email = :email AND NOT user_id = :user_id", [
                "email" => $email,
                "user_id" => $user_id,
            ])->find();


            if ($chck_email) {
                $error['email'] = "Email already exist";
            }

            $chck_contact_num = $db->query("SELECT contact_number FROM users WHERE contact_number = :contact_number AND NOT user_id = :user_id", [
                "contact_number" => $contact_number,
                "user_id" => $user_id,
            ])->find();

            if ($chck_contact_num) {
                $error['contact_number'] = "Contact number already exist";
            }

            if ($error) {
                view('profiling/index.view.php', [
                    "error" => $error,
                ]);
            }

            $user = new User;

            $user->update($user_id, [
                "first_name" => $first_name,
                "last_name" => $last_name,
                "email" => $email,
                "username" => $username,
                "contact_number" => $contact_number,
                "age" => $age,
                "gender" => $gender,
                "updated_at" => $current_date,
                "house_number" => $house_number,
                "street" => $street,
                "barangay" => $barangay,
                "city" => $city,
                "provience" => $provience,
                "region" => $region,
                "postal_code" => $postal_code,
                "verified" => true
            ]);

            if ($image_dir['full_path'] !== "") {
                $user->update($user_id, [
                    "profile_dir" => "../../storage/backend/img/profiling/" . $image_dir['name'],
                ]);

                $user->uploadFile($image_dir);
            }

            // this needs to be repeated, so the sessions can update (not just on login)
            $authUser = $user->findUser(['email' => $email]);
            Session::set('__currentUser', 'credentials', $authUser);


            view('profiling/index.view.php', [
                "error" => [],
            ]);
        }
    }
}
