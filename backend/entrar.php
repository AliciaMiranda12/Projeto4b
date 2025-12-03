<?php
include 'conexao.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    
    if (!isset($_POST['email']) || !isset($_POST['senha'])) {
        echo json_encode(["erro" => "Campos não enviados"]);
        exit;
    }

    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);


    $sql = "SELECT * FROM Usuarios WHERE Email = '$email' LIMIT 1";
    $result = $connection->query($sql);

    if ($result && $result->num_rows === 1) {

        $usuario = $result->fetch_assoc();

        if (password_verify($senha, $usuario['Senha'])) {


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
