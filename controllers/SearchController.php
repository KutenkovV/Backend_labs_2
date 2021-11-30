<?php 
require_once "BaseAnimeTwigController.php";

class SearchController extends BaseAnimeTwigController {
    public $template = "search.twig";

    public function getContext(): array
    {
        $context = parent::getContext();

        $type = isset($_GET['type']) ? $_GET['type'] : '';
        $title = isset($_GET['title']) ? $_GET['title'] : '';
        $info = isset($_GET['info']) ? $_GET['info'] : '';

        if (isset($_GET['type'])) {
            if(($_GET['type'])=="Все"){
                $sql = <<< EOL
SELECT id, title, info
FROM anime_series
WHERE (:title = '' OR title like CONCAT('%', :title, '%'))
        AND (:info = '' OR info like CONCAT('%', :info, '%'))
EOL;
            } else{
                $sql = <<< EOL
SELECT id, title, info
FROM anime_series
WHERE (:title = '' OR title like CONCAT('%', :title, '%'))
        AND (type = :type)
        AND (:info = '' OR info like CONCAT('%', :info, '%'))
EOL;
    }

        $query = $this->pdo->prepare($sql);

        $query->bindValue("title", $title);
        $query->bindValue("type", $type);
        $query->bindValue("info", $info);
        $query->execute();

        $context['anime_series'] = $query->fetchAll();
        }

        return $context;
    }
}