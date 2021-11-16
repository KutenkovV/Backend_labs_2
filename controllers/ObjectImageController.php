<?php

class ObjectImageController extends ObjectController {
    public $template = "image.twig";

    public function getContext(): array
    {
        $context = parent::getContext();

        $query = $this->pdo->prepare("SELECT image, id FROM anime_series WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);  
        $query->execute();
        $data = $query->fetch();

        $context['img'] = $data['image'];
        
        return $context;
        
    }
}