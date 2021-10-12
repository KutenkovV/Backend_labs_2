<?php
require_once "TwigBaseController.php";

class MainController extends TwigBaseController {
    public $template = "main.twig";
    public $title = "Главная";
    public $menu = [
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
}