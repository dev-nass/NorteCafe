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


    /**
     * Fetch collection of records of users
     * menu cart items
    */
    public function getUserCartMenuItems($user_id)
    {

        $this->iniDB();

        $cartMenuItems = $this
            ->query("SELECT carts.cart_id, carts.user_id, carts.menu_item_id, item.name, item.description, item.category, item.image_dir, carts.menu_item_size_id, size.size, carts.add_ons_id, add_on.name AS add_on_name, add_on.price as add_on_price, size.price, carts.quantity, carts.order_placed
                FROM carts
                INNER JOIN menu_items AS item ON item.menu_item_id = carts.menu_item_id
                INNER JOIN menu_item_sizes AS size ON size.menu_item_size_id = carts.menu_item_size_id
                LEFT JOIN add_ons AS add_on ON add_on.add_on_id = carts.add_ons_id
                WHERE carts.user_id = :user_id AND order_placed = false", [
                'user_id' => $user_id,
            ])->get();

        return $cartMenuItems;
    }
}
