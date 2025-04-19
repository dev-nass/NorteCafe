<?php

namespace App\Http\Controllers;

use Core\Authenticator;
use Core\Controller;
use Core\Session;
use App\Models\User;

class ChangePasswordController extends Controller
{

    

    /**
     * Loads the view for the 
     * change password form
    */
    public function create() 
    {
        return $this->view('auth/change-pass.view.php', [
            "title" => "Change Password",
            "errors" => [],
        ]);
    }

    /**
     * Handle the form submit of the
     * change password form
    */
    public function store() 
    {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                "email" => $this->getInput("email"),
                "old_password" => $this->getInput("old-password"),
                "new_password" => $this->getInput("new-password"),
                "new_password_confirmation" => $this->getInput("new-pasword-confirmation")
            ];

            $errors = $this->validate($data, [
                "old_password" => "required|min:8|max:255",
                "new_password" => "required|min:8|max:255|confirmed",
            ]);

            $userObj = new User;

            // verify if the user exist using email and 
            $chck_user_exists = $userObj->firstWhere([
                "email" => $data["email"]
            ]);

            if(! $chck_user_exists) {
                $errors['old_password'][] =  "No account found";
            }

            if($errors) {
                return $this->view('auth/change-pass.view.php', [
                    "errors" => $errors
                ]);
            }

            // ... password matching
            if(! password_verify($data['old_password'], $chck_user_exists['password'])) {
                $errors['old_password'][] =  "Invalid Password";
            }

            if($errors) {
                return $this->view('auth/change-pass.view.php', [
                    "errors" => $errors
                ]);
            }
            
            // we can update the password
            $user_pass_updated = $userObj->query('UPDATE users SET password = :password WHERE email = :email', [
                "email" => $data["email"],
                "password" => password_hash($data["new_password"], PASSWORD_BCRYPT),
            ]);
            
            // redirect
            if($user_pass_updated) {
                Session::set('__flash', 'change_password_notif', 'Password Changed Successfully');
                $auth = new Authenticator;
                $auth->logout();

                return $this->redirect('login');
            }
        }
    }



    public function index() {}
    public function show() {}
    public function update() {}
    public function delete() {}
}