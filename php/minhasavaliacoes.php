
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/avaliacoes.css">
    <link rel="stylesheet" href="../css/logout.css">
    <link rel="icon" type="image/png" href="../img/logo.png">
    <title>Avaliações - LUMI</title>
</head>
<body>
<div class="wrapper">
    <header>
        <h1>Light Up My Imagination</h1>
        <img src="../img/logo.png" alt="Logo Lumi" class="logo-imagem">
    </header>

    <nav>
        <ul>
        <li class="home"><a href="home.php">Home</a></li>
        <li class="filmes"><a href="filmes.php">Filmes</a></li>
        <li class="series"><a href="series.php">Séries</a></li>
        <li class="avaliacao"><a href="avaliacoes.php">Avaliações</a></li>
        <li class="logout"><a href="logout.php" class="btn-logout">Sair</a></li>
            <?php if (isset($_SESSION['user_id'])): ?> 
                <li class="logout"><a href="logout.php" class="btn-logout">Sair</a></li>
            <?php endif; ?>        
        </ul>
    </nav>

    <?php
    include 'db.php'; // Inclui a conexão com o banco
    session_start(); // Inicia a sessão

    // Verifica se o usuário está logado
    if (!isset($_SESSION['usuario_id'])) {
        echo "<p>Usuário não especificado. Por favor, faça login para ver as avaliações.</p>";
        header("Location: login.php"); // Redireciona para a página de login
        exit;
    }

    // Consulta para obter todas as avaliações para filmes e séries
    $sql = "
        SELECT 
            a.avaliacao, 
            a.comentario, 
            f.titulo AS titulo_filme, 
            s.titulo AS titulo_serie, 
            u.nome 
        FROM avaliacoes a 
        LEFT JOIN filmes f ON a.filmes_id = f.id 
        LEFT JOIN series s ON a.series_id = s.id 
        JOIN usuarios u ON a.usuario_id = u.id
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $avaliacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($avaliacoes)) {
        echo "<p>Ainda não há avaliações registradas.</p>";
    } else {
        echo "<h5>Avaliações</h5>";
        echo "<div class='avaliacoes-container'>";
        foreach ($avaliacoes as $avaliacao) {
            echo "<div class='avaliacao-item'>";
            if (!empty($avaliacao['titulo_filme'])) {
                echo "<h2>" . htmlspecialchars($avaliacao['titulo_filme']) . "</h2>";
            } elseif (!empty($avaliacao['titulo_serie'])) {
                echo "<h2>" . htmlspecialchars($avaliacao['titulo_serie']) . "</h2>";
            }
            echo "<p class='nota'><strong>Avaliação:</strong> " . htmlspecialchars($avaliacao['avaliacao']) . "/5</p>";
            echo "<p class='comentario'><strong>Comentário:</strong> " . htmlspecialchars($avaliacao['comentario']) . "</p>";
            echo "<p class='avaliador'><strong>Avaliador:</strong> " . htmlspecialchars($avaliacao['nome']) . "</p>";
            echo "</div>";
        }
        echo "</div>";
    }
?>

    <footer>
        <p>Lumi © 2024 - Todos os direitos reservados.</p>
    </footer>
</div>
</body>
</html>
