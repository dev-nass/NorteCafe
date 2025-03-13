<?php

namespace App\Http\Controllers;

use Core\Database;

class MenuController {

    public function index() {

        $db = new Database;
        $db->iniDB();

        $menu_items = $db->query("SELECT * FROM menu_items")->get();

        $menu_item_sizes = $db
            ->query("SELECT * 
                FROM menu_items as menu_item
                INNER JOIN menu_item_sizes as size ON menu_item.id = size.menu_item_id"
            )->get();

        $add_ons = $db->query("SELECT * FROM add_ons")->get();
        
        view('user/menu/index.view.php', [
            'menu_items' => $menu_items,
            'menu_item_sizes' => $menu_item_sizes,
            'add_ons' => $add_ons,
        ]);
    }
}