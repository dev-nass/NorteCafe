<?php

namespace App\Http\Controllers;

use Core\Database;
use App\Models\Order;

class Admin_TransactionController
{

    /**
     * Used for loading the transactions table
     */
    public function table()
    {
        $db = new Database;
        $db->iniDB();

        $transactions = $db
            ->query("SELECT transactions.transaction_id, CONCAT(users.first_name, ' ', users.last_name) as customer_detail, CONCAT(riders.first_name, ' ', riders.last_name) as rider_detail, transactions.created_at, transactions.payment_method, transactions.amount_due, transactions.amount_tendered, transactions.change, transactions.status
                FROM transactions
                LEFT JOIN users AS users ON transactions.user_id = users.user_id
                LEFT JOIN users AS riders ON transactions.rider_id = riders.user_id")
            ->get();


        view('admin/transaction/table.view.php', [
            "transactions" => $transactions,
        ]);
    }

    /**
     * Used for loading the view of the transactions queue;
     * the file within folder 'Request' is responsible for the data and AJAX call
     */
    public function queue()
    {
        view('admin/transaction/queue.view.php');
    }

    /**
     * Used for loading/showing resouce on
     * Admin/transaction/show.view.php
     */
    public function show()
    {
        $db = new Database;
        $db->iniDB();

        $transaction_id = $_GET['transaction_id'];

        $transactions =
            $db->query("SELECT transactions.*, 
                users.user_id, CONCAT(users.first_name, ' ', users.last_name) AS fullname, users.username, users.email, users.contact_number, CONCAT(users.house_number, ', ', users.street, ', ', users.barangay, ', ', users.city, ', ', users.provience, ', ', users.region, ', ', users.postal_code) AS address,
                riders.user_id, CONCAT(riders.first_name, ' ', riders.last_name) as rider_name, riders.contact_number,
                orders.order_id, orders.transaction_id, orders.cart_id, orders.total_price, 
                carts.*, 
                menu_items.menu_item_id, menu_items.name as menu_item_name, menu_items.category, menu_items.image_dir, 
                menu_item_sizes.menu_item_size_id, menu_item_sizes.menu_item_id, menu_item_sizes.size, menu_item_sizes.price as menu_item_size_price, 
                add_ons.add_on_id, add_ons.name as add_on_name, add_ons.price as add_on_price,
                discounts.discount_id, discounts.name AS discount_name
                FROM transactions
                LEFT JOIN users AS users ON users.user_id = transactions.user_id
                LEFT JOIN users AS riders ON riders.user_id = transactions.rider_id
                LEFT JOIN orders ON orders.transaction_id = transactions.transaction_id
                LEFT JOIN carts ON carts.cart_id = orders.cart_id
                LEFT JOIN menu_items ON menu_items.menu_item_id = carts.menu_item_id
                LEFT JOIN menu_item_sizes ON menu_item_sizes.menu_item_size_id = carts.menu_item_size_id
                LEFT JOIN add_ons ON add_ons.add_on_id = carts.add_ons_id
                LEFT JOIN discounts ON discounts.discount_id = transactions.discount_id
                WHERE transactions.transaction_id = :transaction_id", [
                "transaction_id" => $transaction_id,
            ])->get();

        $previousTransactions = $db->query("SELECT * FROM transactions WHERE user_id = :user_id ORDER BY transaction_id DESC", [
            "user_id" => $transactions[0]['user_id'],
        ])->get();


        view('admin/transaction/show.view.php', [
            'transactions' => $transactions,
            'previousTransactions' => $previousTransactions,
        ]);
    }

    /**
     * Used for loading/showing the specificity of each 
     * pending transactions
     */
    public function pending_show()
    {

        $db = new Database;
        $db->iniDB();

        // transaction queries
        $transaction_id = $_GET['id'];

        // this variable will contain an array [] each one with repeating transacton_id but different col value next to it.
        // we use ->get() here instead of ->find() because each transactions can have multipe orders on them,
        // and each of those orders are rendered into their own row/records
        $transactions =
            $db->query("SELECT transactions.*, 
                users.user_id, CONCAT(users.first_name, ' ', users.last_name) AS fullname, users.username, users.email, users.contact_number, CONCAT(users.house_number, ', ', users.street, ', ', users.barangay, ', ', users.city, ', ', users.provience, ', ', users.region, ', ', users.postal_code) AS address,
                riders.user_id, CONCAT(riders.first_name, ' ', riders.last_name) as rider_name, riders.contact_number,
                orders.order_id, orders.transaction_id, orders.cart_id, orders.total_price, 
                carts.*, 
                menu_items.menu_item_id, menu_items.name as menu_item_name, menu_items.category, menu_items.image_dir, 
                menu_item_sizes.menu_item_size_id, menu_item_sizes.menu_item_id, menu_item_sizes.size, menu_item_sizes.price as menu_item_size_price, 
                add_ons.add_on_id, add_ons.name as add_on_name, add_ons.price as add_on_price,
                discounts.discount_id, discounts.name AS discount_name, discounts.type, discounts.min_amount
                FROM transactions
                LEFT JOIN users AS users ON users.user_id = transactions.user_id
                LEFT JOIN users AS riders ON riders.user_id = transactions.rider_id
                LEFT JOIN orders ON orders.transaction_id = transactions.transaction_id
                LEFT JOIN carts ON carts.cart_id = orders.cart_id
                LEFT JOIN menu_items ON menu_items.menu_item_id = carts.menu_item_id
                LEFT JOIN menu_item_sizes ON menu_item_sizes.menu_item_size_id = carts.menu_item_size_id
                LEFT JOIN add_ons ON add_ons.add_on_id = carts.add_ons_id
                LEFT JOIN discounts ON discounts.discount_id = transactions.discount_id
                WHERE transactions.transaction_id = :transaction_id", [
                "transaction_id" => $transaction_id,
            ])->get();

        // available rider query

        // preview transactions
        $previousTransactions = $db->query("SELECT * FROM transactions WHERE user_id = :user_id ORDER BY transaction_id DESC", [
            "user_id" => $transactions[0]['user_id'],
        ])->get();


        view('admin/transaction/pending-show.view.php', [
            'transactions' => $transactions,
            'previousTransactions' => $previousTransactions,
        ]);
    }


    /**
     * Use for updating status of a transaction (Approved or Rejected)
     */
    public function update()
    {

        $db = new Database;
        $db->iniDB();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $current_date = date("Y-m-d H:i:s");

            $updatedStatus = $db->query("UPDATE transactions SET status = :status, confirmed_at = :confirmed_at WHERE transaction_id = :transaction_id", [
                "status" => $_POST['status'],
                "transaction_id" => $_POST['transaction-id'],
                "confirmed_at" => $current_date,
            ]);

            if ($updatedStatus) {
                redirect("transaction-pending-show-admin?id={$_POST['transaction-id']}");
            }
        }
    }


    public function delete()
    {
        $db = new Database;
        $db->iniDB();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $archivedOrders = $db->query("DELETE FROM orders WHERE transaction_id = :transaction_id", [
                "transaction_id" => $_POST['transaction-id'],
            ]);

            $archivedTransaction = $db->query("DELETE FROM transactions WHERE transaction_id = :transaction_id", [
                "transaction_id" => $_POST['transaction-id'],
            ]);

            if ($archivedTransaction || $archivedOrders) {
                redirect('transaction-table-admin');
            }
        }
    }
}
