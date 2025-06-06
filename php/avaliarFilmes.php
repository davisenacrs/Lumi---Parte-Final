<?php
include 'db.php';
session_start();

// Verifica se o ID do filme foi passado
if (!isset($_GET['id'])) {
    echo "<p>ID do filme não especificado. Por favor, selecione um filme para avaliar.</p>";
    exit;
}

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

$id_filme = $_GET['id'];
$usuario_id = $_SESSION['usuario_id'];

// Consulta dados do filme
$sql = "SELECT titulo, descricao, data_lancamento, poster FROM filmes WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id_filme]);
$filme = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$filme) {
    echo "<p>Filme não encontrado.</p>";
    exit;
}

// Consulta média de avaliações
$sql_media = "SELECT AVG(avaliacao) as media FROM avaliacoes WHERE filmes_id = ?";
$stmt_media = $pdo->prepare($sql_media);
$stmt_media->execute([$id_filme]);
$media = $stmt_media->fetchColumn();

// Busca trailer no YouTube
$apiKey = 'AIzaSyAdr9XVnU0PieuYzACnV7LFxsz_jaHiYHk'; // Substitua aqui
$tituloBusca = urlencode($filme['titulo'] . " trailer oficial");

$urlYoutube = "https://www.googleapis.com/youtube/v3/search?part=snippet&q=$tituloBusca&type=video&maxResults=1&key=$apiKey";
$response = @file_get_contents($urlYoutube);
$data = [];

if ($response !== false) {
    $data = json_decode($response, true);
}

$videoId = null;
if (!empty($data['items'])) {
    $videoId = $data['items'][0]['id']['videoId'];
}

// Insere nova avaliação se enviada
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comentario = $_POST['comentario'];
    $nota = $_POST['nota'];

    $sql_insert = "INSERT INTO avaliacoes (filmes_id, usuario_id, comentario, avaliacao) VALUES (?, ?, ?, ?)";
    $stmt_insert = $pdo->prepare($sql_insert);

    if ($stmt_insert->execute([$id_filme, $usuario_id, $comentario, $nota])) {
        echo "<div class='accuracy-message'>Avaliação adicionada com sucesso!</div>";
    } else {
        echo "<div class='error-message'>Erro ao adicionar a avaliação. Tente novamente.</div>";
    }
}

// Consulta avaliações
$sql_avaliacoes = "
    SELECT u.nome, a.avaliacao, a.comentario
    FROM avaliacoes a
    JOIN usuarios u ON a.usuario_id = u.id
    WHERE a.filmes_id = ?
    ORDER BY a.id DESC
";
$stmt_avaliacoes = $pdo->prepare($sql_avaliacoes);
$stmt_avaliacoes->execute([$id_filme]);
$avaliacoes = $stmt_avaliacoes->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($filme['titulo']); ?></title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/logout.css">
    <link rel="stylesheet" href="../css/avaliar.css">
    <link rel="icon" type="image/png" href="../img/logo.png">
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
        <a href="logout.php" class="btn-login">Sair</a>
    </div>
</header>

    <div class="avaliarfilmes">
        <h2><?php echo htmlspecialchars($filme['titulo']); ?></h2>

        <?php if ($media): ?>
            <div class="media-avaliacao">
                <h3>Média dos usuários:  <?php echo number_format($media, 1); ?> ★</h3>
            </div>
        <?php else: ?>
            <div class="media-avaliacao">
                <h3>Este filme ainda não foi avaliado.</h3>
            </div>
        <?php endif; ?>

        <!-- Trailer ou Poster -->
        <?php if ($videoId): ?>
            <div class="trailer-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $videoId; ?>" frameborder="0" allowfullscreen></iframe>
            </div>
        <?php else: ?>
            <img src="../img/<?php echo htmlspecialchars($filme['poster']); ?>" alt="Poster" class="poster">
        <?php endif; ?>

        <p class="descricao"><?php echo htmlspecialchars($filme['descricao']); ?></p>
        <p class="lancamento"><strong>Data de Lançamento:</strong> <?php echo date("d/m/Y", strtotime($filme['data_lancamento'])); ?></p>
    </div>
    
    <div class="av">
        <div class="av2">
            <form action="" method="POST">
                <label for="comentario">Compartilhe conosco seu comentário:</label>
                <textarea name="comentario" id="comentario" required></textarea>

                <label for="nota">Essa obra merece qual avaliação?</label>
                <div class="estrelas">
                    <input type="radio" name="nota" id="estrela5" value="5">
                    <label for="estrela5">★ <span>5</span></label>

                    <input type="radio" name="nota" id="estrela4" value="4">
                    <label for="estrela4">★ <span>4</span></label>

                    <input type="radio" name="nota" id="estrela3" value="3">
                    <label for="estrela3">★ <span>3</span></label>

                    <input type="radio" name="nota" id="estrela2" value="2">
                    <label for="estrela2">★ <span>2</span></label>

                    <input type="radio" name="nota" id="estrela1" value="1">
                    <label for="estrela1">★ <span>1</span></label>
                </div>

                <button type="submit">Enviar Avaliação</button>
            </form>

            <div class="avaliacoes-lista">
                <h3>Avaliações dos usuários:</h3>
                <?php if ($avaliacoes): ?>
                    <?php foreach ($avaliacoes as $avaliacao): ?>
                        <div class="avaliacao">
                            <strong><?= htmlspecialchars($avaliacao['nome']) ?> (<?= number_format($avaliacao['avaliacao'], 1) ?>★):</strong>
                            <p><?= htmlspecialchars($avaliacao['comentario']) ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="sem-avaliacoes">Nenhuma avaliação registrada ainda.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
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
