<?php

namespace App\Http\Controllers\Customer;

use Core\Database;
use Core\Controller;
use App\Models\MenuSize;
use App\Models\AddOns;


class MenuController extends Controller 
{

    /**
     * Loads the view for the menu page
    */
    public function index() 
    {

        $db = new Database;
        $db->iniDB();

        $pages = $db->paginated('menu_items');
        $menu_items = $pages['data'];

        // Select each category (for filterting)
        $menu_item_categories = $db->query("SELECT DISTINCT category FROM menu_items")->get();

        // Select each menu item and its corresponding size
        $menuSizeObj = new MenuSize;
        $menu_item_sizes = $menuSizeObj->getMenuItemsAndSizes();

        // Select all add ons
        $addOnsObj = new AddOns;
        $add_ons = $addOnsObj->findAll();
        
        return $this->view('Customer/menu/index.view.php', [
            'title' => 'Menu',
            'menu_items' => $menu_items,
            'pages' => $pages['pagination'],
            'menu_item_categories' => $menu_item_categories,
            'menu_item_sizes' => $menu_item_sizes,
            'add_ons' => $add_ons,
        ]);
    }

    public function show() {}
    public function create() {}
    public function store() {}
    public function update() {}
    public function delete() {}
}