<?php
require_once "TwigBaseController.php";

class TriganController extends TwigBaseController
{
    public $title = "Триган";
    public $template = "__object.twig";

    public function getContext(): array
    {
        $context = parent::getContext();

        $context['img_content'] = "/trigan/image";
        $context['info_content'] = "/trigan/info";

        return $context;
    }
}
