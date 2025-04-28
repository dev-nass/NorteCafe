<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Customer\UserController;
use Core\Controller;
use Core\Session;
use App\Models\User;

class Admin_ProfileController extends Controller
{

    /**
     * Used for loading the view 
     * of the Admin/Employee Profile
    */
    public function index() 
    {

        $currentUser_id = Session::get('__currentUser', 'credentials')['user_id'];

        $userObj = new User;
        $currentUser = $userObj->findUserOr([
            "user_id" => $currentUser_id
        ]);

        return $this->view('Admin/profile.view.php', [
            "user" => $currentUser,
        ]);
    }

    public function show() {}
    public function create() {}
    public function store() {}
    public function update() {}
    public function delete() {}


}