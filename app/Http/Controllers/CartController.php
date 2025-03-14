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

        $currentUser = Session::get('__currentUser', 'credentials')['id'];

        $cartMenuItems = $db
            ->query("SELECT carts.id, carts.user_id, carts.menu_item_id, item.name, item.description, item.category, item.image_dir, carts.menu_item_size_id, size.size, carts.add_ons_id, add_on.name AS add_on_name, add_on.price as add_on_price, size.price, carts.quantity, carts.order_placed
                FROM carts
                INNER JOIN menu_items AS item ON item.id = carts.menu_item_id
                INNER JOIN menu_item_sizes AS size ON size.id = carts.menu_item_size_id
                LEFT JOIN add_ons AS add_on ON add_on.id = carts.add_ons_id
                WHERE carts.user_id = :user_id AND order_placed = false", [
                'user_id' => $currentUser,
            ])->get();


        $menu_item_sizes = $db
            ->query(
                "SELECT * 
                FROM menu_items as menu_item
                INNER JOIN menu_item_sizes as size ON menu_item.id = size.menu_item_id"
            )->get();

        $add_ons = $db
            ->query("SELECT * FROM add_ons")
            ->get();

        view('user/cart/index.view.php', [
            'cartMenuItems' => $cartMenuItems,
            'menu_item_sizes' => $menu_item_sizes,
            'add_ons' => $add_ons,
        ]);
    }

    public function store()
    {

        $db = new Database;
        $db->iniDB();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $currentUser = Session::get('__currentUser', 'credentials')['id'];
            $menu_item_id = $_POST['menu_item_id'];
            $menu_item_size_id = $_POST['menu_item_size_id'];
            $add_ons_id = $_POST['add_ons_id'] ?? NULL;
            $quantity = $_POST['quantity'];

            $newCartEntry = $db
                ->query("INSERT INTO carts (user_id, menu_item_id, menu_item_size_id, add_ons_id, quantity) VALUES (:user_id, :menu_id, :size_id, :add_ons_id, :quantity)", [
                    "user_id" => $currentUser,
                    "menu_id" => $menu_item_id,
                    "size_id" => $menu_item_size_id,
                    "add_ons_id" => $add_ons_id,
                    "quantity" => $quantity,
                ]);

            if ($newCartEntry) {
                redirect('menu');
            }
        }
    }

    public function update() {

        $db = new Database;
        $db->iniDB();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $cart_id = $_POST['cart_id'];
            $menu_item_size_id = $_POST['menu_item_size_id'];
            $add_ons_id = $_POST['add_ons_id'] ?? NULL;
            $quantity = $_POST['quantity'];

            $updatedCartEntry = $db->query("UPDATE carts SET menu_item_size_id = :menu_item_size_id, add_ons_id = :add_ons_id, quantity = :quantity WHERE id = :cart_id", [
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


    public function destroy() {

        $db = new Database;
        $db->iniDB();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $destroyCartEntry = $db->query("DELETE FROM carts WHERE id = :cart_id", [
                "cart_id" => $_POST['cart_id'],
            ]);

            if($destroyCartEntry) {
                redirect('cart');
            }
        }
    }
}
