<?php
require_once "BaseAnimeTwigController.php";

class AnimeTypeCreateController extends BaseAnimeTwigController {
    public $template = "type_create.twig";

    // здесь выводим, что есть в таблице
    public function getContext(): array {
        $context = parent::getContext();

        $type_name = isset($_GET['type_name']) ? $_GET['type_name'] : '';
        $image = isset($_GET['image']) ? $_GET['image'] : '';

$sqlShow = <<<EOL
SELECT type_name, image
FROM anime_type
EOL;
        $query = $this->pdo->prepare($sqlShow); //Выполняем запрос на вывод

        $query->bindValue("type_name", $type_name);
        $query->bindValue("image", $image);
        $query->execute();

        $context['anime_type'] = $query->fetchAll();
        return $context;
    }

    // здесь выполняем добавление
    public function post(array $context) {

        $type_name = $_POST['type_name'];

        $tmp_name = $_FILES['image']['tmp_name'];
        $name =  $_FILES['image']['name'];
        move_uploaded_file($tmp_name, "../public/media/$name");
        $image_url = "/media/$name";


        $sql = <<<EOL
INSERT INTO anime_type(type_name, image)
VALUES(:type_name, :image_url)
EOL;

        $query = $this->pdo->prepare($sql);

        $query->bindValue("type_name", $type_name);
        $query->bindValue("image_url", $image_url);
        $query->execute();
        
        $context['message'] = 'Добавление прошло успешно!';
        $context['id'] = $this->pdo->lastInsertId();
        
        $this->get($context);
    }
}