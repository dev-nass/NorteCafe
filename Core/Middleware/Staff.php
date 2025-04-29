<?php

namespace Core\Middleware;

class Staff
{

    /**
     * For webpages that can be access by two Roles
     * but not allowed for others.
     * 
     * Used for Admin, Employee
     */
    public static function handle($role)
    {

        $distinctRoles = explode(',', $role);
        foreach ($distinctRoles as $eachRole) {
            if ($_SESSION['__currentUser']['credentials']['role'] === $eachRole) {
                return true;
            }
        }

        header('location: 403');
    }
}