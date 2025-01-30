<?php 

session_start();
defined('CONTROL') or die('Acesso negado!');

if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === false) {
    header("Location: ?route=login");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    session_destroy();
    header("Location: ?route=login");
    exit();
}

?>

<h1>Bem vindo! - <?=$_SESSION['nome']?></h1>
<form method="POST" class="my-1 mx-5">
<button class="btn btn-primary">Deslogar</button>
</form>