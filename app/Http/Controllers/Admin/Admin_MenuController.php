<?php

namespace App\Http\Controllers\Admin;

use Core\Database;
use App\Models\AddOns;
use App\Models\MenuItem;
use App\Models\MenuSize;

class Admin_MenuController
{

    /**
     * Used for loading the table view
     * for menu items
    */
    public function table()
    {

        $menuItemsObj = new MenuItem;
        $menuItems = $menuItemsObj->findAll();

        view('Admin/menu/table.view.php', [
            "menuItems" => $menuItems,
        ]);

    }

    /**
     * Used for showing a specific menu item
    */
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

    /**
     * Used for storing a new menu item alongside its
     * size, and image_dir
    */
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
            
            redirect("menu-show-admin?menu_item_id={$new_menuItem['menu_item_id']}");
        }
    }

    /**
     * Used for updating a menu item together with its
     * sizes
    */
    public function update()
    {
        
        // dd($_POST);
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // we finish here for today
            $menu_item_id = $_POST['menu_item_id'];
            $menu_item_sizes_ids = $_POST['menu_item_sizes_id']; // in plural
            
            $item_name = $_POST['item_name'];
            $category = $_POST['category'];
            $description = $_POST['description'];
            $availability = $_POST['available'] == 1 ? 1 : 0;
            $sizes = $_POST['sizes'];
            $prices = $_POST['prices'];
            $image_dir = $_FILES['menu-item-img'];

            // repeating name shouldn't be allowed

            // update the menu item
            $menuItemObj = new MenuItem;
            $updated_menuItem = $menuItemObj->update($menu_item_id, [
                "name" => $item_name,
                "category" => $category,
                "description" => $description,
                "available" => $availability
            ]);

            // update the size
            $menuSizesObj = new MenuSize;
            $isSizeUpdated = false;
            // $key - is the size
            // $value - is the price
            foreach($prices as $key => $value) {
                $menuSizesObj->update($menu_item_sizes_ids[$key], [
                    "size" => $sizes[$key],
                    "price" => $value
                ]);

                // for checking is something actually updates
                $isSizeUpdated = true;
            }

            // check if image_dir should be updated
            if($image_dir['full_path'] !== "") {
                $menuItemObj->update($menu_item_id, [
                    "image_dir" => "../../storage/backend/img/menu_testing/" . $image_dir['name'],
                ]);
                $menuItemObj->uploadFile($image_dir);
            }

            // redirect
            if($updated_menuItem && $isSizeUpdated) {
                redirect("menu-show-admin?menu_item_id={$menu_item_id}");
            }
        }
    }

    /**
     * Use for updating the availability of menu items
     * make it "Available" and "Not Available"
    */
    public function change_availability()
    {

        if($_SERVER['REQUEST_METHOD'] === "POST") {
            $menu_item_ids = $_POST['menu-item-ids'];
            $menu_availability = $_POST['availability'] == "Available" ? 1 : 0;

            $menuItemsObj = new MenuItem;
            $availablityUpdated = false;

            foreach($menu_item_ids as $id) {
                $menuItemsObj->update($id, [
                    "available" => $menu_availability,
                ]);

                $availablityUpdated = true;
            }

            if($availablityUpdated) {
                redirect('menu-table-admin');
            }
        }
    }
}
