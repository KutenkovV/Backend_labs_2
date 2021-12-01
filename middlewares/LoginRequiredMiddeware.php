<?php 

class LoginRequiredMiddeware extends BaseMiddleware {
    public function apply(BaseController $controller, array $context)
    {   
        $user_input = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : '';
        $password_input = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : '';

        $sql = <<< EOL
SELECT username, password FROM users WHERE (username = :username AND password = :password)
EOL;

        $query = $controller->pdo->prepare($sql);
        // $query->bindValue("username", $username);
        // $query->bindValue("password", $password);
        
        $query->execute([':username' => $user_input, ':password' => $password_input]);
        if ($query->fetchColumn()) {
        }else{
            header('WWW-Authenticate: Basic realm="Fraction"');
            http_response_code(401); 
            exit; 
        }
    }
}