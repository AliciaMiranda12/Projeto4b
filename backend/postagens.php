<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['IdUsuario'])) {
    die("Usuário não logado!");
}

$IdUsuario = $_SESSION['IdUsuario'];
$titulo = $_POST['titulo'] ?? null;
$conteudo = $_POST['conteudo'] ?? null;

if (!$titulo || !$conteudo) {
    die("Preencha todos os campos!");
}

$stmt = $connection->prepare("INSERT INTO postagens (IdUsuario, Titulo, Conteudo, DataPostagem) VALUES (?, ?, ?, NOW())");

if (!$stmt) {
    die("Erro na preparação da query: " . $connection->error);
}


$stmt->bind_param("iss", $IdUsuario, $titulo, $conteudo);


if ($stmt->execute()) {
    echo "Postagem criada com sucesso!";
} else {
    echo "Erro ao criar postagem: " . $stmt->error;
}

$stmt->close();
$connection->close();
header('Location: index.php');
?>
