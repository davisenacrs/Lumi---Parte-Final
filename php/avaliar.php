<?php
session_start();
include 'conexao.php'; // Inclua seu arquivo de conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $filme_id = $_POST['filme_id'];
    $usuario_id = $_SESSION['user_id']; // Supondo que você tenha o ID do usuário na sessão
    $avaliacao = intval($_POST['avaliacao']);
    $comentario = $_POST['comentario'] ?? '';

    // Prepare a consulta
    $sql = "INSERT INTO avaliacoes (filme_id, usuario_id, avaliacao, comentario) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiis", $filme_id, $usuario_id, $avaliacao, $comentario);

    if ($stmt->execute()) {
        // Redireciona de volta para a página do filme com sucesso
        header("Location: filmes.php?categoria=popular&page=1"); // Ajuste conforme necessário
        exit();
    } else {
        echo "Erro ao enviar a avaliação: " . $stmt->error;
    }
}
?>
