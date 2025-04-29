<?php

namespace App\Http\Controllers\Admin;

use Core\Controller;
use Core\Database;
use Core\Session;
use App\Models\User;


class Admin_StaffController extends Controller
{

    public function index() {}

    public function show() {}

    public function create() {}

    public function createEmployee()
    {

        return $this->view('auth/employee-registration.view.php', [
            'title' => 'Registration',
        ]);
    }

    public function createRider()
    {

        return $this->view('auth/rider-registration.view.php', [
            'title' => 'Registration',
        ]);
    }

    public function store()
    {


        $db = new Database;
        $db->iniDB();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

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
                "role" => $this->getInput("role"),
                "password" => $this->getInput("password"),
                "password_confirmation" => $this->getInput("password_confirmation"),
            ];

            $errors = $this->validate($data, [
                "username" => "required|min:3|unique:users,username,{$data["user_id"]}",
                "email" => "required|unique:users,email,{$data["user_id"]}",
                "contact_number" => "required|unique:users,contact_number,{$data["user_id"]}",
                "password" => "required|min:8|confirmed",
            ]);

            if ($errors) {
                $mod_role = strtolower($data['role']);
                return $this->redirect("staff-create-rider");
            }

            $user = new User;
            $newUser = $user->insert([
                "first_name" => $data["first_name"],
                "last_name" => $data["last_name"],
                "email" => $data["email"],
                "username" => $data["username"],
                "contact_number" => $data["contact_number"],
                "age" => $data["age"],
                "date_of_birth" => $data["date_of_birth"],
                "gender" => $data["gender"],
                "house_number" => $data["house_number"],
                "street" => $data["street"],
                "barangay" => $data["barangay"],
                "city" => $data["city"],
                "provience" => $data["provience"],
                "region" => $data["region"],
                "postal_code" => $data["postal_code"],
                "verified" => true,
                "role" => $data["role"],
                "password" => password_hash($data['password'], PASSWORD_BCRYPT),
            ]);

            // We are only updating the 'profile_dir' column if the $image_dir is not empty
            if ($image_dir['full_path'] !== "") {
                $user->update($newUser['user_id'], [
                    "profile_dir" => "../../storage/backend/img/profiling/" . $image_dir['name'],
                ]);

                $user->uploadFile($image_dir);
            }

            Session::set('__flash', 'staff_registered', 'registered successfully');
            return $this->redirect('login');
        }
    }

    public function update() {}

    public function delete() {}
}
