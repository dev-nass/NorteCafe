<?php

namespace App\Http\Controllers\Admin;

use Core\Database;
use Core\Controller;
use App\Models\Rider;

class Admin_AdminController
{

    /**
     * Loads the view for admin dashboard
     */
    public function index()
    {

        $db = new Database;
        $db->iniDB();

        $total_revenue =
            $db->query("SELECT SUM(amount_due) as total_sales 
                FROM transactions")->find();

        $total_transactions =
            $db->query("SELECT COUNT(*)
                FROM transactions")->find();

        $total_customers =
            $db->query("SELECT COUNT(*)
            FROM users WHERE role = 'Customer'")->find();

        $total_delivered =
            $db->query("SELECT COUNT(*)
                FROM transactions
                WHERE status = 'delivered'")->find();

        $total_rejected =
            $db->query("SELECT COUNT(*)
                FROM transactions
                WHERE status = 'Rejected by Employee'")->find();
            
        $riderObj = new Rider;
        $available_riders_count = $riderObj->countWhere('user_id', [
            'role' => 'Rider',
            'available' => true,
        ]);
        $available_riders = $riderObj->getUsersByRole();

        $top_sales_age = $db->query("SELECT COUNT(menu_items.menu_item_id) as sale_count, users.age, menu_items.name, menu_items.image_dir
            FROM transactions
            LEFT JOIN users ON transactions.user_id = users.user_id
            LEFT JOIN orders ON transactions.transaction_id = orders.transaction_id
            LEFT JOIN carts ON orders.cart_id = carts.cart_id
            LEFT JOIN menu_items ON carts.menu_item_id = menu_items.menu_item_id
            GROUP BY users.age, menu_items.name, menu_items.image_dir
            ORDER BY sale_count DESC
            LIMIT 10")->get();

        view('Admin/index.view.php', [
            'total_revenue' => $total_revenue['total_sales'],
            'total_transactions' => $total_transactions['COUNT(*)'],
            'total_customers' => $total_customers['COUNT(*)'],
            'total_delivered' => $total_delivered['COUNT(*)'],
            'total_rejected' => $total_rejected['COUNT(*)'],
            'available_riders_count' => $available_riders_count['COUNT(user_id)'],
            'available_riders' => $available_riders,
            'top_sales_age' => $top_sales_age,
        ]);
    }

    /**
     * API for fetching revenue (Today, Weekly, Monthly, Annualy)
     */
    public function admin_dashboard()
    {

        $db = new Database;
        $db->iniDB();

        $period = isset($_GET['period']) ? $_GET['period'] : 'today';

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
            case 'weekly':
                $transactions =
                    $db->query('SELECT DATE(created_at) as sale_date, SUM(amount_due) as total_sales 
                FROM transactions 
                GROUP BY DATE(created_at)
                ORDER BY sale_date ASC')->get();
                break;
            // today
            case 'today':
            default:
                $transactions =
                    $db->query("SELECT HOUR(created_at) as sale_hour, SUM(amount_due) as total_sales 
                    FROM transactions 
                    WHERE DATE(created_at) = CURDATE()
                    GROUP BY HOUR(created_at) 
                    ORDER BY sale_hour ASC")->get();
                break;
        }

        echo json_encode($transactions);
    }

    /**
     * API for fetching total transactions
     * 
     * Graph: shows monthly transactions
     */
    public function total_transactions()
    {

        $db = new Database;
        $db->iniDB();

        $total_transactions =
            $db->query("SELECT DATE_FORMAT(created_at, '%Y-%m') as sale_date, COUNT(*) as total_transactions
                FROM transactions 
                WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH)
                GROUP BY DATE_FORMAT(created_at, '%Y-%m') 
                ORDER BY sale_date ASC")->get();

        echo json_encode($total_transactions);
    }

    /**
     * API for fetching top sales
     * depending on the category (top sales, ... by age, ... gender)
    */
    public function top_sales()
    {

        $db = new Database;
        $db->iniDB();

        $category = isset($_GET['category']) ? $_GET['category'] : 'most-sale';

        switch ($category) {

            case 'most-sale-gender' :
                $top_sales = $db->query("SELECT COUNT(menu_items.menu_item_id) as sale_count, users.gender, menu_items.name, menu_items.image_dir
                    FROM transactions
                    LEFT JOIN users ON transactions.user_id = users.user_id
                    LEFT JOIN orders ON transactions.transaction_id = orders.transaction_id
                    LEFT JOIN carts ON orders.cart_id = carts.cart_id
                    LEFT JOIN menu_items ON carts.menu_item_id = menu_items.menu_item_id
                    GROUP BY users.gender, menu_items.name, menu_items.image_dir
                    ORDER BY sale_count DESC
                    LIMIT 10")->get();
            break;
            case 'most-sale-age' :
                $top_sales = $db->query("SELECT COUNT(menu_items.menu_item_id) as sale_count, users.age, menu_items.name, menu_items.image_dir
                    FROM transactions
                    LEFT JOIN users ON transactions.user_id = users.user_id
                    LEFT JOIN orders ON transactions.transaction_id = orders.transaction_id
                    LEFT JOIN carts ON orders.cart_id = carts.cart_id
                    LEFT JOIN menu_items ON carts.menu_item_id = menu_items.menu_item_id
                    GROUP BY users.age, menu_items.name, menu_items.image_dir
                    ORDER BY sale_count DESC
                    LIMIT 10")->get();
            break;
            case 'most-sale' :
            default :
            $top_sales = $db->query("SELECT COUNT(menu_items.menu_item_id) as sale_count, menu_items.name, menu_items.image_dir
                    FROM transactions
                    LEFT JOIN orders ON transactions.transaction_id = orders.transaction_id
                    LEFT JOIN carts ON orders.cart_id = carts.cart_id
                    LEFT JOIN menu_items ON carts.menu_item_id = menu_items.menu_item_id
                    GROUP BY menu_items.name, menu_items.image_dir
                    ORDER BY sale_count DESC
                    LIMIT 10")->get();
            break;
        }

        echo json_encode($top_sales);
    }
}
