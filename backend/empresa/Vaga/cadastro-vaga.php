<?php
session_start();
require "../../conexao.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="cadastro.php" method="POST">
        <input type="text" name="nome" placeholder="Nome:">
        <input type="text" name="data" placeholder="Data:">
        <textarea name="descricao" id=""></textarea>
        <input type="text" name="salario" placeholder="Salario:">
        <input type="number" name="idEmpresa" value=<?=$_SESSION["id"]?>>
        <button>Cadastrar</button>
    </form>
</body>
</html>