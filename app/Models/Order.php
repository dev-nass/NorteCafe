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


    public function __construct($user_id, $discount_id, $amount_due, $total_price = [], $cart_items = [])
    {
        $this->user_id = $user_id;
        $this->discount_id = $discount_id !== "" ? $discount_id : NULL;
        $this->amount_due = $amount_due;
        $this->total_price = $total_price;
        $this->cart_items = $cart_items;
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
        ]);
        
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
