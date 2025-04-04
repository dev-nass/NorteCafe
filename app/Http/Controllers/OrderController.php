<?php

namespace App\Http\Controllers;

use Core\Database;
use Core\Session;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\Cart;

class OrderController
{

    /**
     * Will trigger everytime 'place order' button is clicked
    */
    public function store()
    {

        $db = new Database;
        $db->iniDB();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // $transaction = new Transaction;

            // $lastInsertedRecord = $transaction->insert([
            //     "user_id" => $_SESSION['__currentUser']['credentials']['user_id'],
            //     "amount_due" => $_POST['amount_due'],
            //     "status" => "Pending",
            // ]);

            // // Insert new transaction
            // $newTransactionEntry = $db->query("INSERT INTO transactions (user_id, amount_due, status) VALUES (:user_id, :amount_due, :status)", [
            //     "user_id" => $_SESSION['__currentUser']['credentials']['user_id'],
            //     "amount_due" => $_POST['amount_due'],
            //     "status" => "Pending",
            // ]);

            // // gets the id of the last inserted transaction record
            // $lastInsertedRecord = $db->query("SELECT transaction_id FROM transactions WHERE user_id = :user_id ORDER BY transaction_id DESC LIMIT 1", [
            //     "user_id" => $_SESSION['__currentUser']['credentials']['user_id']
            // ])->find();

            // Insert new order
            // if ($lastInsertedRecord) {
            //     foreach ($_POST['cart_item'] as $index => $cart_id) {
            //         $total_price = $_POST['total_price'][$index]; // Get corresponding total price

            //         $db->query("INSERT INTO orders (transaction_id, cart_id, total_price) VALUES (:transaction_id, :cart_id, :total_price)", [
            //             "transaction_id" => $lastInsertedRecord['transaction_id'],
            //             "cart_id" => $cart_id,
            //             "total_price" => $total_price,
            //         ]);

            //         $db->query("UPDATE carts SET order_placed = true WHERE cart_id = :cart_id", [
            //             "cart_id" => $cart_id,
            //         ]);
            //     }

            //     redirect('cart');
            // }

            $order = new Order(
                $_SESSION['__currentUser']['credentials']['user_id'], 
                $_POST['discount_id'],
                $_POST['amount_due'],
                $_POST['total_price'],
                $_POST['cart_item'],
                
            );
            
            $order->placeOrder();

            // current user cart count (need here for navbar)
            $cartObj = new Cart;
            $cartObj->updateCartCount('user_id');

            redirect('cart');
        }
    }
}
