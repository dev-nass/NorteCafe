<?php

namespace App\Http\Controllers\Admin;

use Core\Database;
use Core\Controller;
use Core\Mailer;
use Core\Session;
use App\Models\Transaction;
use App\Models\User;

class Admin_TransactionController extends Controller
{


    /**
     * Used for loading the transactions table
     */
    public function index()
    {
        $db = new Database;
        $db->iniDB();

        $transactions = $db
            ->query("SELECT transactions.transaction_id, CONCAT(users.first_name, ' ', users.last_name) as customer_detail, CONCAT(riders.first_name, ' ', riders.last_name) as rider_detail, transactions.created_at, transactions.payment_method, transactions.amount_due, transactions.amount_tendered, transactions.change, transactions.status
                FROM transactions
                LEFT JOIN users AS users ON transactions.user_id = users.user_id
                LEFT JOIN users AS riders ON transactions.rider_id = riders.user_id")
            ->get();


        return $this->view('admin/transaction/index.view.php', [
            'title' => 'Transactions Table',
            "transactions" => $transactions,
        ]);
    }

    /**
     * Used for loading the view of the transactions queue;
     * the file within folder 'Request' is responsible for the data and AJAX call
     */
    public function pending_queue()
    {

        $transactionObj = new Transaction;
        $transactionObj->iniDB();

        // query added for reject all
        $pending_transactions = $transactionObj->query("SELECT transactions.*, CONCAT(users.first_name, ' ', users.last_name) AS fulllname, users.username, users.email, users.contact_number
        FROM transactions
        INNER JOIN users ON transactions.user_id = users.user_id
        WHERE transactions.status = :pending OR transactions.status = :rejected_rider
        ORDER BY transactions.transaction_id DESC;", [
            "pending" => "Pending",
            "rejected_rider" => "Rejected by Rider"
        ])->get();

        return $this->view('admin/transaction/pending-queue.view.php', [
            'title' => 'Transaction Queue',
            'pending_transactions' => $pending_transactions
        ]);
    }

    /**
     * API for fetching pending transactions
    */
    public function fetch_pending()
    {

        $db = new Database;
        $db->iniDB();

        $orders =
            $db->query("SELECT transactions.*, CONCAT(users.first_name, ' ', users.last_name) AS fulllname, users.username, users.email, users.contact_number
        FROM transactions
        INNER JOIN users ON transactions.user_id = users.user_id
        WHERE transactions.status = :pending OR transactions.status = :rejected_rider
        ORDER BY transactions.transaction_id DESC;", [
                "pending" => "Pending",
                "rejected_rider" => "Rejected by Rider"
            ])->get();

        $reponse = [
            "orders" => $orders,
        ];

