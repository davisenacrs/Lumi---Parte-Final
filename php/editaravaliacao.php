<?php
session_start();
include 'db.php';

if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: index.php");
    exit;
}

$mensagem = '';
$avaliacao_id = $_GET['id'] ?? null;

if ($avaliacao_id) {
    $stmt = $pdo->prepare("SELECT * FROM avaliacoes WHERE id = ?");
    $stmt->execute([$avaliacao_id]);
    $avaliacao = $stmt->fetch();

    if (!$avaliacao) {
        echo "Avaliação não encontrada.";
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $novaNota = $_POST['nova_nota'];
        $novoComentario = $_POST['novo_comentario'];

        $update = $pdo->prepare("UPDATE avaliacoes SET avaliacao = ?, comentario = ? WHERE id = ?");
        if ($update->execute([$novaNota, $novoComentario, $avaliacao_id])) {
            $mensagem = "<p style='color:green; text-align:center;'>Avaliação atualizada com sucesso!</p>";
            $avaliacao['avaliacao'] = $novaNota;
            $avaliacao['comentario'] = $novoComentario;
        } else {
            $mensagem = "<p style='color:red; text-align:center;'>Erro ao atualizar avaliação.</p>";
        }
    }
} else {
    echo "ID inválido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Avaliação</title>
    <link rel="stylesheet" href="../css/adm.css">
    <link rel="icon" type="image/png" href="../img/logo.png">
</head>
<body>

    <h2 style="text-align:center;">✏️ Editar Avaliação</h2>
    <?= $mensagem ?>

    <form method="POST" style="max-width: 500px; margin: 0 auto; text-align:center;">
        <label for="nova_nota">Nova nota (1 a 5):</label>
        <input type="number" name="nova_nota" min="1" max="5" value="<?= $avaliacao['avaliacao'] ?>" required>

        <label for="novo_comentario">Comentário:</label>
        <textarea name="novo_comentario" rows="4" cols="50" required><?= htmlspecialchars($avaliacao['comentario']) ?></textarea>

        <button type="submit">Salvar Alterações</button>

        <a href="adm.php">Voltar ao Painel</a>
    </form>

</body>
</html>
