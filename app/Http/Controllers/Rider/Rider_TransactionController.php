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
     * Rider/transaction/assigned-trans-queue.view.php
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
     * 
     *  ... or
     * 
     * Rider/transaction/assigned-show.view.php
     */
    public function assigned_show()
    {

        $transaction_id = $_GET['id'];

        // this variable will contain an array [] each one with repeating transacton_id but different col value next to it.
        // we use ->get() here instead of ->find() because each transactions can have multipe orders on them,
        // and each of those orders are rendered into their own row/records
        $transactionObj = new Transaction;
        $transactions = $transactionObj->getOrdersTransaction($transaction_id);

        return $this->view('rider/transaction/assigned-show.view.php', [
            'title' => "Pending Transaction Show {$transaction_id}",
            'transactions' => $transactions
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

        return $this->view('rider/transaction/show.view.php', [
            'title' => "Transaction Show {$transaction_id}",
            'transactions' => $transactions,
        ]);
    }

    public function create() {}

    public function store() {}

    /**
     * Used for approving and rejecting an assigned transaction
     */
    public function update()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                'status' => $this->getInput('status'),
                'transaction_id' => $this->getInput('transaction-id')
            ];

            $transactionObj = new Transaction;
            if ($data['status'] == 'Approved by Rider') {
                $updatedStatus = $transactionObj->update($data['transaction_id'], [
                    "status" => $data["status"],
                ]);
                Session::set('__flash', 'rider_changed_status', "{$data['status']} successfully");
            }


            if ($data['status'] == 'Rejected by Rider') {
                $updatedStatus = $transactionObj->update($data['transaction_id'], [
                    "rider_id" => null,
                    "status" => $data["status"],
                ]);
                Session::set('__flash', 'rider_changed_status', "{$data['status']} successfully");
            }

            if ($updatedStatus) {
                return $this->redirect("transaction-show-rider?transaction_id={$data['transaction_id']}");
            }
        }
    }

    /**
     * Used for rejecting all transactions on queue
     */
    public function reject_all()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                'status' => $this->getInput('status'),
                'transaction_ids' => $this->getInput('transaction-ids')
            ];

            $transactionObj = new Transaction;
            foreach ($data['transaction_ids'] as $id) {
                $updatedStatus = $transactionObj->update($id, [
                    "rider_id" => NULL,
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

    /**
     * Used for loading view to
     * Rider/tansaction/current-trans.view.php
     */
    public function current_queue()
    {

        $transObj = new Transaction;
        $transObj->iniDB();
        $current_transactions = $transObj->query("SELECT transactions.*, transactions.status as transaction_status, transactions.created_at AS trans_created_at, users.* 
            FROM transactions 
            LEFT JOIN users ON transactions.user_id = users.user_id
            WHERE transactions.rider_id = :rider_id AND transactions.status = :status", [
            "rider_id" => $_SESSION['__currentUser']['credentials']['user_id'],
            "status" => "Approved by Rider"
        ])->get();

        return $this->view('rider/transaction/current-transaction-queue.view.php', [
            'title' => 'Current Transactions Queue',
            'current_transactions' => $current_transactions,
        ]);
    }

    /**
     * Used for listening to submit form,
     * and calculate the change & take proof of delivery
     */
    public function calculateChange()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $delivery_proof = $_FILES['delivery_proof'];
            $data = [
                'transaction_id' => $this->getInput('transaction_id'),
                'amount_due' => $this->getInput('amount_due'),
                'amount_tendered' => number_format($this->getInput('amount_tendered'), '2', '.', ''),
            ];
            $current_date = date("Y-m-d H:i:s");


            if($data['amount_tendered'] < $data['amount_due']) {
                $errors['amount_tendered'] = ['Insufficient amount tendered'];
                $flashData = [
                    "old" => $data,
                    "errors" => $errors,
                ];
                Session::set('__flash', 'data', $flashData);
                return $this->redirect("transaction-show-rider?transaction_id={$data['transaction_id']}");
            }

            $change = $data['amount_tendered'] - $data['amount_due'];

            $transObj = new Transaction;
            $transObj->iniDB();
            $updateChange = $transObj->update($data['transaction_id'], [
                "amount_tendered" => number_format($data['amount_tendered'], '2', '.', ''),
                "`change`" => number_format($change, '2', '.', ''),
                "delivery_proof_dir" => "../../storage/backend/img/delivery_proof/" . $delivery_proof['name'],
                "status" => "Delivered",
                "delivered_at" => $current_date,
            ]);

            $transObj->uploadFile($delivery_proof);

            if($updateChange) {
                Session::set('__flash', 'transaction_delivered', 'Delivered Successfully');
                return $this->redirect("transaction-show-rider?transaction_id={$data['transaction_id']}");
            }
        }
    }

    /**
     * Used for showing the queue of the
     * delivered transactions
    */
    public function delivered_queue()
    {

        $transObj = new Transaction;
        $transObj->iniDB();
        $delivered_transactions = $transObj->query("SELECT transactions.*, transactions.created_at AS trans_created_at, users.* FROM transactions LEFT JOIN users ON transactions.user_id = users.user_id
            WHERE transactions.rider_id = :rider_id AND transactions.status = :status", [
            "rider_id" => $_SESSION['__currentUser']['credentials']['user_id'],
            "status" => "Delivered"
        ])->get();

        return $this->view('Rider/transaction/delivered-transaction-queue.view.php', [
            'title' => 'Delivered Transactions Queue',
            'delivered_transactions' => $delivered_transactions,
        ]);
    }
}
