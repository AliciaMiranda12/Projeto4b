<?php
session_start();
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST['nome'] ?? '';

    if (empty($nome)) {
        echo json_encode(["erro" => "Nome não enviado"]);
        exit;
    }

    $sql = "SELECT IdUsuario, nome FROM Usuarios WHERE nome LIKE ?";
    $stmt = $connection->prepare($sql);

    $like = "%" . $nome . "%";
    $stmt->bind_param("s", $like);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo json_encode(["erro" => "Nenhum usuário encontrado"]);
        exit;
    }

    $usuario = $result->fetch_assoc();

    $_SESSION['IdUsuario'] = $usuario['IdUsuario'];

    echo json_encode([
        "sucesso" => true,
        "IdUsuario" => $usuario['IdUsuario']
    ]);
}
?>
