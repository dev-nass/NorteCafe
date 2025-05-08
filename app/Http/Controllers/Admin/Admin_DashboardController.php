<?php

namespace App\Http\Controllers\Admin;

use Core\Database;
use Core\Controller;
use App\Models\Rider;
use PDO;

class Admin_DashboardController
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

        view('Admin/dashboard.view.php', [
            'title' => 'Dashboard | Norte Cafe',
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
     * depending on the category (top sales overall, ... by age, ... gender)
     */
    public function top_sales()
    {

        $db = new Database;
        $db->iniDB();

        $category = isset($_GET['category']) ? $_GET['category'] : 'most-sale';

        switch ($category) {

            case 'most-sale-gender':
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
            case 'most-sale-age':
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
            case 'most-sale':
            default:
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

    /**
     * Used for backup the database up
     */
    public function backup_db()
    {

        $db = new Database;
        $db->iniDB();

        // Set headers for file download
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="backup_' . date('Y-m-d_His') . '.sql"');
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');

        // Initialize the backup string
        $backup = "-- Database Backup\n";
        $backup .= "-- Generated on: " . date('Y-m-d H:i:s') . "\n";
        $backup .= "-- Database: norte_cafe\n\n";
        $backup .= "SET NAMES utf8mb4;\n";
        $backup .= "SET FOREIGN_KEY_CHECKS = 0;\n\n";

        $tables = [];
        $get_tables = $db->query("SHOW TABLES")->get();

        // Get all tables
        foreach ($get_tables as $get_table) {
            $tables[] = array_values($get_table)[0];
        }

        // Process each table
        foreach ($tables as $table) {
            $create_table = $db->query("SHOW CREATE TABLE {$table}")->get();
            $single_table = array_values($create_table)[0];
            $backup .= "\n\n-- Table structure for `$table`\n\n";
            $backup .= "DROP TABLE IF EXISTS `$table`;\n";
            $backup .= $single_table["Create Table"] . ";\n\n";

            $num_fields = $db->query("SELECT * FROM {$table}")->columnCount();
            $num_records = $db->query("SELECT * FROM {$table}")->rowCount();
            $table_datas = $db->query("SELECT * FROM {$table}")->get();

            if ($num_records > 0) {
                $backup .= "-- Data for `$table`\n";

                foreach ($table_datas as $row) {
                    $values = [];

                    foreach ($row as $column => $data) {
                        if ($data === NULL) {
                            $values[] = 'NULL';
                        } else {
                            // Use PDO's quote() to properly escape the value
                            $values[] = "'" . str_replace("'", "''", $data) . "'";
                        }
                    }

                    $backup .= "INSERT INTO `$table` VALUES(" . implode(',', $values) . ");\n";
                }
            }

            $backup .= "\n";
        }

        // Backup stored procedures
        $backup .= "\n\n-- Stored Procedures\n\n";
        $backup .= "DELIMITER $$\n\n";

        $procedures = $db->query("SELECT ROUTINE_NAME, ROUTINE_DEFINITION 
                            FROM information_schema.ROUTINES 
                            WHERE ROUTINE_TYPE='PROCEDURE' 
                            AND ROUTINE_SCHEMA='norte_cafe'")->get();

        if (!empty($procedures)) {
            foreach ($procedures as $procedure) {
                $proc_name = $procedure['ROUTINE_NAME'];
                // Get the CREATE PROCEDURE statement
                $create_proc = $db->query("SHOW CREATE PROCEDURE `$proc_name`")->get();
                $create_proc = array_values($create_proc)[0];
                $backup .= "-- Procedure structure for `$proc_name`\n";
                $backup .= "DROP PROCEDURE IF EXISTS `$proc_name`$$\n";
                $backup .= $create_proc['Create Procedure'] . "$$\n\n";
            }
        }

        $backup .= "DELIMITER ;\n";

        // Finalize the backup
        $backup .= "SET FOREIGN_KEY_CHECKS = 1;\n";

        // Output the backup
        echo $backup;
    }
}
