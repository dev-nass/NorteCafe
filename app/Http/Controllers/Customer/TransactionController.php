<?php

namespace App\Http\Controllers\Customer;

use Core\Controller;
use Core\Database;
use App\Models\Transaction;

class TransactionController extends Controller
{

    public function index() {}
    public function create() {}
    public function store() {}
    public function delete() {}

    /**
     * Used for showing current transactions
     * status: ('Pending', 'Approved')
     */
    public function currentTransactions()
    {

        $currentUserId = $_SESSION['__currentUser']['credentials']['user_id'];

        $transactionObj = new Transaction;
        $currentTransactions = $transactionObj->getCurrentTransactions($currentUserId);

        return $this->view('Customer/transaction/current-index.view.php', [
            "currentTransactions" => $currentTransactions,
        ]);
    }


    /**
     * Used for showing previous transactions
     * status: ('Rejected', 'Cancelled', 'Delivered')
     */
    public function previousTransactions()
    {

        $currentUserId = $_SESSION['__currentUser']['credentials']['user_id'];

        $transactionObj = new Transaction;
        $previousTransactions = $transactionObj->getPreviousTransactions($currentUserId);

        return $this->view('Customer/transaction/previous-index.view.php', [
            "previousTransactions" => $previousTransactions,
        ]);
    }


    /**
     * Loads a view contaning details about
     * a specific transactions
    */
    public function show()
    {

        $db = new Database;
        $db->iniDB();

        $transaction_id = $_GET['id'];

        $transactionObj = new Transaction;
        $transactions = $transactionObj->getUserTransactions($transaction_id);
        $previousTransactions = $transactionObj->getPreviousTransactions($transactions[0]['user_id'], "DESC");

        return $this->view('Customer/transaction/show.view.php', [
            'transactions' => $transactions,
            'previousTransactions' => $previousTransactions,
        ]);
    }


    /**
     * Will be trigger everytime the user
     * decides to `cancel` the transactions
    */
    public function update()
    {

        $db = new Database;
        $db->iniDB();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // USE THIS AFTER CONFIRMING THAT THE confimed_at should be change???
            $current_date = date("Y-m-d H:i:s");

            $data = [
                "transaction_id" => $this->getInput("transaction-id"),
                "status" => $this->getInput("status"),
            ];
            
            $transactionObj = new Transaction;
            $updatedStatus = $transactionObj->update($data["transaction_id"], [
                "status" => $data["status"]
            ]);

            if ($updatedStatus) {
                return $this->redirect("transaction-show?id={$_POST['transaction-id']}");
            }
        }
    }
}
