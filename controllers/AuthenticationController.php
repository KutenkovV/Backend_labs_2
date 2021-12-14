<?php 

require_once "BaseAnimeTwigController.php";
class AuthenticationController extends BaseAnimeTwigController {

    public $template = "Authentication.twig";
    public $title = "Авторизация";

    public function getContext(): array
    {
        $context = parent::getContext();
        return $context;
    }

    public function get(array $context)
    {
        parent::get($context);
    }

    public function post(array $context) { 
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql =<<<EOL
        SELECT username, password
FROM users
WHERE   (username = :username)
        AND (password = :password)
EOL; 
        $query = $this->pdo->prepare($sql);
        $query->bindValue("username", $username);
        $query->bindValue("password", $password);
        $query->execute([':username' => $username, ':password' => $password]);
        if ($query->fetchColumn()) {
            $_SESSION["is_logged"] = true;
            header("Location: /");
            exit; 
        }else{
            $context['message'] = 'Такого пользователя не существует'; 
            $this->get($context);
        }
    }
}