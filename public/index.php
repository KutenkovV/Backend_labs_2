<?php
require_once '../vendor/autoload.php';
require_once "../controllers/MainController.php";
require_once "../controllers/BebopController.php";
require_once "../controllers/BebopImageController.php";
require_once "../controllers/BebopInfoController.php";
require_once "../controllers/TriganController.php";
require_once "../controllers/TriganImageController.php";
require_once "../controllers/TriganInfoController.php";
require_once "../controllers/Controller404.php";



$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader);

$url = $_SERVER["REQUEST_URI"];

$title = "";
$template = "";

$context = [];

$controller = new Controller404($twig);

if ($url == "/") {
    $controller = new MainController($twig);
}  elseif(preg_match("#^/bebop/image#", $url)) {
    $controller = new BebopImageController($twig);
} else if (preg_match("#^/bebop/info#", $url)) {
    $controller = new BebopInfoController($twig);
} elseif (preg_match("#/bebop#", $url)) {
    $controller = new BebopController($twig); 


} elseif(preg_match("#^/trigan/image#", $url)) {
    $controller = new TriganImageController($twig);
} else if (preg_match("#^/trigan/info#", $url)) {
    $controller = new TriganInfoController($twig);
} elseif (preg_match("#/trigan#", $url)) {
    $controller = new TriganController($twig);
}

if ($controller) {
    $controller->get();
}
?> 
 <!-- $context['url'] = $url; -->