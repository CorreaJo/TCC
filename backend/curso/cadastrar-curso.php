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
            <label for="nome">Nome do curso:</label>
            <input type="text" placeholder="Nome do Curso" name="nome">
            <br>
            <label for="img">Imagem do curso</label>
            <input type="file" name="img" style="color: white;">
            <br>
            <label for="totAulas">Total de aulas:</label>
            <input type="number" name="totAulas" placeholder="Total de Aulas">
            <br>
            <label for="link">Link do curso:</label>
            <input type="text" name="link" placeholder="Link do curso">
            <br>
            <label for="descricao">Descrição do curso:</label>
            <textarea name="descricao"></textarea>
            <br>
            <button>Cadastrar</button>
        </form>
        <a href="../../frontend/empresa.php">Voltar para o perfil</a>
    </div>
</body>
</html>