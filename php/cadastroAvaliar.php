<?php
include('db.php'); 

$obra_id = $_POST['obra_id'];
$avaliacao = $_POST['avaliacao'];
$comentario = $_POST['comentario'];
$tipo_obra = $_POST['tipo_obra'];

if ($tipo_obra === 'filme') {
    $sql = "INSERT INTO avaliacoes (filme_id, avaliacao, comentario) VALUES ('$obra_id', '$avaliacao', '$comentario')";
} else if ($tipo_obra === 'serie') {
    $sql = "INSERT INTO avaliacoes (serie_id, avaliacao, comentario) VALUES ('$obra_id', '$avaliacao', '$comentario')";
}

if (mysqli_query($conexao, $sql)) {
    echo "Avaliação salva com sucesso!";
} else {
    echo "Erro ao salvar avaliação: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>

