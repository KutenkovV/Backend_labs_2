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
    $template = "__object.twig";
    $context['img_content'] = "/bebop/image";
    $context['info_content'] = "/bebop/info";

    if(preg_match("#^/bebop/image#", $url)) {
        $template = "image.twig";
        $context['img'] = "/img/bebop_poster.jpeg";

    } else if (preg_match("#^/bebop/info#", $url)) {
        $template = "bebop_info.twig";
    }

} elseif (preg_match("#/trigan#", $url)) {
    $title = "Триган";
    $template = "__object.twig";
    $context['img_content'] = "/trigan/image";
    $context['info_content'] = "/trigan/info";

    if(preg_match("#^/trigan/image#", $url)) {
        $template = "image.twig";
        $context['img'] = "/img/trigan_poster.jpeg";

    } else if (preg_match("#^/trigan/info#", $url)) {
        $template = "trigan_info.twig";
    }
}

$context['title'] = $title;

echo $twig->render($template, $context)
?>  