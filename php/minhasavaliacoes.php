<?php
include 'db.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

$usuario_id = $_SESSION['usuario_id'];

// Consulta para obter todas as avaliações do usuário
$sql = "
    SELECT 
        a.avaliacao, 
        a.comentario, 
        f.titulo AS titulo_filme, 
        s.titulo AS titulo_serie
    FROM avaliacoes a 
    LEFT JOIN filmes f ON a.filmes_id = f.id 
    LEFT JOIN series s ON a.series_id = s.id 
    WHERE a.usuario_id = ?
    ORDER BY a.id DESC
";
$stmt = $pdo->prepare($sql);
$stmt->execute([$usuario_id]);
$avaliacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/minhasavaliacoes.css">
    <link rel="icon" type="image/png" href="../img/logo.png">
    <title>Minhas Avaliações - LUMI</title>
</head>
<body>
    <header class="header">
        <div class="logo-area">
            <img src="../img/logo.png" alt="Logo Lumi">
            <span class="logo-text">Lumi</span>
        </div>
        <nav class="menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="filmes.php">Filmes</a></li>
                <li><a href="series.php">Séries</a></li>
                <li><a href="minhasavaliacoes.php">Minhas Avaliações</a></li>
            </ul>
        </nav>
        <div class="botoes-header">
            <?php if (isset($_SESSION['usuario_id'])): ?>
                <a href="logout.php" class="btn-logout">Sair</a>
            <?php endif; ?>
        </div>
    </header>

<main>
    <section class="avaliacoes-lista">
        <h2>Minhas Avaliações</h2>

        <?php if (empty($avaliacoes)): ?>
            <p class="sem-avaliacoes">Você ainda não avaliou nenhum filme ou série.</p>
        <?php else: ?>
            <?php foreach ($avaliacoes as $avaliacao): ?>
                <div class="avaliacao">
                    <h3>
                        <?php
                        echo !empty($avaliacao['titulo_filme'])
                            ? htmlspecialchars($avaliacao['titulo_filme'])
                            : htmlspecialchars($avaliacao['titulo_serie']);
                        ?>
                    </h3>
                    <p><strong>Nota:</strong> <?php echo $avaliacao['avaliacao']; ?>/5</p>
                    <p><strong>Comentário:</strong> <?php echo htmlspecialchars($avaliacao['comentario']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>
</main>

<footer>
    <div class="direitos">
        <p>Lumi © 2024 - Todos os direitos reservados.</p>
    </div>
    <div class="redes">
        <p>Siga o Lumi nas redes sociais:</p>
    </div>
</footer>
</body>
</html>