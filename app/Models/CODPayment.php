<?php

namespace App\Models;

class CODPayment implements PaymentMethod
{

    private $status;
    private $amountDue;

    public function __construct($amountDue) {
        $this->status = "Pending";
        $this->amountDue = $amountDue;
    }

    public function processPayment($amountDue) {
        return "COD payment confirmed for {$this->amountDue}. Awaiting delivery.";
    }

    public function getPaymentDetails() {
        return [
            "status" => $this->status,
            "payment_method" => "COD",
            "payment_proof" => NULL, // no need for delivery proof
        ];
    }
}
