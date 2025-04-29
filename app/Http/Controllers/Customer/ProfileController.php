<?php

namespace App\Http\Controllers\Customer;

use Core\Database;
use Core\Controller;
use Core\Session;
use App\Models\User;
use App\Models\Transaction;

class ProfileController extends Controller
{

    /**
     * Load the view for the profiling page
     */
    public function index()
    {

        // current user transactions count
        $currentUserId = Session::get('__currentUser', 'credentials')['user_id'];

        $transactionObj = new Transaction;

        // we count the tranactions the user made
        $transactionCount = $transactionObj->countWhere('user_id',  [
            "user_id" => $currentUserId,
        ]);

        Session::set('__currentUserTransactions', 'transaction_count', $transactionCount);

        $db = new Database;
        $db->iniDB();

        $currentTransaction = $transactionObj->getCurrentTransactions($currentUserId, 'DESC', 1);
        $previousTransaction = $transactionObj->getPreviousTransactions($currentUserId, 'DESC', 1);

        return $this->view('customer/profile.view.php', [
            "title" => "Profile",
            "errors" => [],
            "currentTransaction" => $currentTransaction[0] ?? NULL,
            "previousTransaction" => $previousTransaction[0] ?? NULL,
        ]);
    }

    public function show() {}

    public function create() {}

    public function store() {}

    /**
     * Update a record on users table
     */
    public function update()
    {

        $db = new Database;
        $db->iniDB();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $current_date = date("Y-m-d H:i:s"); // for updated_at
            $image_dir = $_FILES['user-profile-img'];
            $data = [
                "user_id" => $this->getInput('user_id'),
                "first_name" => $this->getInput('first_name'),
                "last_name" => $this->getInput('last_name'),
                "email" => $this->getInput('email'),
                "username" => $this->getInput('username'),
                "contact_number" => $this->getInput('contact_number'),
                "age" => $this->getInput('age'),
                "date_of_birth" => $this->getInput('date_of_birth'),
                "gender" => $this->getInput('gender'),
                "house_number" => $this->getInput("house_number"),
                "street" => $this->getInput("street"),
                "barangay" => $this->getInput("barangay"),
                "city" => $this->getInput("city"),
                "provience" => $this->getInput("provience"),
                "region" => $this->getInput("region"),
                "postal_code" => $this->getInput("postal_code"),
            ];

            $errors = $this->validate($data, [
                "username" => "required|min:3|unique:users,username,{$data["user_id"]}",
                "email" => "required|unique:users,email,{$data["user_id"]}",
                "contact_number" => "required|unique:users,contact_number,{$data["user_id"]}"
            ]);

            if ($errors) {
                return $this->redirect('profile');
            }

            $user = new User;
            $user->update($data["user_id"], [
                "first_name" => $data["first_name"],
                "last_name" => $data["last_name"],
                "email" => $data["email"],
                "username" => $data["username"],
                "contact_number" => $data["contact_number"],
                "age" => $data["age"],
                "date_of_birth" => $data["date_of_birth"],
                "gender" => $data["gender"],
                "updated_at" => $current_date,
                "house_number" => $data["house_number"],
                "street" => $data["street"],
                "barangay" => $data["barangay"],
                "city" => $data["city"],
                "provience" => $data["provience"],
                "region" => $data["region"],
                "postal_code" => $data["postal_code"],
                "verified" => true
            ]);

            // We are only updating the 'profile_dir' column if the $image_dir is not empty
            if ($image_dir['full_path'] !== "") {
                $user->update($data["user_id"], [
                    "profile_dir" => "../../storage/backend/img/profiling/" . $image_dir['name'],
                ]);

                $user->uploadFile($image_dir);
            }

            // this needs to be repeated, so the sessions can update (not just on login)
            $authUser = $user->findUserOr(['email' => $data["email"]]);
            Session::set('__currentUser', 'credentials', $authUser);

            Session::set('__flash', 'profile_updated', 'updated successfully');
            return $this->redirect('profile');
        }
    }

    public function delete() {}
}
