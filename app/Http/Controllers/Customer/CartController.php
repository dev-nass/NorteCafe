<?php

namespace App\Http\Controllers\Customer;

use Core\Controller;
use Core\Database;
use Core\Model;
use Core\Session;
use App\Models\Cart;
use App\Models\MenuSize;
use App\Models\AddOns;
use App\Models\Discount;

class CartController extends Controller
{

    /**
     * Loads the view of the
     * Cart Page
    */
    public function index()
    {

        $db = new Database;
        $db->iniDB();

        $currentUserId = Session::get('__currentUser', 'credentials')['user_id'];

        // fetch the user's cart items
        $cartObj = new Cart;
        $cartMenuItems = $cartObj->getUserCartMenuItems($currentUserId);

        // fetches all sizes for all item (not just the one on the cart)
        $menuSizeObj = new MenuSize;
        $menu_item_sizes = $menuSizeObj->getMenuItemsAndSizes();

        // fetching all add ons
        $addOnObj = new AddOns;
        $add_ons = $addOnObj->findAll();

        // fetching all available discounts
        $discountObj = new Discount;
        $available_discounts = $discountObj->findAll();

        return $this->view('Customer/cart/index.view.php', [
            "title" => "Cart",
            'cartMenuItems' => $cartMenuItems,
            'menu_item_sizes' => $menu_item_sizes,
            'add_ons' => $add_ons,
            'available_discounts' => $available_discounts,
            "errors" => [],
        ]);
    }

    public function show() {}

    public function create() {}

    /**
     * Triggers when new item is added
     * to the cart
     */
    public function store()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $currentUserId = Session::get('__currentUser', 'credentials')['user_id'];
            // gets the data
            $data = [
                "menu_item_id" => $this->getInput("menu_item_id"),
                "menu_item_size_id" => $this->getInput("menu_item_size_id"),
                "add_ons_id" => $this->getInput("add_ons_id"),
                "quantity" => $this->getInput("quantity"),
            ];

            // validation
            $errors = $this->validate($data, [
                "menu_item_id" => "required",
                "menu_item_size_id" => "required",
                "quantity" => "required",
            ]);

            // return the view (if errors)
            if (!empty($errors)) {
                return $this->view("Customer/menu/index.view.php", [
                    "errors" => $errors
                ]);
            }

            // insert the new item on cart
            $cartObj = new Cart;
            $newCartEntry = $cartObj->insert([
                "user_id" => $currentUserId,
                "menu_item_id" => $data["menu_item_id"],
                "menu_item_size_id" => $data["menu_item_size_id"],
                "add_ons_id" => $data["add_ons_id"],
                "quantity" => $data["quantity"],
            ]);

            // redirect the user based on their current URL
            if ($newCartEntry) {
                // if($_SERVER['HTTP_REFERER'] === 'http://localhost/PHP%202025/Norte%20Cafe/public/index.php/menu') {
                //     redirect('menu');
                // } else {
                //     redirect('search-filter');
                // }
                // current user cart count
                $cartObj = new Cart;
                $cartObj->updateCartCount('user_id');

                return $this->redirect('menu');
            }
        }
    }


    /**
     * Update a single item on cart
     */
    public function update()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // gets the data
            $data = [
                "cart_id" => $this->getInput("cart_id"),
                "menu_item_size_id" => $this->getInput("menu_item_size_id"),
                "add_ons_id" => $this->getInput("add_ons_id"),
                "quantity" => $this->getInput("quantity")
            ];

            // update the cart record
            $cartObj = new Cart;
            $updatedCartEntry = $cartObj->update($data["cart_id"], [
                "menu_item_size_id" => $data["menu_item_size_id"],
                "add_ons_id" => $data["add_ons_id"] ?? NULL,
                "quantity" => $data["quantity"],
            ]);

            // redirect
            if ($updatedCartEntry) {
                return $this->redirect('cart');
            }
        }
    }


    /**
     * Delete a single item on cart
     */
    public function delete()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // gets the data
            $data = [
                "cart_id" => $this->getInput("cart_id"),
            ];
            
            // delete
            $cartObj = new Cart;
            $destroyCartEntry = $cartObj->delete($data["cart_id"]);

            // redirect & update cart count
            if ($destroyCartEntry) {
                $cartObj = new Cart;
                $cartObj->updateCartCount('user_id');

                return $this->redirect('cart');
            }
        }
    }
}
