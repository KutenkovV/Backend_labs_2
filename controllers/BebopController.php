<?php
require_once "TwigBaseController.php";

class BebopController extends TwigBaseController
{
    public $title = "Ковбой Бибоп";
    public $template = "__object.twig";
    
    public function getContext(): array
    {
        $context = parent::getContext();

        $context['url_image'] = "/bebop/image";
        $context['url_info'] = "/bebop/info";

        if ($context['url_image'] == $context['url']){
            $context['img_active'] = true;
        }
        if ($context['url_info'] == $context['url']){
            $context['info_active'] = true;
        }

        return $context;
    }
}
