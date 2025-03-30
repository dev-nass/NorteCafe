<?php

namespace Core;

class Model extends Database
{

    protected $table;

    /**
     * Return a collection of record, no condition
     */
    public function findAll($order = "")
    {
        $this->iniDB();

        $table = substr($this->table, 0, -1);

        $records = $this->query("SELECT * FROM $this->table ORDER BY {$table}_id $order")->get();

        return $records;
    }

    /**
     * Returns a single record that matches the query
     */
    public function firstWhere($param)
    {
        $this->iniDB();

        $keys = array_keys($param);
        $values = array_values($param);
        $conditions = implode(" = ? ", $keys) . " = ?";

        $sql = "SELECT * FROM $this->table WHERE $conditions";

        $record = $this->query($sql, $values)->find();

        return $record;
    }

    /**
     * Returns a collection of records that matches the query
     * w/ Condition
     */
    public function findAllWhere($param)
    {
        $this->iniDB();

        $keys = array_keys($param); // column name
        $values = array_values($param); // value
        $conditions = implode(" = ? ", $keys) . " = ?";

        $sql = "SELECT * FROM $this->table WHERE $conditions";

        $records = $this->query($sql, $values)->get();

        return $records;
    }

    /**
     * Inert a new record
     * 
     * We have to check if its existing or not !!!
     * (we can't just use plain firstWhere that's only applicable for users) 
    */
    public function insert($param = []) 
    {
        $this->iniDB();
        $keys = array_keys($param);
        $values = array_values($param);
        $placeholders = implode(", ", array_fill(0, count($param), "?")); // will container ?, ?, ?

        $table = substr($this->table, 0, -1);

        $sql = "INSERT INTO $this->table (" . implode(", ", $keys) . ") VALUES ($placeholders)";

        $insertRecord = $this->query($sql, $values);

        if($insertRecord) {
            // Get the last inserted id
            $lastInsertId = $this->connection->lastInsertId();

            // Fetch the newly insert ID
            return $this->firstWhere(["{$table}_id" => $lastInsertId]);
        }

        return false;
    }

    /**
     * Update a single record
     */
    public function update($id, $param = [])
    {
        $this->iniDB();
        $keys = array_keys($param);
        $values = array_values($param);
        $columns = implode(" = ? ", $keys) . " = ?";

        $table = substr($this->table, 0, -1);

        $sql = "UPDATE $this->table SET $columns WHERE {$table}_id = ?";

        $values[] = $id;

        $updateRecord = $this->query($sql, $values);

        if (! $updateRecord) {
            return false;
        }

        return true;
    }

    /**
     * Delete a single record
     */
    public function delete($id)
    {
        $this->iniDB();

        $table = substr($this->table, 0, -1);

        $sql = "DELETE FROM $this->table WHERE {$table}_id = ?";

        $deleteRecord = $this->query($sql, $id);

        if (! $deleteRecord) {
            return false;
        }

        return true;
    }
}
