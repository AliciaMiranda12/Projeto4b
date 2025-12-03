<?php
session_start();
include '../backend/conexao.php';

if (!isset($_SESSION['IdUsuario'])) {
    die("Usuário não logado.");
}

$IdUsuario = $_SESSION['IdUsuario'];

$sql = "SELECT nome, email, dataCadastro FROM Usuarios WHERE IdUsuario = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $IdUsuario);
$stmt->execute();
$result = $stmt->get_result();

$usuario = $result->fetch_assoc();

if (!$usuario) {
    die("Usuário não encontrado.");
}
?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Perfil</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
      </head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">LOGO</a>
        <a class="dropdown-item" href="../frontend/perfil.php">Perfil</a>
        <a class="dropdown-item" href="index.html">Home</a>
        <a class="dropdown-item" href="../frontend/postagens.html">Postar</a>
        <a class="dropdown-item" href="../frontend/feed.html">Feed</a>
        <a class="dropdown-item" href="../frontend/contato.html">Contato</a>
        <a class="dropdown-item" href="../frontend/entrar.html">Login</a>
          <form class="d-flex" role="Buscar">
           <input class="me-2" type="Buscar" placeholder="Insira o nome" aria-label="Buscar"/>
           <a class="dropdown-item" href="../frontend/buscar_usuarios_por_id.html">Buscar</a>
          </form>
        </div>
      </div>
    </nav>

    <form action="../backend/entrar.php" method="post">

  <h2>Perfil do Usuário</h2>
  <p><strong>Nome:</strong> <?php echo htmlspecialchars($usuario['nome']); ?></p>
  <p><strong>Email:</strong> <?php echo htmlspecialchars($usuario['email']); ?></p>
  <p><strong>Data de Cadastro:</strong> <?php echo htmlspecialchars($usuario['dataCadastro']); ?></p>

    
  <p>Ainda não tem uma conta?<a class="dropdown-item" href="../frontend/cadastrar_usuarios.html"><strong>Cadastre-se</strong></a></p>
</form>


    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand">Footer</a>
          </div>
        </div>
</nav>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
        </body>
      </html>