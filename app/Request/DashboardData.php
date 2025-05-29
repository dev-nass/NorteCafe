<?php

/**
 * NOT USED ANYMORE
*/

namespace App\Request;

use Core\Database;

require '../../Core/Database.php';

header('Content-Type: application/json');

$period = isset($_GET['period']) ? $_GET['preriod'] : 'weekly';

$db = new Database;
$db->iniDB();

$transactions;

switch ($period) {
    // annual
    case 'annual':
        $transactions =
            $db->query("SELECT YEAR(created_at) as sale_date, SUM(amount_due) as total_sales 
                FROM transactions 
                GROUP BY YEAR(created_at) 
                ORDER BY sale_date ASC")->get();
        break;
    // monthly
    case 'monthly':
        $transactions =
            $db->query("SELECT DATE_FORMAT(created_at, '%Y-%m') as sale_date, SUM(amount_due) as total_sales 
                FROM transactions 
                WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH)
                GROUP BY DATE_FORMAT(created_at, '%Y-%m') 
                ORDER BY sale_date ASC")->get();
        break;
    // weekly
    case 'weekly' :
        $transactions =
            $db->query('SELECT DATE(created_at) as sale_date, SUM(amount_due) as total_sales 
                FROM transactions 
                GROUP BY DATE(created_at)
                ORDER BY sale_date ASC')->get();
        break;
    default : 
        $transactions =
            $db->query("SELECT HOUR(created_at) as sale_hour, SUM(amount_due) as total_sales 
                FROM transactions 
                WHERE DATE(created_at) = CURDATE()
                GROUP BY HOUR(created_at) 
                ORDER BY sale_hour ASC;")->get();
        break;
}

echo json_encode($transactions);
