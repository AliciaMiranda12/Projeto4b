<?php
include '../backend/cors.php';
include '../backend/conexao.php'; // conexão MySQLi: $connection

// Pegando dados enviados pelo formulário
$nome  = $_POST['nome']  ?? exit("Nome não enviado");
$senha = $_POST['senha'] ?? exit("Senha não enviada");
$email = $_POST['email'] ?? exit("Email não enviado");

// Gerar hash seguro da senha
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

// Preparar a query para evitar SQL injection
$stmt = $connection->prepare("INSERT INTO usuarios (nome, senha, email) VALUES (?, ?, ?)");
if (!$stmt) {
    die("Falha na preparação da query: " . $connection->error);
}

// Vincular parâmetros
$stmt->bind_param("sss", $nome, $senha_hash, $email);

// Executar
if ($stmt->execute()) {
    echo "Usuário cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar usuário: " . $stmt->error;
}

$stmt->close();
$connection->close();

// Redirecionar após cadastro
header('Location: index.php');
exit;
?>