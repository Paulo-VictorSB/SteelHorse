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

switch($_SESSION['function'])
{
    case 'admin':
        require_once('inc/admin.php');
        break;
    case 'operator':
        require_once('inc/operator.php');
        break;
}

?>  