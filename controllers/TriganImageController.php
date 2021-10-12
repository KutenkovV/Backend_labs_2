<?php
require_once "TriganImageController.php";

class TriganImageController extends TriganController {

    public $template = "image.twig";

    public function getContext(): array
    {
        $context = parent::getContext();
        $context['img'] = "/img/trigan_poster.jpeg";

        return $context;
    }
}