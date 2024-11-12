<?php
session_start();
require "../../conexao.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORDWORK - Cadastrar Vaga</title>
    <link rel="stylesheet" href="../../../frontend/styles/cadastro-vaga.css">
</head>
<body>
<div class="container">
<h1>Complete os dados a seguir.</h1>
    <form action="cadastro.php" method="POST">
        <label for="funcao">Nome da vaga:</label><br>
        <input type="text" name="funcao">
        <br>
        <label for="area">Área de atuação:</label><br>
        <input type="text" name="area">
        <br>
        <label for="cidade">Local:</label><br>
        <input type="text" name="cidade">
        <br>
        <label for="periodo">Período:</label><br>
        <select name="periodo">
            <option value="Integral">Integral</option>
            <option value="Integral">Estágio</option>
            <option value="Integral">Meio período</option>
            <option value="Integral">Efetivo</option>
        </select>
        <br>
        <label for="desc">Descrição da vaga</label><br>
        <textarea name="desc" id=""></textarea>
        <br>
        <label for="salario">Salário</label><br>
        <input type="text" name="salario">
        <br>
        <label for="data">Data:</label><br>
        <input type="text" name="data" placeholder="Data:">
        <input type="hidden" name="idEmpresa" value=<?=$_SESSION["id"]?>>
        <button class="botao">Cadastrar</button>
    </form>
</div>
</body>
</html>