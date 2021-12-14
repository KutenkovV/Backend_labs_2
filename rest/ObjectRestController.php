<?php

class ObjectRestController extends BaseRestController{
    function list(){
        $query = $this->pdo->query("SELECT id, title FROM anime_series");
        $query->execute();

        $data = $query->fetchAll();
        header("Content-type: aplication/json");
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    function retieve()
    {
        $query = $this->pdo->query("SELECT * FROM anime_series WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();

        $data = $query->fetch();
        header("Content-type: aplication/json");
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    function update(){
        $data = file_get_contents("php://input");
        $data = json_decode($data, True);

        $sql = <<<EOL
        UPDATE anime_series SET description = :description WHERE id = :id
        EOL;

        $query = $this->pdo->prepare($sql);
        $query->bindValue("id", $this->params['id']);
        $query->bindValue("description", $data['description']);
        $query->execute();

        http_response_code(204);
        header("Content-type: aplication/json");
        echo json_encode(['id'=> $this->params['id']]);
    }

    function delete()
    {
        $query = $this->pdo->query("DELETE * FROM anime_series WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();

        header("Content-type: aplication/json");
        echo json_encode("Строка удалена", JSON_UNESCAPED_UNICODE);
    }
}