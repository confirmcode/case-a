<?php

namespace App\Core;

use App\Core\Router;

class View
{
    static $title = "-";
    static $content_type = 'Content-Type: text/html, charset=utf-8;';
    static $template = "";
    static $data = [];
    static $error_code = 0;
    static $error_text = '';

    function __construct()
    {
        //
    }

    static function show($template = null, $data = [])
    {
        self::$template = $template;
        self::$data = $data;
    }

    static function display() {
        ob_clean();
        if ( !Router::found() ) {
            http_response_code(404);
            die("<html><body style='text-align: center; padding:200px'>Not Found</body></html>");
        }
        if ( self::$error_code && self::$error_text ) {
            http_response_code( self::$error_code );
            die("<html><body style='text-align: center; padding:200px'>".self::$error_text."</body></html>");
        }
        http_response_code(200);
        header(self::$content_type);
        if ( file_exists(DR."/templates/layout.php") ) {
            $title = self::$data['title'] ?? self::$title;
            $data = self::$data;
            $__template = self::$template;
            $html = include_once(DR."/templates/layout.php");
        } else {
            die("<noindex><b><i>Template error: layout not found</i></b></noindex>");
        }
    }
}