<?php

namespace App\Core;

use Controller, IController;

class Router
{
    private static $handler = 'get';

    private static $route_found = false;

    static function found()
    {
        return self::$route_found;
    }

    static function init()
    {
        $request_type = $_SERVER['REQUEST_METHOD'];
        switch( $request_type ) {
            case "POST":
                self::$handler = 'post';
                break;
            case "PUT":
                self::$handler = 'put';
                break;
            case "DELETE":
                self::$handler = 'delete';
                break;
            case "GET":
            default:
                break;
        }
    }
    
    static function get(string $path, $class_method, $data = [])
    {
        if ( self::$handler != "get" ) {
            return;
        }
        if ( $_SERVER['REQUEST_URI'] !== $path ) {
            return;
        }
        self::$route_found = true;
        call_user_func('App\Controller\\'.$class_method, $data);
    }

    static function post(string $path, $class_method, $data = [])
    {
        if ( self::$handler != "post" ) {
            return;
        }
        if ( $_SERVER['REQUEST_URI'] != $path ) {
            return;
        }
        self::$route_found = true;
        call_user_func('App\Controller\\'.$class_method, $data);
    }

    static function put(string $path, $class_method, $data=[])
    {
        if ( self::$handler != "put" ) {
            return;
        }
        if ( $_SERVER['REQUEST_URI'] != $path ) {
            return;
        }
        self::$route_found = true;
        call_user_func('App\Controller\\'.$class_method, $data);
    }

    static function delete(string $path, $class_method, $data=[])
    {
        if ( self::$handler != "delete" ) {
            return;
        }
        // todo можно доделать проверку и варианты...
        $path = str_replace('(:id)', '__ID__', $path ); // .... temp crutch
        $path = preg_quote( $path, '/');
        $path = str_replace('__ID__', '(\d+)', $path );
        if ( !preg_match( '/^'.$path.'$/', $_SERVER['REQUEST_URI'], $wildcard ) ) {
            return;
        }
        self::$route_found = true;
        call_user_func('App\Controller\\'.$class_method, $data, $wildcard);
    }
}