<?php

namespace App\Controller;

use App\Core\{IController,View};
use App\Model\Entity;
use App\Core\DB;

class Index implements IController
{
    static function index()
    {
        $form_model = new Entity(DB::get());
        View::show('entity/index',['entity'=>$form_model->getAll()]);
        // View::show('entity/index', $data = [])
    }
}