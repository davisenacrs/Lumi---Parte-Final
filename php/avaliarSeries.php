
<?php
include 'db.php'; 
session_start();

if (!isset($_GET['id'])) {
    echo "<p>ID da série não especificado. Por favor, selecione uma série para avaliar.</p>";
    exit;
}

if (!isset($_SESSION['usuario_id'])) {
    echo "<p>Usuário não especificado. Por favor, faça login para avaliar a série.</p>";
    header("Location: login.php");
    exit;
}

$id_serie = $_GET['id'];
$usuario_id = $_SESSION['usuario_id'];

$sql = "SELECT titulo, descricao, data_lancamento, poster FROM series WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id_serie]);
$serie = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$serie) {
    echo "<p>Série não encontrada.</p>";
    exit;
}

// Consulta para média de avaliação
$sql_media = "SELECT AVG(avaliacao) as media FROM avaliacoes WHERE series_id = ?";
$stmt_media = $pdo->prepare($sql_media);
$stmt_media->execute([$id_serie]);
$media = $stmt_media->fetch(PDO::FETCH_ASSOC);

// Consulta para todas as avaliações
$sql_avaliacoes = "SELECT u.nome, a.comentario, a.avaliacao FROM avaliacoes a 
                   JOIN usuarios u ON a.usuario_id = u.id 
                   WHERE a.series_id = ? ORDER BY a.id DESC";
$stmt_avaliacoes = $pdo->prepare($sql_avaliacoes);
$stmt_avaliacoes->execute([$id_serie]);
$avaliacoes = $stmt_avaliacoes->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/avaliarSeries.css">
    <link rel="stylesheet" href="../css/logout.css">
    <link rel="icon" type="image/png" href="../img/logo.png">
    <title>Avaliação de <?php echo htmlspecialchars($serie['titulo']); ?></title>
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
        <div class="avaliarseries">
            <h2>Avaliação de <?php echo htmlspecialchars($serie['titulo']); ?></h2>
            <img src="../img/<?php echo htmlspecialchars($serie['poster']); ?>" alt="Poster de <?php echo htmlspecialchars($serie['titulo']); ?>" class="poster">
            <p class ="descricao"><?php echo htmlspecialchars($serie['descricao']); ?></p>
            <p class ="lancamento"><strong>Data de Lançamento:</strong> <?php echo date("d/m/Y", strtotime($serie['data_lancamento'])); ?></p>
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

        $sql_insert = "INSERT INTO avaliacoes (series_id, usuario_id, comentario, avaliacao) VALUES (?, ?, ?, ?)";
        $stmt_insert = $pdo->prepare($sql_insert);

        if ($stmt_insert->execute([$id_serie, $usuario_id, $comentario, $nota])) {
            echo "<div class='mensagem-sucesso'>Avaliação adicionada com sucesso!</div>";
        } else {
            echo '<div class="error-message">Erro ao adicionar a avaliação. Tente novamente.</div>';
        }
    }
    ?>

    <?php if ($media && $media['media'] !== null): ?>
        <div class="media-nota">
            <h3>Nota Média: <?php echo number_format($media['media'], 1); ?>/5</h3>
        </div>
    <?php endif; ?>

    <?php if ($avaliacoes): ?>
        <div class="avaliacoes-lista">
            <h3>Avaliações dos Usuários:</h3>
            <?php foreach ($avaliacoes as $avaliacao): ?>
                <div class="avaliacao">
                    <strong><?php echo htmlspecialchars($avaliacao['nome']); ?>:</strong>
                    <p><?php echo htmlspecialchars($avaliacao['comentario']); ?></p>
                    <p>Nota: <?php echo $avaliacao['avaliacao']; ?>/5</p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="sem-avaliacoes">Nenhuma avaliação ainda. Seja o primeiro a avaliar!</p>
    <?php endif; ?>

    <footer>
        <p>Lumi © 2024 - Todos os direitos reservados.</p>
    </footer>
</body>
</html>

