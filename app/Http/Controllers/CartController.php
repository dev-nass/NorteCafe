<?php

namespace App\Http\Controllers;

use Core\Database;
use Core\Session;

class CartController
{

    public function index()
    {

        $db = new Database;
        $db->iniDB();

        $currentUser = Session::get('__currentUser', 'credentials')['user_id'];

        // fetch the user's cart items
        $cartMenuItems = $db
            ->query("SELECT carts.cart_id, carts.user_id, carts.menu_item_id, item.name, item.description, item.category, item.image_dir, carts.menu_item_size_id, size.size, carts.add_ons_id, add_on.name AS add_on_name, add_on.price as add_on_price, size.price, carts.quantity, carts.order_placed
                FROM carts
                INNER JOIN menu_items AS item ON item.menu_item_id = carts.menu_item_id
                INNER JOIN menu_item_sizes AS size ON size.menu_item_size_id = carts.menu_item_size_id
                LEFT JOIN add_ons AS add_on ON add_on.add_on_id = carts.add_ons_id
                WHERE carts.user_id = :user_id AND order_placed = false", [
                'user_id' => $currentUser,
            ])->get();

        // fetches all sizes for all item (not just the one on the cart)
        $menu_item_sizes = $db
            ->query(
                "SELECT * 
                FROM menu_items as menu_item
                INNER JOIN menu_item_sizes as size ON menu_item.menu_item_id = size.menu_item_id"
            )->get();

        // fetching all add ons
        $add_ons = $db
            ->query("SELECT * FROM add_ons")
            ->get();

        // fetching all available discounts
        $available_discounts = $db->query("SELECT * FROM discounts")->get();

        view('Customer/cart/index.view.php', [
            'cartMenuItems' => $cartMenuItems,
            'menu_item_sizes' => $menu_item_sizes,
            'add_ons' => $add_ons,
            'available_discounts' => $available_discounts,
        ]);
    }

    public function store()
    {

        $db = new Database;
        $db->iniDB();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $currentUser = Session::get('__currentUser', 'credentials')['user_id'];
            $menu_item_id = $_POST['menu_item_id'];
            $menu_item_size_id = $_POST['menu_item_size_id'];
            $add_ons_id = $_POST['add_ons_id'] ?? NULL;
            $quantity = $_POST['quantity'];

            // insert the new item on cart
            $newCartEntry = $db
                ->query("INSERT INTO carts (user_id, menu_item_id, menu_item_size_id, add_ons_id, quantity) VALUES (:user_id, :menu_id, :size_id, :add_ons_id, :quantity)", [
                    "user_id" => $currentUser,
                    "menu_id" => $menu_item_id,
                    "size_id" => $menu_item_size_id,
                    "add_ons_id" => $add_ons_id,
                    "quantity" => $quantity,
                ]);

            // redirect the user based on their current URL
            if ($newCartEntry) {
                // if($_SERVER['HTTP_REFERER'] === 'http://localhost/PHP%202025/Norte%20Cafe/public/index.php/menu') {
                //     redirect('menu');
                // } else {
                //     redirect('search-filter');
                // }
                redirect('menu');
            }
        }
    }


    /**
     * Update a single item on cart
    */
    public function update() {

        $db = new Database;
        $db->iniDB();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $cart_id = $_POST['cart_id'];
            $menu_item_size_id = $_POST['menu_item_size_id'];
            $add_ons_id = $_POST['add_ons_id'] ?? NULL;
            $quantity = $_POST['quantity'];

            $updatedCartEntry = $db->query("UPDATE carts SET menu_item_size_id = :menu_item_size_id, add_ons_id = :add_ons_id, quantity = :quantity WHERE cart_id = :cart_id", [
                "cart_id" => $cart_id,
                "menu_item_size_id" => $menu_item_size_id,
                "add_ons_id" => $add_ons_id,
                "quantity" => $quantity
            ]);

            if($updatedCartEntry) {
                redirect('cart');
            }

        }
    }


    /**
     * Delete a single item on cart
    */
    public function destroy() {

        $db = new Database;
        $db->iniDB();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $destroyCartEntry = $db->query("DELETE FROM carts WHERE cart_id = :cart_id", [
                "cart_id" => $_POST['cart_id'],
            ]);

            if($destroyCartEntry) {
                redirect('cart');
            }
        }
    }
}
