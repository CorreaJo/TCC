<?php
session_start();
require "../../conexao.php";

$id = $_GET["id"];

$select = "SELECT * from vaga WHERE id = $id";
$result= mysqli_query($conexao, $select);

$linha = mysqli_fetch_assoc($result)
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
    <form action="editar.php" method="POST">
        <label for="funcao">Nome da vaga:</label><br>
        <input type="text" name="funcao" value="<?=$linha['função']?>">
        <br>
        <label for="area">Área de atuação:</label><br>
        <input type="text" name="area" value="<?=$linha['area']?>">
        <br>
        <label for="cidade">Local:</label><br>
        <input type="text" name="cidade" value="<?=$linha['cidade']?>">
        <br>
        <label for="periodo">Período:</label><br>
        <select name="periodo" value="<?=$linha['periodo']?>">
            <option value="Integral">Integral</option>
            <option value="Integral">Estágio</option>
            <option value="Integral">Meio período</option>
            <option value="Integral">Efetivo</option>
        </select>
        <br>
        <label for="desc">Descrição da vaga</label><br>
        <textarea name="desc" id="" ><?=$linha['descricao']?></textarea>
        <br>
        <label for="salario">Salário</label><br>
        <input type="text" name="salario" value="<?=$linha['salario']?>">
        <br>
        <label for="data">Data:</label><br>
        <input type="text" name="data" placeholder="Data:" value="<?=$linha['dataExclusao']?>">
        <input type="hidden" name="idEmpresa" value="<?=$linha['idEmpresa']?>">
        <input type="hidden" name="id" value="<?=$linha['id']?>">
        <button class="botao">Cadastrar</button>
    </form>
</div>
</body>
</html>
</body>
</html>