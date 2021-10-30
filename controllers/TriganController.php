<?php
require_once "TwigBaseController.php";

class TriganController extends TwigBaseController
{
    public $title = "Триган";
    public $template = "__object.twig";

    public function getContext(): array
    {
        $context = parent::getContext();

        $context['url_image'] = "/trigan/image";
        $context['url_info'] = "/trigan/info";

        if ($context['url_image'] == $context['url']){
            $context['img_active'] = true;
        }
        if ($context['url_info'] == $context['url']){
            $context['info_active'] = true;
        }

        return $context;
    }
}
