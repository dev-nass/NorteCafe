<?php

namespace App\Http\Controllers\Admin;

use Core\Database;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Cart;

class Admin_CustomerController
{

    public function table()
    {

        $db = new Database;
        $db->iniDB();

        $customers = $db->query("SELECT user_id, CONCAT(first_name, ' ', last_name) AS customer_name, username, email, contact_number, age, date_of_birth, CONCAT(users.house_number, ', ', users.street, ', ', users.barangay, ', ', users.city, ', ', users.provience, ', ', users.region, ', ', users.postal_code) AS address, gender FROM users WHERE role = :role", [
            "role" => "Customer"
        ])->get();

        view('Admin/customer/table.view.php', [
            "customers" => $customers
        ]);
    }

    public function show()
    {

        $customer_id = $_GET['customer_id'];

        $userObj = new User;

        // User details
        $user = $userObj->findUser([
            "user_id" =>  $customer_id,
        ]);

        $db = new Database;
        $db->iniDB();

        // Cart Count
        $cartObj = new Cart;
        $cartCount = $cartObj->countWhere('user_id',  [
            "user_id" => $customer_id,
            "order_placed" => 0,
        ]);

        // dd($cartCount["COUNT(user_id)"]);

        // Transaction Count
        $transactionObj = new Transaction;
        $transactionCount = $transactionObj->countWhere('user_id',  [
            "user_id" => $customer_id
        ]);

        // Previous Transaction
        $previousTransactions = $db->query("SELECT * FROM transactions WHERE user_id = :user_id ORDER BY transaction_id DESC", [
            "user_id" => $customer_id,
        ])->get();

        view('Admin/customer/show.view.php', [
            "user" => $user,
            "cart_count" => $cartCount,
            "transaction_count" => $transactionCount,
            "previousTransactions" => $previousTransactions,
        ]);
    }
}