<?php
require_once '../vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('../views');

$twig = new \Twig\Environment($loader);

$url = $_SERVER["REQUEST_URI"];


if ($url == "/") {
    $title = "Главная";
    $template = "main.twig";

} elseif (preg_match("#/bebop#", $url)) {
    $title = "Ковбой Бибоп";
    $template = "bebop.twig";

} elseif (preg_match("#/trigan#", $url)) {
    $title = "Триган";
    $template = "trigan.twig";
}

echo $twig->render($template, [
    "title" => $title
]);
?>  