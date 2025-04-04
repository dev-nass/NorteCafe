<?php

namespace App\Models;

use Core\Model;
use Core\Session;

class Cart extends Model
{

    protected $table = "carts";

    /**
     * Used for counting and updating the carts
     * count on Session
     */
    public function updateCartCount($colToCount)
    {
        $currentUser = Session::get('__currentUser', 'credentials');

        $count = $this->countWhere($colToCount, [
            "user_id" => $currentUser['user_id'],
            "order_placed" => 0,
        ]);

        Session::set('__currentUserCarts', 'cart_count', $count);
    }
}
