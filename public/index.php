<?php
require_once '../vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('../views');

$twig = new \Twig\Environment($loader);

$url = $_SERVER["REQUEST_URI"];

if ($url == "/") {
    // это убираем require "../views/main.html";
    
    echo $twig->render("main.html");
} elseif (preg_match("#/bebop#", $url)) {
    // и это тоже require "../views/mermaid.html";
    
    echo $twig->render("bebop.html");
} elseif (preg_match("#/trigan#", $url)) {
    // и вот это require "../views/uranus.html";
    
    echo $twig->render("trigan.html");
}
?>