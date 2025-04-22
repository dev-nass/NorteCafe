<?php

namespace App\Http\Controllers;

use Core\Controller;
use Core\Authenticator;
use Core\Session;
use App\Models\User;
use App\Models\Cart;

class LoginController extends Controller
{

    protected $title = 'Login';

    public function index() {}

    public function show() {}

    /**
     * Loads the view for the
     * Login View
     */
    public function create()
    {

        return $this->view('auth/login.view.php', [
            'title' => $this->title,
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
            $authUser = $auth->attempt($data['emailOrUsername'], $data['password']);

            if ($authUser) {

                // current user cart count (need here for navbar)
                $cartObj = new Cart;
                $cartObj->updateCartCount('user_id');
                
                $userModel = new User;
                $userModel->loadRoleView();
            }

            $errors['email'] = "Account does not exist";
            Session::set('__flash', 'credentials', $data);

            if ($errors) {
                return $this->view('auth/login.view.php', [
                    'title' => $this->title,
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
