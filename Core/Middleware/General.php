<?php

namespace Core\Middleware;

class General
{

    /**
     * For general webpages, and dont allow access if
     * there's a session and the credentials is not of customer's role
     * 
     * In short prevent Admin/Employee/Rider from accessing
     */
    public static function handle($role)
    {

        $distinctRoles = explode(',', $role);
        foreach ($distinctRoles as $eachRole) {
            if (! empty($_SESSION['__currentUser']) && $_SESSION['__currentUser']['credentials']['role'] !== $eachRole) {
                header('location: 403');
                exit();
            }
        }
    }
}
