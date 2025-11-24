<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$database = "cadastro";

$connection = new mysqli($host, $usuario, $senha, $database);

if ($connection->connect_error) {
    die("Falha de conexão: " . $connection->connect_error);
}
?>
