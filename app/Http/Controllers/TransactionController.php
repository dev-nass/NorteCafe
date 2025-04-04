<?php

namespace App\Http\Controllers;

use Core\Database;
use App\Models\Transaction;

class TransactionController
{

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
                WHERE transactions.user_id = :user_id AND (transactions.status = :pending_status OR transactions.status = :approved_status)", [
                    "user_id" => $currentUserId,
                    "pending_status" => "Pending",
                    "approved_status" => "Approved",
                ])->get();

        view('Customer/transactions/current-index.view.php', [
            "currentTransactions" => $currentTransactions,
        ]);
    }

    public function previousTransactions()
    {

        $db = new Database;
        $db->iniDB();

        $currentUserId = $_SESSION['__currentUser']['credentials']['user_id'];

        $previousTransactions = $db->query(
        "SELECT transactions.*, users.user_id, CONCAT(users.house_number, ', ', users.street, ', ', users.barangay, ', ', users.city, ', ', users.provience, ', ', users.region, ', ', users.postal_code) AS address, users.username, users.email, users.contact_number
                FROM transactions
                LEFT JOIN users AS users ON users.user_id = transactions.user_id
                WHERE transactions.user_id = :user_id AND (transactions.status = :rejected_status OR transactions.status = :cancelled_status OR transactions.status = :delivered_status)", [
                    "user_id" => $currentUserId,
                    "rejected_status" => "Rejected",
                    "cancelled_status" => "Cancelled",
                    "delivered_status" => "Delivered",
                ])->get();

        view('Customer/transactions/previous-index.view.php', [
            "previousTransactions" => $previousTransactions,
        ]);
    }
}