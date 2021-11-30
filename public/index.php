<?php

require_once '../vendor/autoload.php';
require_once '../framework/autoload.php';
require_once "../controllers/MainController.php";
require_once "../controllers/Controller404.php";
require_once "../controllers/ObjectController.php";
require_once "../controllers/SearchController.php";
require_once "../controllers/AnimeTypeCreateController.php";
require_once "../controllers/AnimeObjectCreateController.php";
require_once "../controllers/AnimeObjectDeleteController.php";
require_once "../controllers/AnimeObjectUpdateController.php";

$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader, [
    "debug" => true
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());

$pdo = new PDO("mysql:host=localhost;dbname=anime;charset=utf8", "root", "");

$router = new Router($twig, $pdo);
$router->add("/", MainController::class);
$router->add("/anime-series/(?P<id>\d+)", ObjectController::class);
$router->add("/search", SearchController::class);
$router->add("/anime-series/create", AnimeObjectCreateController::class);
$router->add("/anime-series/type_create", AnimeTypeCreateController::class);
// $router->add("/anime-series/delete", AnimeObjectDeleteController::class);
$router->add("/anime-series/(?P<id>\d+)/delete", AnimeObjectDeleteController::class);
$router->add("/anime-series/(?P<id>\d+)/edit", AnimeObjectUpdateController::class);

$router->get_or_default(Controller404::class);
?>