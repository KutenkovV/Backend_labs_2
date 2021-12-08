<?php
require_once "BaseAnimeTwigController.php";

class AnimeObjectUpdateController extends BaseAnimeTwigController
{
    public $template = "update.twig";

    public function getContext(): array
    {
        $context = parent::getContext();
        
        $type_name = isset($_GET['type_name']) ? $_GET['type_name'] : '';

        $sqlShow = <<<EOL
        SELECT type_name
        FROM anime_type
        EOL;

        $query = $this->pdo->prepare($sqlShow);
        $query->bindValue("type_name", $type_name);
        $query->execute();

        $context['anime_type'] = $query->fetchAll();
        
        return $context;
    }

    public function get(array $context)
    {

        $id = $this->params['id'];

        $sql = <<<EOL
SELECT * FROM anime_series WHERE id = :id
EOL;

        $query = $this->pdo->prepare($sql);
        $query->bindValue("id", $id);
        $query->execute();

        $data = $query->fetch();

        $context['object'] = $data;
        parent::get($context);
    }

    public function post(array $context)
    {

        $id = $this->params['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $info = $_POST['info'];

        $tmp_name = $_FILES['image']['tmp_name'];
        $name =  $_FILES['image']['name'];
        move_uploaded_file($tmp_name, "../public/media/$name");
        $image_url = "/media/$name";

        if (empty($name)) {
            $sql = <<<EOL
            UPDATE anime_series 
SET title = :title, description = :description, type = :type, info = :info
WHERE id = :id
EOL;
            $query = $this->pdo->prepare($sql);
            $query->bindValue("id", $id);
            $query->bindValue("title", $title);
            $query->bindValue("description", $description);
            $query->bindValue("type", $type);
            $query->bindValue("info", $info);
        } else {
            $sql = <<<EOL
            UPDATE anime_series 
SET title = :title, description = :description, type = :type, info = :info, image = :image_url
WHERE id = :id
EOL;
            $query = $this->pdo->prepare($sql);
            $query->bindValue("id", $id);
            $query->bindValue("title", $title);
            $query->bindValue("description", $description);
            $query->bindValue("type", $type);
            $query->bindValue("info", $info);
            $query->bindValue("image_url", $image_url);
        }

        $query->execute();
        $context['message'] = 'Редактирование прошло успешно!';
        $context['id'] = $id;

        $this->get($context);
    }
}
