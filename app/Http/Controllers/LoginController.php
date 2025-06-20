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
            'title' => 'Login | Norte Cafe',
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
                if ($_SESSION['__currentUser']['credentials']['role'] === 'Rider') {
                    $userModel->update($_SESSION['__currentUser']['credentials']['user_id'], [
                        'available' => true,
                    ]);
                }
                
                $userModel->loadRoleView();
            }

            // Added here because can't be added on controller
            // bcz the validation is happening above
            $errors['emailOrUsername'] = ['Account does not exist'];
            $flashData = [
                'old' => $data,
                'errors' => $errors,
            ];
            Session::set('__flash', 'data', $flashData);

            return $this->redirect('login');
        }
    }

    /**
     * Handle the submit of 
     * Logout Form
     */
    public function logout()
    {

        $userModel = new User;
        if ($_SESSION['__currentUser']['credentials']['role'] === 'Rider') {
            $userModel->update($_SESSION['__currentUser']['credentials']['user_id'], [
                'available' => 0,
            ]);
        }

        $auth = new Authenticator;
        $auth->logout();

        return $this->redirect('index');
    }

    public function update() {}

    public function delete() {}
}
