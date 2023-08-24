<?php

use App\Core\Router;

Router::get( '/', 'Index::index' );

Router::post( '/?path=api/entities/', 'Api::add_entity', $_POST );

Router::delete( '/?path=api/entities/(:id)', 'Api::delete_entity' );
