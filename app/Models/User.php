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
    public function findUserOr($param)
    {
        $this->iniDB();

        $keys = array_keys($param);
        $values = array_values($param);
        $conditions = implode(" = ? OR ", $keys) . " = ?";

        $sql = "SELECT user_id, first_name, last_name, username, email, contact_number, gender, age, date_of_birth, address, role, house_number, street, barangay, city, provience, region, postal_code, available, verified, profile_dir FROM $this->table WHERE $conditions";

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
            'Admin' => 'transaction-queue-admin',
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
