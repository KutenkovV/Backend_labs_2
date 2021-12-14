<?php

class ExitController extends BaseController {

    public function getContext(): array
    {
        $context = parent::getContext();
        return $context;
    }

    public function post(array $context)
    {
        $_SESSION["is_logged"] = false;
        header("Location: /Authentication");
        exit;
    }
}