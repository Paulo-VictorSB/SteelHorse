<?php

defined('CONTROL') or die('Acesso negado!');
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    session_destroy();
    header("Location: ?route=login");
    exit();
}

?>

<div class="container">
    <div class="row bg-warning">
        <h1>a</h1>
    </div>
</div>