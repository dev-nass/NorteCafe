<?php

namespace Core;

use PDO;
use PDOException;

class Database {

    // Database Configuration
    protected $host = 'localhost';
    protected $port = '3306';
    protected $dbname = 'norte_cafe';
    protected $username = 'root';
    protected $password = '';

    // SQL Variable
    public $connection;
    public $statement;

    /**
     * Used for initializing connection to each Controller
    */
    public function iniDB() {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname}";

        try {
            $this->connection = new PDO($dsn, $this->username, $this->password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]);

            return $this->connection;
        } catch(PDOException $e) {
            dd('Database Connection Failed ' . $e->getMessage());
        }
    }

    /**
     * Used for sending query to the database
    */
    public function query($query, $param = [], $paginate = false) {

        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($param);

        return $paginate ? $this->statement : $this;
    }

    /**
     * Eager loader / Gets multiple records
    */
    public function get() {
        return $this->statement->fetchAll();
    }

    /**
     * Gets one record that matches the query
    */ 
    public function find() {
        return $this->statement->fetch();
    }

    /**
     * Gets one record but fails if it doesn't find any
    */
    public function findOrFail() {
        $result = $this->find();

        if(! $result) {
            // abort here
        }

        return $result;
    }



    /**
     * Pagination Code Here
    */
}