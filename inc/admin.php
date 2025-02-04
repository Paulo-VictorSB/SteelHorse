<?php

defined('CONTROL') or die('Acesso negado!');

$route_home_controller = require_once('controller/routeHome.php');
$routeHome = $_GET['route'] ?? 'home';

if(!in_array($routeHome, $route_home_controller))
{
    $routeHome = '404';
}

switch($routeHome)
{
    case 'inicio':
        require_once('scripts/inicio-section.php');
        break;
    case 'profile':
        require_once('scripts/profile-section.php');
        break;
    case 'ger_users':
        require_once('scripts/ger_users.php');
        break;
    case 'ger_anuncios':
        require_once('scripts/ger_anuncios.php');
        break;
    default:
        require_once('index.php');
        break;
}

require_once('inc/nav.php');

?>