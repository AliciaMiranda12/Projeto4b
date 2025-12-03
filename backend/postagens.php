<?php
session_start();
include 'conexao.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['IdUsuario'])) {
    die("Usuário não logado!");
}

// Recebe os dados do formulário
$IdUsuario = $_SESSION['IdUsuario'];
$titulo = $_POST['titulo'] ?? null;
$conteudo = $_POST['conteudo'] ?? null;

// Validação simples
if (!$titulo || !$conteudo) {
    die("Preencha todos os campos!");
}

// Prepara a query de inserção
$stmt = $connection->prepare("INSERT INTO postagens (IdUsuario, Titulo, Conteudo, DataPostagem) VALUES (?, ?, ?, NOW())");

// Verifica se a preparação deu certo
if (!$stmt) {
    die("Erro na preparação da query: " . $connection->error);
}

// Liga os parâmetros
$stmt->bind_param("iss", $IdUsuario, $titulo, $conteudo);

// Executa a query
if ($stmt->execute()) {
    echo "Postagem criada com sucesso!";
} else {
    echo "Erro ao criar postagem: " . $stmt->error;
}

// Fecha statement e conexão
$stmt->close();
$connection->close();
header('Location: index.php');
?>
