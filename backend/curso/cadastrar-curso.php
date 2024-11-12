<?php
session_start();    
require "../../backend/conexao.php";

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
        <form action="cadastro.php" method="post" enctype="multipart/form-data" accept=".png, .jpg, .jpeg">
            <input type="text" placeholder="Nome do Curso" name="nome">
            <input type="file" name="img">
            <input type="number" name="totAulas">
            <textarea name="descricao"></textarea>
            <button>Cadastrar</button>
        </form>
        <a href="../../frontend/index.php">Voltar para o login</a>
    </div>
</body>
</html>