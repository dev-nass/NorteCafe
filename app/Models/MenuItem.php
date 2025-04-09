<?php

namespace App\Models;

use Core\Model;

class MenuItem extends Model
{

    protected $table = "menu_items";


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