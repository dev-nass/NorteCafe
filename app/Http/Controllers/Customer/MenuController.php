<?php

namespace App\Http\Controllers\Customer;

use Core\Database;

class MenuController {

    /**
     * Loads the view for the menu page
    */
    public function index() {

        $db = new Database;
        $db->iniDB();

        $pages = $db->paginated('menu_items');
        $menu_items = $pages['data'];

        // Select each category (for filterting)
        $menu_item_categories = $db->query("SELECT DISTINCT category FROM menu_items")->get();

        // Select each menu item and its corresponding size
        $menu_item_sizes = $db
            ->query("SELECT * 
                FROM menu_items as menu_item
                INNER JOIN menu_item_sizes as size ON menu_item.menu_item_id = size.menu_item_id"
            )->get();

        // Select all add ons
        $add_ons = $db->query("SELECT * FROM add_ons")->get();
        
        view('Customer/menu/index.view.php', [
            'title' => 'Menu',
            'menu_items' => $menu_items,
            'pages' => $pages['pagination'],
            'menu_item_categories' => $menu_item_categories,
            'menu_item_sizes' => $menu_item_sizes,
            'add_ons' => $add_ons,
        ]);
    }
}