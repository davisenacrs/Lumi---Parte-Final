<?php
session_start();
include 'db.php';

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$nome, $email, $senha])) {
        $mensagem = '<div class="accuracy-message">Usuário cadastrado com sucesso!</div>';
    } else {
        $mensagem = '<div class="error-message">Erro ao cadastrar o usuário. Tente novamente.</div>';
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
    <title>Cadastro - LUMI</title>
</head>
<body>

    <div class="logo">
        <a href="index.php">
            <img src="../img/logo.png" alt="Logo Lumi" class="logo-imagem">
            <h2>Lumi</h2>
        </a>
    </div>

    <div class="login">
        <h2>Crie seu cadastro:</h2>

        <form action="cadastro.php" method="post" onsubmit="return validateForm()">
            <input type="text" name="nome" placeholder="Nome" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="senha" placeholder="Senha" required><br>
            <button type="submit">Cadastrar</button>
            <p>Você já possui uma conta? <a class="cadastro" href="login.php">Login</a></p>
        </form>

        <?= $mensagem ?>
    </div>

    <script src="js/validation.js"></script>

</body>
</html>
