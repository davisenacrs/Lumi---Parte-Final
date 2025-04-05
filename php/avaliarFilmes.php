<?php
include 'db.php'; // Inclui a conexão com o banco
session_start(); // Inicia a sessão para acesso ao usuário logado

// Verifica se o ID do filme foi passado pela URL
if (!isset($_GET['id'])) {
    echo "<p>ID do filme não especificado. Por favor, selecione um filme para avaliar.</p>";
    exit;
}

// Verifica se o usuário está logado e o ID do usuário está na sessão
if (!isset($_SESSION['usuario_id'])) {
    echo "<p>Usuário não especificado. Por favor, faça login para avaliar o filme.</p>";
    header("Location: login.php"); // Redireciona para a página de login
    exit;
}

$id_filme = $_GET['id'];
$usuario_id = $_SESSION['usuario_id']; // Obtém o ID do usuário logado

// Consulta para obter as informações do filme
$sql = "SELECT titulo, descricao, data_lancamento, poster FROM filmes WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id_filme]);
$filme = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifica se o filme foi encontrado
if (!$filme) {
    echo "<p>Filme não encontrado.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/avaliarFilmes.css">
    <link rel="stylesheet" href="../css/logout.css">
    <link rel="icon" type="image/png" href="../img/logo.png">
    <title>Avaliação de <?php echo htmlspecialchars($filme['titulo']); ?></title>
</head>
<body>
    <header>
        <h1>Light Up My Imagination</h1>
        <img src="../img/logo.png" alt="Logo Lumi" class="logo-imagem">
    </header>

    <nav>
        <ul>
        <li class="home"><a href="home.php">Home</a></li>
        <li class="filmes"><a href="filmes.php">Filmes</a></li>
        <li class="series"><a href="series.php">Séries</a></li>
        <li class="series"><a href="avaliacoes.php">Avaliações</a></li>
        <li class="logout"><a href="logout.php" class="btn-logout">Sair</a></li>
            <?php if (isset($_SESSION['user_id'])): ?> 
                <li class="logout"><a href="logout.php" class="btn-logout">Sair</a></li>
            <?php endif; ?>        
        </ul>
    </nav>
    <div class="img">   
    <div class="avaliarfilmes">
    <h2>Avaliação de <?php echo htmlspecialchars($filme['titulo']); ?></h2>
        <img src="../img/<?php echo htmlspecialchars($filme['poster']); ?>" alt="Poster de <?php echo htmlspecialchars($filme['titulo']); ?>" class="poster">
        <p class = "descricao"><?php echo htmlspecialchars($filme['descricao']); ?></p>
        <p class ="lancamento"><strong>Data de Lançamento:</strong> <?php echo date("d/m/Y", strtotime($filme['data_lancamento'])); ?></p>
    </div>

    <form action="" method="POST">
        <label for="comentario">Comentário:</label><br>
        <textarea name="comentario" id="comentario" required></textarea><br><br>

        <label for="nota">Nota:</label>
        <select name="nota" id="nota" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br><br>

        <button type="submit">Enviar Avaliação</button>
    </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $comentario = $_POST['comentario'];
        $nota = $_POST['nota'];

        $sql_insert = "INSERT INTO avaliacoes (filmes_id, usuario_id, comentario, avaliacao) VALUES (?, ?, ?, ?)"; // Muda a coluna para series_id
        $stmt_insert = $pdo->prepare($sql_insert);


        if ($stmt_insert->execute([$id_filme, $usuario_id, $comentario, $nota])) {
            echo "<div class='accuracy-message'>Avaliação adicionada com sucesso!</div>";
        } else {
            echo '<div class="error-message">Erro ao adicionar a avaliação. Tente novamente.</div>';
        }
    }
    ?>

    <div>
    <footer>
        <p>Lumi © 2024 - Todos os direitos reservados.</p>
    </footer>
    </div>
</body>
</html>
