<?php

namespace App\Models;

use Core\Database;

class Order
{

    public function getPendingOrders()
    {

        $db = new Database;
        $db->iniDB();

        $orders = $db->query("SELECT * FROM transactions WHERE status = :status", [
            "status" => "pending"
        ])->get();

        return $orders;
    }
}
