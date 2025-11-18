<?php
	include 'cors.php';
	include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {

	$sql = "SELECT * FROM Usuarios";

    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $usuarios = [];
        while ($row = $result->fetch_assoc()) {
            array_push($usuarios, $row);
        }

        $response = [
            'usuarios' => $usuarios
        ];

    } else {
        $response = [
            'usuarios' => 'Nenhum registro encontrado!'
        ];
    }

    echo json_encode($response);
	} // Fim If
?>