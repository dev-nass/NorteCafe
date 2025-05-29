<?php

namespace App\Http\Controllers\Admin;

use Core\Database;
use Core\Controller;
use Core\Session;
use App\Models\AddOns;
use App\Models\MenuItem;
use App\Models\MenuSize;

class Admin_MenuController extends Controller
{

    /**
     * Used for loading the table view
     * for menu items
     * 
     * Status Active
     */
    public function index()
    {

        $menuItemsObj = new MenuItem;
        $menuItems = $menuItemsObj->activeMenuItems();

        return $this->view('Admin/menu/index.view.php', [
            'title' => 'Menu Items Table',
            "menuItems" => $menuItems,
        ]);
    }

    /**
     * Used for loading the table view
     * for menu items
     * 
     * Status Archived
     */
    public function index_archived()
    {

        $menuItemsObj = new MenuItem;
        $menuItems = $menuItemsObj->archivedMenuItems();

        return $this->view('Admin/menu/index-archived.view.php', [
            'title' => 'Menu Items Archive Table',
            "menuItems" => $menuItems,
        ]);
    }

    /**
     * Used for showing a specific menu item
     */
    public function show()
    {

        $menu_item_id = $_GET['menu_item_id'];

        // Menu Item
        $menuItemObj = new MenuItem;
        $menuItem = $menuItemObj->showMenuItem($menu_item_id);

        // Sizes
        $menuSizesObj = new MenuSize;
        $menuSizes = $menuSizesObj->findAllWhere([
            "menu_item_id" => $menu_item_id,
        ]);

        // Add-ons
        $addOnsObj = new AddOns;
        $addOns = $addOnsObj->findAll();

        return $this->view('Admin/menu/show.view.php', [
            'title' => "Menu Item {$menu_item_id}",
            "menuItem" => $menuItem,
            "menuSizes" => $menuSizes,
            "addOns" => $addOns,
        ]);
    }

    /**
     * Loads the page for uploading new menu item
     */
    public function create()
    {

        return $this->view('Admin/menu/create.view.php', [
            'title' => 'Create Menu Item',
            "errors" => [],
        ]);
    }

