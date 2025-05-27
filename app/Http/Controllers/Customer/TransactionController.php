<?php

namespace App\Http\Controllers\Customer;

use Core\Controller;
use Core\Database;
use Core\Session;
use Core\Mailer;
use App\Models\Transaction;

class TransactionController extends Controller
{

    public function index() {}
    public function create() {}
    public function store() {}
    public function delete() {}

    /**
     * Used for showing current transactions
     * status: (Pending, Approved by Employee, Approved by Rider, Rejected by Rider, In Transit)

     */
    public function currentTransactions()
    {

        $currentUserId = $_SESSION['__currentUser']['credentials']['user_id'];

        $transactionObj = new Transaction;
        $currentTransactions = $transactionObj->getCurrentTransactions($currentUserId);

        return $this->view('Customer/transaction/current-index.view.php', [
            "title" => "Current Transactions",
            "currentTransactions" => $currentTransactions,
        ]);
    }


    /**
     * Used for showing previous transactions
     * status: ('Rejected', 'Cancelled', 'Delivered', 'Failed Delivery')
     */
    public function previousTransactions()
    {

        $currentUserId = $_SESSION['__currentUser']['credentials']['user_id'];

        $transactionObj = new Transaction;
        $previousTransactions = $transactionObj->getPreviousTransactions($currentUserId);

        return $this->view('Customer/transaction/previous-index.view.php', [
            "title" => "Previous Transactions",
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
        $transactions = $transactionObj->getOrdersTransaction($transaction_id);
        $previousTransactions = $transactionObj->getPreviousTransactions($transactions[0]['user_id'], "DESC");

        return $this->view('Customer/transaction/show.view.php', [
            'title' => "Show Transaction",
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

            // Added for email sending
            $sender_name = $_SESSION['__currentUser']['credentials']['first_name'] .  $_SESSION['__currentUser']['credentials']['last_name'];
            $sender_email =  $_SESSION['__currentUser']['credentials']['email'];

            // dd($_POST);
            $data = [
                "transaction_id" => $this->getInput("transaction-id"),
                "status" => $this->getInput("status"),
                "cancellation-reason" => $this->getInput("cancel-reason"),
            ];

            $mail = new Mailer;
            $subject =
                "Customer {$sender_email} sent a cancellation request for their transaction with ID of {$data['transaction_id']} \n
                Cancellation Reason: \n
                {$data['cancellation-reason']}";
            $mailsent = $mail->contactUs($sender_name, $sender_email, 'Cancellation', $subject);

            if (! $mailsent) {
                Session::set('__flash', 'cancellation', 'Email not sent');
                return $this->redirect("transaction-show?id={$_POST['transaction-id']}");
            }

            $transactionObj = new Transaction;
            $updatedStatus = $transactionObj->update($data["transaction_id"], [
                "status" => $data["status"]
            ]);

            if ($updatedStatus) {
                Session::set('__flash', 'cancellation', 'Email sent');
                return $this->redirect("transaction-show?id={$_POST['transaction-id']}");
            }
        }
    }
}
