<?php
	include 'cors.php';
	include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
   
    $data = file_get_contents("php://input");

    $requestData = json_decode($data);

    $codigo = $requestData->CodFun;

	$sql = "DELETE FROM Usuarios WHERE CodFun='$codigo'";

    if ($connection->query($sql) === true) {
        $response = [
            'mensagem' => 'Registro apagado com sucesso!'
        ];
    } else {
        $response = [
            'mensagem' => $connection->error
        ];
    }
    echo json_encode($response);
}   
?>