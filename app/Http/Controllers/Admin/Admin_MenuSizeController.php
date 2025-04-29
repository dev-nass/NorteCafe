<?php

namespace App\Http\Controllers\Admin;

use Core\Controller;
use Core\Session;
use App\Models\MenuSize;

class Admin_MenuSizeController extends Controller
{

    public function index() {}

    public function show() {}

    /**
     * Used for loading the view for upload
    */
    public function create()
    {
        return $this->view('Admin/size/create.view.php', [
            'title' => 'Create Menu Item Size',
        ]);
    }

    /**
     * Used for handling the submit of menu size form
    */
    public function store() 
    {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                "menu_item_id" => $this->getInput("menu-item-id"),
                "size_name" => $this->getInput("size-name"),
                "size_price" => $this->getInput("size-price"),
            ];

            $menuSizeObj = new MenuSize;
            $new_menuSize = $menuSizeObj->insert([
                "menu_item_id" => $data["menu_item_id"],
                "size" => $data["size_name"],
                "price" => number_format($data["size_price"], '2', '.', ''),
            ]);

            if($new_menuSize) {
                Session::set('__flash', 'menu_item_size_uploaded', 'menu item size uploaded successfully');
                redirect("menu-show-admin?menu_item_id={$data['menu_item_id']}");
            }

        }
    }

    public function update() {}

    public function delete() {}
}
