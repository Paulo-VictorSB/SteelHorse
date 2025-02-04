<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    session_destroy();
    header("Location: ?route=login");
    exit();
}

?>

<div class="sidebar shadow px-3">
    <div class="row justify-content-center">
        <div class="col">
            <h4 style="font-style: italic;">Steel Horse</h4>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col">
            <a href="?route=profile"><i class="fa-solid fa-user"></i> <?=$_SESSION['nome']?></a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col">
            <a href="?route=inicio">Inicio</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col">
            <a href="?route=ger_users">Gerenciar Clientes</a>
        </div>        
    </div>
    <div class="row justify-content-center">
        <div class="col">
            <a href="?route=ger_anuncios">Gerenciar Anúncios</a>
        </div>       
    </div>
    <div class="row justify-content-center">
        <div class="col bg-dark">
            <form method="POST">
                <button type="submit" class="btn btn-primary">Exit</button>
            </form>
        </div>      
    </div>
</div>