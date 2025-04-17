<?php

namespace App\Http\Controllers\Customer;

use App\Models\CODPayment;
use Core\Database;
use Core\Session;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\Cart;
use App\Models\GCASHPayment;

class OrderController
{

    /**
     * Will trigger everytime 'place order' button is clicked
     */
    public function store()
    {

        $db = new Database; 
        $db->iniDB();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
            $order = new Order;

            $paymentMethodObj = null;

            if($_POST['payment_method'] === "COD") {
                $paymentMethodObj = new CODPayment($_POST['amount_due']);
            } else if ($_POST['payment_method'] === "GCASH") {
                $paymentMethodObj = new GCASHPayment($_POST['amount_due'], $_FILES['proof_of_payment']);
            } else {
                dd("Invalid Payment Method selected");
            }

            $order->setAttributes(
                $_SESSION['__currentUser']['credentials']['user_id'],
                $_POST['discount_id'],
                $_POST['amount_due'],
                $_POST['total_price'],
                $_POST['cart_item'],
                $_POST['location'],
                $paymentMethodObj,
                $_FILES['proof_of_payment']
            );

            $order->placeOrder();

            // current user cart count (need here for navbar)
            $cartObj = new Cart;
            $cartObj->updateCartCount('user_id');

            redirect('cart');
        }
    }
}
