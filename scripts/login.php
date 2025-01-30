<?php defined('CONTROL') or die('Acesso negado!');?>

<div class="login-card">
    <h2 class="text-center mb-4">Logar</h2>
    <form method="POST" action="?route=home">
        <div class="mb-3">
            <label for="email" class="form-label">Email or User</label>
            <input type="text" class="form-control" id="emailOrUser" placeholder="example@example.com">
            <!-- <small class="form-text">O Email já está em uso.</small> -->
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" placeholder="*****">
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Entrar</button>
        </div>
        <div class="text-center mt-3">
            <small class="form-text">Não tem uma conta? <a href="?route=register">Registre-se</a></small>
        </div>
    </form>
</div>