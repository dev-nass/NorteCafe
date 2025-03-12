<?php

namespace Core;

class Session {

    /**
     * Used within the Controllers for setting new elements within the
     * session super global, add the dd() to further understand.
     * 
     * $rootKey is __flash (used for old values), for some instance 
     * $childKey is for (email, password etc.,)
     * 
     * So the goal is make something like:
     *  $_SESSION = [
     *      __flash = [
     *          'email' => 'old value'
     *      ],
     *      __currentUser = [
     *          ...
     *      ],
     *      __currentUserShop = [
     *          ...
     *      ],
     * ];
    */
    public static function set($rootKey, $childKey, $value) {
        $_SESSION[$rootKey] = [
            $childKey => $value,
        ];

        // dd($_SESSION);
    }

    /**
     * Used for the functions.php old() functions
    */
    public static function get($rootKey, $childKey, $default = '') {
        if(isset($_SESSION[$rootKey][$childKey])) {
            return $_SESSION[$rootKey][$childKey];
        }

        return $_SESSION[$rootKey] ?? $default;
    }

    /**
     * Used within the public/index
    */
    public static function unflash() {
        unset($_SESSION['__flash']);
    }
}