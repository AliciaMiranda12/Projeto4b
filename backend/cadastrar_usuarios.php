<?php
include '../backend/cors.php';
include '../backend/conexao.php'; // aqui está sua conexão MySQLi: $connection

// Pegando dados enviados pelo formulário
$nome  = $_POST['nome']  ?? exit("Nome não enviado");
$senha = $_POST['senha'] ?? exit("Senha não enviada");
$email = $_POST['email'] ?? exit("Email não enviado");

// Preparar a query para evitar SQL injection
$stmt = $connection->prepare("INSERT INTO usuarios (nome, senha, email) VALUES (?, ?, ?)");
if (!$stmt) {
    die("Falha na preparação da query: " . $connection->error);
}

// Vincular os parâmetros
$stmt->bind_param("sss", $nome, $senha, $email);

// Executar a query
if ($stmt->execute()) {
    echo "Usuário cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar usuário: " . $stmt->error;
}

// Fechar statement e conexão
$stmt->close();
$connection->close();

// Redirecionar após cadastro
header('Location: index.php');
exit;
?>
