<?php

define('DR', '/app');

spl_autoload_register(function ($class_name) {
    $class = DR.'/'.str_replace('\\','/',$class_name).'.php';
    require_once $class;
});

require_once DR."/App/app.php";
