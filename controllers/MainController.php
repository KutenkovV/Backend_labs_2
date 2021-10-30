<?php
require_once "TwigBaseController.php";

class MainController extends TwigBaseController {
    public $template = "main.twig";
    public $title = "Главная";

    public $navigation = [
        [
            "title" => "Ковбой Бибоп",
            "url" => "/bebop",

            "url_image" => "/bebop/image",
            "url_info" => "/bebop/info"
        ],
        [
            "title" => "Триган",
            "url" => "/trigan",

            "url_image" => "/trigan/image",
            "url_info" => "/trigan/info"
        ]
    ];

    public function getContext() : array
    {
        $context = parent::getContext();
        $context['navigation'] = $this->navigation;

        $url = $_SERVER["REQUEST_URI"];
        $context['url'] = $url;

        return $context;
    }
}