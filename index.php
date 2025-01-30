<?php

define('CONTROL', true);

$routes = require_once('controller/routes.php');

$route = $_GET['route'] ?? 'login';

if(!in_array($route, $routes)){
    $route = '404';
}

switch($route){
    case '404':
        require_once('inc/header.php');
        require_once('scripts/404.php');
        require_once('inc/footer.php');
        break;
    case 'login':
        require_once('inc/header.php');
        require_once('scripts/login.php');
        require_once('inc/footer.php');
        break;
    case 'register':
        require_once('inc/header.php');
        require_once('scripts/register.php');
        require_once('inc/footer.php');
        break;
    case 'home':
        require_once('inc/header.php');
        require_once('scripts/home.php');
        require_once('inc/footer.php');
        break;
}