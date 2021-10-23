<?php
require_once "BebopImageController.php";

class BebopImageController extends BebopController {

    public $template = "image.twig";

    public function getContext(): array
    {
        $context = parent::getContext();
        $context['img'] = "/img/bebop_poster.jpeg";

        return $context;
    }
}