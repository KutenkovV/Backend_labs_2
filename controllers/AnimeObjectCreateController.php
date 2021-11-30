<?php
require_once "BaseAnimeTwigController.php";

class AnimeObjectCreateController extends BaseAnimeTwigController {
    public $template = "create.twig";

    public function post(array $context) {

        $title = $_POST['title'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $info = $_POST['info'];

        $tmp_name = $_FILES['image']['tmp_name'];
        $name =  $_FILES['image']['name'];
        move_uploaded_file($tmp_name, "../public/media/$name");
        $image_url = "/media/$name";

        $sql = <<<EOL
INSERT INTO anime_series(title, description, type, info, image)
VALUES(:title, :description, :type, :info, :image_url)
EOL;


        $query = $this->pdo->prepare($sql);
        $query->bindValue("title", $title);
        $query->bindValue("description", $description);
        $query->bindValue("type", $type);
        $query->bindValue("info", $info);
        $query->bindValue("image_url", $image_url);
        $query->execute();
        
        $context['message'] = 'Добавление прошло успешно!';
        $context['id'] = $this->pdo->lastInsertId();

        $this->get($context);
    }
}