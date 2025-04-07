<?php

namespace App\Models;

class GCASHPayment implements PaymentMethod
{

    protected $status;
    protected $amountDue;
    protected $proofOfPayment; // $_FILES super global will be passed here

    public function __construct($amountDue, $proofOfPayment) {
        $this->status = "Pending";
        $this->amountDue = $amountDue;
        $this->proofOfPayment = $proofOfPayment;
    }

    public function processPayment($amountDue){
        if($this->proofOfPayment && $this->proofOfPayment['error'] === 0) {
            $uploadResult = $this->uploadFile($this->proofOfPayment);

            if($uploadResult) {
                return "GCash payment of {$this->amountDue} submitted for verification.";
            }

            return false;
        }

        return false;
    }

    public function getPaymentDetails() {
        return [
            "status" => $this->status,
            "payment_method" => "GCASH",
            "payment_proof" => $this->proofOfPayment, // no need for delivery proof
        ];
    }

    /**
     * Will be used for moving the uploaded proof of payment
     * to our desired directory
     */
    private function uploadFile($file)
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

        dd('alaws na ups');
    }
}