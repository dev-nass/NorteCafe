<?php

namespace Core\Middleware;

class Authenticated
{

    /**
     * We are only allowing access to pages if
     * they are logged in or
     * if the role matches
    */
    public function handle($role)
    {
        if (! $_SESSION['__currentUser'] ?? false) {
            header('location: 403');
            exit();
        }

        if ($_SESSION['__currentUser']['credentials']['role'] !== $role) {
            header('location: 403');
            exit();
        }
    }
}
