<?php

namespace App\Http\Controllers;

use App\Models\User;

class DeactivateController
{


    /**
     * Used for listening to deactivate
     * form submit
     */
    public function update()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $user_id = $_POST['user_id'];

            $userObj = new User;
            $deact_user = $userObj->update($user_id, [
                'status' => 0,
            ]);

            if ($deact_user) {

                unset($_SESSION['__currentUser']);
                unset($_SESSION['__currentUserCarts']);
                unset($_SESSION['__currentUserTransactions']);
                
                return redirect('index');
            }
        }
    }
}
