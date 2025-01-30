<?php defined('CONTROL') or die('Acesso negado!');?>

<div class="login-card">
    <h2 class="text-center mb-4">Register</h2>
    <form method="POST" action="?route=login">
    <div class="mb-3">
            <label for="user" class="form-label">User</label>
            <input type="text" class="form-control" id="user" placeholder="Digite seu email">
            <!-- <small class="form-text">O Usuário já está em uso.</small> -->
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Digite seu email">
            <!-- <small class="form-text">O Email já está em uso.</small> -->
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" placeholder="Digite sua senha">
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
        <div class="text-center mt-3">
            <small class="form-text">Já possuo uma conta. <a href="?route=login">Logar</a></small>
        </div>
    </form>
</div>