<?php

namespace App\Http\Controllers\Admin;

use Core\Database;
use App\Models\MenuItem;
use App\Models\MenuSize;

class Admin_MenuController
{

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

            $new_menuItemSize = $menuItemSizesObj->insert([
                "menu_item_id" => $new_menuItem['menu_item_id'],
                "size" => $size,
                "price" => $price,
            ]);
            
            redirect('menu-upload-admin');
        }
    }
}
