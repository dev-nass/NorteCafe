<?php

namespace App\Request;

use Core\Database;

require '../../Core/Database.php';

$db = new Database;
$db->iniDB();

$orders = 
    $db->query("SELECT transactions.*, CONCAT(users.first_name, ' ', users.last_name) AS fulllname, users.username, users.email, users.contact_number
        FROM transactions
        INNER JOIN users ON transactions.user_id = users.user_id
        WHERE transactions.status = :pending OR transactions.status = :rejected_rider
        ORDER BY transactions.transaction_id DESC;", [
        "pending" => "Pending",
        "rejected_rider" => "Rejected by Rider"
        ])->get();

$reponse = [
    "orders" => $orders,
];

echo json_encode($reponse);
