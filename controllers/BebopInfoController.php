<?php
require_once "BebopInfoController.php";

class BebopInfoController extends BebopController {

    public $template = "bebop_info.twig";


    public function getContext(): array
    {
        $context = parent::getContext();
        return $context;
    }
}