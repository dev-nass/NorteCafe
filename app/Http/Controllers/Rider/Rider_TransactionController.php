<?php

namespace App\Http\Controllers\Rider;

use Core\Controller;
use Core\Database;
use Core\Session;
use App\Models\Transaction;

class Rider_TransactionController extends Controller
{

    public function index() {}

    /**
     * Used for loading the view for 
     * Rider Assigned Trans. Queue
     */
    public function queue()
    {

        $transactionObj = new Transaction;
        $transactionObj->iniDB();

        $assigned_transactions = $transactionObj->query("SELECT transactions.*, CONCAT(users.first_name, ' ', users.last_name) AS fulllname, users.username, users.email, users.contact_number
        FROM transactions
        INNER JOIN users ON transactions.user_id = users.user_id
        WHERE transactions.status = :approved AND transactions.rider_id = :rider_id
        ORDER BY transactions.transaction_id DESC;", [
            "approved" => "Approved by Employee",
            "rider_id" => $_SESSION['__currentUser']['credentials']['user_id']
        ])->get();

        return $this->view('Rider/transaction/assigned-transaction-queue.view.php', [
            'title' => 'Assigned Transactions Queue',
            'assigned_transactions' => $assigned_transactions,
        ]);
    }

    /**
     * API Fetch the assigned Transaction
     * to the currently signed-in Rider
     */
    public function assignedTrans()
    {

        if ($_SESSION['__currentUser']['credentials']['role'] !== 'Rider') {
            return $this->redirect('403');
        }

        $db = new Database;
        $db->iniDB();

        $rider_id = $_SESSION['__currentUser']['credentials']['user_id'];

        $orders =
            $db->query("SELECT transactions.*, CONCAT(users.first_name, ' ', users.last_name) AS fulllname, users.username, users.email, users.contact_number
                FROM transactions
                INNER JOIN users ON transactions.user_id = users.user_id
                WHERE transactions.status = :approved AND transactions.rider_id = :rider_id
                ORDER BY transactions.transaction_id DESC;", [
                "approved" => "Approved by Employee",
                "rider_id" => $rider_id,
            ])->get();

        $reponse = [
            "orders" => $orders,
        ];

        echo json_encode($reponse);
    }

    /**
     * Show a specific assigned transaction
     * with status of "Approved by Employee"
     * and assigned to the current rider
     */
    public function assigned_show()
    {

        $transaction_id = $_GET['id'];

        // this variable will contain an array [] each one with repeating transacton_id but different col value next to it.
        // we use ->get() here instead of ->find() because each transactions can have multipe orders on them,
        // and each of those orders are rendered into their own row/records
        $transactionObj = new Transaction;
        $transactions = $transactionObj->getOrdersTransaction($transaction_id);
        $previousTransactions = $transactionObj->getPreviousTransactions($transactions[0]['user_id']);

        // available rider query
        $db = new Database;
        $db->iniDB();
        $availableRiders = $db->query("SELECT users.user_id, CONCAT(users.first_name, ' ', users.last_name) AS fullname, users.username, users.email, users.contact_number, CONCAT(users.house_number, ', ', users.street, ', ', users.barangay, ', ', users.city, ', ', users.provience, ', ', users.region, ', ', users.postal_code) AS address, users.available
            FROM users 
            WHERE role = :role AND available = :available", [
            "role" => "Rider",
            "available" => 1,
        ])->get();

        return $this->view('rider/transaction/assigned-show.view.php', [
            'title' => "Pending Transaction Show {$transaction_id}",
            'transactions' => $transactions,
            'previousTransactions' => $previousTransactions,
            'availableRiders' => $availableRiders,
        ]);
    }

    /**
     * Use for showing a transaction after it has been
     * accepted by the Rider &
     * Showing a specific transcation that they 'delivered'
    */
    public function show() 
    {
        
        $transaction_id = $_GET['transaction_id'];

        $transactionObj = new Transaction;
        $transactions = $transactionObj->getOrdersTransaction($transaction_id);
        $previousTransactions = $transactionObj->getPreviousTransactions($transactions[0]['user_id'], "DESC");


        return $this->view('rider/transaction/show.view.php', [
            'title' => "Transaction Show {$transaction_id}",
            'transactions' => $transactions,
            'previousTransactions' => $previousTransactions,
        ]);
    }

    public function create() {}

    public function store() {}

    /**
     * Used for approving an assigned transaction
    */
    public function update()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                'status' => $this->getInput('status'),
                'transaction_id' => $this->getInput('transaction-id')
            ];

            $transactionObj = new Transaction;
            $updatedStatus = $transactionObj->update($data['transaction_id'], [
                "status" => $data["status"],
            ]);

            if ($updatedStatus) {
                Session::set('__flash', 'rider_approved', 'approved successfully');
                return $this->redirect("transaction-show-rider?transaction_id={$data['transaction_id']}");
            }
        }
    }

    /**
     * Used for rejecting all transactions on queue
    */
    public function reject_all()
    {
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                'status' => $this->getInput('status'),
                'transaction_ids' => $this->getInput('transaction-ids')
            ];

            $transactionObj = new Transaction;
            foreach($data['transaction_ids'] as $id) {
                $updatedStatus = $transactionObj->update($id, [
                    "status" => $data["status"],
                ]);
            }
            
            if ($updatedStatus) {
                Session::set('__flash', 'reject_all', 'Successfully rejected all');
                return $this->redirect("assigned-transaction-queue-rider");
            }
        }
    }

    public function delete() {}
}