    /**
     * Used for storing a new menu item alongside its
     * size, and image_dir
     * 
     * (Remember: Everytime a new item is stored we required at least
     * one size to be included)
     */
    public function store()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                'menu_name' => $this->getInput('menu_name'),
                'menu_size' => $this->getInput('menu_size'),
                'menu_size_price' => $this->getInput('menu_size_price'),
                'menu_category' => $this->getInput('menu_category'),
                'menu_description' => $this->getInput('menu_description'),
            ];
            $image_dir = $_FILES['menu-item-img'];

            // validation
            $errors = $this->validate($data, [
                "menu_name" => "required|min:5|max:255|unique:menu_items,name,0",
                "menu_description" => "required|max:255",
            ]);

            // redirect if there's errors
            if ($errors) {
                return $this->redirect('menu-create-admin');
            }

            $menuItemsObj = new MenuItem;
            $new_menuItem = $menuItemsObj->insert([
                "name" => $data['menu_name'],
                "category" => strtoupper($data['menu_category']),
                "description" => $data['menu_description'],
                "image_dir" => "/uploads/backend/img/menu_testing/" . $image_dir['name'],
                "available" => true,
            ]);

            $menuItemsObj->uploadFile($image_dir);

            // Insert new menu item size
            $menuItemSizesObj = new MenuSize;
            $new_menuItemSize = $menuItemSizesObj->insert([
                "menu_item_id" => $new_menuItem['menu_item_id'],
                "size" => $data['menu_size'],
                "price" => number_format($data['menu_size_price'], '2', '.', ''),
            ]);

            // redirect and show success alert
            if ($new_menuItem && $new_menuItemSize) {
                Session::set('__flash', 'menu_item_uploaded', 'menu item uploaded successfully');
                return $this->redirect("menu-show-admin?menu_item_id={$new_menuItem['menu_item_id']}");
            }
        }
    }

    /**
     * Used for updating a menu item together with its
     * sizes
     */
    public function update()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                "menu_item_id" => $this->getInput("menu_item_id"),
                "menu_item_sizes_ids" => $this->getInput("menu_item_sizes_id"),
                "item_name" => $this->getInput("item_name"),
                "category" => $this->getInput("category"),
                "description" => $this->getInput("description"),
                "availability" => $this->getInput("available") == 1 ? 1 : 0,
                "sizes" => $this->getInput("sizes"),
                "prices" => $this->getInput("prices"),
            ];
            $image_dir = $_FILES['menu-item-img'];


            // validation
            $errors = $this->validate($data, [
                "item_name" =>  "required|min:5|max:255|unique:menu_items,name,{$data['menu_item_id']}",
                "description" => "required|max:255",
            ]);

            // redirect if there's errors
            if ($errors) {
                return $this->redirect("menu-show-admin?menu_item_id={$data['menu_item_id']}");
            }

            // update the menu item
            $menuItemObj = new MenuItem;
            $updated_menuItem = $menuItemObj->update($data["menu_item_id"], [
                "name" => $data["item_name"],
                "category" => $data["category"],
                "description" => $data["description"],
                "available" => $data["availability"]
            ]);

            // update the size
            $menuSizesObj = new MenuSize;
            $isSizeUpdated = false;
            // $key - is the size
            // $value - is the price
            foreach ($data["prices"] as $key => $value) {
                $menuSizesObj->update($data["menu_item_sizes_ids"][$key], [
                    "size" => $data["sizes"][$key],
                    "price" => number_format($value, '2', '.', '')
                ]);

                // for checking is something actually updates
                $isSizeUpdated = true;
            }

            // check if image_dir should be updated
            if ($image_dir['full_path'] !== "") {
                $menuItemObj->update($data["menu_item_id"], [
                    "image_dir" => "/uploads/backend/img/menu_testing/" . $image_dir['name'],
                ]);
                $menuItemObj->uploadFile($image_dir);
            }

            // redirect
            if ($updated_menuItem && $isSizeUpdated) {
                Session::set('__flash', 'menu_item_updated', 'menu item updated');
                return $this->redirect("menu-show-admin?menu_item_id={$data["menu_item_id"]}");
            }
        }
    }

    /**
     * Use for updating the availability of menu items
     * make it "Available" and "Not Available"
     */
    public function change_availability()
    {

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $menu_item_ids = $_POST['menu-item-ids'];
            $menu_availability = $_POST['availability'] == "Available" ? 1 : 0;

            $menuItemsObj = new MenuItem;
            $availablityUpdated = false;

            foreach ($menu_item_ids as $id) {
                $menuItemsObj->update($id, [
                    "available" => $menu_availability,
                ]);

                $availablityUpdated = true;
            }

            if ($availablityUpdated) {
                redirect('menu-table-admin');
            }
        }
    }

    public function reactivate()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $menu_item_id = $this->getInput('menu_item_id');

            $menuItemObj = new MenuItem;
            $reActivated_menuItem = $menuItemObj->update($menu_item_id, [
                "status" => 1
            ]);

            if ($reActivated_menuItem) {
                Session::set('__flash', 'menu_item_reactivate', 'deleted successfully');
                return $this->redirect('menu-table-admin');
            }
        }
    }

    /**
     * Used for deleting a specific menu item
     */
    public function delete()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $menu_item_id = $this->getInput('menu_item_id');

            $menuItemObj = new MenuItem;
            $archived_menuItem = $menuItemObj->update($menu_item_id, [
                "status" => 0,
            ]);

            if ($archived_menuItem) {
                Session::set('__flash', 'menu_item_deleted', 'deleted successfully');
                return $this->redirect('menu-archive-table-admin');
            }
        }
    }
}
