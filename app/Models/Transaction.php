<?php

namespace App\Models;

use Core\Model;

class Transaction extends Model
{
    protected $table = "transactions";

    /**
     * Used to get a very detailed collection of records,
     * and return every order thats under a single
     * tranaction id (used for transaction/show())
     */
    public function getOrdersTransaction($transaction_id)
    {

        $this->iniDB();

        // this is get() instead of find() because of the menu item that are part of a single record each
        // so in order to fetch all records that belongs to a single transaction we use get()
        $transactions = $this->query("SELECT transactions.*, 
            users.user_id, CONCAT(users.first_name, ' ', users.last_name) AS fullname, users.username, users.email, users.contact_number as user_contact_number, CONCAT(users.house_number, ', ', users.street, ', ', users.barangay, ', ', users.city, ', ', users.province, ', ', users.region, ', ', users.postal_code) AS address, users.house_number as user_house_number, users.street as user_street, users.barangay as user_barangay, users.city as user_city, users.province as user_province, users.region as user_region, users.postal_code as user_postal_code,
            riders.user_id, CONCAT(riders.first_name, ' ', riders.last_name) as rider_name, riders.contact_number as rider_contact_number,
            orders.order_id, orders.transaction_id, orders.cart_id, orders.total_price, 
            carts.*, 
            menu_items.menu_item_id, menu_items.name as menu_item_name, menu_items.category, menu_items.image_dir, 
            menu_item_sizes.menu_item_size_id, menu_item_sizes.menu_item_id, menu_item_sizes.size, menu_item_sizes.price as menu_item_size_price, 
            add_ons.add_on_id, add_ons.name as add_on_name, add_ons.price as add_on_price,
            discounts.discount_id, discounts.name AS discount_name, discounts.type, discounts.min_amount
            FROM transactions
            LEFT JOIN users AS users ON users.user_id = transactions.user_id
            LEFT JOIN users AS riders ON riders.user_id = transactions.rider_id
            LEFT JOIN orders ON orders.transaction_id = transactions.transaction_id
            LEFT JOIN carts ON carts.cart_id = orders.cart_id
            LEFT JOIN menu_items ON menu_items.menu_item_id = carts.menu_item_id
            LEFT JOIN menu_item_sizes ON menu_item_sizes.menu_item_size_id = carts.menu_item_size_id
            LEFT JOIN add_ons ON add_ons.add_on_id = carts.add_ons_id
            LEFT JOIN discounts ON discounts.discount_id = transactions.discount_id
            WHERE transactions.transaction_id = :transaction_id", [
            "transaction_id" => $transaction_id,
        ])->get();

        return $transactions;
    }

    /**
     * Return a collection of current transactions
     * status: (Pending, Approved, Cancellation)
     * Cancellation is done by either Customer and Staff
     */
    public function getCurrentTransactions($user_id, $order_by = "ASC", $limit = 9999)
    {

        $this->iniDB();

        $currentTransactions = $this->query(
            "SELECT transactions.*, users.user_id, CONCAT(users.house_number, ', ', users.street, ', ', users.barangay, ', ', users.city, ', ', users.province, ', ', users.region, ', ', users.postal_code) AS address, users.username, users.email, users.contact_number
                FROM transactions
                LEFT JOIN users AS users ON users.user_id = transactions.user_id
                WHERE transactions.user_id = :user_id AND 
                (transactions.status = :pending_status OR transactions.status = :cancellation OR transactions.status = :approved_status_employee OR transactions.status = :approved_status_rider OR transactions.status = :rejected_status_rider OR transactions.status = :in_transit)
                ORDER BY transaction_id $order_by
                LIMIT $limit",
            [
                "user_id" => $user_id,
                "pending_status" => "Pending",
                "cancellation" => "Cancellation",
                "approved_status_employee" => "Approved by Employee",
                "approved_status_rider" => "Approved by Rider",
                "rejected_status_rider" => "Rejected by Rider",
                "in_transit" => "In Transit",
            ]
        )->get();

        return $currentTransactions;
    }

    /**
     * Return a collection of previous transactions
     * status: (Delivered, Cancelled, Rejected)
     */
    public function getPreviousTransactions($user_id, $order_by = "ASC", $limit = 9999)
    {

        $this->iniDB();

        $previousTransactions = $this->query(
            "SELECT transactions.*, users.user_id, CONCAT(users.house_number, ', ', users.street, ', ', users.barangay, ', ', users.city, ', ', users.province, ', ', users.region, ', ', users.postal_code) AS address, users.username, users.email, users.contact_number
                FROM transactions
                LEFT JOIN users AS users ON users.user_id = transactions.user_id
                WHERE transactions.user_id = :user_id AND 
                (
                    transactions.status = :cancelled_status OR 
                    transactions.status LIKE :rejected_status OR 
                    transactions.status = :delivered_status OR 
                    transactions.status = :failed_delivery
                )
                ORDER BY transaction_id $order_by
                LIMIT $limit",
            [
                "user_id" => $user_id,
                "cancelled_status" => "Cancelled",
                "rejected_status" => "Rejected by Employee%",
                "delivered_status" => "Delivered",
                "failed_delivery" => "Failed Delivery",
            ]
        )->get();

        return $previousTransactions;
    }

    /**
     * Reserve for Rider Profile Page
     * 
     * Return a collection of handled transactions by a
     * certain Employee
     * 
     * status: all / whatever
     */
    public function getHandledTransactions($id)
    {

        $this->iniDB();

        $transactions = $this->query("SELECT * FROM transactions WHERE rider_id = :rider_id", [
            "rider_id" => $id,
        ])->get();

        return $transactions;
    }


    /**
     * Used for uploading delivery proof
     */
    public function uploadFile($file)
    {
        $target_dir = BASE_PATH . "storage/backend/img/delivery_proof/";
        $target_path = $target_dir . basename($file['name']);

        // Ensure the directory exists
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        if (move_uploaded_file($file['tmp_name'], $target_path)) {
            return $target_path;
        }

        dd('alaws na ups na delivery proof');
    }
}
