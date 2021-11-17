<?php
require_once "BaseAnimeTwigController.php";

class ObjectController extends BaseAnimeTwigController {
    public $template = "__object.twig";

    public function getContext(): array
    {
        $context = parent::getContext();

        $query = $this->pdo->prepare("SELECT title, description, id FROM anime_series WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);  
        $query->execute();
        $data = $query->fetch();

        $context['description'] = $data['description'];
        $context['ObjectID'] = $data['id'];
        $context['title'] = $data['title'];
        
        return $context;
        
    }
}