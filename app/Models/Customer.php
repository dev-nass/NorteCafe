<?php

namespace App\Models;

class Customer extends User
{

    protected $role = "Customer";

    /**
     * Gets the previews transactions of the currently
     * authenticated user
     */
    public function getTransactions()
    {

        $this->iniDB();

        if (! $_SESSION['__currentUser']) {
            return [];
        }

        $user_id = $_SESSION['__currentUser']['credentials']['user_id'];
        $sql = "SELECT * FROM transactions WHERE user_id = ?";

        $transactions = $this->query($sql, [$user_id])->get();

        return $transactions;
    }

    /**
     * Gets the carts of the current authenticated user,
     * Default is order_placed = false
     */
    public function getCarts($order_placed = 0)
    {
        $this->iniDB();

        if (! $_SESSION['__currentUser']) {
            return [];
        }

        $user_id = $_SESSION['__currentUser']['credentials']['user_id'];
        $sql = "SELECT * FROM carts WHERE user_id = ? AND order_placed = $order_placed";

        $carts = $this->query($sql, [$user_id])->get();

        return $carts;
    }
}
