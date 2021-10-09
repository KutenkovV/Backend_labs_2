<?php
require_once '../vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('../views');

$twig = new \Twig\Environment($loader);

$url = $_SERVER["REQUEST_URI"];

$title = "";
$template = "";

$context = [];

if ($url == "/") {
    $title = "Главная";
    $template = "main.twig";

} elseif (preg_match("#/bebop#", $url)) {
    $title = "Ковбой Бибоп";
    $template = "base_img.twig";

    $context['img'] = "/img/bebop_poster.jpeg";

} elseif (preg_match("#/trigan#", $url)) {
    $title = "Триган";
    $template = "base_img.twig";
    
    $context['img'] = "/img/trigan_poster.jpeg";
}

$context['title'] = $title;

echo $twig->render($template, $context)
?>  