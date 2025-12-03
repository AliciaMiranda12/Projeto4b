<?php
    include 'cors.php';
    include 'conexao.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      
        $codigo = $_POST['IdUsuario'] ?? null;

        if (!$codigo) {
            echo json_encode(["erro" => "IdUsuario não enviado"]);
            exit;
        }

        
        $sql = "SELECT * FROM Usuarios WHERE IdUsuario = ?";

        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $codigo);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $usuarios = $result->fetch_all(MYSQLI_ASSOC);
            echo json_encode(["usuarios" => $usuarios]);
        } else {
            echo json_encode(["usuarios" => []]);
        }
    }
?>
