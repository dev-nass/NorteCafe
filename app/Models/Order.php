<?php

namespace App\Models;

use Core\Database;
use Core\Model;

class Order extends Model
{

    protected $table = "orders";
    protected $user_id;
    protected $discount_id;
    protected $amount_due; // for transaction table
    protected $status = "Pending";
    protected $total_price = []; // for order table, array bcz each order record has different total_price due to quantity
    protected $cart_items = [];
    protected $location;
    protected $payment_method;
    protected $proof_of_payment = []; // will contains all element passed by $_FILES


    public function setAttributes($user_id, $discount_id, $amount_due, $total_price = [], $cart_items = [], $location, $payment_method, $proof_of_payment = [])
    {
        $this->user_id = $user_id;
        $this->discount_id = $discount_id !== "" ? $discount_id : NULL;
        $this->amount_due = $amount_due;
        $this->total_price = $total_price;
        $this->cart_items = $cart_items;
        $this->location = $location;
        $this->payment_method = $payment_method;
        $this->proof_of_payment = $proof_of_payment !== "" ? $proof_of_payment : NULL;
    }


    /**
     * Used for placing the order
     */
    public function placeOrder()
    {
        $transaction = new Transaction;
        $lastInsertedRecord = $transaction->insert([
            "user_id" => $this->user_id,
            "discount_id" => $this->discount_id,
            "amount_due" => $this->amount_due,
            "status" => $this->status,
            "location" => $this->location,
            "payment_method" => $this->payment_method,
            "payment_proof_dir" => isset($this->proof_of_payment['error']) && $this->proof_of_payment['error'] === 0
                ? "../../storage/backend/img/proof_of_payment/" . $this->proof_of_payment['name']
                : NULL,
        ]);

        // We are passing uploading the proof of payment to its directory
        if ($this->proof_of_payment !== NULL) {
            $this->uploadFile($this->proof_of_payment);
        }

        $cart = new Cart;

        if ($lastInsertedRecord) {
            foreach ($this->cart_items as $index => $cart_id) {
                $total_price = $this->total_price[$index];
                $this->insert([
                    "transaction_id" => $lastInsertedRecord['transaction_id'],
                    "cart_id" => $cart_id,
                    "total_price" => $total_price,
                ]);

                $cart->update($cart_id, [
                    "order_placed" => true,
                ]);
            }
        }
    }

    /**
     * Will be used for moving the uploaded proof of payment
     * to our desired directory
     */
    public function uploadFile($file)
    {
        $target_dir = BASE_PATH . "storage/backend/img/proof_of_payment/";
        $target_path = $target_dir . basename($file['name']);

        // Ensure the directory exists
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        if (move_uploaded_file($file['tmp_name'], $target_path)) {
            return $target_path;
        }

        return false;
    }
}
