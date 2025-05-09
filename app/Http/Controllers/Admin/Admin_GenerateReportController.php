<?php

namespace App\Http\Controllers\Admin;

use Core\Database;
use Core\Controller;
use Core\FPDF\CustomFPDF;

class Admin_GenerateReportController extends Controller
{

    public function index() {}

    public function show() {}

    /**
     * Used for showing the form view for
     * Generating report
     */
    public function create()
    {

        return $this->view('Admin/generate-report.view.php', [
            'title' => 'Generate Report',
        ]);
    }

    /**
     * Used for listening to the form submit
     * and access the starting and end date
     */
    public function generate()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                "starting_date" => $this->getInput('starting_date'),
                "end_date" => $this->getInput('end_date'),
            ];
        }

        $db = new Database;
        $db->iniDB();

        // get all transactions from start to end date
        $transactions = $db->query("SELECT 
            summary.year,
            summary.month,
            MONTHNAME(MAKEDATE(summary.year, 1) + INTERVAL summary.month - 1 MONTH) AS month_name,
            summary.transaction_count,
            summary.revenue,
            top_products.top_sale_product
        FROM (
            SELECT 
                YEAR(t.created_at) AS year,
                MONTH(t.created_at) AS month,
                COUNT(DISTINCT t.transaction_id) AS transaction_count,
                SUM(o.total_price) AS revenue
            FROM transactions t
            LEFT JOIN orders o ON o.transaction_id = t.transaction_id
            WHERE t.created_at BETWEEN :starting_date AND :end_date
            GROUP BY YEAR(t.created_at), MONTH(t.created_at)
        ) AS summary
        LEFT JOIN (
        SELECT 
            YEAR(t2.created_at) AS year,
            MONTH(t2.created_at) AS month,
            mi.name AS top_sale_product,
            COUNT(*) AS product_count,
            RANK() OVER (PARTITION BY YEAR(t2.created_at), MONTH(t2.created_at) ORDER BY COUNT(*) DESC) AS rank_in_month
        FROM transactions t2
        JOIN orders o2 ON o2.transaction_id = t2.transaction_id
        JOIN carts c2 ON c2.cart_id = o2.cart_id
        JOIN menu_items mi ON mi.menu_item_id = c2.menu_item_id
        GROUP BY year, month, mi.menu_item_id
        ) AS top_products
        ON top_products.year = summary.year AND top_products.month = summary.month AND top_products.rank_in_month = 1  
        ORDER BY `summary`.`year` ASC", [
            "starting_date" => $data['starting_date'],
            "end_date" => $data['end_date']
        ])->get();

        // get total revenue from start to end date
        $revenue = $db->query("SELECT SUM(transactions.amount_due) as revenue
            FROM transactions
            WHERE transactions.created_at BETWEEN :starting_date AND :end_date", [
            "starting_date" => $data['starting_date'],
            "end_date" => $data['end_date']
        ])->find();


        $pdf = new CustomFPDF();
        $pdf->generateReport($transactions, $data['starting_date'], $data['end_date'], $revenue);
    }

    public function store() {}

    public function update() {}

    public function delete() {}
}
