<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>    
    <meta charset="UTF-8">

    <link rel="stylesheet" href="../css/index.css">
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="stylesheet" href="../css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <script src="../js/carousel.js" defer></script> 

    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/series.css">
    <link rel="stylesheet" href="../css/logout.css">
    <script src="../js/style.js" defer ></script>
    <title>Séries - LUMI</title>
</head>
<body>
<div class="wrapper">

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

    <div class="titulo-pag">
        <h2>Séries em destaque:</h2>
    </div>
    
    <div class="series-container">
    <?php
include 'db.php'; // Inclui a conexão com o banco

// Função para obter a nota média das séries
function getNotaMedia($pdo, $id_obra) {
    $stmt = $pdo->prepare("SELECT ROUND(AVG(avaliacao), 1) AS media FROM avaliacoes WHERE series_id = ?");
    $stmt->execute([$id_obra]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row['media'] ?? '0.0';
}

// Consulta para obter as séries usando PDO
$sql = "SELECT id, titulo, descricao, data_lancamento, poster FROM series";
$stmt = $pdo->query($sql);

// Verifica se há resultados e os exibe
if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $media = getNotaMedia($pdo, $row["id"]);

        echo "<div class='serie-item'>";
        echo "<img src='../img/" . $row["poster"] . "' alt='Poster de " . $row["titulo"] . "' class='poster'>";
        echo "<h3>" . $row["titulo"] . "</h3>";

        // Linha com data à esquerda e nota à direita
        echo "<div class='top-info'>";

        // Data à esquerda
        echo "<div class='data-lancamento'>";
        echo "<strong>Data:</strong> " . date("d/m/Y", strtotime($row["data_lancamento"]));
        echo "</div>";

        // Nota à direita
        echo "<div class='avaliacao-media'>";
        echo "<span class='nota'>{$media}</span>";
        echo "<img src='../img/estrela.png' alt='Estrela' class='estrela-icon'>";
        echo "</div>";

        echo "</div>"; // fecha top-info

        // Botão centralizado abaixo
        echo "<div class='avaliar-btn'>";
        echo "<a href='avaliarSeries.php?id=" . $row["id"] . "' class='avaliar-btn'>Adicione uma avaliação</a>";
        echo "</div>";

        echo "</div>"; // fecha .serie-item
    }
} else {
    echo "<p>Nenhuma série encontrada.</p>";
}
?>

</div>
 
<button class="btn-topo" id="btnTopo" title="Voltar ao topo">↑</button>
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
