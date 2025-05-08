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
     * (Useful for subclasses, Customer.php, Rider.php)
    */
    public function getUsersByRole($available = true, $verified = true)
    {
        $this->iniDB();

        $users = $this
            ->query("SELECT user_id, first_name, last_name, username, email, contact_number, age, role, available, profile_dir FROM users WHERE role = ? AND available = ? AND verified = ?", 
                [$this->role, $available, $verified])
            ->get();

        return $users ?? null;
    }
    
    /**
     * Get a single user record
     * (Useful for direct class access, not on subclasses)
    */
    public function findUserOr($param)
    {
        $this->iniDB();

        $keys = array_keys($param);
        $values = array_values($param);
        $conditions = implode(" = ? OR ", $keys) . " = ?";

        $sql = "SELECT user_id, first_name, last_name, username, email, password, contact_number, gender, age, date_of_birth, role, house_number, street, barangay, city, province, region, postal_code, available, verified, profile_dir, created_at FROM $this->table WHERE $conditions";

        $record = $this->query($sql, $values)->find();

        return $record ?? false;
    }

    /**
     * Stricker version of OR above
     * and uses the operator AND
    */
    public function findUserAnd($param)
    {
        $this->iniDB();

        $keys = array_keys($param);
        $values = array_values($param);
        $conditions = implode(" = ? AND ", $keys) . " = ?";

        $sql = "SELECT user_id, first_name, last_name, username, email, contact_number, gender, age, date_of_birth, role, house_number, street, barangay, city, province, region, postal_code, available, verified, profile_dir, created_at FROM $this->table WHERE $conditions";

        $record = $this->query($sql, $values)->find();

        return $record ?? false;
    }


    /**
     * Used for logged-in user and redirect them to their proper
     * default pages
     * ...(Create the same view for Admin and Employee upon logging in)
    */
    public function loadRoleView()
    {
        $role = $_SESSION['__currentUser']['credentials']['role'];

        $routes = [
            'Admin' => 'dashboard',
            'Employee' => 'dashboard',
            'Rider' => 'assigned-transaction-queue-rider',
            'Customer' => 'index',
        ];

        redirect($routes[$role] ?? 'index');
    }

    /**
     * Will be used for moving the uploaded profile image
     * to our desired directory
     */
    public function uploadFile($file)
    {
        $target_dir = BASE_PATH . "storage/backend/img/profiling/";
        $target_path = $target_dir . basename($file['name']);

        // Ensure the directory exists
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        if (move_uploaded_file($file['tmp_name'], $target_path)) {
            return $target_path;
        }

        dd('alaws na ups');
    }
}
