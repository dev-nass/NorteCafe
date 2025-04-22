<?php

namespace App\Models;

use Core\Model;

class MenuItem extends Model
{

    protected $table = "menu_items";

    /**
     * Used within Admin_Menu/show() controller,
     * to abstract the sql query
     * 
     * Return a collection of 
     * records of item and its size
    */
    public function showMenuItem($menu_item_id) 
    {
        $this->iniDB();

        $menuItem = $this->query("SELECT menu_items.*, menu_item_sizes.* FROM menu_items
                LEFT JOIN menu_item_sizes ON menu_item_sizes.menu_item_id = menu_items.menu_item_id
                WHERE menu_items.menu_item_id = :menu_item_id", [
                    "menu_item_id" => $menu_item_id,
            ])->get();
        
        return $menuItem;
    }

    /**
     * Will be used for moving the uploaded image of menu item
     * to our desired directory
     */
    public function uploadFile($file)
    {
        $target_dir = BASE_PATH . "storage/backend/img/menu_testing/";
        $target_path = $target_dir . basename($file['name']);

        // Ensure the directory exists
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        if (move_uploaded_file($file['tmp_name'], $target_path)) {
            return $target_path;
        }

        dd('alaws na ups');
    }
}