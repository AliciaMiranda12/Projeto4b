<?php
include 'conexao.php';
session_start();

// Garante que está chegando via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Garante que email e senha EXISTEM
    if (!isset($_POST['email']) || !isset($_POST['senha'])) {
        echo json_encode(["erro" => "Campos não enviados"]);
        exit;
    }

    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    // Busca só pelo email
    $sql = "SELECT * FROM Usuarios WHERE Email = '$email' LIMIT 1";
    $result = $connection->query($sql);

    if ($result && $result->num_rows === 1) {

        $usuario = $result->fetch_assoc();

        // Verificação da senha criptografada
        if (password_verify($senha, $usuario['Senha'])) {

            // Salvar dados da sessão
            $_SESSION['IdUsuario'] = $usuario['IdUsuario'];
            $_SESSION['Nome'] = $usuario['Nome'];
            $_SESSION['Email'] = $usuario['Email'];

            echo json_encode(["sucesso" => true]);
            exit;

        } else {
            echo json_encode(["erro" => "Senha incorreta"]);
            exit;
        }
    }

    echo json_encode(["erro" => "Email não encontrado"]);
    exit;
}
?>
