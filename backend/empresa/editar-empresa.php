<?php
require "../conexao.php";
session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORDWORK - Cadastrar Empresa</title>
    <link rel="stylesheet" href="../../frontend/styles/cadastro-empresa.css">
</head>
<body>
    <div class="container">
        <h1>Complete os dados a seguir.</h1>
        <form action="editar.php" method="post">
            <label for="nome">Nome:</label><br>
            <input type="text" name="nome" value="<?=$_SESSION['nome']?>">
            <br>
            <label for="cpf">CNPJ:</label><br>
            <input type="text" name="cnpj" value="<?=$_SESSION['cnpj']?>">
            <br>
            <label for="tel">Contato:</label><br>
            <input type="text" name="tel" value="<?=$_SESSION['telefone']?>">
            <br>
            <label for="cidade">Cidade:</label><br>
            <input type="text" name="cidade" value="<?=$_SESSION['cidade']?>">
            <br>
            <label for="linkedin">Linkedin:</label><br>
            <input type="text" name="linkedin" value="<?=$_SESSION['linkedin']?>">
            <br>
            <label for="email">Email:</label><br>
            <input type="email" name="email" value="<?=$_SESSION['email']?>">
            <br>
            <label for="senha">Senha:</label><br>
            <input type="password" name="senha" value="<?=$_SESSION['senha']?>">
            <br>
            <input type="hidden" value="empresa" name="categoria">
            <input type="hidden" value="<?=$_SESSION['id']?>" name="id">
            <button class="botao">EDITAR</button>
        </form>
        <a href="../../frontend/index.php">Voltar para o login</a>
    </div>
</body>
</html>