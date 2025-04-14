<?php

namespace App\Http\Controllers\Admin;

use App\Models\MenuSize;

class Admin_MenuSizeController
{

    public function upload()
    {
        view('Admin/size/upload.view.php');
    }

    public function store() 
    {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $menu_item_id = $_POST['menu-item-id'];
            $size_name = $_POST['size-name'];
            $size_price = $_POST['size-price'];

            $menuSizeObj = new MenuSize;
            $new_menuSize = $menuSizeObj->insert([
                "menu_item_id" => $menu_item_id,
                "size" => $size_name,
                "price" => $size_price,
            ]);

            if($new_menuSize) {
                redirect("menu-show-admin?menu_item_id={$menu_item_id}");
            }

        }
    }
}
