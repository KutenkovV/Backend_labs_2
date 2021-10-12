<?php
require_once "TwigBaseController.php";

class BebopController extends TwigBaseController
{
    public $title = "Ковбой Бибоп";
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

        $context['img_content'] = "/bebop/image";
        $context['info_content'] = "/bebop/info";

        return $context;
    }
}
