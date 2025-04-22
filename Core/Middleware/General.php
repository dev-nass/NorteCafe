<?php

namespace Core\Middleware;

class General
{

    /**
     * For general webpages, and dont allow access if
     * there's a session and the credentials is not of customer's role
     * 
     * In short prevent Admin/Customer/Rider from accessing
    */
    public static function handle($role)
    {
        if(! empty($_SESSION) && $_SESSION['__currentUser']['credentials']['role'] !== $role) {
            header('location: 403');
            exit();
        }
    }
}