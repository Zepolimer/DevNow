<?php   

use devnowMVC\Autoloader;
use devnowMVC\app\Core\Router;

define('ROOT', dirname(__DIR__));

// On importe l'autoloader
require_once 'Autoloader.php';
Autoloader::register();

// On instancie Main 
$app = new Router();

// On démarre l'application
$app->start();

// http://localhost:8888/devnowMVC/index.php