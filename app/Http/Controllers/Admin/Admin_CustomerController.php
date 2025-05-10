<?php

namespace App\Http\Controllers\Admin;

use Core\Database;
use Core\Controller;
use Core\Session;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Cart;
use App\Models\UserArchive;

class Admin_CustomerController extends Controller
{

    /**
     * Loads the table view of
     * Customer Records
     * 
     * Status: Active
    */
    public function index()
    {

        $db = new Database;
        $db->iniDB();

        $customers = $db->query("SELECT user_id, CONCAT(first_name, ' ', last_name) AS customer_name, username, email, contact_number, age, date_of_birth, CONCAT(users.house_number, ', ', users.street, ', ', users.barangay, ', ', users.city, ', ', users.province, ', ', users.region, ', ', users.postal_code) AS address, gender FROM users WHERE role = :role AND status = :status", [
            "role" => "Customer",
            "status" => 1,
        ])->get();

        return $this->view('Admin/customer/index.view.php', [
            'title' => 'Customers Table',
            "customers" => $customers
        ]);
    }

    /**
     * Loads the table view of
     * Customer Records
     * 
     * Status: Archived
    */
    public function index_archived()
    {

        $db = new Database;
        $db->iniDB();

        $customers = $db->query("SELECT user_id, CONCAT(first_name, ' ', last_name) AS customer_name, username, email, contact_number, age, date_of_birth, CONCAT(users.house_number, ', ', users.street, ', ', users.barangay, ', ', users.city, ', ', users.province, ', ', users.region, ', ', users.postal_code) AS address, gender FROM users WHERE role = :role AND status = :status", [
            "role" => "Customer",
            "status" => 0,
        ])->get();

        return $this->view('Admin/customer/index-archived.view.php', [
            'title' => 'Customers Archived Table',
            "customers" => $customers
        ]);
    }

    /**
     * Used for showing specific user
    */
    public function show()
    {

        $customer_id = $_GET['customer_id'];

        // User details
        $userObj = new User;
        $user = $userObj->findUserOr([
            "user_id" =>  $customer_id
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
            'title' => "Customer Show {$customer_id}",
            "user" => $user,
            "cart_count" => $cartCount,
            "transaction_count" => $transactionCount,
            "previousTransactions" => $previousTransactions,
        ]);
    }

    public function create() {}

    public function store() {}

    public function update() {}

    /**
     * Archive the user
    */
    public function delete() 
    {

        $data = [
            'user_id' => $this->getInput('user_id'),
        ];

        $current_date = date("Y-m-d H:i:s"); // for updated_at
        $userObj = new User;
        $archived_user = $userObj->update($data['user_id'], [
            "status" => 0,
            "updated_at" => $current_date,
        ]);

        if ($archived_user) {
            Session::set('__flash', 'account_deleted', 'Deleted successfully');
            return $this->redirect('customer-archived-table-admin');
        }
    }
}
