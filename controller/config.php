<?php

defined('CONTROL') or die('Acesso negado!');

$_SESSION['isLogged'] = false;

class steelhorse_server
{
    private $dbname = 'steelhorse_online';
    private $user = 'steelhorse';
    private $password = 'A0BA64C109C5C6730D517CFA5516D9F8';
    private $host = 'localhost';
    private $connection;

    public function connect()
    {   
        try {
            return new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        } catch (PDOException $erro) {
            die("Erro de conexão: " . $erro->getMessage());
        }
    }

    public function disconnect()
    {
        return $this->connection = null;
    }
}

class user extends steelhorse_server
{   
    private $userId;
    private $userName;
    public $errorEmail = null;
    public $errorPassword = null;
    public $errorName = null;

    public function __construct()
    {
        $this->connection = $this->connect();
    }

    public function get_name(){
        return $this->userName;
    }

    public function get_id(){
        return $this->userId;
    }

    public function login($email, $senha)
    {
        try {
            $query = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->connection->prepare($query);
            $stmt->execute([":email" => $email]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                $this->errorEmail = "E-mail não encontrado.";
                return false;
            }

            if (!password_verify($senha, $user['password'])) {
                $this->errorPassword = "Senha incorreta.";
                return false;
            }

            $this->userId = $user['id'];
            $this->userName = $user['name'];

            return true;

        } catch (PDOException $erro) {
            die("Erro no login: " . $erro->getMessage());
        }
    }

    public function register($email, $nome, $senha)
    {
        try {
            // Verifica se o e-mail já está cadastrado
            $query = "SELECT id FROM users WHERE email = :email";
            $stmt = $this->connection->prepare($query);
            $stmt->execute([":email" => $email]);

            if ($stmt->fetch()) {
                return "O e-mail já está cadastrado.";
            }

            // Insere o usuário no banco
            $query = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
            $stmt = $this->connection->prepare($query);
            $stmt->execute([
                ":name" => $nome,
                ":email" => $email,
                ":password" => $senha
            ]);

            return true;
        } catch (PDOException $erro) {
            return "Erro ao registrar: " . $erro->getMessage();
        }
    }
}

?>