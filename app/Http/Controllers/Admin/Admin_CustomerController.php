<?php

namespace App\Http\Controllers\Admin;

use Core\Database;
use Core\Controller;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Cart;

class Admin_CustomerController extends Controller
{

    public function index() {}

    public function table()
    {

        $db = new Database;
        $db->iniDB();

        $customers = $db->query("SELECT user_id, CONCAT(first_name, ' ', last_name) AS customer_name, username, email, contact_number, age, date_of_birth, CONCAT(users.house_number, ', ', users.street, ', ', users.barangay, ', ', users.city, ', ', users.provience, ', ', users.region, ', ', users.postal_code) AS address, gender FROM users WHERE role = :role", [
            "role" => "Customer"
        ])->get();

        return $this->view('Admin/customer/table.view.php', [
            "customers" => $customers
        ]);
    }

    public function show()
    {

        $customer_id = $_GET['customer_id'];

        // User details
        $userObj = new User;
        $user = $userObj->findUserOr([
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

        // Transaction Count
        $transactionObj = new Transaction;
        $transactionCount = $transactionObj->countWhere('user_id',  [
            "user_id" => $customer_id
        ]);

        // Previous Transaction (regardless of the status)
        $transactionObj = new Transaction;
        $previousTransactions = $transactionObj->findAllWhere(["user_id" => $customer_id], 'DESC');


        return $this->view('Admin/customer/show.view.php', [
            "user" => $user,
            "cart_count" => $cartCount,
            "transaction_count" => $transactionCount,
            "previousTransactions" => $previousTransactions,
        ]);
    }

    public function create() {}

    public function store() {}

    public function update() {}

    public function delete() {}
}
