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
    protected $payment_method; // will now contian an instance of either CODPayment or GCASHPayment
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

        $payment_details = $this->payment_method->getPaymentDetails();

        $lastInsertedRecord = $transaction->insert([
            "user_id" => $this->user_id,
            "discount_id" => $this->discount_id,
            "amount_due" => $this->amount_due,
            "status" => $this->status,
            "location" => $this->location,
            "payment_method" => $payment_details['payment_method'],
            "payment_proof_dir" => isset($this->proof_of_payment['error']) && $this->proof_of_payment['error'] === 0
                ? "/uploads/backend/img/proof_of_payment/" . $this->proof_of_payment['name']
                : NULL,
        ]);

        if ($payment_details['payment_method'] === 'GCASH') {
            // Process the payment (uploads proof for GCash, no-op for COD)
            $this->payment_method->processPayment($this->amount_due);
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
}