        echo json_encode($reponse);
    }

    /**
     * Used for loading the view of the transaction with cancellation status;
     * API used for the AJAX request is at the buttom
     */
    public function cancellation_queue()
    {

        $transactionObj = new Transaction;
        $transactionObj->iniDB();

        // added for approve all
        $cancellation_transactions = $transactionObj->query("SELECT transactions.*, CONCAT(users.first_name, ' ', users.last_name) AS fulllname, users.username, users.email, users.contact_number
        FROM transactions
        INNER JOIN users ON transactions.user_id = users.user_id
        WHERE transactions.status = :cancellation
        ORDER BY transactions.transaction_id DESC;", [
            "cancellation" => "Cancellation",
        ])->get();

        return $this->view('admin/transaction/cancellation-queue.view.php', [
            'title' => 'Transaction Cancellation Queue',
            'cancellation_transactions' => $cancellation_transactions
        ]);
    }

    /**
     * Used for loading/showing resouce on
     * Admin/transaction/show.view.php
     */
    public function show()
    {

        $transaction_id = $_GET['transaction_id'];

        $transactionObj = new Transaction;
        $transactions = $transactionObj->getOrdersTransaction($transaction_id);
        $previousTransactions = $transactionObj->getPreviousTransactions($transactions[0]['user_id'], "DESC");


        return $this->view('admin/transaction/show.view.php', [
            'title' => "Transaction Show {$transaction_id}",
            'transactions' => $transactions,
            'previousTransactions' => $previousTransactions,
        ]);
    }

    /**
     * Used for loading/showing resource on 
     * Admin/transaction/pending-show.view.php
     * 
     * Transaction Status: Pending
     */
    public function pending_show()
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
        $availableRiders = $db->query("SELECT users.user_id, CONCAT(users.first_name, ' ', users.last_name) AS fullname, users.username, users.email, users.contact_number, CONCAT(users.house_number, ', ', users.street, ', ', users.barangay, ', ', users.city, ', ', users.province, ', ', users.region, ', ', users.postal_code) AS address, users.available
            FROM users 
            WHERE role = :role AND available = :available", [
            "role" => "Rider",
            "available" => 1,
        ])->get();

        return $this->view('admin/transaction/pending-show.view.php', [
            'title' => "Pending Transaction Show {$transaction_id}",
            'transactions' => $transactions,
            'previousTransactions' => $previousTransactions,
            'availableRiders' => $availableRiders,
        ]);
    }

    /**
     * Used for loading/showing resources on
     * Admin/transaction/cancellation-show.view.php
     */
    public function cancellation_show()
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
        $availableRiders = $db->query("SELECT users.user_id, CONCAT(users.first_name, ' ', users.last_name) AS fullname, users.username, users.email, users.contact_number, CONCAT(users.house_number, ', ', users.street, ', ', users.barangay, ', ', users.city, ', ', users.province, ', ', users.region, ', ', users.postal_code) AS address, users.available
            FROM users 
            WHERE role = :role AND available = :available", [
            "role" => "Rider",
            "available" => 1,
        ])->get();

        return $this->view('admin/transaction/cancellation-show.view.php', [
            'title' => "Pending Transaction Show {$transaction_id}",
            'transactions' => $transactions,
            'previousTransactions' => $previousTransactions,
            'availableRiders' => $availableRiders,
        ]);
    }

    public function create() {}

    public function store() {}


    /**
     * Use for updating status of a transaction (Approved or Rejected)
     */
    public function update()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // gets the current employee
            $employee = Session::get('__currentUser', 'credentials');

            $data = [
                'status' => $this->getInput('status'),
                'transaction_id' => $this->getInput('transaction-id'),
                'reason' => $this->getInput('cancel-reason'),
            ];


            $transactionObj = new Transaction;
            $current_date = date("Y-m-d H:i:s");
            $updatedStatus = $transactionObj->update($data['transaction_id'], [
                "status" => $data["status"] . ' ' . $employee['last_name'],
                "confirmed_at" => $current_date,
            ]);

            // if rejected, we send customer an email of explanation
            if ($data['status'] === 'Rejected by Employee') {
                $userObj = new User;
                $transaction = $transactionObj->firstWhere(['transaction_id' => $data['transaction_id']]);
                $customer = $userObj->findUserOr(['user_id' => $transaction['user_id']]);

                $mail = new Mailer;
                $mail->contactThem('Norte Cafe', 'nortecafe7@gmail.com', $customer['email'], 'Cancellation', $data['reason']);

                Session::set('__flash', 'rejected', $data['status']);
                return $this->redirect("transaction-show-admin?transaction_id={$data['transaction_id']}");
            }

            if ($updatedStatus) {
                Session::set('__flash', 'status_changed', $data['status']);
                return $this->redirect("transaction-pending-show-admin?id={$data['transaction_id']}");
            }
        }
    }

    /**
     * Used for updating status of tranasction (Cancellation)
     * if Approved changed to Cancelled
     * .. ... Rejected to Pending
     */
    public function cancellation_update()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                'status' => $this->getInput('status'),
                'transaction_id' => $this->getInput('transaction-id')
            ];

            $transactionObj = new Transaction;
            $current_date = date("Y-m-d H:i:s");
            $updatedStatus = $transactionObj->update($data['transaction_id'], [
                "status" => $data["status"],
                "confirmed_at" => $current_date,
            ]);

            if ($updatedStatus) {

                if ($data['status'] === 'Cancelled') {
                    Session::set('__flash', 'cancellation', $data['status']);
                    return $this->redirect("transaction-show-admin?transaction_id={$data['transaction_id']}");
                }

                Session::set('__flash', 'status_changed', $data['status']);
                return $this->redirect("transaction-pending-show-admin?id={$data['transaction_id']}");
            }
        }
    }

    /**
     * Used for rejecting all transactions on queue
     */
    public function reject_all()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // gets the current employee
            $employee = Session::get('__currentUser', 'credentials');

            $data = [
                'status' => $this->getInput('status'),
                'transaction_ids' => $this->getInput('transaction-ids'),
                'user_ids' => $this->getInput('user-ids'),
                'cancellation_reason' => $this->getInput('cancel-reason'),
            ];

            $transactionObj = new Transaction;
            $current_date = date("Y-m-d H:i:s");
            foreach ($data['transaction_ids'] as $id) {
                $updatedStatus = $transactionObj->update($id, [
                    "status" => $data["status"] . ' ' . $employee['last_name'],
                    "confirmed_at" => $current_date,
                ]);
            }

            // sends gmail to every customer who's transaction is caught up on "Reject All"
            $userObj = new User;
            $mail = new Mailer;
            foreach ($data['user_ids'] as $id) {
                $customer = $userObj->findUserOr(['user_id' => $id]);
                $mail->contactThem('Norte Cafe', 'nortecafe7@gmail.com', $customer['email'], 'Cancellation', $data['cancellation_reason']);
            }

            if ($updatedStatus) {
                Session::set('__flash', 'reject_all', 'Successfully rejected all');
                return $this->redirect("transaction-queue-admin");
            }
        }
    }

    /**
     * Used for approving all cancellation records
     */
    public function approve_all()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                'status' => $this->getInput('status'),
                'transaction_ids' => $this->getInput('transaction-ids'),
            ];

            $transactionObj = new Transaction;
            $current_date = date("Y-m-d H:i:s");
            foreach ($data['transaction_ids'] as $id) {
                $updatedStatus = $transactionObj->update($id, [
                    "status" => $data["status"],
                    "confirmed_at" => $current_date,
                ]);
            }

            if ($updatedStatus) {
                Session::set('__flash', 'approved_all', 'Successfully approved all');
                return $this->redirect("transaction-cancellation-queue-admin");
            }
        }
    }

    /**
     * Used for assigning a rider to
     * a transaction
     */
    public function assign()
    {

        $db = new Database;
        $db->iniDB();

        if ($_SERVER['REQUEST_METHOD'] === "POST") {

            // gets the current employee
            $employee = Session::get('__currentUser', 'credentials');

            $transactionObj = new Transaction;
            $assignedRider = $transactionObj->update($_POST['transaction_id'], [
                "rider_id" => $_POST['rider_id'],
                "status" => "Approved by Employee {$employee['last_name']}",
            ]);

            if ($assignedRider) {
                Session::set('__flash', 'rider_assigned', 'Approved by Employee');
                return $this->redirect("transaction-show-admin?transaction_id={$_POST['transaction_id']}");
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
                Session::set('__flash', 'archived', 'Transaction archived');
                return $this->redirect('transaction-table-admin');
            }
        }
    }


    /**
     * API CALLS
     */
    public function get_cancellation()
    {

        $db = new Database;
        $db->iniDB();

        $orders =
            $db->query("SELECT transactions.*, CONCAT(users.first_name, ' ', users.last_name) AS fulllname, users.username, users.email, users.contact_number
        FROM transactions
        INNER JOIN users ON transactions.user_id = users.user_id
        WHERE transactions.status = :cancellation
        ORDER BY transactions.transaction_id DESC;", [
                "cancellation" => "Cancellation"
            ])->get();

        $reponse = [
            "orders" => $orders,
        ];

        echo json_encode($reponse);
    }
}
