<?php
include '../backend/cors.php';
include '../backend/conexao.php'; 


$nome  = $_POST['nome']  ?? exit("Nome não enviado");
$senha = $_POST['senha'] ?? exit("Senha não enviada");
$email = $_POST['email'] ?? exit("Email não enviado");


$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

$stmt = $connection->prepare("INSERT INTO usuarios (nome, senha, email) VALUES (?, ?, ?)");
if (!$stmt) {
    die("Falha na preparação da query: " . $connection->error);
}

$stmt->bind_param("sss", $nome, $senha_hash, $email);


if ($stmt->execute()) {
    echo "Usuário cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar usuário: " . $stmt->error;
}

$stmt->close();
$connection->close();

header('Location: index.php');
exit;
?>