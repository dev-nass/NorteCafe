<?php

namespace Core\Middleware;

class Guest 
{

    /**
     * The parameter here is nothing, its put to 
     * match the parameter of Authenticated.php
    */
    public function handle($role)
    {

        if(isset($_SESSION['__currentUser']['credentials'])) {
            header('location: 403');
            exit();
        }
    }    
}