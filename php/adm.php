
<?php
session_start();
include 'db.php';

if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: index.php");
    exit;
}

if (isset($_GET['excluir_usuario'])) {
    $id = (int) $_GET['excluir_usuario'];
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: adm.php");
    exit;
}

if (isset($_GET['excluir_avaliacao'])) {
    $id = (int) $_GET['excluir_avaliacao'];
    $stmt = $pdo->prepare("DELETE FROM avaliacoes WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: adm.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel do Administrador</title>
    <link rel="stylesheet" href="../css/adm.css">
    <link rel="icon" type="image/png" href="../img/logo.png">

</head>
<body>

    <h1>Painel do Administrador</h1>
    <h2>👤 Gerenciar Usuários</h2>
    <table>
        <tr><th>Nome</th><th>Email</th><th>Ação</th></tr>
        <?php
            $usuarios = $pdo->query("SELECT id, nome, email FROM usuarios WHERE tipo != 'admin'");
            foreach ($usuarios as $usuario) {
                echo "<tr>
                        <td>{$usuario['nome']}</td>
                        <td>{$usuario['email']}</td>
                        <td>
                            <a href='adm.php?excluir_usuario={$usuario['id']}' onclick=\"return confirm('Deseja excluir este usuário?')\">Excluir</a>
                        </td>
                    </tr>";
            }
        ?>
    </table>

    <h2>⭐ Gerenciar Avaliações</h2>
    <table>
        <tr><th>Usuário</th><th>Obra</th><th>Tipo</th><th>Nota</th><th>Ações</th></tr>
        <?php
        $sql = "
        SELECT a.id, u.nome AS usuario, a.avaliacao, 
               CASE 
                   WHEN a.filmes_id IS NOT NULL THEN (SELECT titulo FROM filmes WHERE id = a.filmes_id)
                   WHEN a.series_id IS NOT NULL THEN (SELECT titulo FROM series WHERE id = a.series_id)
                   ELSE 'Desconhecido'
               END AS titulo,
               CASE 
                   WHEN a.filmes_id IS NOT NULL THEN 'Filme'
                   WHEN a.series_id IS NOT NULL THEN 'Série'
                   ELSE 'N/A'
               END AS tipo
        FROM avaliacoes a
        JOIN usuarios u ON a.usuario_id = u.id
        ";
        $avaliacoes = $pdo->query($sql);
        foreach ($avaliacoes as $avaliacao) {
            echo "<tr>
                    <td>{$avaliacao['usuario']}</td>
                    <td>{$avaliacao['titulo']}</td>
                    <td>{$avaliacao['tipo']}</td>
                    <td>{$avaliacao['avaliacao']}</td>
                    <td>
                        <a href='editaravaliacao.php?id={$avaliacao['id']}'>Editar</a> |
                        <a href='adm.php?excluir_avaliacao={$avaliacao['id']}' onclick=\"return confirm('Excluir avaliação?')\">Excluir</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>

</body>
</html>
