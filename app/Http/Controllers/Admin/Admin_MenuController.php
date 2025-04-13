<?php

namespace App\Http\Controllers\Admin;

use Core\Database;
use App\Models\AddOns;
use App\Models\MenuItem;
use App\Models\MenuSize;

class Admin_MenuController
{

    public function table()
    {

        $menuItemsObj = new MenuItem;
        $menuItems = $menuItemsObj->findAll();

        view('Admin/menu/table.view.php', [
            "menuItems" => $menuItems,
        ]);

    }

    public function show()
    {

        $menu_item_id = $_GET['menu_item_id'];
        
        $db = new Database;
        $db->iniDB();
        // Menu Item
        $menuItem = $db
            ->query("SELECT menu_items.*, menu_item_sizes.* FROM menu_items
                LEFT JOIN menu_item_sizes ON menu_item_sizes.menu_item_id = menu_items.menu_item_id
                WHERE menu_items.menu_item_id = :menu_item_id", [
                    "menu_item_id" => $menu_item_id,
            ])->get();

        // Sizes
        $menuSizesObj = new MenuSize;
        $menuSizes = $menuSizesObj->findAllWhere([
            "menu_item_id" => $menu_item_id,
        ]);


        // Add-ons
        $addOnsObj = new AddOns;
        $addOns = $addOnsObj->findAll();

        view('Admin/menu/show.view.php', [
            "menuItem" => $menuItem,
            "menuSizes" => $menuSizes,
            "addOns" => $addOns,
        ]);
    }

    /**
     * Loads the page for uploading new menu item
     */
    public function upload()
    {

        view('Admin/menu/upload.view.php', [
            "error" => [],
        ]);
    }

    public function store()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['menu_name'];
            $size = $_POST['menu_size'];
            $price = $_POST['menu_size_price'];
            $category = $_POST['menu_category'];
            $description = $_POST['menu_description'];
            $image_dir = $_FILES['menu-item-img'];

            $menuItemsObj = new MenuItem;

            $new_menuItem = $menuItemsObj->insert([
                "name" => $name,
                "category" => strtoupper($category),
                "description" => $description,
                "image_dir" => "../../storage/backend/img/menu_testing/" . $image_dir['name'],
                "available" => true,
            ]);

            $menuItemsObj->uploadFile($image_dir);
            
            $menuItemSizesObj = new MenuSize;
            // Insert new menu item size
            $new_menuItemSize = $menuItemSizesObj->insert([
                "menu_item_id" => $new_menuItem['menu_item_id'],
                "size" => $size,
                "price" => $price,
            ]);
            
            redirect('menu-upload-admin');
        }
    }

    public function update()
    {
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // we finish here for today
        }
    }
}
