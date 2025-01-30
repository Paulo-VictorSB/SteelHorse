<?php defined('CONTROL') or die('Acesso negado!');

$msgNome = "";
$msgEmail = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {   
    $email = trim($_POST['email']);
    $nome = trim($_POST['nome']);
    $senha = $_POST['senha'];
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    // Validação do nome
    if (strlen($nome) < 5) {
        $msgNome = "O nome deve ter pelo menos 5 caracteres.";
    }

    // Validação do e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msgEmail = "O e-mail digitado é inválido.";
    }

    if ($msgNome === "" && $msgEmail === "") {
        $steelhorse_server = new user();
        $isValidRegister = $steelhorse_server->register($email, $nome, $senhaHash);

        if ($isValidRegister === true) {
            header("Location: ?route=login");
            exit();
        } elseif ($isValidRegister === "O e-mail já está cadastrado.") {
            $msgEmail = $isValidRegister;
        } else {
            $msgEmail = "Erro ao registrar. Tente novamente.";
        }
    }
}
?>

<div class="login-card">
    <h2 class="text-center mb-4">Registrar</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="user" class="form-label">Usuário</label>
            <input type="text" class="form-control" id="user" placeholder="Digite seu usuário" name="nome" value="<?= htmlspecialchars($nome ?? '') ?>">
            <?php if ($msgNome != ""): ?>
                <small class="form-text"><?= $msgNome ?></small>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Digite seu email" name="email" value="<?= htmlspecialchars($email ?? '') ?>">
            <?php if ($msgEmail != ""): ?>
                <small class="form-text"><?= $msgEmail ?></small>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" placeholder="Digite sua senha" name="senha">
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
        <div class="text-center mt-3">
            <small class="form-text">Já possuo uma conta. <a href="?route=login">Logar</a></small>
        </div>
    </form>
</div>