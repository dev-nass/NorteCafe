<?php

namespace Core;

use PDO;
use PDOException;

class Database
{

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
    public function iniDB()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname}";

        try {
            $this->connection = new PDO($dsn, $this->username, $this->password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);

            return $this->connection;
        } catch (PDOException $e) {
            dd('Database Connection Failed ' . $e->getMessage());
        }
    }

    /**
     * Used for sending query to the database
     */
    public function query($query, $param = [], $paginate = false)
    {

        try {
            $this->statement = $this->connection->prepare($query);
            $this->statement->execute($param);
    
            // $this->statement - is for pagination
            // $this - is only for normal usage, which returns the whole instance of this all, everything this has to over. DD to understand.
            return $paginate ? $this->statement : $this;
        } catch (PDOException $e) {
            dd('Query error ' . $e->getMessage());
        }
        
    }

    /**
     * Eager loader / Gets multiple records
     */
    public function get()
    {
        return $this->statement->fetchAll();
    }

    /**
     * Gets one record that matches the query
     */
    public function find()
    {
        return $this->statement->fetch();
    }

    /**
     * Gets one record but fails if it doesn't find any
     */
    public function findOrFail()
    {
        $result = $this->find();

        if (! $result) {
            // abort here
        }

        return $result;
    }


    public function fetch($stmt)
    {
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchAll($stmt)
    {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Pagination Code Here
     */
    public function paginated($table)
    {
        $page_no = isset($_GET['page_no']) && $_GET['page_no'] !== "" ? (int)$_GET['page_no'] : 1;

        $total_records_per_page = 10;
        $offset = ($page_no - 1) * $total_records_per_page;

        // Get total records
        $stmt = $this->query("SELECT COUNT(*) as total_records FROM {$table}", [], true);
        // dd($this->fetch($stmt));
        $records = $this->fetch($stmt);
        $total_records = $records['total_records'];
        $total_no_of_pages = ceil($total_records / $total_records_per_page);

        // Get paginated records
        $stmt = $this->query("SELECT * FROM {$table} LIMIT {$offset}, {$total_records_per_page}", [], true);
        $data = $this->fetchAll($stmt);

        // Return paginated data and pagination info
        return [
            'data' => $data,
            'pagination' => [
                'page_no' => $page_no,
                'total_records_per_page' => $total_records_per_page,
                'total_no_of_pages' => $total_no_of_pages,
                'total_records' => $total_records,
                'previous_page' => $page_no > 1 ? $page_no - 1 : null,
                'next_page' => $page_no < $total_no_of_pages ? $page_no + 1 : null,
            ]
        ];
    }
}
