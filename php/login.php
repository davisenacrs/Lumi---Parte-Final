<?php
session_start();
include 'db.php';

$mensagemErro = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['senha'])) {
        $_SESSION['usuario_id'] = $user['id'];
        header('Location: index.php');
        exit;
    } else {
        $mensagemErro = 'Email ou senha incorretos.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="icon" type="image/png" href="../img/logo.png">
    <title>Login - LUMI</title>
</head>
<body>

    <div class="logo">
        <a href="index.php">
            <img src="../img/logo.png" alt="Logo Lumi" class="logo-imagem">
            <h2>Lumi</h2>
        </a>
    </div>

    <div class="login">
        <h2>Entre com seu Login:</h2>

        <form action="login.php" method="post">
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Senha" required><br>
            <button type="submit">Login</button>
            <p>Você ainda não tem uma conta? <a class="cadastro" href="cadastro.php">Cadastre-se</a></p>
        </form>

        <?php if (!empty($mensagemErro)) : ?>
            <div class="error-message"><?= $mensagemErro ?></div>
        <?php endif; ?>
    </div>

</body>
</html>
