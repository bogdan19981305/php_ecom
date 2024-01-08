<?php

use App\Kernel\App;

error_reporting(error_reporting() ^ E_DEPRECATED);

define("APP_PATH", dirname(__DIR__));
require_once APP_PATH.'/vendor/autoload.php';


$app = new App();

$app->run();