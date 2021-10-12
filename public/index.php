<?php
require_once '../vendor/autoload.php';
require_once "../controllers/MainController.php";

$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader);

$url = $_SERVER["REQUEST_URI"];

$title = "";
$template = "";

$context = [];

$menu = [
    [
        "title" => "Главная",
        "url" => "/",
    ],
    [
        "title" => "Ковбой Бибоп",
        "url" => "/bebop",
    ],
    [
        "title" => "Триган",
        "url" => "/trigan",
    ]
];

$controller = null;

if ($url == "/") {
    $controller = new MainController($twig);

} elseif (preg_match("#/bebop#", $url)) {
    $title = "Ковбой Бибоп";
    $template = "__object.twig";

    $context['img_content'] = "/bebop/image";
    $context['info_content'] = "/bebop/info";
    $context['url'] = $url;

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
    $context['url'] = $url;

    if(preg_match("#^/trigan/image#", $url)) {
        $template = "image.twig";

        $context['img'] = "/img/trigan_poster.jpeg";

    } else if (preg_match("#^/trigan/info#", $url)) {
        $template = "trigan_info.twig";
    }
}

if ($controller) {
    $controller->get();
}

?>  