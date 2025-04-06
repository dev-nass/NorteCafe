<?php

namespace App\Http\Controllers;

use Core\Database;
use App\Models\Transaction;

class TransactionController
{

    /**
     * Used for fetching current transaction ('Pending', 'Approved')
     */
    public function currentTransactions()
    {

        $currentUserId = $_SESSION['__currentUser']['credentials']['user_id'];
        // $transactionObj = new Transaction;
        // $currentTransactions = $transactionObj->findAllWhere([
        //     "user_id" => $currentUserId,
        //     "status" => "Pending"
        // ]);

        $db = new Database;
        $db->iniDB();

        $currentTransactions = $db->query(
            "SELECT transactions.*, users.user_id, CONCAT(users.house_number, ', ', users.street, ', ', users.barangay, ', ', users.city, ', ', users.provience, ', ', users.region, ', ', users.postal_code) AS address, users.username, users.email, users.contact_number
                FROM transactions
                LEFT JOIN users AS users ON users.user_id = transactions.user_id
                WHERE transactions.user_id = :user_id AND (transactions.status = :pending_status OR transactions.status = :approved_status)",
            [
                "user_id" => $currentUserId,
                "pending_status" => "Pending",
                "approved_status" => "Approved",
            ]
        )->get();

        view('Customer/transaction/current-index.view.php', [
            "currentTransactions" => $currentTransactions,
        ]);
    }


    /**
     * Used for fetching previous order ('Rejected', 'Cancelled', 'Delivered')
     */
    public function previousTransactions()
    {

        $db = new Database;
        $db->iniDB();

        $currentUserId = $_SESSION['__currentUser']['credentials']['user_id'];

        $previousTransactions = $db->query(
            "SELECT transactions.*, users.user_id, CONCAT(users.house_number, ', ', users.street, ', ', users.barangay, ', ', users.city, ', ', users.provience, ', ', users.region, ', ', users.postal_code) AS address, users.username, users.email, users.contact_number
                FROM transactions
                LEFT JOIN users AS users ON users.user_id = transactions.user_id
                WHERE transactions.user_id = :user_id AND (transactions.status = :rejected_status OR transactions.status = :cancelled_status OR transactions.status = :delivered_status)",
            [
                "user_id" => $currentUserId,
                "rejected_status" => "Rejected",
                "cancelled_status" => "Cancelled",
                "delivered_status" => "Delivered",
            ]
        )->get();

        view('Customer/transaction/previous-index.view.php', [
            "previousTransactions" => $previousTransactions,
        ]);
    }



    public function show()
    {

        $db = new Database;
        $db->iniDB();

        $transaction_id = $_GET['id'];

        $transactions =
            $db->query("SELECT transactions.*, 
                users.user_id, CONCAT(users.first_name, ' ', users.last_name) AS fullname, users.username, users.email, users.contact_number, CONCAT(users.house_number, ', ', users.street, ', ', users.barangay, ', ', users.city, ', ', users.provience, ', ', users.region, ', ', users.postal_code) AS address,
                riders.user_id, CONCAT(riders.first_name, ' ', riders.last_name) as rider_name, riders.contact_number,
                orders.order_id, orders.transaction_id, orders.cart_id, orders.total_price, 
                carts.*, 
                menu_items.menu_item_id, menu_items.name as menu_item_name, menu_items.category, menu_items.image_dir, 
                menu_item_sizes.menu_item_size_id, menu_item_sizes.menu_item_id, menu_item_sizes.size, menu_item_sizes.price as menu_item_size_price, 
                add_ons.add_on_id, add_ons.name as add_on_name, add_ons.price as add_on_price
                FROM transactions
                LEFT JOIN users AS users ON users.user_id = transactions.user_id
                LEFT JOIN users AS riders ON riders.user_id = transactions.rider_id
                LEFT JOIN orders ON orders.transaction_id = transactions.transaction_id
                LEFT JOIN carts ON carts.cart_id = orders.cart_id
                LEFT JOIN menu_items ON menu_items.menu_item_id = carts.menu_item_id
                LEFT JOIN menu_item_sizes ON menu_item_sizes.menu_item_size_id = carts.menu_item_size_id
                LEFT JOIN add_ons ON add_ons.add_on_id = carts.add_ons_id
                WHERE transactions.transaction_id = :transaction_id", [
                "transaction_id" => $transaction_id,
            ])->get();

        $previousTransactions = $db->query("SELECT * FROM transactions WHERE user_id = :user_id AND (transactions.status = :rejected_status OR transactions.status = :cancelled_status OR transactions.status = :delivered_status) ORDER BY transaction_id DESC", [
            "user_id" => $transactions[0]['user_id'],
            "rejected_status" => "Rejected",
            "cancelled_status" => "Cancelled",
            "delivered_status" => "Delivered",
        ])->get();


        view('Customer/transaction/show.view.php', [
            'transactions' => $transactions,
            'previousTransactions' => $previousTransactions,
        ]);
    }


    public function update()
    {

        $db = new Database;
        $db->iniDB();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $current_date = date("Y-m-d H:i:s");

            $updatedStatus = $db->query("UPDATE transactions SET status = :status WHERE transaction_id = :transaction_id", [
                "status" => $_POST['status'],
                "transaction_id" => $_POST['transaction-id'],
            ]);

            if ($updatedStatus) {
                redirect("transaction-show?id={$_POST['transaction-id']}");
            }
        }
    }
}
