<?php

namespace App\Controller;

use App\Core\{IController,View};
use App\Model\Entity;
use App\Core\DB;

class Api implements IController
{
    static function add_entity($post)
    {
        $sku=$post['sku'];
        $title=$post['title'];
        $entity_model = new Entity(DB::get());
        $id = $entity_model->set( $sku.'', $title );
        die( json_encode( ['status' => 'ok', 'data'=>$id] ) );
    }
    static function delete_entity($data, $attrs)
    {
        if ( empty($attrs[1]) ) {
            View::$error_code = 400;
            View::$error_text = 'Error: id';
        }
        $entity = new Entity(DB::get());
        $entity->delete( $attrs[1] );
        die('Deleted: '.$attrs[1]);
    }
}