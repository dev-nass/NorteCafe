<?php

namespace App\Http\Controllers;

use Core\Database;
use Core\Session;

class OrderController
{


    public function store()
    {

        $db = new Database;
        $db->iniDB();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Insert new transaction
            $newTransactionEntry = $db->query("INSERT INTO transactions (user_id, amount_due) VALUES (:user_id, :amount_due)", [
                "user_id" => $_SESSION['__currentUser']['credentials']['id'],
                "amount_due" => $_POST['amount_due'],
            ]);

            $lastInsertedRecord = $db->query("SELECT id FROM transactions WHERE user_id = :user_id ORDER BY id DESC LIMIT 1", [
                "user_id" => $_SESSION['__currentUser']['credentials']['id']
            ])->find();

            // Insert new order
            if ($lastInsertedRecord) {
                foreach ($_POST['cart_item'] as $cart_id) {

                    $db->query("INSERT INTO orders (transaction_id, cart_id, total_price) VALUES (:transaction_id, :cart_id, :total_price)", [
                        "transaction_id" => $lastInsertedRecord['id'],
                        "cart_id" => $cart_id,
                        "total_price" => 1,
                    ]);

                    $db->query("UPDATE carts SET order_placed = true WHERE id = :cart_id", [
                        "cart_id" => $cart_id,
                    ]);
                }

                redirect('cart');
            }
        }
    }
}
