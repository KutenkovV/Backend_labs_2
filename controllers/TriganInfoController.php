<?php
require_once "TriganInfoController.php";

class TriganInfoController extends TriganController {

    public $template = "trigan_info.twig";


    public function getContext(): array
    {
        $context = parent::getContext();
        $context[] = "";
        return $context;
    }
}