<?php

namespace App\Core;

class DB
{

    static private $instance = null;

    function __construct( $dsn ) {
        if ( is_null(self::$instance) ) {
            self::$instance = new \PDO($dsn);
        }
    }

    static function get() {
        return self::$instance;
    }
}
