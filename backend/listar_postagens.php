<?php
include 'conexao.php';
include 'cors.php';

header("Content-Type: application/json; charset=UTF-8");

$sql = "SELECT IdPostagem, IdUsuario, Titulo, Conteudo, DataPostagem FROM postagens ORDER BY IdPostagem DESC";

$result = $connection->query($sql);

if (!$result) {
    echo json_encode(["erro" => "Erro na consulta: " . $connection->error]);
    exit();
}

$postagens = [];

while ($row = $result->fetch_assoc()) {
    $postagens[] = $row;
}

echo json_encode($postagens);
?>
