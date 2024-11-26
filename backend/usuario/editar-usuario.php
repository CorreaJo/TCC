<?php
require "../conexao.php";
session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORDWORK - Editar Usuario</title>
    <link rel="stylesheet" href="../../frontend/styles/cadastro-usuario.css">
</head>
<body>
    <div class="container">
        <h1>Editar perfil</h1>
        <form action="editar.php" method="post">
            <label for="nome">Nome completo:</label><br>
            <input type="text" name="nome" value="<?=$_SESSION['nome']?>">
            <br>
            <label for="cpf">CPF:</label><br>
            <input type="text" name="cpf" value="<?=$_SESSION['cpf']?>">
            <br>
            <label for="tel">Telefone ou Celular:</label><br>
            <input type="text" name="tel" value="<?=$_SESSION['telefone']?>">
            <br>
            <label for="cep">CEP:</label><br>
            <input type="text" name="cep" value="<?=$_SESSION['cep']?>">
            <br>
            <label for="endereco">Endereço:</label><br>
            <input type="text" name="endereco" value="<?=$_SESSION['endereco']?>">
            <br>
            <label for="cidade">Cidade:</label><br>
            <input type="text" name="cidade" value="<?=$_SESSION['cidade']?>">
            <br>
            <label for="linkedin">Linkedin:</label><br>
            <input type="text" name="linkedin" value="<?=$_SESSION['linkedin']?>">
            <br>
            <label for="dNasc">Data de Nascimento:</label><br>
            <input type="date" name="dNasc" value="<?=$_SESSION['dNasc']?>">
            <br>
            <label for="email">Email:</label><br>
            <input type="email" name="email" value="<?=$_SESSION['email']?>">
            <br>
            <input type="hidden" value="usuario" name="categoria">
            <input type="hidden" value="<?=$_SESSION['id']?>" name="id">
            <button class="botao">EDITAR</button>
        </form>
        <a href="../../frontend/index.php">Voltar para o login</a>
    </div>
</body>
</html>