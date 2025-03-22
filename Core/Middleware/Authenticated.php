<?php

namespace Core\Middleware;

class Authenticated
{
    public function handle()
    {
        if (! $_SESSION['__currentUser'] ?? false) {
            header('location: 403');
            exit();
        }
    }
}
