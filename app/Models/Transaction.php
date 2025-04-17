<?php

namespace App\Models;

use Core\Model;

class Transaction extends Model
{
    protected $table = "transactions";

    /**
     * Used to get a very detailed collection of records,
     * and return every order thats under a single
     * tranaction id
    */
    public function getUserTransactions($transaction_id)
    {

        $this->iniDB();

        // this is get() instead of find() because of the menu item that are part of a single record each
        // so in order to fetch all records that belongs to a single transaction we use get()
        $transactions = $this->query("SELECT transactions.*, 
            users.user_id, CONCAT(users.first_name, ' ', users.last_name) AS fullname, users.username, users.email, users.contact_number, CONCAT(users.house_number, ', ', users.street, ', ', users.barangay, ', ', users.city, ', ', users.provience, ', ', users.region, ', ', users.postal_code) AS address,
            riders.user_id, CONCAT(riders.first_name, ' ', riders.last_name) as rider_name, riders.contact_number,
            orders.order_id, orders.transaction_id, orders.cart_id, orders.total_price, 
            carts.*, 
            menu_items.menu_item_id, menu_items.name as menu_item_name, menu_items.category, menu_items.image_dir, 
            menu_item_sizes.menu_item_size_id, menu_item_sizes.menu_item_id, menu_item_sizes.size, menu_item_sizes.price as menu_item_size_price, 
            add_ons.add_on_id, add_ons.name as add_on_name, add_ons.price as add_on_price,
            discounts.discount_id, discounts.name AS discount_name
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
     * status: (Pending, Approved)
    */
    public function getCurrentTransactions($user_id, $order_by = "ASC", $limit = 9999)
    {

        $this->iniDB();

        $currentTransactions = $this->query(
            "SELECT transactions.*, users.user_id, CONCAT(users.house_number, ', ', users.street, ', ', users.barangay, ', ', users.city, ', ', users.provience, ', ', users.region, ', ', users.postal_code) AS address, users.username, users.email, users.contact_number
                FROM transactions
                LEFT JOIN users AS users ON users.user_id = transactions.user_id
                WHERE transactions.user_id = :user_id AND (transactions.status = :pending_status OR transactions.status = :approved_status)
                ORDER BY transaction_id $order_by
                LIMIT $limit",
            [
                "user_id" => $user_id,
                "pending_status" => "Pending",
                "approved_status" => "Approved",
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
            "SELECT transactions.*, users.user_id, CONCAT(users.house_number, ', ', users.street, ', ', users.barangay, ', ', users.city, ', ', users.provience, ', ', users.region, ', ', users.postal_code) AS address, users.username, users.email, users.contact_number
                FROM transactions
                LEFT JOIN users AS users ON users.user_id = transactions.user_id
                WHERE transactions.user_id = :user_id AND (transactions.status = :rejected_status OR transactions.status = :cancelled_status OR transactions.status = :delivered_status)
                ORDER BY transaction_id $order_by
                LIMIT $limit",
            [
                "user_id" => $user_id,
                "rejected_status" => "Rejected",
                "cancelled_status" => "Cancelled",
                "delivered_status" => "Delivered",
            ]
        )->get();

        return $previousTransactions;
    }
}
