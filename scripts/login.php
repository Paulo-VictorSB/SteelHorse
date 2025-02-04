<?php defined('CONTROL') or die('Acesso negado!');

$msgEmail = "";
$msgPass = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $steelhorse_server = new user();
    $isValidLogin = $steelhorse_server->login($email, $senha);

    if (!$isValidLogin) { 
        if ($steelhorse_server->errorEmail) {
            $msgEmail = $steelhorse_server->errorEmail;
        }
        
        if ($steelhorse_server->errorPassword) {
            $msgPass = $steelhorse_server->errorPassword;
        }
    } else {
        session_start();
        $_SESSION['isLogged'] = true;
        $_SESSION['id'] = $steelhorse_server->get_id();
        $_SESSION['nome'] = $steelhorse_server->get_name();
        $_SESSION['function'] = $steelhorse_server->get_function();
        session_write_close();
        header("Location: ?route=home");
        exit();
    }
}

?>

<div class="login-card">
    <h2 class="text-center mb-4">Logar</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control mb-1" id="email" name="email" placeholder="Digite seu email">
            <?php if($msgEmail != ""):?>
                <small class="form-text">O Email não existe.</small>
            <?php endif;?>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" placeholder="Digite sua senha" name="senha">
            <?php if($msgPass != ""):?>
                <small class="form-text">A senha está incorreta.</small>
            <?php endif;?>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary" id="entrar">Entrar</button>
        </div>
        <div class="text-center mt-3">
            <small class="form-text">Não tem uma conta? <a href="?route=register">Registre-se</a></small>
        </div>
    </form>
</div>
