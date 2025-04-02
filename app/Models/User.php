<?php

namespace App\Models;

use Core\Database;
use Core\Model;
use Core\Session;

/**
 * This is the Userv2
*/
class User extends Model
{

    protected $table = "users";
    protected $role;

    /**
     * Gets all records of a user based on their roles
     * (Useful for subclasses)
    */
    public function getUsersByRole()
    {
        $this->iniDB();

        $users = $this
            ->query("SELECT user_id, first_name, last_name, username, email, contact_number, age, role, available, profile_dir FROM users WHERE role = ?", 
                [$this->role])
            ->get();

        return $users ?? null;
    }
    
    /**
     * Get a single user record
     * (Useful for direct class access, not on subclasses)
    */
    public function findUser($param)
    {
        $this->iniDB();

        $keys = array_keys($param);
        $values = array_values($param);
        $conditions = implode(" = ? ", $keys) . " = ?";

        $sql = "SELECT user_id, first_name, last_name, username, email, contact_number, gender, age, date_of_birth, address, role, available, profile_dir FROM $this->table WHERE $conditions";

        $record = $this->query($sql, $values)->find();

        return $record ?? false;
    }


    /**
     * Used for logged-in user and redirect them to their proper
     * default pages
    */
    public function loadRoleView()
    {
        $role = $_SESSION['__currentUser']['credentials']['role'];

        $routes = [
            'Admin' => 'transaction-queue',
            'Customer' => 'index',
        ];

        redirect($routes[$role] ?? 'index');
    }
}
