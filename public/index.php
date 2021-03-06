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
require_once "../controllers/AuthenticationController.php";
require_once "../controllers/ExitController.php";
require_once "../middlewares/LoginRequiredMiddeware.php";


$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader, [
    "debug" => true
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());

$pdo = new PDO("mysql:host=localhost;dbname=anime;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$router = new Router($twig, $pdo);
$router->add("/", MainController::class)
        ->middleware(new LoginRequiredMiddeware());
$router->add("/anime-series/(?P<id>\d+)", ObjectController::class)
        ->middleware(new LoginRequiredMiddeware());
$router->add("/search", SearchController::class)
        ->middleware(new LoginRequiredMiddeware());
$router->add("/anime-series/create", AnimeObjectCreateController::class)
        ->middleware(new LoginRequiredMiddeware());
$router->add("/anime-series/type_create", AnimeTypeCreateController::class)
        ->middleware(new LoginRequiredMiddeware());
$router->add("/anime-series/(?P<id>\d+)/delete", AnimeObjectDeleteController::class)
        ->middleware(new LoginRequiredMiddeware());
$router->add("/anime-series/(?P<id>\d+)/edit", AnimeObjectUpdateController::class)
        ->middleware(new LoginRequiredMiddeware());
$router->add("/exit", ExitController::class)
        ->middleware(new LoginRequiredMiddeware());
$router->add("/Authentication", AuthenticationController::class);

$router->get_or_default(Controller404::class);
?>