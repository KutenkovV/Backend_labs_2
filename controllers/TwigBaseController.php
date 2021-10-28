<?php
require_once "BaseController.php";

class TwigBaseController extends BaseController {
    public $title = "";
    public $template = "";
    public $img_active = false;
    public $info_active = false;
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
    
    protected \Twig\Environment $twig;
    
    public function __construct($twig)
    {
        $this->twig = $twig;
    }
    
    public function getContext() : array
    {
        $context = parent::getContext();
        $context['title'] = $this->title;
        $context['menu'] = $this->menu;
        $context['navigation'] = $this->navigation;

        $url = $_SERVER["REQUEST_URI"];
        $context['url'] = $url;

        return $context;
    }

    public function get() {
        echo $this->twig->render($this->template, $this->getContext());
    }
}