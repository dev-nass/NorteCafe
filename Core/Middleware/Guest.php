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

        if($_SESSION) {
            header('location: 403');
            exit();
        }
    }    
}