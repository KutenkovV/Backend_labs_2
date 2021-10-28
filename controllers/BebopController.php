<?php
require_once "TwigBaseController.php";

class BebopController extends TwigBaseController
{
    public $title = "Ковбой Бибоп";
    public $template = "__object.twig";
    
    public function getContext(): array
    {
        $context = parent::getContext();

        $context['img_content'] = "/bebop/image";
        $context['info_content'] = "/bebop/info";

        if ($context['img_content'] == $context['url']){
            $context['img_active'] = true;
        }
        if ($context['info_content'] == $context['url']){
            $context['info_active'] = true;
        }

        return $context;
    }
}
