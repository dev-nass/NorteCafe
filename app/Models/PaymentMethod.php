<?php

namespace App\Models;

interface PaymentMethod 
{
    public function processPayment($amountDue); // Process the payment and return the result
    public function getPaymentDetails(); // Return details passed
}