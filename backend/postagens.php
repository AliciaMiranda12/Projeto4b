<?php
include 'conexao.php';
include 'cors.php';

// Verifica a conexão
if (!isset($connection) || !$connection) {
    die("Erro: conexão não encontrada!");
}

// Receber dados
$titulo = $_POST['titulo'] ?? null;
$conteudo = $_POST['conteudo'] ?? null;
$idUsuario = 1;

if (!$titulo || !$conteudo) {
    die("Erro: Dados incompletos!");
}

// Preparar statement
$stmt = $connection->prepare("INSERT INTO postagens (IdUsuario, Titulo, Conteudo) VALUES (?, ?, ?)");
if (!$stmt) {
    die("Erro na preparação do statement: " . $connection->error);
}

// Bind de parâmetros
$stmt->bind_param("iss", $idUsuario, $titulo, $conteudo);

// Executar
if ($stmt->execute()) {
    echo "Postagem salva com sucesso!";
?>
      <a href="http://localhost//Projeto4b/backend/index.php">Voltar ao início</a>

<?php
} else {
    echo "Erro ao salvar postagem: " . $stmt->error;
}

// Fechar
$stmt->close();
?>
