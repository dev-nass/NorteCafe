<?php

namespace App\Models;

use Core\Model;

class MenuSize extends Model
{

    protected $table = "menu_item_sizes";

    /**
     * Joins two table (menu_items & menu_item_sizes)
     * Fetch all menu items and their respective sizes
    */
    public function getMenuItemsAndSizes()
    {

        $this->iniDB();

        $menu_item_sizes = $this
            ->query(
                "SELECT * 
                FROM menu_items as menu_item
                INNER JOIN menu_item_sizes as size ON menu_item.menu_item_id = size.menu_item_id"
            )->get();

        return $menu_item_sizes;

    }
}