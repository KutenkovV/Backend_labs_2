<?php
require_once "TwigBaseController.php";

class TriganController extends TwigBaseController
{
    public $title = "Триган";
    public $template = "__object.twig";

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

    public function getContext(): array
    {
        $context = parent::getContext();

        $context['img_content'] = "/trigan/image";
        $context['info_content'] = "/trigan/info";

        return $context;
    }
}
