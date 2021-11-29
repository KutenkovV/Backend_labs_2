<?php
require_once "BaseAnimeTwigController.php";

class MainController extends BaseAnimeTwigController {
    public $template = "main.twig";
    public $title = "Главная";

    public function getContext() : array
    {
        if(isset($_GET['type'])) {
            $query = $this->pdo->prepare("SELECT * FROM anime_series WHERE type = :type");
            $query->bindValue("type", $_GET['type']);
            $query->execute();
        } else {
            $query = $this->pdo->query("SELECT * FROM anime_series");
        }


        $context = parent::getContext();

        $url = $_SERVER["REQUEST_URI"];
        $context['url'] = $url;
        
        $context['anime_series'] = $query->fetchAll();

        return $context;
    }
}