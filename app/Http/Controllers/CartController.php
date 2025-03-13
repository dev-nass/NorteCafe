<?php

namespace App\Http\Controllers;

use Core\Database;
use Core\Session;

class CartController {

    public function index() {

        $db = new Database;
        $db->iniDB();

        $currentUser = Session::get('__currentUser', 'credentials')['id'];

        $cartMenuItems = $db
            ->query("SELECT carts.id, carts.user_id, carts.menu_item_id, item.name, item.description, item.category, item.image_dir, carts.menu_item_size_id, size.size, size.price, carts.quantity  
                FROM carts
                INNER JOIN menu_items AS item ON item.id = carts.menu_item_id
                INNER JOIN menu_item_sizes AS size ON size.id = carts.menu_item_size_id
                WHERE carts.user_id = :user_id", [
                'user_id' => $currentUser,
            ])->get();

        
        view('user/cart/index.view.php', [
            'cartMenuItems' => $cartMenuItems,
        ]);
    }

    public function store() {

        $db = new Database;
        $db->iniDB();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $currentUser = Session::get('__currentUser', 'credentials')['id'];
            $menu_item_id = $_POST['menu_item_id'];
            $menu_item_size_id = $_POST['menu_item_size_id'];
            $add_ons_id = $_POST['add_ons_id'] ?? NULL;
            $quantity = $_POST['quantity'];
            
            $newCartEntry = $db
                ->query("INSERT INTO carts (user_id, menu_item_id, menu_item_size_id, add_ons_id, quantity) VALUES (:user_id, :menu_id, :size_id, :add_ons_id, :quantity)",[
                    "user_id" => $currentUser,
                    "menu_id" => $menu_item_id,
                    "size_id" => $menu_item_size_id,
                    "add_ons_id" => $add_ons_id,
                    "quantity" => $quantity,
                ]);
            
            if($newCartEntry) {
                redirect('menu');
            }

        }

    }
}