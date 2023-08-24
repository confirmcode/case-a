<?php 

use App\Core\{DB,View,Router};
use App\Model\Form;

$db = new DB("sqlite:/app/database.sqlite");
$sql = "PRAGMA encoding='UTF-8';";
$db::get()->exec($sql);

Router::init();

require_once DR."/App/routes.php";

View::display();