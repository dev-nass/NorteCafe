<?php

namespace App\Http\Controllers;

use Core\Database;
use Core\Session;

class FilterController
{

    /**
     * For loading the search result
     */
    public function search()
    {

        $db = new Database;
        $db->iniDB();

        Session::set('__currentSearch', 'search', $_GET['search'] ?? Session::get('__currentSearch', 'search'));

        $value = Session::get('__currentSearch', 'search');

        $menu_items = $db->query("SELECT * FROM menu_items WHERE name LIKE '%{$value}%' OR category LIKE '%{$value}%'")->get();

        $menu_item_categories = $db->query("SELECT DISTINCT category FROM menu_items")->get();

        $menu_item_sizes = $db
            ->query(
                "SELECT * 
                FROM menu_items as menu_item
                INNER JOIN menu_item_sizes as size ON menu_item.id = size.menu_item_id"
            )->get();

        $add_ons = $db->query("SELECT * FROM add_ons")->get();

        view('user/menu/result.view.php', [
            'keywordSearch' => $value,
            'menu_items' => $menu_items,
            'menu_item_categories' => $menu_item_categories,
            'menu_item_sizes' => $menu_item_sizes,
            'add_ons' => $add_ons,
        ]);
    }

    public function category()
    {

        $db = new Database;
        $db->iniDB();

        Session::set('__currentSearch', 'search', $_GET['search'] ?? Session::get('__currentSearch', 'search'));

        $value = Session::get('__currentSearch', 'search');

        $menu_items = $db->query("SELECT * FROM menu_items WHERE category LIKE '%{$value}%'")->get();

        $menu_item_categories = $db->query("SELECT DISTINCT category FROM menu_items")->get();

        $menu_item_sizes = $db
            ->query(
                "SELECT * 
                FROM menu_items as menu_item
                INNER JOIN menu_item_sizes as size ON menu_item.id = size.menu_item_id"
            )->get();

        $add_ons = $db->query("SELECT * FROM add_ons")->get();

        view('user/menu/result.view.php', [
            'keywordSearch' => $value,
            'menu_items' => $menu_items,
            'menu_item_categories' => $menu_item_categories,
            'menu_item_sizes' => $menu_item_sizes,
            'add_ons' => $add_ons,
        ]);
    }
}
