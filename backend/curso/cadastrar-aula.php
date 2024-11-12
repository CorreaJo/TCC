<?php
session_start();    
require "../conexao.php";


$id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORDWORK - Cadastrar Curso</title>
    <link rel="stylesheet" href="../../frontend/styles/cadastro-usuario.css">
</head>
<body>
    <div class="container">
        <h1>Complete os dados a seguir.</h1>
        <form action="cadastro-vaga.php" method="post" enctype="multipart/form-data" accept=".png, .jpg, .jpeg">
            <input type="text" placeholder="link da aula" name="link">
            <input type="hidden" name="id" VALUE="<?=$id?>">
            <button>Cadastrar</button>
        </form>
        <a href="../../frontend/index.php">Voltar para o login</a>
    </div>
</body>
</html>