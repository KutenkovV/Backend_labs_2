<?php
require_once "BaseAnimeTwigController.php";

class ObjectController extends BaseAnimeTwigController {
    public $template = "__object.twig";

    public $object_type;

    public function getContext(): array
    {
        $context = parent::getContext();
        
        $query = $this->pdo->prepare("SELECT image, id, description, title, info FROM anime_series WHERE id = :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();
        $data = $query->fetch();

        if(isset($_GET['show'])) {
            if(($_GET['show']) == "image") {
                
                $context['object_type'] = "image";
                $context['img'] = $data['image'];
    
            } 
            if(($_GET['show'])=="info") {

                $context['object_type'] = "info";
                $context['info'] = $data['info'];
            }
        }

        $context['description'] = $data['description'];
        $context['ObjectID'] = $data['id'];
        $context['title'] = $data['title'];
        $context["my_session_message"] = isset($_SESSION['welcome_message']) ? $_SESSION['welcome_message'] : "";
        $context["messages"] = isset($_SESSION['messages']) ? $_SESSION['messages'] : "";
        
        return $context;
    }
}