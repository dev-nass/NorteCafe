<?php

namespace App\Http\Controllers;

use Core\Controller;
use Core\Authenticator;
use Core\Session;
use App\Models\User;
use App\Models\Cart;

class LoginController extends Controller
{

    public function index() {}

    public function show() {}

    /**
     * Loads the view for the
     * Login View
     */
    public function create()
    {

        return $this->view('auth/login.view.php', [
            'errors' => [],
        ]);
    }

    /**
     * Handle the submit of the
     * Login Form 
     */
    public function store()
    {

        $auth = new Authenticator;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                "emailOrUsername" => $this->getInput("email") ?? $this->getInput("username"),
                "password" => $this->getInput("password")
            ];

            // the login process is happening inside attempt() function
            if ($auth->attempt($data['emailOrUsername'], $data['password'])) {

                $userModel = new User;
                $authUser = $userModel->findUserOr([
                    'email' => $data['emailOrUsername'], 
                    'username' => $data['emailOrUsername']
                ]);
                Session::set('__currentUser', 'credentials', $authUser);

                // current user cart count (need here for navbar)
                $cartObj = new Cart;
                $cartObj->updateCartCount('user_id');

                $userModel->loadRoleView();
            }

            $errors['email'] = "Account does not exist";

            if ($errors) {
                return $this->view('auth/login.view.php', [
                    'errors' => $errors,
                ]);
            }
        }
    }

    /**
     * Handle the submit of 
     * Logout Form
    */
    public function logout()
    {
        $auth = new Authenticator;
        $auth->logout();

        return $this->redirect('index');
    }

    public function update() {}

    public function delete() {}
}
