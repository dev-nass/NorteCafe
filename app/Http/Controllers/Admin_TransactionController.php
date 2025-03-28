<?php

namespace App\Http\Controllers;

use Core\Database;
use App\Models\Order;

class Admin_TransactionController
{

    public function queue()
    {

        view('admin/transaction/queue.view.php');
    }


    public function show()
    {

        $db = new Database;
        $db->iniDB();

        // transaction queries
        $transacton_id = $_GET['id'];

        // this variable will contain an array [] each one with repeating transacton_id but different col value next to it.
        $transactions =
            $db->query("SELECT transactions.*, 
                users.user_id, CONCAT(users.first_name, ' ', users.last_name) AS fullname, users.username, users.email, users.contact_number, 
                orders.order_id, orders.transaction_id, orders.cart_id, orders.total_price, 
                carts.*, 
                menu_items.menu_item_id, menu_items.name as menu_item_name, menu_items.category, menu_items.image_dir, 
                menu_item_sizes.menu_item_size_id, menu_item_sizes.menu_item_id, menu_item_sizes.size, menu_item_sizes.price as menu_item_size_price, 
                add_ons.add_on_id, add_ons.name as add_on_name, add_ons.price as add_on_price
                FROM transactions
                LEFT JOIN users ON users.user_id = transactions.user_id
                LEFT JOIN orders ON orders.transaction_id = transactions.transaction_id
                LEFT JOIN carts ON carts.cart_id = orders.cart_id
                LEFT JOIN menu_items ON menu_items.menu_item_id = carts.menu_item_id
                LEFT JOIN menu_item_sizes ON menu_item_sizes.menu_item_size_id = carts.menu_item_size_id
                LEFT JOIN add_ons ON add_ons.add_on_id = carts.add_ons_id
                WHERE transactions.transaction_id = :transaction_id", [
                "transaction_id" => $transacton_id,
            ])->get();

        // available rider query

        // preview transactions
        $previewsTransactions = $db->query("SELECT * FROM transactions WHERE user_id = :user_id ORDER BY transaction_id DESC", [
            "user_id" => $transactions[0]['user_id'],
        ])->get();


        view('admin/transaction/pending-show.view.php', [
            'transactions' => $transactions,
            'previewsTransactions' => $previewsTransactions,
        ]);
    }


    public function update() 
    {

        $db = new Database;
        $db->iniDB();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $updatedStatus = $db->query("UPDATE transactions SET status = :status WHERE transaction_id = :transaction_id", [
                "status" => $_POST['status'],
                "transaction_id" => $_POST['transaction-id'],
            ]);

            if($updatedStatus) {
                redirect("transaction-show?id={$_POST['transaction-id']}");
            }

        }
    }
}
